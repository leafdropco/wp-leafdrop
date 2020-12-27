<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Extension;
use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\ServiceList;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\Notifications\NotificationProvider;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\RestApi\Auth\AuthUserCapability;
use RebelCode\Spotlight\Instagram\RestApi\Auth\AuthVerifyToken;
use RebelCode\Spotlight\Instagram\RestApi\AuthGuardInterface;
use RebelCode\Spotlight\Instagram\RestApi\EndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPointManager;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\ConnectAccountEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\DeleteAccountEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\DeleteAccountMediaEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\GetAccessTokenEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\GetAccountsEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts\UpdateAccountEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Feeds\DeleteFeedsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Feeds\GetFeedsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Feeds\SaveFeedsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Media\GetFeedMediaEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Media\GetMediaEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Media\ImportMediaEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Notifications\GetNotificationsEndPoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Promotion\SearchPostsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Settings\GetSettingsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Settings\PatchSettingsEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\Tools\ClearCacheEndpoint;
use RebelCode\Spotlight\Instagram\RestApi\Transformers\AccountTransformer;
use RebelCode\Spotlight\Instagram\RestApi\Transformers\FeedsTransformer;
use RebelCode\Spotlight\Instagram\RestApi\Transformers\MediaTransformer;
use RebelCode\Spotlight\Instagram\Utils\Strings;

/**
 * The module that adds the REST API to the plugin.
 *
 * @since 0.1
 */
