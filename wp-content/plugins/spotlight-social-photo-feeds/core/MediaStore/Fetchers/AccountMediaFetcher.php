<?php

namespace RebelCode\Spotlight\Instagram\MediaStore\Fetchers;

use RebelCode\Spotlight\Instagram\Feeds\Feed;
use RebelCode\Spotlight\Instagram\IgApi\IgApiClient;
use RebelCode\Spotlight\Instagram\MediaStore\MediaFetcherInterface;
use RebelCode\Spotlight\Instagram\MediaStore\MediaSource;
use RebelCode\Spotlight\Instagram\MediaStore\MediaStore;
use RebelCode\Spotlight\Instagram\PostTypes\AccountPostType;
use RebelCode\Spotlight\Instagram\Wp\PostType;

/**
 * Fetches media posted by the accounts that are selected for a feed.
 *
 * @since 0.1
 */
class AccountMediaFetcher implements MediaFetcherInterface
{
    /**
     * @since 0.1
     *
     * @var IgApiClient
     */
    protected $api;

    /**
     * @since 0.1
     *
     * @var PostType
     */
    protected $cpt;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param IgApiClient $api The Instagram API client.
     * @param PostType    $cpt The accounts CPT.
     */
    public function __construct(IgApiClient $api, PostType $cpt)
    {
        $this->api = $api;
        $this->cpt = $cpt;
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    public function fetch(Feed $feed, MediaStore $store)
    {
        $accountIds = $feed->getOption('accounts', []);
        if (empty($accountIds)) {
            return;
        }

        $accountPosts = $this->cpt->query(['post__in' => $accountIds]);
        foreach ($accountPosts as $accountPost) {
            $account = AccountPostType::fromWpPost($accountPost);
            $source = MediaSource::forUser($account->user);
            $result = $this->api->getAccountMedia($account);

            $store->addMedia($result['media'], $source);
        }
    }
}
