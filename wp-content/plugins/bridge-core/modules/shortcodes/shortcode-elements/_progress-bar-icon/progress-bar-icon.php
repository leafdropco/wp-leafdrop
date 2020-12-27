<?php
/* Progress bars icon shortcode */
if (!function_exists('bridge_core_progress_bar_icon')) {
    function bridge_core_progress_bar_icon($atts, $content = null) {

		global $qodeIconCollections;

    	$args = array(
			"icons_number" => "",
			"active_number" => "",
			"type"=>"",
			//"icon" => "",
			"size" => "",
			"custom_size" => "",
			"icon_color"=>"",
			"icon_active_color"=>"",
			"background_color"=>"",
			"background_active_color"=>"",
			"border_color"=>"",
			"border_active_color"=>"",
			"element_appearance"=>""
		);


		$args = array_merge($args, $qodeIconCollections->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

        return bridge_core_get_shortcode_template_part('templates/progress-bar-icon', '_progress-bar-icon', '', $params);
    }
    add_shortcode('progress_bar_icon', 'bridge_core_progress_bar_icon');
}