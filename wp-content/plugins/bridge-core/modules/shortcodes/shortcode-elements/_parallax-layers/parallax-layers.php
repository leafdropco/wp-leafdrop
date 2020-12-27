<?php
/* Qode Parallax Layers */
if (!function_exists('bridge_core_parallax_layers')) {

    function bridge_core_parallax_layers($atts, $content = null) {
        $args = array(
            "images" => "",
            "full_screen" => "",
            "height" => "500"
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/parallax-layers', '_parallax-layers', '', $params);
    }

    add_shortcode('qode_parallax_layers', 'bridge_core_parallax_layers');
}