<?php
/* Google Map Shortcode */
if (!function_exists('bridge_core_google_map')) {

    function bridge_core_google_map($atts, $content = null) {
        $args = array(
            "address1" => "",
            "address2" => "",
            "address3" => "",
            "address4" => "",
            "address5" => "",
            "custom_map_style" => false,
            "color_overlay" => "#393939",
            "saturation" => "-100",
            "lightness" => "-60",
            "zoom" => "12",
            "pin" => "",
            "google_maps_scroll_wheel" => false,
            "map_height" => "600",
            'snazzy_map_style' => 'no',
            'snazzy_map_code' => ''
        );


        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/google-map', '_google-map', '', $params);
    }

    add_shortcode('qode_google_map', 'bridge_core_google_map');
}