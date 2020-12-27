<?php

namespace RebelCode\Spotlight\Instagram\Modules\Dev;

use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;

/**
 * Dev tool that deletes all media from the DB.
 *
 * @since 0.1
 */
class DevDeleteMedia
{
    /**
     * @since 0.1
     *
     * @var MediaPostType
     */
    protected $cpt;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param MediaPostType $cpt The media post type.
     */
    public function __construct(MediaPostType $cpt)
    {
        $this->cpt = $cpt;
    }

    /**
     * @since 0.1
     */
    public function __invoke()
    {
        $deleteNonce = filter_input(INPUT_POST, 'sli_delete_meta');
        if (!$deleteNonce) {
            return;
        }

        if (!wp_verify_nonce($deleteNonce, 'sli_delete_media')) {
            wp_die('You cannot do that!', 'Unauthorized', [
                'back_link' => true,
            ]);
        }

        $result = $this->cpt::deleteAll();

        add_action('admin_notices', function () use ($result) {
            if ($result === false) {
                echo '<div class="notice notice-error"><p>WordPress failed to delete the media</p></div>';
            } else {
                printf('<div class="notice notice-success"><p>Deleted %d records from the database</p></div>', $result);
            }
        });
    }
}
