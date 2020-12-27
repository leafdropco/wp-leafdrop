<?php

if(!function_exists('bridge_core_get_button_v2_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function bridge_core_get_button_v2_html($params) {
        $button_html = bridge_qode_execute_shortcode('qode_button_v2', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}

if(!function_exists('bridge_core_add_button_v2_shortcodes')) {
	function bridge_core_add_button_v2_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'Bridge\Shortcodes\ButtonV2\ButtonV2'
		);

		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

		return $shortcodes_class_name;
	}

	add_filter('bridge_core_filter_add_vc_shortcode', 'bridge_core_add_button_v2_shortcodes');
}