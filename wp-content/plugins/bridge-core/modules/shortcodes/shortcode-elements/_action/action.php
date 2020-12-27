<?php
/* Action shortcode */

if (!function_exists('bridge_core_action')) {
    function bridge_core_action($atts, $content = null) {
        $args = array(
            "type"						        => "normal",
            "full_width"                        => "yes",
            "content_in_grid"                   => "yes",
            "icon"						        => "",
            "icon_size"					        => "fa-2x",
            "icon_color"				        => "",
            "custom_icon"				        => "",
            "background_color"                  => "",
            "background_image"                  => "",
            "use_background_as_pattern"         => "",
            "border_color"                      => "",
            "padding_top"						=> "",
            "padding_bottom"					=> "",
            "show_button"                       => "yes",
            "button_size"                       => "",
            "button_link"                       => "",
            "button_text"                       => "",
            "button_target"                     => "",
            "button_text_color"                 => "",
            "button_hover_text_color"           => "",
            "button_background_color"           => "",
            "button_hover_background_color"     => "",
            "button_border_color"               => "",
            "button_hover_border_color"         => "",
            "text_color"                        => "", //used only when shortcode is called from call to action widget
            "text_size"                         => "",
            "text_font_weight"					=> "",
            "text_letter_spacing"				=> ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/action', '_action', '', $params);
    }
    add_shortcode('action', 'bridge_core_action');
}