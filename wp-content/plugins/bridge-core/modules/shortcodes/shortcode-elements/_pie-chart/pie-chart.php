<?php
/* Pie Chart shortcode */
if (!function_exists('bridge_core_pie_chart')) {

    function bridge_core_pie_chart($atts, $content = null) {
        $args = array(
            "title"                 => "",
            "title_color"           => "",
            "title_tag"             => "h4",
            "percent"               => "",
            "percentage_color"      => "",
            "percent_font_size"     => "",
            "percent_font_weight"   => "",
            "active_color"          => "",
            "noactive_color"        => "",
            "line_width"            => "",
            "text"                  => "",
            "text_color"            => "",
            "separator"           	=> "yes",
            "separator_color"       => "",
            "element_appearance"    => ""
        );

        extract(shortcode_atts($args, $atts));

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/pie-chart', '_pie-chart', '', $params);
    }
    add_shortcode('pie_chart', 'bridge_core_pie_chart');
}