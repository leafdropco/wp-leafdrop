<?php

namespace RebelCode\Iris\Fetching;

use RebelCode\Iris\Result;
use RebelCode\Iris\Source;

/**
 * An item provider decorate that will retrieve as many items from another provider as it can, in batches.
 *
 * This provider will not yield results with a {@link Result::$next} callback. Rather, it will use the results from
 * another provider to repetitively call {@link Result::$next} to get more items, until it receives a result without
 * a {@link Result::$next} callback. Every time it does this, a batch of items is created. The size of the batch can
 * be configured during construction.
 *
 * For convenience, the provider may also be configured with a callback which will be invoked with each obtained
 * batch of items as argument. This can be used to perform a variety of tasks that would benefit from operating on
 * batches rather than full lists, such as storing the items in an item store. The callback is expected to return a
 * {@link Result} of its own. The items in the result will "replace" the items originally from the batch, allowing the
 * provider to modify the provider's final result. Additionally, any errors in the callback's result will also be
 * recorded in the provider's final result.
 *
 * @since [*next-version*]
 */
class BatchingItemProvider implements ItemProvider
{
    /**
     * @since [*next-version*]
     *
     * @var ItemProvider
     */
    protected $provider;

    /**
     * @since [*next-version*]
     *
     * @var int
     */
    protected $batchSize;

    /**
     * @since [*next-version*]
     *
     * @var callable
     */
    protected $callback;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param ItemProvider $provider
     * @param int          $batchSize
     * @param callable     $callback
     */
    public function __construct(ItemProvider $provider, int $batchSize, callable $callback)
    {
        $this->provider = $provider;
        $this->batchSize = max($batchSize, 1);
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     *
     * @since [*next-version*]
     */
    public function getItems(Source $source, ?int $limit = null, int $offset = 0) : Result
    {
        // The final result
        $result = Result::empty();
        $result->data['errors'] = [];

        // Normalize the limit and offset
        $limit = max($limit ?? 0, 0);
        $offset = max($offset, 0);
        $hasLimit = $limit > 0;

        // Create the first batch
        $batch = Result::success([], [], function () use ($source, $offset) {
            return $this->provider->getItems($source, $this->batchSize, $offset);
        });

        // Counter for number of items that were imported
        $count = 0;

        // Iterate for as long as we have available batches
        while ($batch->next && (!$hasLimit || $count < $limit)) {
            // Fetch the batch
            $batch = $batch->getNextResult();

            // Record any errors generated from fetching the batch
            $result->errors = array_merge($result->errors, $batch->errors);

            // If successful, import the items. Otherwise create an error to stop iterating
            if ($batch->success) {
                $count += count($batch->items);
                $numExcess = max($count - $limit, 0);

                // If importing these items will go over the limit, slice the items to get a subset
                if ($hasLimit && $numExcess > 0) {
                    $batchSize = count($batch->items) - $numExcess;
                    $batch->items = array_slice($batch->items, 0, $batchSize);
                }

                if ($hasLimit) {
                    $count = min($count, $limit);
                }

                if (count($batch->items) > 0) {
                    // If a callback is set, invoke it to get a sub-result
                    if (is_callable($this->callback)) {
                        /* @var $cbResult Result */
                        $cbResult = ($this->callback)($batch->items);

                        $result->items = array_merge($result->items, $cbResult->items);
                        $result->errors = array_merge($result->errors, $cbResult->errors);
                    } else {
                        $result->items = array_merge($result->items, $batch->items);
                    }
                } else {
                    // If we got an empty batch, either we reached the limit or the provider has no more items to give
                    break;
                }
            }
        }

        return $result;
    }
}
