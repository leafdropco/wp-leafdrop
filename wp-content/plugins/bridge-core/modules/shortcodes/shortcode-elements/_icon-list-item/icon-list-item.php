<?php
/* Icon List Item shortcode */
if (!function_exists('bridge_core_icon_list_item')) {

	function bridge_core_icon_list_item($atts, $content = null) {

		global $qodeIconCollections;

        $args = array(
        //    "icon"                                  => "",
            "icon_type"                             => "",
            "icon_size"                             => "",
            "icon_color"                            => "",
            "icon_background_color"                 => "",
            "icon_border_color"                     => "",
            "title"                                 => "",
            "title_color"                           => "",
            "title_size"                            => "",
            "title_font_weight"                    	=> "",
            "margin_bottom"                    		=> ""
        );

		$args = array_merge($args, $qodeIconCollections->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/icon-list-item', '_icon-list-item', '', $params);


    }
    add_shortcode('icon_list_item', 'bridge_core_icon_list_item');
}
