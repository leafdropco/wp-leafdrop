<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Extensions\ArrayExtension;
use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\Notifications\NewsNotificationProvider;
use wpdb;
use WpOop\TransientCache\CachePool;

/**
 * The module that adds functionality for showing news from the Spotlight server in the plugin's UI.
 *
 * @since 0.2
 */
class NewsModule extends Module
{
    /**
     * @inheritDoc
     *
     * @since 0.2
     */
    public function run(ContainerInterface $c)
    {
    }

    /**
     * @inheritDoc
     *
     * @since 0.2
     */
    public function getFactories()
    {
        return [
            // The HTTP client to use to fetch news
            'client' => new Constructor(Client::class, ['client/options']),

            // The options for the HTTP client
            'client/options' => new Value([
                'base_uri' => 'https://spotlightwp.com/wp-json/spotlight/news',
            ]),

            // The cache where to store cached responses from the server
            'cache' => new Factory(['@wp/db',], function (wpdb $wpdb) {
                return new CachePool($wpdb, 'sli_news', uniqid('sli_news'), 3600);
            }),

            // The notification provider
            'provider' => new Constructor(NewsNotificationProvider::class, ['client', 'cache']),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.2
     */
    public function getExtensions()
    {
        return [
            // Register the provider
            'notifications/providers' => new ArrayExtension(['provider']),
        ];
    }
}
