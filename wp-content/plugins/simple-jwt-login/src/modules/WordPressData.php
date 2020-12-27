<?php


namespace SimpleJWTLogin\Modules;


use SimpleJWTLogin\ErrorCodes;
use WP_REST_Response;
use WP_User;

class WordPressData implements WordPressDataInterface {
	/**
	 * @param int $userID
	 *
	 * @return bool|\WP_User
	 */
	public function getUserDetailsById( $userID ) {
		return get_userdata( (int) $userID );
	}

	/**
	 * @param string $emailAddress
	 *
	 * @return bool|\WP_User
	 */
	public function getUserDetailsByEmail( $emailAddress ) {
		return get_user_by_email( $emailAddress );
	}

	/**
	 * @param string $username
	 *
	 * @return bool|WP_User
	 */
	public function getUserByUserLogin($username){
		return get_user_by('login', $username);
	}

	/**
	 * @param \WP_User $user
	 * @param bool     $loginHookEnabled
	 */
	public function loginUser( $user, $loginHookEnabled = false ) {
		wp_set_current_user( $user->get( 'id' ) );
		wp_set_auth_cookie( $user->get( 'id' ) );

		do_action( 'wp_login', $user->user_login, $user );
	}

	/**
	 * @param string $url
	 */
	public function redirect( $url ) {
		wp_redirect( $url );
		exit;
	}

	/**
	 * @return string|void
	 */
	public function getAdminUrl() {
		return admin_url();
	}

	/**
	 * @return string|void
	 */
	public function getSiteUrl() {
		return site_url();
	}

	/**
	 * @param string $username
	 * @param string $email
	 *
	 * @return bool
	 */
	public function checkUserExistsByUsernameAndEmail( $username, $email ) {
		return username_exists( $username ) || email_exists( $email );
	}

	/**
	 * @param        $username
	 * @param string $email
	 * @param string $password
	 * @param string $role
	 * @param array  $extraParameters
	 *
	 * @return WP_User
	 * @throws \Exception
	 */
	public function createUser( $username, $email, $password, $role, $extraParameters = [] ) {
		$userParameters = [
			'user_pass'  => $password,
			'user_login' => $username,
			'user_email' => $email,
		];

		$userParameters = UserProperties::build( $userParameters, $extraParameters );

		$result = wp_insert_user( $userParameters );
		if(!is_int($result)){
			throw new \Exception($result->get_error_message($result->get_error_code()),ErrorCodes::ERR_CREATE_USER_ERROR);
		}

		$user   = new \WP_User( $result );
		$user->set_role( $role );

		return $user;
	}

	/**
	 * @param string $option
	 *
	 * @return mixed|void
	 */
	public function getOptionFromDatabase( $option ) {
		return get_option( $option );
	}

	/**
	 * @param $email
	 *
	 * @return bool
	 */
	public function is_email( $email ) {
		return (bool) is_email( $email );
	}

	/**
	 * @param string $optionName
	 * @param string $value
	 */
	public function add_option( $optionName, $value ) {
		add_option( $optionName, $value );
	}

	/**
	 * @param string $optionName
	 * @param string $value
	 */
	public function update_option( $optionName, $value ) {
		update_option( $optionName, $value );
	}

	/**
	 * @param array $responseJson
	 *
	 * @return WP_REST_Response
	 */
	public function createResponse( $responseJson ) {
		$response = new WP_REST_Response( $responseJson );
		$response->set_status( 200 );

		return $response;
	}

	/**
	 * @param string $text
	 *
	 * @return string
	 */
	public function sanitize_text_field( $text ) {
		return sanitize_text_field( $text );
	}

	/**
	 * @param \WP_User $user
	 *
	 * @return bool|int
	 */
	public function deleteUser( $user ) {
		$userId = $user->get( 'id' );
		$return = wp_delete_user( $userId );

		return $return === false
			? $return
			: $userId;
	}

	/**
	 * Call do_action function from WordPress with arguments
	 */
	public function triggerAction(){
		call_user_func_array('do_action', func_get_args());
	}

    /**
     * Call do_action function from WordPress with arguments
     */
    public function triggerFilter(){
        return call_user_func_array('apply_filters', func_get_args());
    }

	/**
	 * @param $user_id
	 *
	 * @return WP_User
	 */
	public function buildUserFromId( $user_id ) {
		return new WP_User( $user_id );
	}

	/**
	 * @param WP_User $user
	 *
	 * @return mixed
	 */
	public function getUserIdFromUser( $user ) {
		return $user->get('id');
	}

	/**
	 * @param WP_User$user
	 *
	 * @return mixed
	 */
	public function wordpressUserToArray( $user ) {
		return $user->to_array();
	}

    /**
     * @param int $userId
     * @param string $metaKey
     * @param bool $single
     * @return mixed
     */
	public function getUserMeta($userId, $metaKey, $single = false){
        return get_user_meta($userId,$metaKey, $single);
    }

    /**
     * @param int $userId
     * @param string $metaKey
     * @param string $value
     * @param bool $unique
     * @return false|int
     */
    public function addUserMeta($userId, $metaKey, $value, $unique = false){
	    return add_user_meta($userId, $metaKey, $value, $unique);
    }

    /**
     * @param int $userId
     * @param string $metaKey
     * @param string $metaValue
     * @return bool
     */
    public function deleteUserMeta($userId, $metaKey, $metaValue){
        return delete_user_meta($userId, $metaKey, $metaValue);
    }

}
