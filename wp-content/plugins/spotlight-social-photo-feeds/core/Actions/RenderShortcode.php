<?php

namespace RebelCode\Spotlight\Instagram\Actions;

use Dhii\Output\TemplateInterface;
use RebelCode\Spotlight\Instagram\PostTypes\FeedPostType;
use RebelCode\Spotlight\Instagram\RestApi\Transformers\AccountTransformer;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Utils\Strings;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_Post;

/**
 * The action that renders the content for the shortcode.
 *
 * @since 0.1
 */
class RenderShortcode
{
    /**
     * @since 0.1
     *
     * @var PostType
     */
    protected $feeds;

    /**
     * @since 0.4
     *
     * @var PostType
     */
    protected $accounts;

    /**
     * @since 0.1
     *
     * @var TemplateInterface
     */
    protected $template;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param PostType          $feeds    The feeds post type.
     * @param PostType          $accounts The accounts post type.
     * @param TemplateInterface $template The template to use for rendering.
     */
    public function __construct(PostType $feeds, PostType $accounts, TemplateInterface $template)
    {
        $this->feeds = $feeds;
        $this->accounts = $accounts;
        $this->template = $template;
    }

    /**
     * Renders the content for the shortcode.
     *
     * @since 0.1
     *
     * @param array $args The render arguments.
     *
     * @return string The rendered content.
     */
    public function __invoke(array $args)
    {
        $options = Arrays::mapPairs($args, function ($key, $value) {
            return [Strings::kebabToCamel($key), $value];
        });

        // If the "feed" arg is given, get the feed for that ID and merge its options with the other args
        if (array_key_exists('feed', $options)) {
            $feedId = $options['feed'];
            $feedPost = $this->feeds->get($feedId);

            if ($feedPost instanceof WP_Post) {
                unset($options['feed']);
                $options = array_merge($feedPost->{FeedPostType::OPTIONS}, $options);
            } else {
                return is_user_logged_in()
                    ? "<p>The selected Instagram feed does not exist (ID {$feedId})<br/><small>(This message is only visible when logged in)</small></p>"
                    : '';
            }
        }

        $accountIds = array_unique(array_merge($options['accounts'] ?? [], $options['tagged'] ?? []));
        $accountPosts = $this->accounts->query(['post_in' => $accountIds]);
        $accounts = Arrays::map($accountPosts, function (WP_Post $post) {
            return AccountTransformer::toArray($post);
        });

        return $this->template->render([
            'feed' => $options,
            'accounts' => $accounts,
        ]);
    }
}
