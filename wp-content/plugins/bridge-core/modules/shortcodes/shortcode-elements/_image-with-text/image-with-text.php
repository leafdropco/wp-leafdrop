<?php
/* Image with text shortcode */
if (!function_exists('bridge_core_image_with_text')) {

    function bridge_core_image_with_text($atts, $content = null) {
        $args = array(
            "image" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3"
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/image-with-text', '_image-with-text', '', $params);
    }
    add_shortcode('image_with_text', 'bridge_core_image_with_text');
}