<?php

namespace RebelCode\Spotlight\Instagram\RestApi\EndPoints\Media;

use RebelCode\Iris\Engine;
use RebelCode\Iris\Error;
use RebelCode\Iris\Result;
use RebelCode\Spotlight\Instagram\Feeds\FeedManager;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\AbstractEndpointHandler;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use WP_REST_Request;
use WP_REST_Response;

/**
 * The endpoint for importing media.
 *
 * @since 0.5
 */
class ImportMediaEndPoint extends AbstractEndpointHandler
{
    /**
     * @since 0.5
     *
     * @var Engine
     */
    protected $engine;

    /**
     * @since 0.5
     *
     * @var FeedManager
     */
    protected $feedManager;

    /**
     * Constructor.
     *
     * @since 0.5
     *
     * @param Engine      $engine
     * @param FeedManager $feedManager
     */
    public function __construct(Engine $engine, FeedManager $feedManager)
    {
        $this->engine = $engine;
        $this->feedManager = $feedManager;
    }

    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    protected function handle(WP_REST_Request $request)
    {
        $options = $request->get_param('options') ?? [];
        $feed = $this->feedManager->createFeed($options);

        $result = new Result();
        foreach ($feed->sources as $source) {
            $subResult = $this->engine->import($source);
            $result->items = array_merge($result->items, $subResult->items);
            $result->errors = array_merge($result->errors, $subResult->errors);
        }

        return new WP_REST_Response([
            'success' => $result->success,
            'items' => $result->items,
            'data' => $result->data,
            'errors' => Arrays::map($result->errors, function (Error $error) {
                return (array) $error;
            }),
        ]);
    }
}
