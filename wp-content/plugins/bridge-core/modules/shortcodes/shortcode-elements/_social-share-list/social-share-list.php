<?php
/* Social Share shortcode */
if (!function_exists('bridge_core_social_share_list')) {
    function bridge_core_social_share_list($atts, $content = null) {

    	$params = array(
    	    'content' => $content,
		    'atts'    => $atts
	    );

	    return bridge_core_get_shortcode_template_part('templates/social-share-list', '_social-share-list', '', $params);
    }
    add_shortcode('social_share_list', 'bridge_core_social_share_list');
}

if ( ! function_exists('bridge_core_get_social_share_list_html') ) {
	/**
	 * Calls social share list shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 * @return mixed|string
	 */
	function bridge_core_get_social_share_list_html($params = array() ) {

		return bridge_qode_execute_shortcode( 'social_share_list', $params );

	}
}