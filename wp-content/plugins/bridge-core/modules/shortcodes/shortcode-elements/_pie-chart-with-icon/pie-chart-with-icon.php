<?php
/* Pie Chart With Icon shortcode */
if (!function_exists('bridge_core_pie_chart_with_icon')) {

    function bridge_core_pie_chart_with_icon($atts, $content = null) {
        $args = array(
            "percent" => "",
            "active_color" => "",
            "noactive_color" => "",
            "line_width" => "",
            "icon" => "",
            "icon_size" => "",
            "icon_color" => "",
            "title" => "",
            "title_color" => "",
            "title_tag" => "h3",
            "text" => "",
            "text_color" => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/pie-chart-with-icon', '_pie-chart-with-icon', '', $params);


    }
    add_shortcode('pie_chart_with_icon', 'bridge_core_pie_chart_with_icon');
}