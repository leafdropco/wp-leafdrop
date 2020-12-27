<?php
/* Testimonials Masonry shortcode */
if (!function_exists('bridge_core_testimonials_masonry')) {

    function bridge_core_testimonials_masonry($atts, $content = null) {
        $deafult_args = array(
            "order_by"					=> "date",
            "order"						=> "DESC",
            "category"					=> "",
            "author_image"				=> "",
            "title_tag"					=> 'h5',
            "title_size"				=> '',
            'background_color'			=> '',
            'author_size'				=> '',
            'main_title'				=> '',
            "main_title_tag"			=> 'h3',
            "main_title_size"			=> '',
            'description'				=> '',
            'button_text'				=> '',
            'button_link'				=> '',
            'button_bckg_color'			=> '',
            'link_target'				=> '_blank'
        );

	    $params = shortcode_atts($deafult_args, $atts);
	    $params ['deafult_args']= $deafult_args;

        return bridge_core_get_shortcode_template_part('templates/testimonials-masonry', '_testimonials-masonry', '', $params);
    }
    add_shortcode('testimonials_masonry', 'bridge_core_testimonials_masonry');
}