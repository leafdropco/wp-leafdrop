<?php
if (!function_exists('bridge_core_image_separator_with_icon_vc_map')) {

	function bridge_core_image_separator_with_icon_vc_map(){

		global $qodeIconCollections;
		$collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

		vc_map( array(
			"name" => esc_html__( "Separator with Icon", 'bridge-core' ),
			"base" => "separator_with_icon",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-qode_separator_with_icon",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Icon", 'bridge-core' ),
					"param_name" => "icon",
					"value" => $icons,
					'save_always' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Color", 'bridge-core' ),
					"param_name" => "color",
					"value" => "",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Opacity", 'bridge-core' ),
					"param_name" => "opacity",
					"description" => esc_html__( "Set opacity from 0 to 1", 'bridge-core' )
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_image_separator_with_icon_vc_map');
}