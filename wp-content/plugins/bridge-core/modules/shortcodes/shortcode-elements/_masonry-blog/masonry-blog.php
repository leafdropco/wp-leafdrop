<?php
/* Masonry blog list shortcode */
if (!function_exists('bridge_core_masonry_blog')) {
    function bridge_core_masonry_blog($atts, $content = null) {

        $args = array(
            "number_of_posts"       => "",
            "order_by"              => "",
            "order"                 => "",
            "category"              => "",
            "text_length"           => "",
            "title_tag"             => "h5",
            "display_time"          => "1",
            "display_comments"      => "1",

        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/masonry-blog', '_masonry-blog', '', $params);


    }
    add_shortcode('masonry_blog', 'bridge_core_masonry_blog');
}