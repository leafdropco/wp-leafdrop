<?php
/* Message shortcode */
if (!function_exists('bridge_core_message')) {
    function bridge_core_message($atts, $content = null) {

        $args = array(
            "type"                  => "",
            "background_color"      => "",
            "border"     			=> "",
            "border_width"     		=> "",
            "border_color"      	=> "",
            "icon"                  => "",
            "icon_size"            	=> "fa-2x",
            "icon_color"            => "",
            "icon_background_color" => "",
            "custom_icon"           => "",
            "close_button_color"    => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/message', '_message', '', $params);


    }
    add_shortcode('message', 'bridge_core_message');
}