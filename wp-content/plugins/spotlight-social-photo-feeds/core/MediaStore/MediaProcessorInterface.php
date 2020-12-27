<?php

namespace RebelCode\Spotlight\Instagram\MediaStore;

use RebelCode\Spotlight\Instagram\Feeds\Feed;

/**
 * A media processor is an object that performs some transformation on a list of media, as per a feed's options.
 *
 * Processors are intended to used in a set. Therefore, the scope of a single processor should ideally be restricted
 * to a single feed option or feature.
 *
 * @since 0.1
 */
interface MediaProcessorInterface
{
    /**
     * Processes the given media list to satisfy a feed's options.
     *
     * @since 0.1
     *
     * @param IgCachedMedia[] $mediaList A list of media objects, passed by reference for performance.
     * @param Feed            $feed      The feed.
     */
    public function process(array &$mediaList, Feed $feed);
}
