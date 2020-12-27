<?php
/* Banner shortcode */

if (!function_exists('bridge_core_banner')) {

    function bridge_core_banner($atts, $content = null) {
        $args = array(
			'image'					=> '',
			'link'					=> '',
			'vertical_alignment'	=> 'center',
			'target'				=> '_self'

        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/banner', '_banner', '', $params);
    }
    add_shortcode('qode_banner', 'bridge_core_banner');
}