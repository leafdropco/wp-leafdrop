<?php
/* Social Icons shortcode */
if (!function_exists('bridge_core_social_icons')) {
    function bridge_core_social_icons($atts, $content = null) {
		global $qodeIconCollections;

    	$args = array(
            "type"                              => "",
            "link"                              => "",
            "target"                            => "",
            "use_custom_size"                   => "",
            "custom_size"                       => "",
            "custom_shape_size"                 => "",
            "size"                              => "",
            "border_radius"                     => "",
            "icon_color"                        => "",
            "icon_hover_color"                  => "",
            "background_color"                  => "",
            "background_hover_color"            => "",
            "background_color_transparency"     => "",
            "border_width"                      => "",
            "border_color"                      => "",
            "border_hover_color"                => "",
            "icon_margin"                       => ""
        );

        $args = array_merge($args, $qodeIconCollections->getShortcodeParams());

        $params = shortcode_atts($args, $atts);


        return bridge_core_get_shortcode_template_part('templates/social-icons', '_social-icons', '', $params);
    }
    add_shortcode('social_icons', 'bridge_core_social_icons');
}