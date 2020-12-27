<?php

namespace RebelCode\Iris\Importing;

use RebelCode\Iris\Fetching\ItemProvider;
use RebelCode\Iris\Item;
use RebelCode\Iris\Result;

/**
 * Storage of items retrieved from an {@link ItemProvider}.
 *
 * @since [*next-version*]
 */
interface ItemStore extends ItemProvider
{
    /**
     * Stores a given list of items.
     *
     * @since [*next-version*]
     *
     * @param Item[] $items The items to store.
     *
     * @return Result The result from storing the items. This result should **not** set a {@link Result::$next}
     *                callback. The {@link Result::$items} list should only contain items that were successfully added
     *                to the store, with any changes may have been made prior to storing them.
     */
    public function store(array $items) : Result;
}
