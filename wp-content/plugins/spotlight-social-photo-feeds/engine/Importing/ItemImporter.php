<?php

namespace RebelCode\Iris\Importing;

use RebelCode\Iris\Fetching\BatchingItemProvider;
use RebelCode\Iris\Fetching\ItemProvider;
use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * Imports items from an {@link ItemProvider} into an {@link ItemStore}.
 *
 * This implementation uses the {@link BatchingItemProvider} to import items into batches. Do **not** instantiate the
 * importer with a {@link BatchingItemProvider}, otherwise double-batching will be in-effect. The batching performed
 * by the implementation is able to leverage the store's {@link ItemStore::store()} method as the batching callback,
 * allowing each batch to be stored once it is fetched, as opposed to waiting for all the batches to be fetched first
 * and then all stored later.
 *
 * @since [*next-version*]
 */
class ItemImporter
{
    /**
     * The store in which to import items.
     *
     * @since [*next-version*]
     *
     * @var ItemStore
     */
    protected $store;

    /**
     * The provider to use to obtain items to import.
     *
     * @since [*next-version*]
     *
     * @var ItemProvider
     */
    protected $provider;

    /**
     * The size of each import batch.
     *
     * @since [*next-version*]
     *
     * @var int
     */
    protected $batchSize;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param ItemStore    $store     The store in which to import items.
     * @param ItemProvider $provider  The provider to use to obtain items to import.
     * @param int          $batchSize The size of each import batch.
     */
    public function __construct(ItemStore $store, ItemProvider $provider, int $batchSize)
    {
        $this->store = $store;
        $this->provider = $provider;
        $this->batchSize = $batchSize;
    }

    /**
     * Imports all items for a given source.
     *
     * @since [*next-version*]
     *
     * @param Source $source The source to import items for.
     *
     * @return Result The result.
     */
    public function import(Source $source) : Result
    {
        $provider = new BatchingItemProvider($this->provider, $this->batchSize, [$this->store, 'store']);

        return $provider->getItems($source);
    }
}
