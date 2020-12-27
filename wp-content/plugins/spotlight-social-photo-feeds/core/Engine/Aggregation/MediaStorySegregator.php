<?php

namespace RebelCode\Spotlight\Instagram\Engine\Aggregation;

use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Aggregation\ItemSegregator;
use RebelCode\Iris\Item;

/**
 * Segregates Instagram media and stories into separate collections.
 *
 * @since 0.5
 */
class MediaStorySegregator implements ItemSegregator
{
    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function segregate(Item $item, ItemFeed $feed) : ?string
    {
        return ($item->data['is_story'] ?? false)
            ? MediaCollection::STORY
            : MediaCollection::MEDIA;
    }
}
