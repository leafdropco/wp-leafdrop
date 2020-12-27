<?php

namespace RebelCode\Iris;

/**
 * Represents a failed retrieval of items.
 *
 * @since [*next-version*]
 */
class Error
{
    /**
     * The error message.
     *
     * @var string
     */
    public $message;

    /**
     * A code that identifies the error type.
     * This is typically provided by the source in its erroneous result.
     *
     * @since [*next-version*]
     *
     * @var string|null
     */
    public $code;

    /**
     * Constructor.
     *
     * @since [*next-version*]
     *
     * @param string $message The error message.
     * @param string $code    The error code.
     */
    public function __construct(string $message, string $code = '')
    {
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * Static constructor.
     *
     * @since [*next-version*]
     *
     * @param string $message The error message.
     * @param string $code    The error code.
     *
     * @return self The created error.
     */
    public static function create(string $message, string $code = '') : self
    {
        return new static($message, $code);
    }
}
