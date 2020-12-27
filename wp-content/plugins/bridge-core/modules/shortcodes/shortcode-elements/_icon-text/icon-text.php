<?php
/* Icon with text shortcode */
if(!function_exists('bridge_core_icon_text')) {
    function bridge_core_icon_text($atts, $content = null) {
        global $qodeIconCollections;

        $default_atts = array(
            "icon_size"             		=> "",
            "use_custom_icon_size"  		=> "",
            "custom_icon_size"      		=> "",
            "custom_icon_size_inner"      	=> "",
            "custom_icon_margin"    		=> "",
            "icon_animation"        		=> "",
            "icon_animation_delay"  		=> "",
            "image"                 		=> "",
            "icon_type"             		=> "",
            "icon_position"         		=> "",
            "content_alignment"         	=> "",
            "icon_border_color"     		=> "",
            "icon_margin"           		=> "",
            "icon_color"            		=> "",
            "icon_hover_color"           	=> "",
            "icon_gradient"                 => "no",
            "icon_background_color" 		=> "",
            "icon_hover_background_color" 	=> "",
            "box_type"              		=> "",
            "box_border_color"      		=> "",
            "box_background_color"  		=> "",
            "title"                 		=> "",
            "title_tag"             		=> "h5",
            "title_color"           		=> "",
            "title_font_weight"				=> "",
            "separator"						=> "",
            "separator_color"				=> "",
            "separator_top_margin"			=> "0",
            "separator_bottom_margin"		=> "15",
            "separator_width"				=> "20",
            "text"                  		=> "",
            "text_color"            		=> "",
            "link"                  		=> "",
            "link_text"             		=> "",
            "link_color"            		=> "",
            "link_icon"						=> "",
            "target"                		=> "",
            'holder_hover_effect'           => 'no'
        );

        $default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

        extract(shortcode_atts($default_atts, $atts));

        $params = shortcode_atts($default_atts, $atts);
        $params['content'] = $content;
        $params['default_atts'] = $default_atts;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/icon-text', '_icon-text', '', $params);

    }
    add_shortcode('icon_text', 'bridge_core_icon_text');
}
