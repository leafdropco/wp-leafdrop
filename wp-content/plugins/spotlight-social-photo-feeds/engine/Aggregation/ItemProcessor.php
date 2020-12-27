<?php

namespace RebelCode\Iris\Aggregation;

/**
 * An item processor is used during item aggregation to manipulate a list of items prior to serving the result.
 *
 * Item processors receive the list of items **by reference**. This is done for performance reasons to avoid creating
 * a new list of items in memory, reducing overall memory usage as well as resulting in less instructions required to
 * generate results.
 *
 * @since [*next-version*]
 */
interface ItemProcessor
{
    /**
     * Processes a list of items.
     *
     * @since [*next-version*]
     *
     * @param Item[]   $items The list of items to process, passed by reference.
     * @param ItemFeed $feed  The item feed instance for which to process the items.
     */
    public function process(array &$items, ItemFeed $feed);
}
