<?php
if (!function_exists('bridge_core_icon_vc_map')) {

	function bridge_core_icon_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Icon", 'bridge-core' ),
			"base" => "icons",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-icons",
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Size", 'bridge-core' ),
						"param_name" => "size",
						"value" => array(
							esc_html__( 'Tiny', 'bridge-core' ) => "fa-lg",
							esc_html__( 'Small', 'bridge-core' ) => "fa-2x",
							esc_html__( 'Medium', 'bridge-core' ) => "fa-3x",
							esc_html__( 'Large', 'bridge-core' ) => "fa-4x",
							esc_html__( 'Very Large', 'bridge-core' ) => "fa-5x"
						),
						'save_always' => true,
						"admin_label" => ""
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Type", 'bridge-core' ),
						"param_name" => "type",
						"value" => array(
							esc_html__( 'Normal', 'bridge-core' ) => "normal",
							esc_html__( 'Circle', 'bridge-core' ) => "circle",
							esc_html__( 'Square', 'bridge-core' ) => "square"
						),
						'save_always' => true,
						"admin_label" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Size (px)", 'bridge-core' ),
						"param_name" => "custom_size",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Shape Size (px)", 'bridge-core' ),
						"param_name" => "custom_shape_size",
						"value" => "",
						"dependency" => array("element" => "type", "value" => array("circle", "square"))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Hover Color", 'bridge-core' ),
						"param_name" => "icon_hover_color"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Border Radius (px)", 'bridge-core' ),
						"param_name" => "border_radius",
						"value" => "",
						"dependency" => array("element" => "type", "value" => array("square"))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Position", 'bridge-core' ),
						"param_name" => "position",
						"value" => array(
							esc_html__( 'Normal', 'bridge-core' ) => "",
							esc_html__( 'Left', 'bridge-core' ) => "left",
							esc_html__( 'Center', 'bridge-core' ) => "center",
							esc_html__( 'Right', 'bridge-core' ) => "right"
						)
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Border", 'bridge-core' ),
						"param_name" => "border",
						"value" => array(
							esc_html__( 'Yes', 'bridge-core' ) => "yes",
							esc_html__( 'No', 'bridge-core' ) => "no"
						),
						'save_always' => true,
						"dependency" => Array('element' => "type", 'value' => array('square'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Border Color", 'bridge-core' ),
						"param_name" => "border_color",
						"description" => esc_html__( "Only for Square type", 'bridge-core' ),
						"dependency" => Array('element' => "type", 'value' => array('square'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Border Width (px)", 'bridge-core' ),
						"param_name" => "border_width",
						"description" => esc_html__( "Only for Square type", 'bridge-core' ),
						"dependency" => Array('element' => "type", 'value' => array('square'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Background Color", 'bridge-core' ),
						"param_name" => "background_color",
						"dependency" => array("element" => "type", "value" => array("circle", "square"))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Hover Background Color", 'bridge-core' ),
						"param_name" => "hover_background_color",
						"dependency" => array("element" => "type", "value" => array("circle", "square"))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Margin", 'bridge-core' ),
						"param_name" => "margin",
						"description" => esc_html__( "Margin (top right bottom left)", 'bridge-core' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Animation", 'bridge-core' ),
						"param_name" => "icon_animation",
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => "",
							esc_html__( 'Yes', 'bridge-core' ) => "q_icon_animation"
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Icon Animation Delay (ms)", 'bridge-core' ),
						"param_name" => "icon_animation_delay",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Link", 'bridge-core' ),
						"param_name" => "link",
						"value" => ""
					),
					array(
						"type" => "checkbox",
						"heading" => esc_html__( "Use Link as Anchor", 'bridge-core' ),
						"value" => array(esc_html__( 'Use this icon as Anchor?', 'bridge-core' ) => "yes"),
						"param_name" => "anchor_icon",
						"description" => esc_html__( "Check this box to use icon as anchor link (eg. #about)", 'bridge-core' ),
						"dependency" => Array('element' => "link", 'not_empty' => true)
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Target", 'bridge-core' ),
						"param_name" => "target",
						"value" => array(
							esc_html__( 'Self', 'bridge-core' ) => "_self",
							esc_html__( 'Blank', 'bridge-core' ) => "_blank",
							esc_html__( 'Parent', 'bridge-core' ) => "_parent"
						),
						'save_always' => true
					)
				)
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_icon_vc_map');
}