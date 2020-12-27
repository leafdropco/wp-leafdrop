<?php
// Blog Slider shortcode
if (!function_exists('bridge_core_blog_slider')) {

    function bridge_core_blog_slider($atts, $content = null) {

        global $qode_options;

        $args = array(
            "type" => "",
            "auto_start" => "false",
            "info_position" => "",
            "hover_box_color" => "",
            "order_by" => "date",
            "order" => "ASC",
            "number" => "-1",
            "blogs_shown" => "",
            "category" => "",
            "selected_projects" => "",
            "day_color" => "",
            "day_font_size" => "",
            "month_color" => "",
            "month_font_size" => "",
            "post_info_position" => "",
            "show_date" => "yes",
            "date_color" => "",
            "show_categories" => "yes",
            "category_color" => "",
            "show_author" => "yes",
            "author_color" => "",
            "title_tag" => "h3",
            "title_color" => "",
            "image_size" => "full",
            "image_width" => "",
            "image_height" => "",
            "enable_navigation" => "",
            "add_class" => "",
            "show_read_more" => "default",
            "read_more_button_size" => "small",
            "show_excerpt" => "no",
            "excerpt_length" => "",
            "excerpt_color" => "",
            "show_comments" => "no",
            "comments_color" => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/blog-slider', '_blog-slider', '', $params);
    }
    add_shortcode('blog_slider', 'bridge_core_blog_slider');
}