<?php
/* Pie Chart Full shortcode */
if (!function_exists('bridge_core_pie_chart2')) {
    function bridge_core_pie_chart2($atts, $content = null) {
        $args = array(
            "width"					=> "120",
            "height"				=> "120",
            "color"					=> "",
            "element_appearance"	=> ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/pie-chart-full', '_pie-chart-full', '', $params);
    }
    add_shortcode('pie_chart2', 'bridge_core_pie_chart2');
}