<?php
/* Testimonials shortcode */
if (!function_exists('bridge_core_testimonials')) {

    function bridge_core_testimonials($atts, $content = null) {
        $deafult_args = array(
            "number"					=> "-1",
            "number_per_slide"			=> "1",
            "order_by"					=> "date",
            "order"						=> "DESC",
            "category"					=> "",
            "author_image"				=> "",
            "text_color"				=> "",
            "text_font_size"			=> "",
            "author_text_font_weight"	=> "",
            "author_text_color"			=> "",
            "author_text_font_size"		=> "",
            "show_navigation"			=> "",
            "navigation_style"			=> "",
            "auto_rotate_slides"		=> "",
            "animation_type"			=> "",
            "animation_speed"			=> ""
        );

	    $params = shortcode_atts($deafult_args, $atts);

        return bridge_core_get_shortcode_template_part('templates/testimonials', '_testimonials', '', $params);
    }
    add_shortcode('testimonials', 'bridge_core_testimonials');
}