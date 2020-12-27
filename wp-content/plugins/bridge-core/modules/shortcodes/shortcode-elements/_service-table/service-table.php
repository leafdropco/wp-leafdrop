<?php
/* Service table shortcode */
if (!function_exists('bridge_core_service_table')) {
    function bridge_core_service_table($atts, $content = null) {
        global $bridge_qode_options;
		global $qodeIconCollections;

		$args = array(
            "title"                    	=> "",
            "title_tag"                	=> "h3",
            "title_color"              	=> "",
            "title_background_type"    	=> "",
            "title_background_color"   	=> "",
            "background_image"         	=> "",
            "background_image_height"  	=> "",
          //  "icon"                     	=> "",
            "icon_size"                	=> "",
            "custom_size"              	=> "",
            "icon_color"				=> "",
            "border"					=> "",
            "border_width"              => "",
            "border_color"              => "",
            "content_background_color" 	=> ""
        );

		$args = array_merge($args, $qodeIconCollections->getShortcodeParams());

		$params = shortcode_atts($args, $atts);
		$params['content'] = $content;
	    $params['args'] = $args;


        extract(shortcode_atts($args, $atts));


	    return bridge_core_get_shortcode_template_part('templates/service-table', '_service-table', '', $params);

    }
    add_shortcode('service_table', 'bridge_core_service_table');
}