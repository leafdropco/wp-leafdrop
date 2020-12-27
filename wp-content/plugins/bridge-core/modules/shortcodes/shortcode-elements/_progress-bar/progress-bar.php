<?php
/* Progress bar horizontal shortcode */
if (!function_exists('bridge_core_progress_bar')) {

    function bridge_core_progress_bar($atts, $content = null) {
        $args = array(
            "title"                     				=> "",
            "title_color"               				=> "",
            "title_tag"                 				=> "h5",
            "percent"                   				=> "",
            "percent_color"             				=> "",
            "percent_font_size"         				=> "",
            "percent_font_weight"       				=> "",
            "active_background_color"   				=> "",
            "active_border_color"       				=> "",
            "noactive_background_color" 				=> "",
            "noactive_background_color_transparency" 	=> "",
            "height"                    				=> "",
            "border_radius"            					=> "",
            "gradient"                                  => "no"
        );

        $params = shortcode_atts($args, $atts);
        $params['args'] = $args;

        return bridge_core_get_shortcode_template_part('templates/progress-bar', '_progress-bar', '', $params);
    }
    add_shortcode('progress_bar', 'bridge_core_progress_bar');
}