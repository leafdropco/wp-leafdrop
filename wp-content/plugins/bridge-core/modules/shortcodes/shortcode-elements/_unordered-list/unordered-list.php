<?php
/* Unordered List shortcode */
if (!function_exists('bridge_core_unordered_list')) {
    function bridge_core_unordered_list($atts, $content = null) {
        $args = array(
            "style"         => "",
            "animate"       => "",
            'number_type'   => "",
            "font_weight"   => ""
        );

	    $params = shortcode_atts($args, $atts);
	    $params['content'] = $content;

	    return bridge_core_get_shortcode_template_part('templates/unordered-list', '_unordered-list', '', $params);

    }
    add_shortcode('unordered_list', 'bridge_core_unordered_list');
}