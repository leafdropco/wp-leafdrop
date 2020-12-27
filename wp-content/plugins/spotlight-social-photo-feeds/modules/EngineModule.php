<?php

namespace RebelCode\Spotlight\Instagram\Modules;

use Dhii\Services\Factories\Constructor;
use Dhii\Services\Factories\ServiceList;
use Dhii\Services\Factories\Value;
use Dhii\Services\Factory;
use Psr\Container\ContainerInterface;
use RebelCode\Iris\Aggregation\ItemAggregator;
use RebelCode\Iris\Engine;
use RebelCode\Iris\Fetching\DelegateItemProvider;
use RebelCode\Iris\Importing\ItemImporter;
use RebelCode\Spotlight\Instagram\Engine\Aggregation\MediaSorterProcessor;
use RebelCode\Spotlight\Instagram\Engine\Aggregation\MediaStorySegregator;
use RebelCode\Spotlight\Instagram\Engine\Aggregation\MediaTransformer;
use RebelCode\Spotlight\Instagram\Engine\Providers\IgAccountMediaProvider;
use RebelCode\Spotlight\Instagram\Engine\Sources\UserSource;
use RebelCode\Spotlight\Instagram\Engine\Stores\WpPostMediaStore;
use RebelCode\Spotlight\Instagram\Module;

/**
 * The module that configures the Iris engine.
 *
 * @since 0.5
 */
class EngineModule extends Module
{
    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function run(ContainerInterface $c)
    {
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function getFactories()
    {
        return [
            //==========================================================================================================
            // THE ENGINE
            //==========================================================================================================

            'instance' => new Constructor(Engine::class, [
                'provider',
                'importer',
                'store',
                'aggregator',
            ]),

            //==========================================================================================================
            // PROVIDER
            //==========================================================================================================

            // The provider for fetching media from the remote Instagram API for any type of source
            'provider' => new Constructor(DelegateItemProvider::class, ['provider/delegation']),

            // The delegation map for the provider
            'provider/delegation' => new Factory(
                ['providers/ig/personal', 'providers/ig/business'],
                function ($personal, $business) {
                    return [
                        UserSource::TYPE_PERSONAL => $personal,
                        UserSource::TYPE_BUSINESS => $business,
                    ];
                }
            ),

            // The provider for fetching media for IG personal accounts
            'providers/ig/personal' => new Factory(
                ['@ig/client', '@accounts/cpt'],
                [IgAccountMediaProvider::class, 'forPersonalAccount']
            ),

            // The provider for fetching media and stories for IG business accounts
            'providers/ig/business' => new Factory(
                ['@ig/client', '@accounts/cpt'],
                [IgAccountMediaProvider::class, 'forBusinessAccount']
            ),

            //==========================================================================================================
            // IMPORTER
            //==========================================================================================================

            // The store for storing media as WordPress posts
            'importer' => new Constructor(ItemImporter::class, [
                'store',
                'provider',
                'importer/batch_size',
            ]),

            // The size of each import batch
            'importer/batch_size' => new Value(30),

            //==========================================================================================================
            // STORE
            //==========================================================================================================

            'store' => new Constructor(WpPostMediaStore::class, ['@media/cpt']),

            //==========================================================================================================
            // AGGREGATOR
            //==========================================================================================================

            // The item aggregator for collecting items from multiple sources
            'aggregator' => new Factory(
                ['store', 'aggregator/processors', 'aggregator/transformer'],
                function ($store, $processors, $transformer) {
                    return new ItemAggregator($store, $processors, null, $transformer);
                }
            ),

            // The item processors to use in the aggregator
            'aggregator/processors' => new ServiceList([
                'aggregator/processors/sorter',
            ]),

            // The aggregator processor that sorts media according to a feed's options
            'aggregator/processors/sorter' => new Constructor(MediaSorterProcessor::class),

            // The item transformer to use in the aggregator
            'aggregator/transformer' => new Constructor(MediaTransformer::class),

            // The item segregator to use in the aggregator
            'aggregator/segregator' => new Constructor(MediaStorySegregator::class),
        ];
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function getExtensions()
    {
        return [];
    }
}
