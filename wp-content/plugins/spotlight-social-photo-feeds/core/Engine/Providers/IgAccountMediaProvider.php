<?php

namespace RebelCode\Spotlight\Instagram\Engine\Providers;

use GuzzleHttp\ClientInterface;
use RebelCode\Iris\Fetching\ItemProvider;
use RebelCode\Iris\Result;
use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\Engine\Sources\UserSource;
use RebelCode\Spotlight\Instagram\IgApi\IgApiUtils;
use RebelCode\Spotlight\Instagram\PostTypes\AccountPostType;
use RebelCode\Spotlight\Instagram\Wp\PostType;

/**
 * Provides Instagram media that belongs to an Instagram account.
 *
 * @since 0.5
 */
class IgAccountMediaProvider implements ItemProvider
{
    const DEFAULT_LIMIT = 50;

    /**
     * The API client.
     *
     * @since 0.5
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * @since 0.5
     *
     * @var PostType
     */
    protected $accounts;

    /**
     * @since 0.5
     *
     * @var bool
     */
    protected $isBusiness;

    /**
     * Constructor.
     *
     * @since 0.5
     *
     * @param ClientInterface $client The HTTP client.
     * @param PostType        $accounts The accounts post type.
     * @param bool            $isBusiness Whether or not to provide posts for business accounts using the Graph API.
     */
    public function __construct(ClientInterface $client, PostType $accounts, bool $isBusiness)
    {
        $this->client = $client;
        $this->accounts = $accounts;
        $this->isBusiness = $isBusiness;
    }

    /**
     * Static constructor for personal accounts.
     *
     * @since 0.5
     *
     * @param ClientInterface $client The HTTP client.
     * @param PostType        $accounts The accounts post type.
     *
     * @return self
     */
    public static function forPersonalAccount(ClientInterface $client, PostType $accounts)
    {
        return new self($client, $accounts, false);
    }

    /**
     * Static constructor for business accounts.
     *
     * @since 0.5
     *
     * @param ClientInterface $client The HTTP client.
     * @param PostType        $accounts The accounts post type.
     *
     * @return self
     */
    public static function forBusinessAccount(ClientInterface $client, PostType $accounts)
    {
        return new self($client, $accounts, true);
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result
    {
        $username = $source->data['name'] ?? null;
        $expectedType = $this->isBusiness ? UserSource::TYPE_BUSINESS : UserSource::TYPE_PERSONAL;

        if ($source->type !== $expectedType || empty($username)) {
            return Result::empty();
        }

        $account = AccountPostType::getByUsername($this->accounts, $username);
        if ($account === null) {
            return Result::error("Account \"{$username}\" does not exist on this site");
        }

        $userId = $account->user->id;
        $accessToken = $account->accessToken;

        $limit = $limit ?? static::DEFAULT_LIMIT;
        $baseUrl = $this->isBusiness ? IgProvider::GRAPH_API_URL : IgProvider::BASIC_API_URL;
        $fields = $this->isBusiness
            ? IgApiUtils::getPersonalMediaFields(true)
            : IgApiUtils::getBusinessMediaFields(true);

        return IgProvider::request($this->client, $source, "{$baseUrl}/{$userId}/media", [
            'limit' => $limit,
            'offset' => $offset,
            'access_token' => $accessToken->code,
            'fields' => implode(',', $fields),
        ]);
    }
}
