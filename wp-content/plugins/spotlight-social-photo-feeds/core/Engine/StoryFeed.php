<?php

namespace RebelCode\Spotlight\Instagram\Engine;

use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Spotlight\Instagram\Engine\Sources\StorySource;
use RebelCode\Spotlight\Instagram\Engine\Sources\UserSource;

class StoryFeed extends ItemFeed
{
    public static function createFromFeed(ItemFeed $feed)
    {
        // Copy the feed's business account sources as story sources
        $sources = [];
        foreach ($feed->sources as $source) {
            if ($source->type === UserSource::TYPE_BUSINESS) {
                $sources[] = StorySource::create($source->data['name']);
            }
        }

        return new static($sources, $feed->options);
    }
}
