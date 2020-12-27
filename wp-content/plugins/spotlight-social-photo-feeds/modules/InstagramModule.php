<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\ServiceList;
use Dhii\Services\Factories\StringService;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr16CacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Actions\AuthCallbackListener;
use RebelCode\Spotlight\Instagram\IgApi\IgApiClient;
use RebelCode\Spotlight\Instagram\IgApi\IgBasicApiClient;
use RebelCode\Spotlight\Instagram\IgApi\IgGraphApiClient;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use WpOop\TransientCache\CachePool;
use WpOop\TransientCache\SilentPool;

/**
 * The module that contains all functionality related to Instagram's APIs.
 *
 * @since 0.1
 */
class InstagramModule extends Module
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getFactories() : array
    {
        return [
            //==========================================================================
            // GUZZLE CLIENT
            //==========================================================================

            // The Guzzle client instance
            'client' => new Factory(['client/handler', 'client/timeout'], function ($handler, $timeout) {
                return new Client([
                    'handler' => $handler,
                    'timeout' => $timeout,
                ]);
            }),

            // The default timeout for the Guzzle client
            'client/timeout' => new Value(20),

            // The Guzzle client handler. Uses the middlewares
            'client/handler' => new Factory(['client/middlewares'], function ($middlewares) {
                $stack = HandlerStack::create();
                Arrays::each($middlewares, [$stack, 'push']);

                return $stack;
            }),

            // Middleware for the Guzzle client
            'client/middlewares' => new ServiceList([
                'cache/middleware',
            ]),

            //==========================================================================
            // API CACHE
            //==========================================================================

            // The cache middleware
            'cache/middleware' => new Factory(['cache/pool', 'cache/ttl'], function ($cachePool, $ttl) {
                return new CacheMiddleware(
                    new GreedyCacheStrategy(
                        new Psr16CacheStorage($cachePool),
                        $ttl
                    )
                );
            }),

            // The cache pool instance
            'cache/pool' => new Factory(['@wp/db', 'cache/pool/key', 'cache/pool/default'],
                function ($wpdb, $key, $default) {
                    return new SilentPool(new CachePool($wpdb, $key, $default));
                }
            ),

            // The time-to-live for the cache (1 hour)
            'cache/ttl' => new Value(3600),

            // The key for the cache pool
            'cache/pool/key' => new Value('sli_api'),

            // The default value for the cache pool - allows false-negative detection
            'cache/pool/default' => new StringService(uniqid('{key}'), [
                'key' => 'cache/pool/key',
            ]),

            //==========================================================================
            // API CLIENT
            //==========================================================================

            // The auth state, which is passed back by IG/FB APIs
            // We use the site URL so our auth server can redirect back to the user's site
            'api/state' => new Value(
                urlencode(
                    json_encode([
                        'site' => admin_url(),
                        'version' => 2,
                    ])
                )
            ),

            // The driver for clients, responsible for dispatching requests and receiving responses
            'api/driver' => function () {
                return new Client([
                    'timeout' => 20.0,
                ]);
            },

            // The API client that combines the Basic Display API and Graph API clients
            'api/client' => new Constructor(IgApiClient::class, [
                'api/basic/client',
                'api/graph/client',
            ]),

            // Listens to requests from the auth server to save accounts into the DB
            'api/auth/listener' => new Constructor(AuthCallbackListener::class, [
                'api/client',
                '@accounts/cpt',
                'api/graph/auth_url',
            ]),

            //==========================================================================
            // BASIC DISPLAY API
            //==========================================================================

            // The URL to the auth dialog for the Basic Display API
            'api/basic/auth_url' => new Factory(['api/state'], function ($state) {
                return "https://auth.spotlightwp.com/dialog/personal?state={$state}";
            }),

            // The basic display API client
            'api/basic/client' => new Constructor(IgBasicApiClient::class, [
                'api/driver',
                'cache/pool',
                'api/basic/legacy_compensation',
            ]),

            // Whether or not to use the legacy API to compensate for data that is missing from the Basic Display API
            'api/basic/legacy_compensation' => new Value(false),

            //==========================================================================
            // GRAPH API
            //==========================================================================

            // The URL to auth dialog for the Graph API
            'api/graph/auth_url' => new Factory(['api/state'], function ($state) {
                return "https://auth.spotlightwp.com/dialog/business?state={$state}";
            }),

            // The Graph API client
            'api/graph/client' => new Constructor(IgGraphApiClient::class, [
                'api/driver',
                'cache/pool',
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
        return [];
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function run(ContainerInterface $c)
    {
        // Listen for requests from the auth server to insert connected accounts into the DB
        add_action('admin_init', $c->get('api/auth/listener'));
    }
}
