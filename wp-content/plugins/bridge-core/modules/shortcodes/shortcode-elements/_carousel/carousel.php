<?php
/* Qode Carousel shortcode */
if (!function_exists('bridge_core_carousel')) {
    function bridge_core_carousel($atts, $content = null ) {
        $args = array(
            "carousel" => "",
            "number_of_visible_items" => "",
            "orderby"  => "date",
            "order"    => "ASC",
            "show_in_two_rows" => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/carousel', '_carousel', '', $params);
    }
    add_shortcode('qode_carousel', 'bridge_core_carousel');
}