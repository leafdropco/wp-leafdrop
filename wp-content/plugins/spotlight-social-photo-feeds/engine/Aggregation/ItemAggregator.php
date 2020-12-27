<?php

namespace RebelCode\Iris\Aggregation;

use RebelCode\Iris\Fetching\ItemProvider;
use RebelCode\Iris\Item;
use RebelCode\Iris\Result;
use RebelCode\Spotlight\Instagram\Utils\Arrays;

/**
 * Aggregates items for an {@link ItemFeed}.
 *
 * An aggregator's job is to collect items for each source in an {@link ItemFeed} and process those items into a
 * desirable format.
 *
 * The aggregator makes use of {@link ItemProcessor} instances to determine which of the acquired items will be
 * returned and how. Processors are allowed to remove items, add new items, sort the items, alter item data or perform
 * any other mutation so long as the list still consists of {@link Item} instances.
 *
 * An {@link ItemTransformer} is then used to transform the items into a different format, such as arrays, plain
 * objects or instances of some class.
 *
 * Finally, an {@link ItemSegregator} is used to separate the items into separate collections. This can be useful if
 * the consumer needs to handle different types of items differently. These collections
 *
 * Aggregator results will contain various information in {@link Result::$data}. This includes the result from each
 * {@link ItemProvider} in the {@link ItemAggregator::DATA_CHILDREN} key, the total number of items prior to applying
 * limits and offsets in the {@link ItemAggregator::DATA_TOTAL} key and the item collections from the segregator in the
 * {@link ItemAggregator::DATA_COLLECTIONS} key.
 *
 * @since [*next-version*]
 */
class ItemAggregator
{
    const DATA_COLLECTIONS = 'collections';
    const DATA_TOTAL = 'total';
    const DATA_CHILDREN = 'children';
    const DEF_COLLECTION = 'items';

    /**
     * The provider to use to retrieve items.
     *
     * @since [*next-version*]
     *
     * @var ItemProvider
     */
    protected $provider;

    /**
     * The processors to use to prepare the resulting items.
     *
     * @since [*next-version*]
     *
     * @var ItemProcessor[]
     */
    protected $processors;

    /**
     * Optional item segregator to separate items into collections.
     *
     * @since [*next-version*]
     *
     * @var ItemSegregator|null
     */
    protected $segregator;

    /**
     * Optional item transformer to transform collection items.
     *
     * @since [*next-version*]
     *
     * @var ItemTransformer|null
     */
    protected $transformer;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param ItemProvider         $provider    The provider to use to retrieve items.
     * @param ItemProcessor[]      $processors  The processors to use to prepare the resulting items.
     * @param ItemSegregator|null  $segregator  Optional item segregator to separate items into collections.
     * @param ItemTransformer|null $transformer Optional item transformer to transform collection items.
     */
    public function __construct(
        ItemProvider $provider,
        array $processors = [],
        ?ItemSegregator $segregator = null,
        ?ItemTransformer $transformer = null
    ) {
        $this->provider = $provider;
        $this->processors = $processors;
        $this->segregator = $segregator;
        $this->transformer = $transformer;
    }

    /**
     * Aggregates items for a feed.
     *
     * @since [*next-version*]
     *
     * @param ItemFeed $feed   The feed to aggregate items for.
     * @param int|null $limit  The maximum number of items to aggregate.
     * @param int      $offset The number of items to skip over.
     *
     * @return Result The aggregation result.
     */
    public function aggregate(ItemFeed $feed, ?int $limit = null, int $offset = 0) : Result
    {
        $result = new Result();
        $result->data = [
            'children' => [],
        ];

        // Fetch items from provider
        // ---------------------------

        foreach ($feed->sources as $source) {
            $srcResult = $this->provider->getItems($source);

            $result->data['children'][] = [
                'source' => $source,
                'result' => $srcResult,
            ];

            $result->errors = array_merge($result->errors, $srcResult->errors);
            $result->items = array_merge($result->items, $srcResult->items);
        }

        $result->success = $result->hasErrors() && count($result->items) === 0;

        // Remove duplicates
        // -------------------------------

        $result->items = Arrays::unique($result->items, function ($item) {
            return $item->id;
        });

        // Pass items through processors
        // -------------------------------

        foreach ($this->processors as $processor) {
            $processor->process($result->items, $feed);
        }

        // Apply limit and offset
        // ---------------------------

        $result->data[static::DATA_TOTAL] = count($result->items);

        $limit = max(0, $limit ?? 0);
        $offset = max(0, $offset);

        if ($limit > 0 || $offset > 0) {
            $result->items = array_slice($result->items, $offset, $limit);
        }

        // Segregate and transform the items
        // -----------------------------------

        if ($this->segregator === null && $this->transformer === null) {
            $result->data[static::DATA_COLLECTIONS] = [
                static::DEF_COLLECTION => $result->items,
            ];
        } else {
            $result->data[static::DATA_COLLECTIONS] = [];

            foreach ($result->items as $item) {
                $key = ($this->segregator !== null)
                    ? $this->segregator->segregate($item, $feed) ?? static::DEF_COLLECTION
                    : static::DEF_COLLECTION;

                if (!array_key_exists($key, $result->data[static::DATA_COLLECTIONS])) {
                    $result->data[static::DATA_COLLECTIONS][$key] = [];
                }

                $result->data[static::DATA_COLLECTIONS][$key][] = ($this->transformer !== null)
                    ? $this->transformer->transform($item, $feed)
                    : $item;
            }
        }

        return $result;
    }

    /**
     * Retrieves a collection from a result.
     *
     * @since [*next-version*]
     *
     * @param Result $result The result.
     * @param string $key    The key of the collection to retrieve.
     *
     * @return Item[] The items in the collection. An empty list will be returned if the collection does not exist in
     *                the given result.
     */
    public static function getCollection(Result $result, string $key = self::DEF_COLLECTION)
    {
        $default = ($key === static::DEF_COLLECTION ? $result->items : []);

        return $result->data[static::DATA_COLLECTIONS][$key] ?? $default;
    }
}
