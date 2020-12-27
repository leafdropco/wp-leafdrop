<?php
/* Qode Image Slider with no space shortcode */
if (!function_exists('bridge_core_image_slider_no_space')) {
    function bridge_core_image_slider_no_space($atts, $content = null) {
        $args = array(
            "images"    				=> "",
            "height"    				=> "",
            "on_click"  				=> "",
            "custom_links" 				=> "",
            "custom_links_target" 		=> "",
            "navigation_style"			=> "",
            "highlight_active_image" 	=> "",
            "highlight_inactive_color"	=> "",
            "highlight_inactive_opacity"=> ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/image-slider-no-space', '_image-slider-no-space', '', $params);


    }
    add_shortcode('image_slider_no_space', 'bridge_core_image_slider_no_space');
}