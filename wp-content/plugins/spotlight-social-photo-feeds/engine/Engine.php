<?php

namespace RebelCode\Iris;

use RebelCode\Iris\Aggregation\ItemAggregator;
use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Fetching\ItemProvider;
use RebelCode\Iris\Importing\ItemImporter;
use RebelCode\Iris\Importing\ItemStore;

/**
 * Acts as the single point of entry for the provider, store, importer and aggregator.
 *
 * @since [*next-version*]
 */
class Engine
{
    /**
     * @since [*next-version*]
     *
     * @var ItemProvider
     */
    public $provider;

    /**
     * @since [*next-version*]
     *
     * @var ItemStore
     */
    public $store;

    /**
     * @since [*next-version*]
     *
     * @var ItemImporter
     */
    public $importer;

    /**
     * @since [*next-version*]
     *
     * @var ItemAggregator
     */
    public $aggregator;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param ItemProvider   $provider   The provider.
     * @param ItemImporter   $importer   The importer.
     * @param ItemStore      $store      The store.
     * @param ItemAggregator $aggregator The aggregator.
     */
    public function __construct(
        ItemProvider $provider,
        ItemImporter $importer,
        ItemStore $store,
        ItemAggregator $aggregator
    ) {
        $this->provider = $provider;
        $this->importer = $importer;
        $this->store = $store;
        $this->aggregator = $aggregator;
    }

    /**
     * Retrieves items.
     *
     * @since [*next-version*]
     *
     * @param Source   $source The source to retrieve items for.
     * @param int|null $limit  The maximum number of items to retrieve.
     * @param int      $offset The number of items to skip.
     *
     * @return Result The result.
     */
    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result
    {
        return $this->provider->getItems($source, $limit, $offset);
    }

    /**
     * Imports items.
     *
     * @since [*next-version*]
     *
     * @param Source $source The source to import items from.
     *
     * @return Result The result.
     */
    public function import(Source $source)
    {
        return $this->importer->import($source);
    }

    /**
     * Aggregates items for a feed.
     *
     * @since [*next-version*]
     *
     * @param ItemFeed $feed   The feed for which to aggregate items.
     * @param int|null $limit  The maximum number of items to aggregate.
     * @param int      $offset The number of items to skip.
     *
     * @return Result The result.
     */
    public function aggregate(ItemFeed $feed, ?int $limit = null, int $offset = 0) : Result
    {
        return $this->aggregator->aggregate($feed, $limit, $offset);
    }
}
