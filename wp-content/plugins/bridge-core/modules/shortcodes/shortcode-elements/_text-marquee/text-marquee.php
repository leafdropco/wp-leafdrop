<?php
/* Text Marquee shortcode */
if (!function_exists('bridge_core_text_marquee')) {

    function bridge_core_text_marquee($atts, $content = null) {
        $args = array(
            "title"             => "",
            "title_color"       => "",
        );

        $params = shortcode_atts($args, $atts);

        return bridge_core_get_shortcode_template_part('templates/text-marquee', '_text-marquee', '', $params);
    }

    add_shortcode('text_marquee', 'bridge_core_text_marquee');
}