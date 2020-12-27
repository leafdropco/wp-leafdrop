<?php

namespace RebelCode\Spotlight\Instagram\MediaStore;

use RebelCode\Spotlight\Instagram\Feeds\Feed;

/**
 * A media fetcher is an object that can retrieve Instagram media objects from some source and add them to a store.
 *
 * Given a feed, a fetcher should be responsible of fetching media objects that are appropriate for **one** of that
 * feed's sources. When a fetcher has acquired a list of media objects, it can then add them to the store via the
 * store's {@link MediaStore::addMedia()} method.
 *
 * @since 0.1
 */
interface MediaFetcherInterface
{
    /**
     * Fetches media for a given feed.
     *
     * @since 0.1
     *
     * @param Feed       $feed The feed instance for which to retrieve media.
     * @param MediaStore $store The media store instance in which to store the fetched media.
     */
    public function fetch(Feed $feed, MediaStore $store);
}
