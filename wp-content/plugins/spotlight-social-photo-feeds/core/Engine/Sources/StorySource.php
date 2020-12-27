<?php

namespace RebelCode\Spotlight\Instagram\Engine\Sources;

use RebelCode\Iris\Source;

/**
 * Source for story posts from a user.
 *
 * @since 0.5
 */
class StorySource
{
    const TYPE = 'USER_STORY';

    /**
     * Creates a source for a user's story.
     *
     * @since 0.5
     *
     * @param string $username The user name.
     *
     * @return Source The created source instance.
     */
    public static function create(string $username): Source
    {
        return Source::auto(static::TYPE, ['name' => $username]);
    }
}
