<?php

namespace RebelCode\Iris\Aggregation;

use RebelCode\Iris\Source;

/**
 * Represents a feed of items, which is configuration for an {@link ItemAggregator}.
 *
 * @since [*next-version*]
 */
class ItemFeed
{
    /**
     *  The sources that are being aggregated.
     *
     * @since [*next-version*]
     *
     * @var Source[]
     */
    public $sources;

    /**
     * Any config options for this aggregation.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    public $options;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param Source[] $sources The sources that are being aggregated.
     * @param array    $options Any config options for this aggregation.
     */
    public function __construct(array $sources, array $options = [])
    {
        $this->sources = $sources;
        $this->options = $options;
    }

    /**
     * Retrieves a single option, optionally defaulting to a specific value.
     *
     * @since [*next-version*]
     *
     * @param string $key     The key of the option to retrieve.
     * @param mixed  $default Optional value to return if no option is found for the given $key.
     *
     * @return mixed|null The value for the option that corresponds to the given $key, or $default if not found.
     */
    public function getOption(string $key, $default = null)
    {
        return array_key_exists($key, $this->options)
            ? $this->options[$key]
            : $default;
    }
}
