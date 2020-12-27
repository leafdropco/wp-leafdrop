<?php

/*
 * @wordpress-plugin
 *
 * Plugin Name: Spotlight - Social Media Feeds
 * Description: Easily embed beautiful Instagram feeds on your WordPress site.
 * Version: 0.5.2
 * Author: RebelCode
 * Plugin URI: https://spotlightwp.com
 * Author URI: https://rebelcode.com
 * Requires at least: 5.0
 * Requires PHP: 7.1
 *
   */

use RebelCode\Spotlight\Instagram\Plugin;

// If not running within a WordPress context, or the plugin is already running, stop
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/includes/init.php';

// Listen for deactivation requests from a fatal error
slInstaCheckDeactivate();

// Check for conflicts on activation
register_activation_hook(__FILE__, function () {
    slInstaCheckForConflicts();
});

// Check for conflicts when a plugin is activated
add_action('activated_plugin', function () {
    slInstaCheckForConflicts();
});

// Check for conflicts when a plugin is deactivated
add_action('deactivated_plugin', function ($plugin = '') {
    set_transient('sli_deactivated_plugin', $plugin);
});

// Check for the 3rd party plugin deactivation transient. If set, check for conflicts
$deactivated = get_transient('sli_deactivated_plugin');
if ($deactivated !== false) {
    slInstaCheckForConflicts([$deactivated]);
    delete_transient('sli_deactivated_plugin');
}

// Run the plugin
slInstaRunPlugin(__FILE__, function (SlInstaRuntime $sli) {
    // Define plugin constants, if not already defined
    if (!defined('SL_INSTA')) {
        // Used to detect the plugin
        define('SL_INSTA', true);
        // The plugin name
        define('SL_INSTA_NAME', 'Spotlight - Social Media Feeds');
        // The plugin version
        define('SL_INSTA_VERSION', '0.5.2');
        // The path to the plugin's main file
        define('SL_INSTA_FILE', __FILE__);
        // The dir to the plugin's directory
        define('SL_INSTA_DIR', __DIR__);
        // The minimum required PHP version
        define('SL_INSTA_PLUGIN_NAME', 'Spotlight - Social Media Feeds');
        // The minimum required PHP version
        define('SL_INSTA_MIN_PHP_VERSION', '7.1');
        // The minimum required WordPress version
        define('SL_INSTA_MIN_WP_VERSION', '5.0');

        // Dev mode constant that controls whether development tools are enabled
        if (!defined('SL_INSTA_DEV')) {
            define('SL_INSTA_DEV', false);
        }
    }

    // Stop if dependencies aren't satisfied
    if (!slInstaDepsSatisfied()) {
        return;
    }

    // If the conflicts notice needs to be shown, stop here
    if (slInstaShowConflictsNotice()) {
        return;
    }

    // If a PRO version is running, block updates for the free version unless they match the running version
    add_filter('site_transient_update_plugins', function ($value) use ($sli) {
        if ($sli->isProActive && !empty($value) && !empty($value->response)) {
            $value->response = array_filter($value->response ?? [], function ($response) use ($sli) {
                $newVer = $response->new_version ?? '0.0';

                if ($response->plugin ?? false) {
                    $info = slInstaPluginInfo($response->plugin);
                } else {
                    $info = null;
                }

                return $info === null || $info->isPro || version_compare($newVer, $sli->proVersion, '<=');
            });
        }

        return $value;
    });

    // Load the autoloader - loaders all the way down!
    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require __DIR__ . '/vendor/autoload.php';
    }

    // Load Freemius
    if (function_exists('sliFreemius')) {
        sliFreemius()->set_basename(true, __FILE__);
    } else {
        require_once __DIR__ . '/freemius.php';
    }

    // If a PRO version is running and the free version is not, show a notice
    if ($sli->isProActive && !$sli->isFreeActive) {
        add_action('admin_notices', 'slInstaRequireFreeNotice');

        return;
    }

    if ($sli->isFreeActive && $sli->isProActive && version_compare($sli->freeVersion, '0.4', '<')) {
        add_action('admin_notices', 'slInstaFreeVersionNotice');

        return;
    }

    // Load the PRO script, if it exists
    if (file_exists(__DIR__ . '/includes/pro.php')) {
        require_once __DIR__ . '/includes/pro.php';
    }

    /**
     * Retrieves the plugin instance.
     *
     * @since 0.2
     *
     * @return Plugin
     */
    function spotlightInsta()
    {
        static $instance = null;

        return ($instance === null)
            ? $instance = new Plugin(__FILE__)
            : $instance;
    }

    // Run the plugin's modules
    add_action('plugins_loaded', function () {
        try {
            spotlightInsta()->run();
        } catch (Throwable $ex) {
            if (!is_admin()) {
                return;
            }

            $message = sprintf(
                _x('%s has encountered an error.', '%s is the name of the plugin', 'sl-insta'),
                '<b>' . SL_INSTA_NAME . '</b>'
            );

            $link = sprintf(
                '<a href="%s">%s</a>',
                admin_url('plugins.php?sli_error_deactivate=' . wp_create_nonce('sli_error_deactivate')),
                __('Click here to deactivate the plugin', 'sl-insta')
            );

            $details = '<b>' . __('Error details', 'sl-insta') . '</b>' .
                       "<pre>{$ex->getMessage()}</pre>" .
                       "<pre>In file: {$ex->getFile()}:{$ex->getLine()}</pre>" .
                       "<pre>{$ex->getTraceAsString()}</pre>";

            $style = '<style type="text/css">#error-page {max-width: unset;} pre {overflow-x: auto;}</style>';

            wp_die(
                "$style <p>$message <br /> $link</p> $details",
                SL_INSTA_NAME . ' | Error',
                [
                    'back_link' => true,
                ]
            );
        }
    });
});
