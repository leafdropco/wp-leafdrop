<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Extension;
use Dhii\Services\Extensions\ArrayExtension;
use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\ServiceList;
use Dhii\Services\Factories\Value;
use Psr\Container\ContainerInterface;
use RebelCode\Spotlight\Instagram\Actions\ImportMediaAction;
use RebelCode\Spotlight\Instagram\Actions\UpdateAccountsAction;
use RebelCode\Spotlight\Instagram\Config\ConfigEntry;
use RebelCode\Spotlight\Instagram\Config\WpOption;
use RebelCode\Spotlight\Instagram\Di\ConfigService;
use RebelCode\Spotlight\Instagram\Module;
use RebelCode\Spotlight\Instagram\Wp\CronJob;

/**
 * Provides a cron job for importing information from the Instagram API.
 *
 * @since 0.1
 */
class ImportCronModule extends Module
{
    /**
     * The config key for the importer cron job interval.
     *
     * @since 0.1
     */
    const CFG_CRON_INTERVAL = 'importerInterval';

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function run(ContainerInterface $c)
    {
        // Unschedules the old media import cron
        add_action('init', function () {
            wp_unschedule_hook('spotlight/instagram/import_media');
        });
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function getFactories() : array
    {
        return [
            //==========================================================================
            // CRON JOB
            //==========================================================================

            // The hook for the cron
            'hook' => new Value('spotlight/instagram/import'),

            // The args to pass to the cron's handlers
            'args' => new Value([]),

            // The repetition for the cron
            'repeat' => new ConfigService('@config/set', static::CFG_CRON_INTERVAL),

            // The cron handler for updating account info
            'accounts_handler' => new Constructor(UpdateAccountsAction::class, [
                '@ig/api/client',
                '@accounts/cpt',
            ]),

            // The cron handler for fetching media for saved accounts
            'media_handler' => new Constructor(ImportMediaAction::class, [
                '@feeds/manager',
                '@engine/importer',
            ]),

            // The list of handlers for the cron
            'handlers' => new ServiceList([
                'accounts_handler',
                'media_handler',
            ]),

            // The cron job instance
            'job' => new Constructor(CronJob::class, [
                'hook',
                'args',
                'repeat',
                'handlers',
            ]),

            //==========================================================================
            // CONFIG ENTRIES
            //==========================================================================

            // The config entry that stores the cron's repetition interval
            'config/interval' => new Value(new WpOption('sli_importer_interval', 'hourly')),
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
            // Register the cron job
            'wp/cron_jobs' => new ArrayExtension([
                'job',
            ]),
            // Register the config entries
            'config/entries' => new ArrayExtension([
                static::CFG_CRON_INTERVAL => 'config/interval',
            ]),
            // Override the API cache with the value of the import cron interval option
            'ig/cache/ttl' => new Extension(['config/interval'], function ($ttl, ConfigEntry $interval) {
                return $interval->getValue();
            }),
        ];
    }
}
