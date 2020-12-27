<?php

namespace RebelCode\Spotlight\Instagram\Engine\Stores;

use RebelCode\Iris\Error;
use RebelCode\Iris\Importing\ItemStore;
use RebelCode\Iris\Item;
use RebelCode\Iris\Result;
use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\Engine\MediaChild;
use RebelCode\Spotlight\Instagram\Engine\MediaItem;
use RebelCode\Spotlight\Instagram\Engine\Sources\UserSource;
use RebelCode\Spotlight\Instagram\IgApi\IgMedia;
use RebelCode\Spotlight\Instagram\MediaStore\Processors\MediaDownloader;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_Post;

/**
 * The item store for storing Instagram media as WordPress posts.
 *
 * @since 0.5
 */
class WpPostMediaStore implements ItemStore
{
    /**
     * The media post type.
     *
     * @since 0.5
     *
     * @var PostType
     */
    protected $postType;

    /**
     * Constructor.
     *
     * @since 0.5
     *
     * @param PostType $postType The media post type.
     */
    public function __construct(PostType $postType)
    {
        $this->postType = $postType;
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function store(array $items) : Result
    {
        $result = Result::empty();

        $numItems = count($items);
        if ($numItems === 0) {
            return $result;
        }

        $existing = $this->getExistingItems($items);

        foreach ($items as $item) {
            // If the item does not exist, import it
            if (!array_key_exists($item->id, $existing)) {
                // Store the item
                $item = $this->add($item);

                if ($item instanceof Error) {
                    $result->errors[] = $item;
                } else {
                    $result->items[] = $item;
                    $existing[$item->id] = true;
                }
            } else {
                $post = $this->postType->get($existing[$item->id]);

                if ($post !== null) {
                    $postData = ['meta_input' => []];

                    // If the item is a video and has no thumbnail, re-download and regenerate the thumbnails
                    if ($item->data[MediaItem::MEDIA_TYPE] === "VIDEO" &&
                        $post->{MediaPostType::TYPE} === "VIDEO" &&
                        empty($post->{MediaPostType::THUMBNAIL_URL})
                    ) {
                        $item = MediaDownloader::downloadItemFiles($item);
                        $postData = static::itemToPostData($item);
                    }

                    // If the existing item and the current item are the same account, but one is from a personal
                    // account and one is from a business account, update the existing post with the new item's source
                    $currSrcType = $post->{MediaPostType::SOURCE_TYPE};
                    $currSrcName = $post->{MediaPostType::SOURCE_NAME};
                    $newSrcType = $item->source->type;
                    $newSrcName = $item->source->data['name'] ?? '';

                    if (($currSrcType === UserSource::TYPE_PERSONAL || $currSrcType === UserSource::TYPE_BUSINESS) &&
                        ($newSrcType === UserSource::TYPE_PERSONAL || $newSrcType === UserSource::TYPE_BUSINESS) &&
                        $currSrcType !== $newSrcType && $currSrcName === $newSrcName
                    ) {
                        $postData['meta_input'][MediaPostType::SOURCE_TYPE] = $item->source->type;
                        $postData['meta_input'][MediaPostType::SOURCE_NAME] = $item->source->data['name'] ?? '';
                    }

                    // Update the like and comment counts
                    $postData['meta_input'][MediaPostType::LIKES_COUNT] = $item->data[MediaItem::LIKES_COUNT];
                    $postData['meta_input'][MediaPostType::COMMENTS_COUNT] = $item->data[MediaItem::COMMENTS_COUNT];

                    $this->postType->update($post->ID, $postData);
                }
            }
        }

        // Report success if the number of errors is less than the number of items
        $result->success = count($result->errors) < $numItems;

        return $result;
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result
    {
        $posts = $this->postType->query([
            'posts_per_page' => empty($limit) ? -1 : $limit,
            'offset' => $offset,
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => MediaPostType::SOURCE_TYPE,
                    'value' => $source->type,
                ],
                [
                    'key' => MediaPostType::SOURCE_NAME,
                    'value' => $source->data['name'] ?? '',
                ],
            ],
        ]);

        $items = Arrays::map($posts, function (WP_Post $post) use ($source) {
            return static::wpPostToItem($post, $source);
        });

        return Result::success($items);
    }

    /**
     * Adds a single item to the store.
     *
     * @since 0.5
     *
     * @param Item $item The item to add to the store.
     *
     * @return Item|Error The stored item on success, or an error on failure.
     */
    public function add(Item $item)
    {
        set_time_limit(30);

        // Download the files and get the updated item
        $item = MediaDownloader::downloadItemFiles($item);

        $postData = static::itemToPostData($item);
        $postId = $this->postType->insert($postData);

        // If failed to insert the post into the DB
        if (is_wp_error($postId)) {
            // Delete all created thumbnail files
            foreach (MediaDownloader::getAllThumbnails($item->id) as $file) {
                if (file_exists($file)) {
                    @unlink($file);
                }
            }

            return new Error('Failed to insert post for item #' . $item->id);
        } else {
            return static::wpPostToItem(get_post($postId), $item->source);
        }
    }

    /**
     * Checks which items in a given list already exist in the database and returns them.
     *
     * @since 0.5
     *
     * @param Item[] $items The media list to check.
     *
     * @return array A mapping of media IDs to post IDs
     */
    public function getExistingItems(array $items) : array
    {
        global $wpdb;

        if (empty($items)) {
            return [];
        }

        $mediaIds = Arrays::join($items, ',', function (Item $item) {
            return $item->id;
        });

        $table = $wpdb->prefix . 'postmeta';
        $query = sprintf(
            "SELECT meta_value, post_id FROM %s WHERE meta_key = '%s' AND meta_value IN (%s)",
            $table,
            MediaPostType::MEDIA_ID,
            $mediaIds
        );

        $results = $wpdb->get_results($query, 'ARRAY_N');

        // Each value in $results is a tuple of the media ID and post ID
        // The below creates an associative array using each tuple as the key->value pair
        return Arrays::createMap($results, function ($pair) {
            return $pair;
        });
    }

