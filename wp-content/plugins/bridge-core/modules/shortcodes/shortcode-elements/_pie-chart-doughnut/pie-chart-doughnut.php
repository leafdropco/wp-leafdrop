<?php
/* Pie Chart Doughnut shortcode */
if (!function_exists('bridge_core_pie_chart3')) {
    function bridge_core_pie_chart3($atts, $content = null) {
        $args = array("width" => "120", "height" => "120", "color" => "");

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/pie-chart-doughnut', '_pie-chart-doughnut', '', $params);
    }
    add_shortcode('pie_chart3', 'bridge_core_pie_chart3');
}
