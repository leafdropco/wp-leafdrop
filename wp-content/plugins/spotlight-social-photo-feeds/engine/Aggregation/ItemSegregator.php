<?php

namespace RebelCode\Iris\Aggregation;

use RebelCode\Iris\Item;

/**
 * An item segregator is an item processor that determines what collection an item belongs to.
 *
 * @since [*next-version*]
 */
interface ItemSegregator
{
    /**
     * Segregates an item for a given feed.
     *
     * @since [*next-version*]
     *
     * @param Item     $item The item to maybe segregate.
     * @param ItemFeed $feed The feed to segregate for.
     *
     * @return string|null The name of the collection in which the item belongs, or null if the item belongs in the
     *                     default collection.
     */
    public function segregate(Item $item, ItemFeed $feed) : ?string;
}
