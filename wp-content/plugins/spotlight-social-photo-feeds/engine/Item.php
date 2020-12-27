<?php

namespace RebelCode\Iris;

/**
 * Represents an item fetched from a source.
 *
 * @since [*next-version*]
 */
class Item
{
    /**
     * A numeric ID that uniquely identifies this item.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    public $id;

    /**
     * The source that fetched this item.
     *
     * @since [*next-version*]
     *
     * @var Source
     */
    public $source;

    /**
     * Any additional data for this item.
     *
     * @since [*next-version*]
     *
     * @var array
     */
    public $data;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param int|string $id     The ID of the item.
     * @param Source     $source The source that fetched this item.
     * @param array      $data   Any additional data attached to the item.
     *
     * @return self The created item.
     */
    public static function create($id, Source $source, array $data = []) : self
    {
        $item = new static();

        $item->id = strval($id);
        $item->source = $source;
        $item->data = $data;

        return $item;
    }
}
