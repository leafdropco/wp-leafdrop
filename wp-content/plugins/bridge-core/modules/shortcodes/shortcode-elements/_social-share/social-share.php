<?php
/* Social Share shortcode */
if (!function_exists('bridge_core_social_share')) {
    function bridge_core_social_share($atts, $content = null) {

        $args = array(
            "show_share_icon" => "",
            "social_share_icon_pack" => "linea_icons",
            "show_share_text" => "yes",
        );

        $params = shortcode_atts($args, $atts);


        return bridge_core_get_shortcode_template_part('templates/social-share', '_social-share', '', $params);
    }
    add_shortcode('social_share', 'bridge_core_social_share');
}

if ( ! function_exists('bridge_core_get_social_share_html') ) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 * @return mixed|string
	 */
	function bridge_core_get_social_share_html($params = array() ) {

		return bridge_qode_execute_shortcode( 'social_share', $params );

	}
}