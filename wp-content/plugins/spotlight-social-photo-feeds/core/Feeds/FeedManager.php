<?php

namespace RebelCode\Spotlight\Instagram\Feeds;

use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\Engine\Sources\HashtagSource;
use RebelCode\Spotlight\Instagram\Engine\Sources\TaggedUserSource;
use RebelCode\Spotlight\Instagram\Engine\Sources\UserSource;
use RebelCode\Spotlight\Instagram\PostTypes\AccountPostType;
use RebelCode\Spotlight\Instagram\PostTypes\FeedPostType;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_Post;

/**
 * A manager for feeds (not WordPress Posts, but {@link ItemFeed} instances).
 *
 * @since 0.5
 */
class FeedManager
{
    /**
     * @since 0.5
     *
     * @var PostType
     */
    public $feeds;

    /**
     * @since 0.5
     *
     * @var PostType
     */
    public $accounts;

    /**
     * Constructor.
     *
     * @since 0.5
     *
     * @param PostType $feeds
     * @param PostType $accounts
     */
    public function __construct(PostType $feeds, PostType $accounts)
    {
        $this->feeds = $feeds;
        $this->accounts = $accounts;
    }

    /**
     * Gets the item feed for a post by ID.
     *
     * @since 0.5
     *
     * @param string|int $id The ID.
     *
     * @return ItemFeed|null The item feed, or null if the ID does not correspond to a post.
     */
    public function get($id)
    {
        return $this->wpPostToFeed($this->feeds->get($id));
    }

    /**
     * Queries the feeds.
     *
     * @since 0.5
     *
     * @param array    $query The WP_Query args.
     * @param int|null $num   The number of feeds to retrieve.
     * @param int      $page  The result page number.
     *
     * @return ItemFeed[] A list of feeds.
     */
    public function query($query = [], $num = null, $page = 1)
    {
        return Arrays::map($this->feeds->query($query, $num, $page), [$this, 'wpPostToFeed']);
    }

    /**
     * Retrieves the sources to use for a given set of feed options.
     *
     * @since 0.5
     *
     * @param array $options The feed options.
     *
     * @return Source[] A list of item sources.
     */
    public function getSources(array $options)
    {
        $sources = [];

        foreach ($options['accounts'] ?? [] as $id) {
            $post = $this->accounts->get($id);

            if ($post !== null) {
                $sources[] = UserSource::create($post->{AccountPostType::USERNAME}, $post->{AccountPostType::TYPE});
            }
        }

        foreach ($options['tagged'] ?? [] as $id) {
            $post = $this->accounts->get($id);

            if ($post !== null) {
                $sources[] = TaggedUserSource::create($post->{AccountPostType::USERNAME});
            }
        }

        foreach ($options['hashtags'] ?? [] as $hashtag) {
            $tag = $hashtag['tag'] ?? '';

            if (!empty($tag)) {
                $sources[] = HashtagSource::create($tag, $hashtag['sort'] ?? HashtagSource::TYPE_POPULAR);
            }
        }

        return $sources;
    }

    /**
     * Creates an {@link ItemFeed} from a set of feed options.
     *
     * @since 0.5
     *
     * @param array $options The feed options.
     *
     * @return ItemFeed The created feed.
     */
    public function createFeed(array $options)
    {
        return new ItemFeed($this->getSources($options), $options);
    }

    /**
     * Converts a WordPress post into an {@link ItemFeed}.
     *
     * @since 0.5
     *
     * @param WP_Post|null $post The WordPress post.
     *
     * @return ItemFeed|null The created feed or null if the post is null.
     */
    public function wpPostToFeed(?WP_Post $post)
    {
        if ($post === null) {
            return null;
        } else {
            return $this->createFeed($post->{FeedPostType::OPTIONS});
        }
    }
}
