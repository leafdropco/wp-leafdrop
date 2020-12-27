<?php

namespace RebelCode\Spotlight\Instagram\Engine\Aggregation;

use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Aggregation\ItemProcessor;
use RebelCode\Iris\Item;
use RebelCode\Spotlight\Instagram\Engine\MediaItem;
use RebelCode\Spotlight\Instagram\Utils\Arrays;

/**
 * Sorts media according to a feed's "Post order" option.
 *
 * @since 0.5
 */
class MediaSorterProcessor implements ItemProcessor
{
    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function process(array &$items, ItemFeed $feed)
    {
        $fOrder = $feed->getOption('postOrder');

        switch ($fOrder) {
            // Date sorting
            case 'date_asc':
            case 'date_desc':
            {
                $mult = ($fOrder === 'date_asc') ? 1 : -1;

                usort($items, function (Item $a, Item $b) use ($mult) {
                    $t1 = $a->data[MediaItem::TIMESTAMP];
                    $t2 = $b->data[MediaItem::TIMESTAMP];

                    // If both have dates
                    if ($t1 !== null && $t2 !== null) {
                        return ($t1 <=> $t2) * $mult;
                    }

                    // If m2 has no date, consider it as more recent
                    if ($t1 !== null) {
                        return $mult;
                    }

                    // If m1 has no date, consider it as more recent
                    if ($t2 !== null) {
                        return -$mult;
                    }

                    // Neither have dates
                    return 0;
                });

                break;
            }

            // Popularity sorting
            case 'popularity_asc':
            case 'popularity_desc':
            {
                $mult = ($fOrder === 'popularity_asc') ? 1 : -1;

                usort($items, function (Item $a, Item $b) use ($mult) {
                    $s1 = ($a->data[MediaItem::LIKES_COUNT] ?? 0) + ($a->data[MediaItem::COMMENTS_COUNT] ?? 0);
                    $s2 = ($b->data[MediaItem::LIKES_COUNT] ?? 0) + ($b->data[MediaItem::COMMENTS_COUNT] ?? 0);

                    return ($s1 <=> $s2) * $mult;
                });

                break;
            }

            // Random order
            case 'random':
            {
                $items = Arrays::shuffle($items);

                break;
            }
        }
    }
}
