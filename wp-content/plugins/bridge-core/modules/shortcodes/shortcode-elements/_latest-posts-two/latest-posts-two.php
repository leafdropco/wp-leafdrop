<?php
/* Latest post shortcode */
if (!function_exists('bridge_core_latest_post_two')) {
    function bridge_core_latest_post_two($atts, $content = null) {

        $args = array(
            "number_of_posts"           => "-1",
            "number_of_columns"         => "3",
            "order_by"                  => "",
            "order"                     => "",
            "category"                  => "",
            "text_length"               => "50",
            "title_tag"                 => "h5",
            "display_featured_images"   => "no",
            "title_color"               => "",
            "separator_color"           => "",
            "separator_gradient"        => "no",
            "excerpt_color"             => "",
            "post_info_color"           => "",
            "post_info_separator_color" => "",
            "background_color"          => "",
            "featured_image_size"      	=> "",
            "image_width"				=> "",
            "image_height"				=> ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/latest-posts-two', '_latest-posts-two', '', $params);


    }
    add_shortcode('latest_post_two', 'bridge_core_latest_post_two');
}