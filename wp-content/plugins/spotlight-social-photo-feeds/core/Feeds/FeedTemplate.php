<?php

namespace RebelCode\Spotlight\Instagram\Feeds;

use Dhii\Output\TemplateInterface;

/**
 * The template that renders a feed.
 *
 * @since 0.1
 */
class FeedTemplate implements TemplateInterface
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function render($ctx = null)
    {
        if (!is_array($ctx)) {
            return '';
        }

        return static::renderFeed(uniqid('feed'), $ctx);
    }

    /**
     * Renders a feed.
     *
     * @since 0.4
     *
     * @param string $varName The JS variable name in `SliFrontCtx`.
     * @param array  $ctx The render context.
     *
     * @return string The rendered feed.
     */
    public static function renderFeed(string $varName, array $ctx)
    {
        $feedOptions = $ctx['feed'] ?? [];
        $accounts = $ctx['accounts'] ?? [];

        // Convert into JSON, which is also valid JS syntax
        $feedJson = json_encode($feedOptions);
        $accountsJson = json_encode($accounts);

        // Prepare the HTML class
        $className = 'spotlight-instagram-feed';
        if (array_key_exists('className', $feedOptions) && !empty($feedOptions['className'])) {
            $className .= ' ' . $feedOptions['className'];
        }

        // Output the required HTML and JS
        ob_start();
        ?>
        <div class="<?= $className ?>" data-feed-var="<?= $varName ?>"></div>
        <meta name="sli__f__<?= $varName ?>" content="<?= esc_attr($feedJson) ?>" />
        <meta name="sli__a__<?= $varName ?>" content="<?= esc_attr($accountsJson) ?>" />
        <?php

        // Trigger the action that will enqueue the required JS bundles
        do_action('spotlight/instagram/enqueue_front_app');

        return ob_get_clean();
    }
}
