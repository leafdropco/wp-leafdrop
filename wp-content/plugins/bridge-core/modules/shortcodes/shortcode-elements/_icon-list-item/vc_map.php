<?php
if (!function_exists('bridge_core_icon_list_item_vc_map')) {

	function bridge_core_icon_list_item_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Icon List Item", 'bridge-core' ),
			"base" => "icon_list_item",
			"icon" => "extended-custom-icon-qode icon-wpb-icon_list_item",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"params" =>  array_merge(
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Type", 'bridge-core' ),
						"param_name" => "icon_type",
						"value" => array(
							esc_html__( 'Circle', 'bridge-core' )        => "circle",
							esc_html__( 'Transparent', 'bridge-core' )   => "transparent"
						),
						'save_always' => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Icon Size", 'bridge-core' ),
						"param_name" => "icon_size"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Background Color", 'bridge-core' ),
						"param_name" => "icon_background_color",
						"dependency" => array('element' => "icon_type", 'value' => array('circle'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Border Color", 'bridge-core' ),
						"param_name" => "icon_border_color",
						"dependency" => array('element' => "icon_type", 'value' => array('circle'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title", 'bridge-core' ),
						"param_name" => "title",
						"admin_label" => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Title Color", 'bridge-core' ),
						"param_name" => "title_color"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title size (px)", 'bridge-core' ),
						"param_name" => "title_size"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Title Font Weight", 'bridge-core' ),
						"param_name" => "title_font_weight",
						"value" => array_flip(bridge_qode_get_font_weight_array(true))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Margin Bottom (px)", 'bridge-core' ),
						"param_name" => "margin_bottom"
					),
				))
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_icon_list_item_vc_map');
}