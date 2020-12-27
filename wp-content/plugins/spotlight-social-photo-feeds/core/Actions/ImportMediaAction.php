<?php

namespace RebelCode\Spotlight\Instagram\Actions;

use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Importing\ItemImporter;
use RebelCode\Spotlight\Instagram\Engine\FeedMediaImporter;
use RebelCode\Spotlight\Instagram\Feeds\FeedManager;
use RebelCode\Spotlight\Instagram\Utils\Arrays;

/**
 * The action that imports media for all saved accounts.
 *
 * @since 0.1
 */
class ImportMediaAction
{
    /**
     * @since 0.5
     *
     * @var FeedManager
     */
    protected $feedManager;

    /**
     * @since 0.5
     *
     * @var ItemImporter
     */
    protected $importer;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param FeedManager  $feedManager The feeds manager.
     * @param ItemImporter $importer    The item import.
     */
    public function __construct(FeedManager $feedManager, ItemImporter $importer)
    {
        $this->feedManager = $feedManager;
        $this->importer = $importer;
    }

    /**
     * @since 0.1
     */
    public function __invoke()
    {
        $feeds = $this->feedManager->query();

        Arrays::each($feeds, function (ItemFeed $feed) {
            // Allocate up to 5 minutes for each feed's import
            set_time_limit(300);

            // Import all media for each of the feed's sources
            Arrays::each($feed->sources, [$this->importer, 'import']);
        });
    }
}
