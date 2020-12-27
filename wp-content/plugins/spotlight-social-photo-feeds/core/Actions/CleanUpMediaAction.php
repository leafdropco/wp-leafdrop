<?php

namespace RebelCode\Spotlight\Instagram\Actions;

use RebelCode\Spotlight\Instagram\Config\ConfigSet;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_Post;

/**
 * The action that cleans up old media.
 *
 * @since 0.1
 */
class CleanUpMediaAction
{
    /**
     * Config key for the age limit.
     *
     * @since 0.1
     */
    const CFG_AGE_LIMIT = 'cleanerAgeLimit';

    /**
     * @since 0.1
     *
     * @var PostType
     */
    protected $cpt;

    /**
     * @since 0.1
     *
     * @var ConfigSet
     */
    protected $config;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param PostType  $cpt    The media post type.
     * @param ConfigSet $config The config set.
     */
    public function __construct(PostType $cpt, ConfigSet $config)
    {
        $this->cpt = $cpt;
        $this->config = $config;
    }

    /**
     * @since 0.1
     */
    public function __invoke()
    {
        $ageLimit = $this->config->get(static::CFG_AGE_LIMIT)->getValue();
        $ageTime = strtotime($ageLimit . ' ago');

        $oldMedia = $this->cpt->query([
            'meta_query' => [
                [
                    'key' => MediaPostType::LAST_REQUESTED,
                    'compare' => '<=',
                    'value' => $ageTime,
                ],
            ],
        ]);

        Arrays::each($oldMedia, [MediaPostType::class, 'deleteMedia']);
    }
}
