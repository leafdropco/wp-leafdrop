<?php
if (!function_exists('bridge_core_social_icons_vc_map')) {

	function bridge_core_social_icons_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Social Icons", 'bridge-core' ),
			"base"                      => "social_icons",
			"icon"                      => "extended-custom-icon-qode icon-wpb-social_icons",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params"                    => array_merge(
				array(
					array(
						"type"              => "dropdown",
						"heading" => esc_html__( "Type", 'bridge-core' ),
						"param_name"        => "type",
						"value"             => array(
							esc_html__( 'Circle', 'bridge-core' ) => "circle_social",
							esc_html__( 'Square', 'bridge-core' ) => "square_social",
							esc_html__( 'Normal', 'bridge-core' ) => "normal_social"
						),
						'save_always' => true,
						'admin_label' => true
					)
				),
				$qodeIconCollections->getSocialVCParamsArray(array(),'',false,array('linea_icons','dripicons', 'kiko')),
				array(
					array(
						"type"              => "dropdown",
						"heading" => esc_html__( "Use Custom Size", 'bridge-core' ),
						"param_name"        => "use_custom_size",
						"value"             => array(
							esc_html__( 'No', 'bridge-core' )            => "no",
							esc_html__( 'Yes', 'bridge-core' )           => "yes",
						),
						'save_always' => true
					),
					array(
						"type"              => "dropdown",
						"heading" => esc_html__( "Size", 'bridge-core' ),
						"param_name"        => "size",
						"value"             => array(
							esc_html__( 'Small', 'bridge-core' )         => "fa-lg",
							esc_html__( 'Normal', 'bridge-core' )        => "fa-2x",
							esc_html__( 'Large', 'bridge-core' )         => "fa-3x",
							esc_html__( 'Very Large', 'bridge-core' )    => "fa-4x"
						),
						'save_always' 		=> true,
						'admin_label' 		=> true,
						"dependency"        => array('element' => 'use_custom_size', 'value' => array('no'))
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Custom Size(px)", 'bridge-core' ),
						"param_name"        => "custom_size",
						"value"             => "",
						"dependency"        => array('element' => 'use_custom_size', 'value' => array('yes'))
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Custom Shape Size(px)", 'bridge-core' ),
						"param_name"        => "custom_shape_size",
						"value"             => "",
						"dependency"        => array('element' => 'use_custom_size', 'value' => array('yes')),
						"description" => esc_html__( "Available only for square and circle icon types", 'bridge-core' )
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Link", 'bridge-core' ),
						"param_name"        => "link",
						"value"             => ""
					),
					array(
						"type"              => "dropdown",
						"heading" => esc_html__( "Target", 'bridge-core' ),
						"param_name"        => "target",
						"value"             => array(
							esc_html__( 'Self', 'bridge-core' )          => "_self",
							esc_html__( 'Blank', 'bridge-core' )         => "_blank",
							esc_html__( 'Parent', 'bridge-core' )        => "_parent"
						),
						'save_always' => true
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Border Radius", 'bridge-core' ),
						"param_name"        => "border_radius",
						"value"             => "",
						"dependency"        => array("element" => "type", "value" => "square_social"),
						"description" => esc_html__( "Add border radius in pixels. Ommit unit, add just number", 'bridge-core' )
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name"        => "icon_color"
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Icon Hover Color", 'bridge-core' ),
						"param_name"        => "icon_hover_color"
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Background Color", 'bridge-core' ),
						"param_name"        => "background_color",
						"dependency"        => array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Background Hover Color", 'bridge-core' ),
						"param_name"        => "background_hover_color",
						"dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Background Color Transparency", 'bridge-core' ),
						"param_name"        => "background_color_transparency",
						"description" => esc_html__( "Value should be between 0 and 1. Applied only if you have selected background color and circle / square icon type", 'bridge-core' ),
						"dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Border Width", 'bridge-core' ),
						"param_name"        => "border_width",
						"dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Border Color", 'bridge-core' ),
						"param_name"        => "border_color",
						"dependency"        => array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "colorpicker",
						"heading" => esc_html__( "Border Hover Color", 'bridge-core' ),
						"param_name"        => "border_hover_color",
						"dependency"        => Array('element' => "type", 'value' => array('circle_social', 'square_social'))
					),
					array(
						"type"              => "textfield",
						"heading" => esc_html__( "Icon Margin", 'bridge-core' ),
						"param_name"        => "icon_margin",
						"value"             => "",
						"description" => esc_html__( "Margin should be set in a top right bottom left format", 'bridge-core' )
					),
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_social_icons_vc_map');
}