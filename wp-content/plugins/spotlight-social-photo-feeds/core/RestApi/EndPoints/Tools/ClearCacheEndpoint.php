<?php

namespace RebelCode\Spotlight\Instagram\RestApi\EndPoints\Tools;

use Exception;
use Psr\SimpleCache\CacheInterface;
use RebelCode\Spotlight\Instagram\PostTypes\MediaPostType;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\AbstractEndpointHandler;
use WP_REST_Request;
use WP_REST_Response;

/**
 * The handler for the REST API endpoint that clears the cache.
 *
 * @since 0.2
 */
class ClearCacheEndpoint extends AbstractEndpointHandler
{
    /**
     * @since 0.2
     *
     * @var CacheInterface
     */
    protected $apiCache;

    /**
     * @since 0.2
     *
     * @var MediaPostType
     */
    protected $cpt;

    /**
     * Constructor.
     *
     * @since 0.2
     *
     * @param CacheInterface $cache The API cache.
     * @param MediaPostType  $cpt   The media post type.
     */
    public function __construct(CacheInterface $cache, MediaPostType $cpt)
    {
        $this->apiCache = $cache;
        $this->cpt = $cpt;
    }

    /**
     * @inheritDoc
     *
     * @since 0.2
     */
    protected function handle(WP_REST_Request $request)
    {
        try {
            $success = $this->apiCache->clear();

            if (!$success) {
                throw new Exception('Failed to clear the API cache. Please try again later.');
            }

            $count = $this->cpt::deleteAll();

            if ($count === false) {
                throw new Exception('Failed to clear the media cache. Please try again later.');
            }

            return new WP_REST_Response(['success' => true]);
        } catch (Exception $exc) {
            return new WP_REST_Response(['success' => false, 'error' => $exc->getMessage()], 500);
        }
    }
}
