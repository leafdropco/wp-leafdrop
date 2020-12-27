<?php
/* Countdown shortcode */
if (!function_exists('bridge_core_countdown')) {
    function bridge_core_countdown($atts, $content = null) {
        $args = array("year" => "", "month" => "", "day" => "", "hour" => "", "minute" => "", "month_label" => "", "day_label" => "", "hour_label" => "", "minute_label" => "", "second_label" => "", "month_singular_label" => "", "day_singular_label" => "", "hour_singular_label" => "", "minute_singular_label" => "", "second_singular_label" => "", "color" => "", "digit_font_size" => "", "label_font_size" => "", "font_weight" => "", "show_separator" => "");

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/countdown', '_countdown', '', $params);
    }
    add_shortcode('countdown', 'bridge_core_countdown');
}