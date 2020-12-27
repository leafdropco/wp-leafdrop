<?php
/* Cover Boxes shortcode */
if (!function_exists('bridge_core_cover_boxes')) {
    function bridge_core_cover_boxes($atts, $content = null) {
        $args = array(
            "active_element"    => "1",
            "title1"            => "",
            "title_color1"      => "",
            "text1"             => "",
            "text_color1"       => "",
            "image1"            => "",
            "link1"             => "",
            "link_label1"       => "",
            "target1"           => "",
            "title2"            => "",
            "title_color2"      => "",
            "text2"             => "",
            "text_color2"       => "",
            "image2"            => "",
            "link2"             => "",
            "link_label2"       => "",
            "target2"           => "",
            "title3"            => "",
            "title_color3"      => "",
            "text3"             => "",
            "text_color3"       => "",
            "image3"            => "",
            "link3"             => "",
            "link_label3"       => "",
            "target3"           => "",
            "read_more_button_style"      => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/cover-boxes', '_cover-boxes', '', $params);
    }
    add_shortcode('cover_boxes', 'bridge_core_cover_boxes');
}