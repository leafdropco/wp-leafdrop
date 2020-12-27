<?php

namespace RebelCode\Spotlight\Instagram\MediaStore;

use Exception;
use RebelCode\Spotlight\Instagram\Feeds\Feed;
use RebelCode\Spotlight\Instagram\IgApi\IgMedia;
use RebelCode\Spotlight\Instagram\IgApi\IgUser;
use RebelCode\Spotlight\Instagram\MediaStore\Processors\MediaDownloader;
use RebelCode\Spotlight\Instagram\Modules\Pro\MediaStore\ProMediaSource;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use RuntimeException;
use wpdb;

/**
 * The store for IG media.
 *
 * This class is responsible for providing Instagram media to other objects, such as feeds.
 *
 * All media fetching functionality is delegated to media fetchers, which are objects that implement
 * {@link MediaFetcherInterface}. The store will call each fetcher's {@link MediaFetcherInterface::fetch()} method,
 * passing the feed as well as itself as arguments. Fetchers are responsible for actually retrieving the media from
 * external sources, such as from the IG API. When a fetcher wishes to commit a list of media objects, they should
 * call {@link MediaStore::addMedia()} on the media store argument that they are given. This will tell the media
 * store to insert those media objects into the database (unless they already exist) and also add the media objects
 * into a **queue**. For stories, fetchers should call {@link MediaStore::addStories()} to ensure that story media do
 * not interfere with the count and offset slicing.
 *
 * Once all fetchers have been called, the media store will invoke the media processors.
 *
 * Media processors are objects that implement {@link MediaProcessorInterface}. The store will pass the fetched queue
 * to each processor, by reference (for performance reasons). Each processor may perform manipulations of the queue
 * directly. Since processors are called in sequence, each processor will be operating on the result of the previous
 * processor, making the order of processors potentially an important factor.
 *
 * The queue of media objects will persist until the {@link MediaStore::getFeedMedia()} method is called again.
 * Manipulations done by the store itself, such as offset and count slicing, will not affect the queue. These parameters
 * only used to control the size of the return value and the scope of any database updates (such as for "last requested
 * time" information). This ensures that the result of {@link MediaStore::getNumMedia()} is not affected by these
 * operations and accurately returns the size of the results generated by the fetchers and processors, the results of
 * which should always be the same when given the same feed (unlike offset and count slicing which are not dependant on
 * the feed).
 *
 * @since 0.1
 */
class MediaStore
{
    /**
     * @since 0.1
     *
     * @var wpdb
     */
    protected $wpdb;

    /**
     * @since 0.1
     *
     * @var MediaFetcherInterface[]
     */
    protected $fetchers;

    /**
     * @since 0.1
     *
     * @var MediaProcessorInterface[]
     */
    protected $processors;

    /**
     * @since 0.1
     *
     * @var PostType
     */
    protected $mediaCpt;

    /**
     * @since 0.1
     *
     * @var array
     */
    protected $queue;

    /**
     * @since 0.1
     *
     * @var array
     */
    protected $mediaQueue;

    /**
     * @since 0.1
     *
     * @var array
     */
    protected $storyQueue;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param wpdb                      $wpdb       The WordPress database driver.
     * @param MediaFetcherInterface[]   $fetchers   The fetchers to use to fetch media.
     * @param MediaProcessorInterface[] $processors The processors to use to process media.
     * @param PostType                  $mediaCpt   The media CPT.
     */
    public function __construct(
        wpdb $wpdb,
        array $fetchers,
        array $processors,
        PostType $mediaCpt
    ) {
        $this->wpdb = $wpdb;
        $this->fetchers = $fetchers;
        $this->processors = $processors;
        $this->mediaCpt = $mediaCpt;
        $this->mediaQueue = [];
        $this->storyQueue = [];
    }

