<?php

namespace RebelCode\Spotlight\Instagram\Modules\Dev;

use RebelCode\Spotlight\Instagram\MediaStore\Processors\MediaDownloader;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use wpdb;

/**
 * Dev tool that resets the DB.
 *
 * @since 0.1
 */
class DevResetDb
{
    /**
     * @since 0.1
     *
     * @var wpdb
     */
    protected $db;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param wpdb $db
     */
    public function __construct(wpdb $db)
    {
        $this->db = $db;
    }

    /**
     * @since 0.1
     */
    public function __invoke()
    {
        $resetDb = filter_input(INPUT_POST, 'sli_reset_db');
        if (!$resetDb) {
            return;
        }

        if (!wp_verify_nonce($resetDb, 'sli_reset_db')) {
            wp_die('You cannot do that!', 'Unauthorized', [
                'back_link' => true,
            ]);
        }

        $db = $this->db;

        // The post types to delete
        $postTypes = [
            'sl-insta-media',
        ];
        // Check for "keep accounts"
        if (!filter_input(INPUT_POST, 'sli_reset_keep_accounts', FILTER_VALIDATE_BOOLEAN)) {
            $postTypes[] = 'sl-insta-account';
        }
        // Check for "keep feeds"
        if (!filter_input(INPUT_POST, 'sli_reset_keep_feeds', FILTER_VALIDATE_BOOLEAN)) {
            $postTypes[] = 'sl-insta-feed';
        }
        // Generate SQL IN set for post types
        $postTypesStr = implode(',', Arrays::map($postTypes, function ($postType) {
            return "'$postType'";
        }));

        $count = $db->query("DELETE post, meta
                          FROM {$db->posts} as post
                          LEFT JOIN {$db->postmeta} as meta ON post.ID = meta.post_id
                          WHERE post.post_type IN ($postTypesStr)");

        MediaDownloader::clearThumbnailsDir();

        if ($db->last_error) {
            wp_die($db->last_error, 'Spotlight DB Reset - Error', ['back_link' => true]);
        }

        $count += $db->query("DELETE FROM {$db->options}
                              WHERE (option_name LIKE 'sli_%' OR option_name LIKE '%_sli_%') AND
                                     option_name != 'sli_user_did_onboarding'");

        if ($db->last_error) {
            wp_die($db->last_error, 'Spotlight DB Reset - Error', ['back_link' => true]);
        }

        add_action('admin_notices', function () use ($count) {
            printf('<div class="notice notice-success"><p>Deleted %d items from the database</p></div>', $count);
        });
    }
}
