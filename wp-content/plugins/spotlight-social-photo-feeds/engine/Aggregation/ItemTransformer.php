<?php

namespace RebelCode\Iris\Aggregation;

use RebelCode\Iris\Item;

/**
 * A transformer is an item processor that transforms an {@link Item} instance into a different value.
 *
 * @since [*next-version*]
 */
interface ItemTransformer
{
    /**
     * Transforms an item.
     *
     * @since [*next-version*]
     *
     * @param Item     $item The item to transform.
     * @param ItemFeed $feed The item feed to transform for.
     *
     * @return mixed The transformed result.
     */
    public function transform(Item $item, ItemFeed $feed);
}
