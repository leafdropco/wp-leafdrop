<?php

namespace RebelCode\Iris\Fetching;

use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * An {@link ItemProvider} implementation that provides items from multiple other providers.
 *
 * @since [*next-version*]
 */
class CompositeItemProvider implements ItemProvider
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

    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result
    {
        $result = new Result();

        foreach ($this->providers as $provider) {
            $result = $result->merge($provider->getItems($source, $limit, $offset));
        }

        return $result;
    }
}
