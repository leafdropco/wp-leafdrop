<?php

namespace RebelCode\Iris;

use RebelCode\Iris\Fetching\ItemProvider;

/**
 * A data structure for an item's source.
 *
 * Sources are primarily used to determine how and/or which items should be fetched from an {@link ItemProvider}.
 * Typically, sources will contain information about accounts, categories, collections or other similar item-specific
 * parameters. They may also contain remote-specific information such as URLs, host names, IP addresses, file paths
 * and so-on. However, it is preferable to defer this resolution to an {@link ItemProvider}.
 *
 * Sources should be constructable using static consumer data, meaning they should not contain any functional data
 * such as class instances or callbacks.
 *
 * Item sources as primarily used to determine or distinguish the remote source for items. These can be URLs, host
 * names, IP addresses, file paths, etc.
 *
 * Sources must be able to be uniquely identified via their {@link Source::$key}. This key is most notably used in
 * equivalence checks to determine if an item was fetched from this source or to query for items that were fetched
 * for this source. For reliability, it is advised to generate the key using the uniqueness of a source's data.
 *
 * In contrast, the {@link Source::$type} is treated as a form of "enum" and is used to allow an {@link ItemProvider}
 * to utilize different fetch methods depending on its value.
 *
 * @since [*next-version*]
 */
class Source
{
    /**
     * A string key, used to uniquely identify the source.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    public $key;

    /**
     * The type of the source, typically used to determine what fetching mechanism should be used.
     *
     * @since [*next-version*]
     *
     * @var string
     */
    public $type;

    /**
     * Any other data related to the source.
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
     * @param string $key  The key that identifies the source.
     * @param string $type The type for this source.
     * @param array  $data Any additional data attached to this source.
     */
    public function __construct(string $key, string $type, array $data = [])
    {
        $this->key = $key;
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Static constructor.
     *
     * @since [*next-version*]
     *
     * @param string $key  The key that identifies the source.
     * @param string $type The type for this source.
     * @param array  $data Any additional data attached to this source.
     *
     * @return self The created source.
     */
    public static function create(string $key, string $type, array $data = []) : self
    {
        return new static($key, $type, $data);
    }

    /**
     * Creates a new source with an automatically generated key.
     *
     * Do NOT rely on uniqueness if the source has data with nested arrays, unless you are sure that the order of the
     * data in sub-arrays is always the same.
     *
     * @since [*next-version*]
     *
     * @param string $type The type for this source.
     * @param array  $data Any additional data attached to this source.
     *
     * @return self The created source.
     */
    public static function auto(string $type, array $data = []) : self
    {
        ksort($data);
        $hashData = compact('type', 'data');
        $hash = sha1(json_encode($hashData));

        return new static($hash, $type, $data);
    }
}
