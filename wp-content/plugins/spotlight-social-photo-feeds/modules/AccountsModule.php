<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Extensions\ArrayExtension;
use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\Value;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\PostTypes\AccountPostType;
use RebelCode\Spotlight\Instagram\Wp\MetaField;

/**
 * The module that adds the accounts post type to the plugin.
 *
 * @since 0.1
 */
class AccountsModule extends Module
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getFactories() : array
    {
        return [
            // The accounts CPT
            'cpt' => new Constructor(AccountPostType::class, [
                'cpt/slug',
                'cpt/args',
                'cpt/fields',
            ]),

            // The accounts CPT slug name
            'cpt/slug' => new Value('sl-insta-account'),
            // The accounts CPT registration args
            'cpt/args' => new Value([
                'public' => false,
                'supports' => ['title', 'custom-fields'],
                'show_in_rest' => false,
            ]),
            // The meta fields for the accounts CPT
            'cpt/fields' => new Value([
                new MetaField(AccountPostType::USER_ID),
                new MetaField(AccountPostType::USERNAME),
                new MetaField(AccountPostType::TYPE),
                new MetaField(AccountPostType::MEDIA_COUNT),
                new MetaField(AccountPostType::BIO),
                new MetaField(AccountPostType::CUSTOM_BIO),
                new MetaField(AccountPostType::PROFILE_PIC_URL),
                new MetaField(AccountPostType::CUSTOM_PROFILE_PIC),
                new MetaField(AccountPostType::ACCESS_TOKEN),
                new MetaField(AccountPostType::ACCESS_EXPIRY),
            ]),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getExtensions() : array
    {
        return [
            // Add the post type to WordPress
            'wp/post_types' => new ArrayExtension(['cpt']),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function run(ContainerInterface $c)
    {
    }
}