    /**
     * Transforms an item into WordPress post data.
     *
     * @since 0.5
     *
     * @param Item $item The item instance.
     *
     * @return array The WordPress post data for the given item.
     */
    public static function itemToPostData(Item $item)
    {
        return [
            'post_title' => $item->data[MediaItem::CAPTION] ?? '',
            'post_status' => 'publish',
            'meta_input' => [
                MediaPostType::MEDIA_ID => $item->id,
                MediaPostType::USERNAME => $item->data[MediaItem::USERNAME] ?? '',
                MediaPostType::TIMESTAMP => $item->data[MediaItem::TIMESTAMP] ?? null,
                MediaPostType::CAPTION => $item->data[MediaItem::CAPTION] ?? '',
                MediaPostType::TYPE => $item->data[MediaItem::MEDIA_TYPE] ?? '',
                MediaPostType::URL => $item->data[MediaItem::MEDIA_URL] ?? '',
                MediaPostType::PERMALINK => $item->data[MediaItem::PERMALINK] ?? '',
                MediaPostType::THUMBNAIL_URL => $item->data[MediaItem::THUMBNAIL_URL] ?? '',
                MediaPostType::THUMBNAILS => $item->data[MediaItem::THUMBNAILS] ?? [],
                MediaPostType::LIKES_COUNT => $item->data[MediaItem::LIKES_COUNT] ?? 0,
                MediaPostType::COMMENTS_COUNT => $item->data[MediaItem::COMMENTS_COUNT] ?? 0,
                MediaPostType::COMMENTS => $item->data[MediaItem::COMMENTS]['data'] ?? [],
                MediaPostType::CHILDREN => $item->data[MediaItem::CHILDREN]['data'] ?? [],
                MediaPostType::IS_STORY => $item->data[MediaItem::IS_STORY] ?? false,
                MediaPostType::LAST_REQUESTED => time(),
                MediaPostType::SOURCE_TYPE => $item->source->type,
                MediaPostType::SOURCE_NAME => $item->source->data['name'] ?? '',
            ],
        ];
    }

    /**
     * Transforms a WordPress post into an item.
     *
     * @since 0.5
     *
     * @param WP_Post $post The post.
     * @param Source  $source
     *
     * @return Item The WordPress post data for the given item.
     */
    public static function wpPostToItem(WP_Post $post, Source $source) : Item
    {
        $children = $post->{MediaPostType::CHILDREN};
        $children = Arrays::map($children, function ($child) {
            return ($child instanceof IgMedia)
                ? [
                    MediaChild::MEDIA_ID => $child->id,
                    MediaChild::MEDIA_TYPE => $child->type,
                    MediaChild::PERMALINK => $child->permalink,
                    MediaChild::MEDIA_URL => $child->url,
                ]
                : (array) $child;
        });

        return Item::create($post->ID, $source, [
            MediaItem::MEDIA_ID => $post->{MediaPostType::MEDIA_ID},
            MediaItem::CAPTION => $post->{MediaPostType::CAPTION},
            MediaItem::USERNAME => $post->{MediaPostType::USERNAME},
            MediaItem::TIMESTAMP => $post->{MediaPostType::TIMESTAMP},
            MediaItem::MEDIA_TYPE => $post->{MediaPostType::TYPE},
            MediaItem::MEDIA_URL => $post->{MediaPostType::URL},
            MediaItem::PERMALINK => $post->{MediaPostType::PERMALINK},
            MediaItem::THUMBNAIL_URL => $post->{MediaPostType::THUMBNAIL_URL},
            MediaItem::THUMBNAILS => $post->{MediaPostType::THUMBNAILS},
            MediaItem::LIKES_COUNT => $post->{MediaPostType::LIKES_COUNT},
            MediaItem::COMMENTS_COUNT => $post->{MediaPostType::COMMENTS_COUNT},
            MediaItem::COMMENTS => $post->{MediaPostType::COMMENTS},
            MediaItem::CHILDREN => $children,
            MediaItem::IS_STORY => boolval($post->{MediaPostType::IS_STORY}),
            MediaItem::LAST_REQUESTED => $post->{MediaPostType::LAST_REQUESTED},
            MediaItem::SOURCE_NAME => $post->{MediaPostType::SOURCE_NAME},
            MediaItem::SOURCE_TYPE => $post->{MediaPostType::SOURCE_TYPE},
            MediaItem::POST => $post->ID,
        ]);
    }

    /**
     * Updates the last requested time for a list of media objects.
     *
     * @since 0.5
     *
     * @param Item[] $items The list of items.
     */
    public static function updateLastRequestedTime(array $items)
    {
        if (count($items) === 0) {
            return;
        }

        global $wpdb;

        $postIds = Arrays::join($items, ',', function (Item $item) {
            return '\'' . $item->data[MediaItem::POST] . '\'';
        });

        $table = $wpdb->prefix . 'postmeta';
        $query = sprintf(
            "UPDATE %s SET meta_value = '%s' WHERE meta_key = '%s' AND post_id IN (%s)",
            $table,
            time(),
            MediaPostType::LAST_REQUESTED,
            $postIds
        );

        $wpdb->query($query);
    }
}
