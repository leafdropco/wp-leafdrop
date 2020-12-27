<?php
/* Image hover shortcode */
if (!function_exists('bridge_core_image_hover')) {

    function bridge_core_image_hover($atts, $content = null) {
        $args = array(
            "image"             => "",
            "hover_image"       => "",
            "link"              => "",
            "target"            => "_self",
            "animation"         => "",
            "transition_delay"  => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/image-hover', '_image-hover', '', $params);


    }
    add_shortcode('image_hover', 'bridge_core_image_hover');
}