class RestApiModule extends Module
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getFactories() : array
    {
        return [
            // The namespace for the REST API
            'namespace' => new Value('sl-insta'),

            // The REST API endpoint manager
            'manager' => new Factory(['namespace', 'endpoints'], function ($ns, $endpoints) {
                return new EndPointManager($ns, $endpoints);
            }),

            // The REST API endpoints under the `namespace`
            'endpoints' => new ServiceList([
                'endpoints/feeds/get',
                'endpoints/feeds/save',
                'endpoints/feeds/delete',
                'endpoints/accounts/get',
                'endpoints/accounts/delete',
                'endpoints/accounts/connect',
                'endpoints/accounts/update',
                'endpoints/accounts/delete_media',
                'endpoints/accounts/get_access_token',
                'endpoints/media/get',
                'endpoints/media/feed',
                'endpoints/media/import',
                'endpoints/promotion/search_posts',
                'endpoints/settings/get',
                'endpoints/settings/patch',
                'endpoints/notifications/get',
                'endpoints/clear_cache',
            ]),

            //==========================================================================
            // USER AUTH
            //==========================================================================

            // The user capability required to access the REST API endpoints that manage entities
            'auth/user/capability' => new Value('edit_pages'),

            // The auth guard to use to authorize logged in users
            'auth/user' => new Constructor(AuthUserCapability::class, ['auth/user/capability']),

            //==========================================================================
            // PUBLIC AUTH
            //==========================================================================

            // The HTTP header where the public REST API token should be included for authorized requests
            'auth/public/nonce_header' => new Value('X-Sli-Auth-Token'),
            // The name of the DB option where the public token is stored
            'auth/public/token_option' => new Value('sli_api_auth_token'),
            // The token to use for public REST API requests.
            // This factory should detect when the site URL changes and
            'auth/public/token' => new Factory(['auth/public/token_option'], function ($optionName) {
                $token = get_option($optionName, null);

                if (empty($token)) {
                    $token = sha1(Strings::generateRandom(32));
                    update_option($optionName, $token);
                }

                return $token;
            }),

            // The auth guard to use for REST API endpoints to authorize requests against the token
            'auth/public' => new Constructor(AuthVerifyToken::class, [
                'auth/public/nonce_header',
                'auth/public/token',
            ]),

            //==========================================================================
            // FEEDS
            //==========================================================================

            // The transformer for formatting feeds into REST API responses
            'feeds/transformer' => new Constructor(FeedsTransformer::class, [
                '@wp/db',
            ]),

            // The REST API endpoint for retrieving feeds
            'endpoints/feeds/get' => new Factory(
                ['@feeds/cpt', 'feeds/transformer', 'auth/user'],
                function ($cpt, $t9r, $auth) {
                    return new EndPoint(
                        '/feeds(?:/(?P<id>\d+))?',
                        ['GET'],
                        new GetFeedsEndpoint($cpt, $t9r),
                        $auth
                    );
                }
            ),

            // The REST API endpoint for saving feeds
            'endpoints/feeds/save' => new Factory(
                ['@feeds/cpt', 'feeds/transformer', 'auth/user'],
                function ($cpt, $t9r, $auth) {
                    return new EndPoint(
                        '/feeds(?:/(?P<id>\d+))?',
                        ['POST'],
                        new SaveFeedsEndpoint($cpt, $t9r),
                        $auth
                    );
                }
            ),

            // The REST API endpoint for deleting feeds
            'endpoints/feeds/delete' => new Factory(
                ['@feeds/cpt', 'feeds/transformer', 'auth/user'],
                function ($cpt, $t9r, $auth) {
                    return new EndPoint(
                        '/feeds/(?P<id>\d+)',
                        ['DELETE'],
                        new DeleteFeedsEndpoint($cpt, $t9r),
                        $auth
                    );
                }
            ),

            //==========================================================================
            // ACCOUNTS
            //==========================================================================

            // The transformer for formatting accounts into REST API responses
            'accounts/transformer' => new Constructor(AccountTransformer::class, [
                '@feeds/cpt',
            ]),

            // The GET endpoint for accounts
            'endpoints/accounts/get' => new Factory(
                ['@accounts/cpt', 'accounts/transformer', 'auth/public'],
                function ($cpt, $t9r, $auth) {
                    return new EndPoint(
                        '/accounts(?:/(?P<id>\d+))?',
                        ['GET'],
                        new GetAccountsEndPoint($cpt, $t9r),
                        $auth
                    );
                }
            ),
            // The DELETE endpoint for accounts
            'endpoints/accounts/delete' => new Factory(
                ['@accounts/cpt', '@media/cpt', 'accounts/transformer', 'auth/user'],
                function ($accountsCpt, $mediaCpt, $t9r, $auth) {
                    return new EndPoint(
                        '/accounts/(?P<id>\d+)',
                        ['DELETE'],
                        new DeleteAccountEndPoint($accountsCpt, $mediaCpt, $t9r),
                        $auth
                    );
                }
            ),
            // The endpoint to manually connect an account by access token
            'endpoints/accounts/connect' => new Factory(
                ['@ig/api/client', '@accounts/cpt', 'auth/user'],
                function ($client, $cpt, $auth) {
                    return new EndPoint(
                        '/connect',
                        ['POST'],
                        new ConnectAccountEndPoint($client, $cpt),
                        $auth
                    );
                }
            ),
            // The endpoint for updating account information
            'endpoints/accounts/update' => new Factory(
                ['@accounts/cpt', 'auth/user'],
                function ($cpt, $auth) {
                    return new EndPoint(
                        '/accounts',
                        ['POST'],
                        new UpdateAccountEndPoint($cpt),
                        $auth
                    );
                }
            ),
            // The endpoint that deletes media for an account
            'endpoints/accounts/delete_media' => new Factory(
                ['@accounts/cpt', '@media/cpt', 'auth/user'],
                function ($accountsCpt, $mediaCpt, $auth) {
                    return new EndPoint(
                        '/account_media/(?P<id>\d+)',
                        ['DELETE'],
                        new DeleteAccountMediaEndpoint($accountsCpt, $mediaCpt),
                        $auth
                    );
                }
            ),
            // The endpoint to provides access tokens
            'endpoints/accounts/get_access_token' => new Factory(
                ['@accounts/cpt', 'auth/user'],
                function ($cpt, $auth) {
                    return new EndPoint(
                        '/access_token/(?P<id>\d+)',
                        ['GET'],
                        new GetAccessTokenEndPoint($cpt),
                        $auth
                    );
                }
            ),

            //==========================================================================
            // MEDIA
            //==========================================================================

            // The transformer that transforms IG media instances into REST API response format
            'media/transformer' => new Constructor(MediaTransformer::class, []),

            // The GET endpoint for retrieving the media posts that have been imported, without fetching new ones
            'endpoints/media/get' => new Factory(
                ['@engine/instance', '@feeds/manager', 'auth/public'],
                function ($engine, $feedManager, $auth) {
                    return new EndPoint(
                        '/media',
                        ['GET'],
                        new GetMediaEndPoint($engine, $feedManager),
                        $auth
                    );
                }
            ),
            // The endpoint for fetching media posts from IG
            'endpoints/media/feed' => new Factory(
                ['@engine/instance', '@feeds/manager', 'auth/public'],
                function ($engine, $feedManager, $auth) {
                    return new EndPoint(
                        '/media/feed',
                        ['POST'],
                        new GetFeedMediaEndPoint($engine, $feedManager),
                        $auth
                    );
                }
            ),

            // The endpoint for importing media posts from IG
            'endpoints/media/import' => new Factory(
                ['@engine/instance', '@feeds/manager', 'auth/public'],
                function ($engine, $feedManager, $auth) {
                    return new EndPoint(
                        '/media/import',
                        ['POST'],
                        new ImportMediaEndPoint($engine, $feedManager),
                        $auth
                    );
                }
            ),

            //==========================================================================
            // PROMOTION
            //==========================================================================

            // The endpoint for searching for posts from the "Promote" feature
            'endpoints/promotion/search_posts' => new Factory(['auth/user'], function ($auth) {
                return new EndPoint(
                    '/search_posts',
                    ['GET'],
                    new SearchPostsEndpoint(),
                    $auth
                );
            }),

            //==========================================================================
            // SETTINGS
            //==========================================================================

            // The endpoint for retrieving settings
            'endpoints/settings/get' => new Factory(['@config/set', 'auth/user'], function ($config, $auth) {
                return new EndPoint(
                    '/settings',
                    ['GET'],
                    new GetSettingsEndpoint($config),
                    $auth
                );
            }),

            // The endpoint for changing settings
            'endpoints/settings/patch' => new Factory(['@config/set', 'auth/user'], function ($config, $auth) {
                return new EndPoint(
                    '/settings',
                    ['POST', 'PUT', 'PATCH'],
                    new PatchSettingsEndpoint($config),
                    $auth
                );
            }),

            //==========================================================================
            // NOTIFICATIONS
            //==========================================================================

            // The endpoint for notifications
            'endpoints/notifications/get' => new Factory(
                ['@notifications/store', 'auth/user'],
                function (NotificationProvider $store, AuthGuardInterface $authGuard) {
                    return new EndPoint(
                        '/notifications',
                        ['GET'],
                        new GetNotificationsEndPoint($store),
                        $authGuard
                    );
                }
            ),

            //==========================================================================
            // MISC
            //==========================================================================

            // The endpoint for clearing the API cache
            'endpoints/clear_cache' => new Factory(
                ['@ig/cache/pool', '@media/cpt', 'auth/user'],
                function (CacheInterface $apiCache, MediaPostType $mediaCpt, AuthGuardInterface $authGuard) {
                    return new EndPoint(
                        '/clear_cache',
                        ['POST'],
                        new ClearCacheEndpoint($apiCache, $mediaCpt),
                        $authGuard
                    );
                }
            ),
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
            // Add the REST API's URL to the localization data for the common bundle
            'ui/l10n/common' => new Extension(['namespace'], function ($config, $ns) {
                $config['restApi']['baseUrl'] = rest_url() . $ns;

                return $config;
            }),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function run(ContainerInterface $c)
    {
        add_action('rest_api_init', function () use ($c) {
            /* @var $manager EndPointManager */
            $manager = $c->get('manager');
            $manager->register();
        });
    }
}
