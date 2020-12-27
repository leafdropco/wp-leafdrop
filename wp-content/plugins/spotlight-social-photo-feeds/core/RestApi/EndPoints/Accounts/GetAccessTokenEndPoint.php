<?php

namespace RebelCode\Spotlight\Instagram\RestApi\EndPoints\Accounts;

use RebelCode\Spotlight\Instagram\PostTypes\AccountPostType;
use RebelCode\Spotlight\Instagram\RestApi\EndPoints\AbstractEndpointHandler;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_REST_Request;
use WP_REST_Response;

/**
 * The handler for the endpoint that provides account access tokens.
 *
 * @since 0.1
 */
class GetAccessTokenEndPoint extends AbstractEndpointHandler
{
    /**
     * @since 0.1
     *
     * @var PostType
     */
    protected $cpt;

    /**
     * Constructor.
     *
     * @since 0.1
     *
     * @param PostType $cpt The accounts post type.
     */
    public function __construct(PostType $cpt)
    {
        $this->cpt = $cpt;
    }

    /**
     * @inheritDoc
     *
     * @since 0.1
     */
    protected function handle(WP_REST_Request $request)
    {
        $id = filter_var($request['id'], FILTER_SANITIZE_STRING);

        if (empty($id)) {
            return new WP_Error('no_id', "Must specify an account \"${id}\"", ['status' => 400]);
        }

        $account = $this->cpt->get($id);

        if ($account === null) {
            return new WP_Error('not_found', "Account \"${id}\" was not found", ['status' => 404]);
        }

        return new WP_REST_Response([
            'code' => $account->{AccountPostType::ACCESS_TOKEN},
            'expiry' => $account->{AccountPostType::ACCESS_EXPIRY},
        ]);
    }
}
