<?php
//Icon shortcode
if(!function_exists('bridge_core_icons')) {
    function bridge_core_icons($atts, $content = null) {
        global $qodeIconCollections;

        $default_atts = array(
            "size"                          => "",
            "custom_size"                   => "",
            "custom_shape_size"             => "",
            "type"                          => "",
            "position"                      => "",
            "border"                        => "",
            "border_width"                  => "",
            "border_color"                  => "",
            "icon_color"                    => "",
            "icon_hover_color"              => "",
            "border_radius"                 => "",
            "background_color"              => "",
            "hover_background_color"        => "",
            "margin"                        => "",
            "icon_animation"                => "",
            "icon_animation_delay"          => "",
            "link"                          => "",
            "anchor_icon"                   => "",
            "target"                        => ""
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);
        $params['content'] = $content;
        $params['default_atts'] = $default_atts;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/icon', '_icon', '', $params);
    }
    add_shortcode('icons', 'bridge_core_icons');
}