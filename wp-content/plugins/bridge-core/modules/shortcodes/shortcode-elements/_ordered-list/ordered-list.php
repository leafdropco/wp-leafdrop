<?php
/* Ordered List shortcode */
if (!function_exists('bridge_core_ordered_list')) {
    function bridge_core_ordered_list($atts, $content = null) {

		$params  = array();
	    $params['content'] = $content;

	    return bridge_core_get_shortcode_template_part('templates/ordered-list', '_ordered-list', '', $params);
    }
    add_shortcode('ordered_list', 'bridge_core_ordered_list');
}