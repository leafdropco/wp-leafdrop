<?php

namespace RebelCode\Spotlight\Instagram\MediaStore\Processors;

use RebelCode\Spotlight\Instagram\Feeds\Feed;
use RebelCode\Spotlight\Instagram\MediaStore\IgCachedMedia;
use RebelCode\Spotlight\Instagram\MediaStore\MediaProcessorInterface;

/**
 * Sorts media according to a feed's options.
 *
 * @since 0.1
 */
class MediaSorterProcessor implements MediaProcessorInterface
{
    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function process(array &$mediaList, Feed $feed)
    {
        $fOrder = $feed->getOption('postOrder');

        switch ($fOrder) {
            case 'date_asc':
            case 'date_desc':
            {
                $mult = ($fOrder === 'date_asc') ? 1 : -1;

                usort($mediaList, function (IgCachedMedia $m1, IgCachedMedia $m2) use ($mult) {
                    $t1 = $m1->getTimestamp();
                    $t2 = $m2->getTimestamp();

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

            case 'popularity_asc':
            case 'popularity_desc':
            {
                $mult = ($fOrder === 'popularity_asc') ? 1 : -1;

                usort($mediaList, function (IgCachedMedia $m1, IgCachedMedia $m2) use ($mult) {
                    $s1 = $m1->getLikesCount() + $m1->getCommentsCount();
                    $s2 = $m2->getLikesCount() + $m2->getCommentsCount();

                    return ($s1 <=> $s2) * $mult;
                });

                break;
            }

            case 'random':
            {
                $mediaList = $this->shuffleMedia($mediaList);

                break;
            }
        }
    }

    /**
     * Shuffles the order of media in a given list.
     *
     * @since 0.1
     *
     * @param IgCachedMedia[] $media A list of media objects.
     *
     * @return IgCachedMedia[] The shuffled list of media.
     */
    protected function shuffleMedia(array $media)
    {
        $count = count($media);
        // If empty or only 1 element, do nothing
        if ($count < 2) {
            return $media;
        }

        // Iterate backwards
        $currIdx = $count - 1;
        while ($currIdx !== 0) {
            // Pick a random element
            $randIdx = rand(0, $currIdx - 1);

            // Swap with current
            $temp = $media[$currIdx];
            $media[$currIdx] = $media[$randIdx];
            $media[$randIdx] = $temp;

            // Move to previous media in the list
            $currIdx--;
        }

        return $media;
    }
}
