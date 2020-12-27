<?php

namespace RebelCode\Spotlight\Instagram\Engine\Sources;

use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\IgApi\IgUser;

/**
 * Source for posts posted by a user.
 *
 * @since 0.5
 */
class UserSource
{
    const TYPE_PERSONAL = 'PERSONAL_ACCOUNT';
    const TYPE_BUSINESS = 'BUSINESS_ACCOUNT';

    /**
     * Creates a media source for a user.
     *
     * @since 0.5
     *
     * @param string $username The username.
     * @param string $userType The user type.
     *
     * @return Source The created source instance.
     */
    public static function create(string $username, string $userType) : Source
    {
        $type = ($userType === IgUser::TYPE_PERSONAL)
            ? static::TYPE_PERSONAL
            : static::TYPE_BUSINESS;

        return Source::auto($type, ['name' => $username]);
    }
}
