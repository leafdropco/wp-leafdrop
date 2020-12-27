<?php
/* Expanding Images shortcode */
if (!function_exists('bridge_core_expanding_images')) {

    function bridge_core_expanding_images($atts, $content = null) {
        $args = array(
            'frame'       		=> 'standard',
            'hero_image'        => '',
            'link'              => '',
            'target'            => '_self',
            'title'             => '',
            'side_image_1'      => '',
            'side_image_1_link' => '',
            'side_image_2'      => '',
            'side_image_2_link' => '',
            'side_image_3'      => '',
            'side_image_3_link' => '',
            'side_image_4'      => '',
            'side_image_4_link' => '',
            'side_image_5'      => '',
            'side_image_5_link' => '',
            'side_image_6'      => '',
            'side_image_6_link' => '',
            'side_image_7'      => '',
            'side_image_7_link' => '',
            'side_image_8'      => '',
            'side_image_8_link' => '',
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/expanding-images', '_expanding-images', '', $params);
    }
    add_shortcode('expanding_images', 'bridge_core_expanding_images');
}