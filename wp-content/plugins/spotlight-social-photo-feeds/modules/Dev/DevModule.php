<?php

namespace RebelCode\Spotlight\Instagram\Modules\Dev;

use Dhii\Services\Extension;
use Dhii\Services\Extensions\ArrayExtension;
use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\Wp\AdminPage;
use RebelCode\Spotlight\Instagram\Wp\Menu;

/**
 * This module is only used for development purposes.
 *
 * @since   0.1
 *
 * @package dev
 */
class DevModule extends Module
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
            // DEV MENU and PAGE
            //==========================================================================

            // The dev menu
            'menu' => new Factory(['page'], function ($page) {
                return new Menu(
                    $page,
                    'sli-dev',
                    'Spotlight Dev',
                    'manage_options'
                );
            }),

            // The dev page
            'page' => new Factory(['page/render'], function ($renderFn) {
                return new AdminPage('Spotlight Dev Tools', $renderFn);
            }),

            // The render function for the page
            'page/render' => function (ContainerInterface $c) {
                return new DevPage($c->get('plugin/core'), $c);
            },

            //==========================================================================
            // DEV SERVER (Webpack)
            //==========================================================================

            // Whether or not to use the dev server for the front-end
            'dev_server/enabled' => new Factory(['@plugin/dir'], function ($dir) {
                // If constant defined, use its value
                if (defined('SL_INSTA_UI_DEV_SERVER')) {
                    return SL_INSTA_UI_DEV_SERVER;
                }

                // Otherwise, autodetect built files
                return !file_exists($dir . '/ui/dist/runtime.js');
            }),
            // The URL to the front-end dev server
            'dev_server/url' => new Value('https://localhost:8000'),

            //==========================================================================
            // DEV TOOLS
            //==========================================================================

            // The DB reset tool
            'reset_db' => new Constructor(DevResetDb::class, ['@wp/db']),

            // The DB media delete tool
            'delete_media' => new Constructor(DevDeleteMedia::class, ['@media/cpt']),

            // The clear log tool
            'clear_log' => new Constructor(DevClearLog::class),
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
            // Add the dev menu to WordPress
            'wp/menus' => new ArrayExtension(['menu']),

            // Use the dev server
            'ui/root_url' => new Extension(
                ['dev_server/enabled', 'dev_server/url'],
                function ($url, $enabled, $devServer) {
                    return $enabled ? $devServer : $url;
                }
            ),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function run(ContainerInterface $c)
    {
        // Listen for DB reset requests
        add_action('init', $c->get('reset_db'));
        // Listen for DB media delete requests
        add_action('init', $c->get('delete_media'));
        // Listen for log clear requests
        add_action('init', $c->get('clear_log'));
    }
}
