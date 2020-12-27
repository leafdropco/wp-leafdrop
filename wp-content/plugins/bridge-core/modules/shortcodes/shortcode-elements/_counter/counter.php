<?php
/* Counter shortcode */
if (!function_exists('bridge_core_counter')) {
    function bridge_core_counter($atts, $content = null) {
        $args = array(
            "type"              		=> "",
            "box"               		=> "",
            "box_border_color"  		=> "",
            "position"          		=> "",
            "digit"             		=> "",
            "font_size"         		=> "",
            "font_weight"       		=> "",
            "font_color"        		=> "",
            "text"              		=> "",
            "text_size"         		=> "",
            "text_font_weight"  		=> "",
            "text_transform"    		=> "",
            "text_color"        		=> "",
            "separator"         		=> "",
            "separator_color"   		=> "",
            "separator_transparency" 	=> "",
            "element_appearance" 		=> ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/counter', '_counter', '', $params);
    }
    add_shortcode('counter', 'bridge_core_counter');
}