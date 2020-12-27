<?php
/* Line graph shortcode */
if (!function_exists('bridge_core_line_graph')) {
    function bridge_core_line_graph($atts, $content = null) {

        $args = array("type" => "rounded", "custom_color" => "", "labels" => "", "width" => "750", "height" => "350", "scale_steps" => "6", "scale_step_width" => "20");

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/line-graph', '_line-graph', '', $params);
    }
    add_shortcode('line_graph', 'bridge_core_line_graph');
}