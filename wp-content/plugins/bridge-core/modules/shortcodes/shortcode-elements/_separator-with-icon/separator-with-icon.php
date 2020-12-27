<?php
/* Separator with Icon shortcode */
if (!function_exists('bridge_core_separator_with_icon')) {
    function bridge_core_separator_with_icon($atts, $content = null) {
        $args = array(
            "icon"      => "fa-codepen",
            "color"     => "",
            "opacity"   => "",
        );

        $params = shortcode_atts($args, $atts);

        return bridge_core_get_shortcode_template_part('templates/separator-with-icon', '_separator-with-icon', '', $params);
    }
    add_shortcode('separator_with_icon', 'bridge_core_separator_with_icon');
}