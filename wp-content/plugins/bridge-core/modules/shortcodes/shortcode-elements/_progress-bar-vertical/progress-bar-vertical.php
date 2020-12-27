<?php
/* Progress bar vertical shortcode */
if (!function_exists('bridge_core_progress_bar_vertical')) {

    function bridge_core_progress_bar_vertical($atts, $content = null) {
        $args = array(
            "title"                             => "",
            "title_color"                       => "",
            "title_tag"                         => "h5",
            "title_size"                        => "",
            "percent"                           => "100",
            "percentage_text_size"              => "",
            "percent_color"                     => "",
            "bar_color"                         => "",
            "bar_border_color"                  => "",
            "background_color"                  => "",
            "border_radius"     	            => "",
            "text"                              => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['args'] = $args;

        return bridge_core_get_shortcode_template_part('templates/progress-bar-vertical', '_progress-bar-vertical', '', $params);;
    }
    add_shortcode('progress_bar_vertical', 'bridge_core_progress_bar_vertical');
}