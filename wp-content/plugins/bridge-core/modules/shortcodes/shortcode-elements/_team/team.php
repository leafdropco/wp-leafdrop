<?php
/* Team shortcode */
if (!function_exists('bridge_core_q_team')) {
    function bridge_core_q_team($atts, $content = null) {
        $args = array(
            "type"						=> "",
            "team_image"				=> "",
            "team_name"					=> "",
            "name_color"				=> "",
            "team_position"				=> "",
            "position_color"			=> "",
            "team_description"			=> "",
            "background_color"			=> "",
            "overlay_color"				=> "",
            "box_border"				=> "",
            "box_border_width"			=> "",
            "box_border_color"			=> "",
            "show_separator"			=> "",
            "separator_color"			=> "",
            "icons_color"				=> "",
            "team_social_icon_1"		=> "",
            "team_social_icon_1_link"	=> "",
            "team_social_icon_1_target"	=> "",
            "team_social_icon_2"		=> "",
            "team_social_icon_2_link"	=> "",
            "team_social_icon_2_target"	=> "",
            "team_social_icon_3"		=> "",
            "team_social_icon_3_link"	=> "",
            "team_social_icon_3_target"	=> "",
            "team_social_icon_4"		=> "",
            "team_social_icon_4_link"	=> "",
            "team_social_icon_4_target"	=> "",
            "team_social_icon_5"		=> "",
            "team_social_icon_5_link"	=> "",
            "team_social_icon_5_target"	=> "",
            "title_tag"					=> "h3",
            "disable_hover"             => "no"
        );

        $params = shortcode_atts($args, $atts);
        $params['args'] = $args;

        return bridge_core_get_shortcode_template_part('templates/team', '_team', '', $params);
    }
    add_shortcode('q_team', 'bridge_core_q_team');
}