    /**
     * Retrieves the media used by a given feed.
     *
     * @since 0.1
     *
     * @param Feed $feed   The feed instance for which to retrieve media.
     * @param int  $num    The number of media objects to return. Will return all media objects if less than or equal
     *                     to zero.
     * @param int  $offset The offset from which to begin returning media. Negative values will be treated as zero.
     *
     * @return IgCachedMedia[][] A tuple containing two lists of media objects. The first list will contain non-story
     *                           media while the second will only contain story media.
     */
    public function getFeedMedia(Feed $feed, int $num = -1, int $offset = 0)
    {
        $this->mediaQueue = [];
        $this->storyQueue = [];

        try {
            foreach ($this->fetchers as $fetcher) {
                $fetcher->fetch($feed, $this);
            }
        } catch (Exception $exception) {
            throw new RuntimeException(
                sprintf(
                    __('Failed to fetch media due to an error from Instagram\'s API: %s', 'sli-insta'),
                    $exception->getMessage()
                ),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        foreach ($this->processors as $processor) {
            $processor->process($this->mediaQueue, $feed);
        }

        $total = count($this->mediaQueue);
        $offset = max(0, min($total, $offset));

        $toUpdate = $this->mediaQueue;
        $toReturn = $this->mediaQueue;

        if ($num > 0) {
            // We need to update the media that was requested between offset and num, as well as any preceding media.
            // This is because when feeds "Load more", the keep previous media on the screen. So we treat these media
            // as being requested again.
            // However, the returned list must respect the offset. So we need to slice again here with that offset
            // Example: [offset = 5, num = 3]
            // * Will return media from indices 5 to 8
            // * Will update media from indices 0 to 8
            $toUpdate = array_slice($this->mediaQueue, 0, $offset + $num);
            $toReturn = array_slice($toUpdate, $offset);
        }

        $this->updateLastRequestedTime($toUpdate);

        return [array_values($toReturn), array_values($this->storyQueue)];
    }

    /**
     * Retrieves the total number of media objects in the queue, prior to any offset and count slicing.
     *
     * @since 0.1
     *
     * @return int
     */
    public function getNumMedia()
    {
        return count($this->mediaQueue);
    }

    /**
     * Retrieves the total number of story media objects in the queue.
     *
     * @since 0.1
     *
     * @return int
     */
    public function getNumStories()
    {
        return count($this->storyQueue);
    }

    /**
     * Updates the store with a given list of media posts.
     *
     * @since 0.1
     *
     * @param IgMedia[]   $mediaList The list of media to update the store with.
     * @param MediaSource $source    The source from where the media is being imported.
     */
    public function addMedia(array $mediaList, MediaSource $source)
    {
        $this->updateWith($mediaList, $source, $this->mediaQueue);
    }

    /**
     * Updates the store with a given list of story media.
     *
     * Media that already exists in the store will be ignored. Comparison is done against the IG media ID.
     *
     * @since 0.1
     *
     * @param IgMedia[] $storyList The list of story media to update the store with.
     * @param igUser    $user      The user that the story belongs to.
     */
    public function addStories(array $storyList, IgUser $user)
    {
        if (class_exists(ProMediaSource::class)) {
            $this->updateWith($storyList, ProMediaSource::forStory($user), $this->storyQueue);
        }
    }

    /**
     * Updates the store with a given media list.
     *
     * Media that already exists in the store will be ignored. Comparison is done against the IG media ID.
     *
     * @since 0.1
     *
     * @param IgMedia[]   $mediaList The list of media to update the store with.
     * @param MediaSource $source    The source from where the media is being imported.
     * @param array       $queue     A reference to the queue to which to add the media.
     */
    protected function updateWith(array $mediaList, MediaSource $source, array &$queue)
    {
        if (empty($mediaList)) {
            return;
        }

        // Get the media from the DB whose media IDs are in the $mediaList.
        // This array is a mapping of media ID -> wp post ID
        $existing = $this->getExistingMedia($mediaList);

        foreach ($mediaList as $media) {
            $mediaId = $media->id;

            // Create a cached media instance from this media
            $cachedMedia = IgCachedMedia::from($media, [
                'source' => $source,
            ]);

            // Only insert into the database if the media does not already exists
            if (!array_key_exists($mediaId, $existing)) {
                MediaDownloader::downloadMediaFiles($cachedMedia);

                $post = MediaPostType::toWpPost($cachedMedia);
                $postId = $this->mediaCpt->insert($post);

                if (is_wp_error($postId)) {
                    continue;
                }
            } else {
                // If the media exists, get the post ID from the map
                $postId = $existing[$mediaId];
            }

            // Create a cached media instance from this media
            $cachedMedia = IgCachedMedia::from($media, [
                'source' => $source,
                'post' => get_post($postId),
            ]);

            // Add to the queue
            $queue[] = $cachedMedia;

            // Save the media's ID for future existence checks
            // Don't map it to a post ID to prevent future iterations from re-saving the last requested date
            $existing[$mediaId] = false;
        }
    }

    /**
     * Checks which media in a given list already exist in the database and returns them.
     *
     * @since 0.1
     *
     * @param array $mediaList The media list to check.
     *
     * @return array A mapping of media IDs to post IDs
     */
    protected function getExistingMedia(array $mediaList) : array
    {
        if (empty($mediaList)) {
            return [];
        }

        $mediaIds = Arrays::join($mediaList, ',', function (IgMedia $media) {
            return $media->id;
        });

        $table = $this->wpdb->prefix . 'postmeta';
        $query = sprintf(
            "SELECT meta_value, post_id FROM %s WHERE meta_key = '%s' AND meta_value IN (%s)",
            $table,
            MediaPostType::MEDIA_ID,
            $mediaIds
        );

        $results = $this->wpdb->get_results($query, 'ARRAY_N');

        // Transform the list, where each value is a tuple array of the media ID and post ID, into a mapping of media
        // IDs to post IDs
        return Arrays::mapPairs($results, function ($idx, $pair) {
            return $pair;
        });
    }

    /**
     * Updates the last requested time for a list of media objects.
     *
     * @since 0.1
     *
     * @param IgCachedMedia[] $mediaList The list of media objects to update.
     */
    protected function updateLastRequestedTime(array $mediaList)
    {
        if (count($mediaList) === 0) {
            return;
        }

        $ids = Arrays::join($mediaList, ',', function (IgCachedMedia $media) {
            return '\'' . $media->post->ID . '\'';
        });

        $table = $this->wpdb->prefix . 'postmeta';
        $query = sprintf(
            "UPDATE %s SET meta_value = '%s' WHERE meta_key = '%s' AND post_id IN (%s)",
            $table,
            time(),
            MediaPostType::LAST_REQUESTED,
            $ids
        );

        $this->wpdb->query($query);
    }
}