<?php

namespace RebelCode\Iris\Fetching;

use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * A provider is any resource that can provide items given a source.
 *
 * A provider does not need to necessarily represent a discrete location or endpoint. It may represent an entire set,
 * from which a discrete provider can be selected using a {@link Source}. For instance, it's possible to have a single
 * provider represent the entire internet that selects servers using data within the given {@link Source}. For this
 * reason, a provider is comparable to a map; given a source, the list of items that corresponds to that source will be
 * retrieved.
 *
 * The size and region of the list to be returned can be controlled using limit and offset pagination controls. Further
 * regions of the list may be retrieved using the return result's {@link Result::next} callback, if it's available. It
 * is recommended to use the {@link Result::getNextResult()} method to safely fetch any additional results or the
 * {@link Result::withNextResult()} method to obtain a combined version of the current result and the next.
 *
 * @since [*next-version*]
 */
interface ItemProvider
{
    /**
     * Retrieves items from the provider.
     *
     * @since [*next-version*]
     *
     * @param Source   $source The source for which to retrieve items.
     * @param int|null $limit  Optional limit for the number of items to fetch.
     * @param int      $offset Optional number of items to skip when fetching.
     *
     * @return Result The result.
     */
    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result;
}
