<?php
if (!function_exists('bridge_core_google_map_vc_map')) {

	function bridge_core_google_map_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Qode Google Map", 'bridge-core' ),
			"base" => "qode_google_map",
			"icon" => "extended-custom-icon-qode icon-wpb-google-map",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Address 1", 'bridge-core' ),
					"param_name"	=> "address1",
					"admin_label"	=> true
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Address 2", 'bridge-core' ),
					"param_name"	=> "address2",
					"admin_label"	=> true
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Address 3", 'bridge-core' ),
					"param_name"	=> "address3",
					"admin_label"	=> true
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Address 4", 'bridge-core' ),
					"param_name"	=> "address4",
					"admin_label"	=> true
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Address 5", 'bridge-core' ),
					"param_name"	=> "address5",
					"admin_label"	=> true
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Map Height", 'bridge-core' ),
					"param_name"	=> "map_height",
					"admin_label"	=> true
				),
				array(
					"type"			=> "attach_image",
					"heading" => esc_html__( "Pin", 'bridge-core' ),
					"param_name"	=> "pin",
					"description" => esc_html__( "Select a pin image to be used on Google Map", 'bridge-core' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'snazzy_map_style',
					'heading'     => esc_html__( 'Snazzy Map Style', 'bridge-core' ),
					'value'       => array(
						esc_html__( 'No', 'bridge-core' )	  => 'no',
						esc_html__( 'Yes', 'bridge-core' )	  => 'yes'
					),
					'description' => esc_html__( 'Enabling this option will set predefined snazzy map style', 'bridge-core' )
				),
				array(
					'type'        => 'textarea',
					'param_name'  => 'snazzy_map_code',
					'heading'     => esc_html__( 'Snazzy Map Code', 'bridge-core' ),
					'description' => sprintf( esc_html__( 'Fill code from snazzy map site %s to add predefined style for your google map', 'bridge-core' ), '<a href="https://snazzymaps.com/" target="_blank">https://snazzymaps.com/</a>' ),
					'dependency'  => Array( 'element' => 'snazzy_map_style', 'value' => array( 'yes' ) )
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> esc_html__( 'Custom Map Style', 'bridge-core' ),
					"param_name"	=> "custom_map_style",
					"value"			=> array(
						esc_html__( esc_html__( 'No', 'bridge-core' ), 'bridge-core' ) => "false",
						esc_html__( esc_html__( 'Yes', 'bridge-core' ), 'bridge-core' ) => "true"
					),
					'save_always'	=> true,
					"description" => esc_html__( "Enabling this option will allow to style map", 'bridge-core' )
				),
				array(
					"type"			=> "colorpicker",
					"heading" => esc_html__( "Color Overlay", 'bridge-core' ),
					"param_name"	=> "color_overlay",
					"description" => esc_html__( "Choose a Map color overlay", 'bridge-core' ),
					"dependency"	=> array('element' => "custom_map_style", 'value' => array('true'))
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Saturation", 'bridge-core' ),
					"param_name"	=> "saturation",
					"description" => esc_html__( "Choose a level of saturation (-100 = least saturated, 100 = most saturated)", 'bridge-core' ),
					"dependency"	=> array('element' => "custom_map_style", 'value' => array('true'))
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Lightness", 'bridge-core' ),
					"param_name"	=> "lightness",
					"description" => esc_html__( "Choose a level of lightness (-100 = darkest, 100 = lightest)", 'bridge-core' ),
					"dependency"	=> array('element' => "custom_map_style", 'value' => array('true'))
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Map Zoom", 'bridge-core' ),
					"param_name"	=> "zoom",
					"description" => esc_html__( "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)", 'bridge-core' )
				),
				array(
					"type"			=> "dropdown",
					"heading" => esc_html__( "Zoom Map on Mouse Wheel", 'bridge-core' ),
					"param_name"	=> "google_maps_scroll_wheel",
					"value"			=> array(
						esc_html__( esc_html__( 'No', 'bridge-core' ), 'bridge-core' ) => "false",
						esc_html__( esc_html__( 'Yes', 'bridge-core' ), 'bridge-core' ) => "true"
					),
					'save_always'	=> true,
					"description" => esc_html__( "Enabling this option will allow users to zoom in on Map using mouse wheel", 'bridge-core' )
				)
			)
		));
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_google_map_vc_map');
}