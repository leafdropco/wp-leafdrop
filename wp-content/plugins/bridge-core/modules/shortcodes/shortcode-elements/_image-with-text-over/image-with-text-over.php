<?php
/* Image with text over shortcode */
if (!function_exists('bridge_core_image_with_text_over')) {

    function bridge_core_image_with_text_over($atts, $content = null) {

		global $qodeIconCollections;
    	$args = array(
            "layout_width"				=> "",
            "image"						=> "",
            "image_shader_color"		=> "",
            "image_shader_hover_color"	=> "",
            //"icon"						=> "",
            "icon_size"					=> "",
            "icon_color"				=> "",
            "title"						=> "",
            "title_color"				=> "",
            "title_size"				=> "",
            "title_tag"					=> "h3"
        );

		$args = array_merge($args, $qodeIconCollections->getShortcodeParams());
        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/image-with-text-over', '_image-with-text-over', '', $params);


    }
    add_shortcode('image_with_text_over', 'bridge_core_image_with_text_over');
}