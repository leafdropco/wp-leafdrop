<?php

namespace RebelCode\Iris\Fetching;

use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * A provider implementation that attempts to get items from multiple providers.
 *
 * This implementation will return items from the first provider that does so. Whenever a child provider returns an
 * erroneous result or a result without any items, the next provider is used. This process repeats until the criteria
 * are met. If none of the children providers' results meet the criteria, an erroneous result is returned.
 *
 * A very useful case for this implementation is caching, using two children providers. The first provider would attempt
 * to get items from a cache. If that fails, the second provider is used which would retrieve the items from the desired
 * resource such as a remote server.
 *
 * @since [*next-version*]
 */
class FallbackItemProvider implements ItemProvider
{
    /**
     * @since [*next-version*]
     *
     * @var ItemProvider[]
     */
    protected $providers;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param ItemProvider[] $providers
     */
    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    /**
     * @inheritDoc
     *
     * @since [*next-version*]
     */
    public function getItems(Source $source, ?int $number = null, int $offset = 0) : Result
    {
        foreach ($this->providers as $provider) {
            $result = $provider->getItems($source, $number, $offset);

            if ($result->success && !empty($result->items)) {
                return $result;
            }
        }

        return Result::error('No item providers are available', __CLASS__ . '_1');
    }
}
