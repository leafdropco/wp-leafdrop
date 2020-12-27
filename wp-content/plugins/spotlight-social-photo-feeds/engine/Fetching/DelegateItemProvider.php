<?php

namespace RebelCode\Iris\Fetching;

use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * A provider implementation that delegates to a child provider based on the type of the given source.
 *
 * Example usage:
 * ```
 * $provider = new DelegateItemProvider([
 *      'foo' => $fooProvider,
 *      'bar' => $barProvider,
 * ]);
 *
 * $provider->getItems(Source::create('test', 'foo')); // uses $fooProvider
 * $provider->getItems(Source::create('test', 'bar')); // uses $barProvider
 * ```
 *
 * @since [*next-version*]
 */
class DelegateItemProvider implements ItemProvider
{
    /**
     * A map of source types as keys to providers.
     *
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
     * @param ItemProvider[] $providers A map of source types as keys to provider instances.
     */
    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    /**
     * Creates a new instance.
     *
     * @since [*next-version*]
     *
     * @param array $providers A map of source types as keys to provider instances.
     *
     * @return self The created instance.
     */
    public static function create(array $providers) : self
    {
        return new self($providers);
    }

    /**
     * @inheritDoc
     *
     * @since [*next-version*]
     */
    public function getItems(Source $source, ?int $number = null, int $offset = 0) : Result
    {
        return array_key_exists($source->type, $this->providers)
            ? $this->providers[$source->type]->getItems($source, $number, $offset)
            : Result::empty();
    }
}
