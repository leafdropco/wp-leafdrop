<?php
/* Masonry Gallery shortcode*/
if (!function_exists('bridge_core_masonry_gallery')) {

    function bridge_core_masonry_gallery($atts, $content = null){

        $default_args = array(
            'category' => '',
            'number' => -1,
            'order' => 'DESC',
            'parallax_item_speed' => '0.3',
            'parallax_item_offset' => '0',
        );

        $params = shortcode_atts($default_args, $atts);
        $params['content'] = $content;
        $params['default_atts'] = $default_args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/masonry-gallery', '_masonry-gallery', '', $params);


    }
    add_shortcode('qode_masonry_gallery', 'bridge_core_masonry_gallery');
}