<?php

namespace RebelCode\Spotlight\Instagram\Engine\Sources;

use RebelCode\Iris\Source;

/**
 * Source for posts from a hashtag.
 *
 * @since 0.5
 */
class HashtagSource
{
    const TYPE_RECENT = 'RECENT_HASHTAG';
    const TYPE_POPULAR = 'POPULAR_HASHTAG';

    /**
     * Creates a source for a hashtag.
     *
     * @since 0.5
     *
     * @param string $tag  The hashtag.
     * @param string $type The hashtag media type.
     *
     * @return Source The created source instance.
     */
    public static function create(string $tag, string $type) : Source
    {
        $srcType = stripos($type, 'recent') === false
            ? static::TYPE_POPULAR
            : static::TYPE_RECENT;

        return Source::auto($srcType, ['name' => $tag]);
    }
}
