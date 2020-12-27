<?php
/* Blockquote item shortcode */
if (!function_exists('bridge_core_blockquote')) {
    function bridge_core_blockquote($atts, $content = null) {
        $args = array(
            "text"              => "",
            "text_color"        => "",
            "width"             => "",
            "line_height"       => "",
            "background_color"  => "",
            "border_color"      => "",
            "quote_icon_color"  => "",
            "show_quote_icon"   => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/blockquote', '_blockquote', '', $params);
    }
    add_shortcode('blockquote', 'bridge_core_blockquote');
}