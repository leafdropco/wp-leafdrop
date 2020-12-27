<?php
if (!function_exists('bridge_core_counter_vc_map')) {

	function bridge_core_counter_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Counter", 'bridge-core' ),
			"base" => "counter",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
			"icon" => "extended-custom-icon-qode icon-wpb-counter",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						esc_html__( 'Zero Counter', 'bridge-core' ) => "zero",
						esc_html__( 'Random Counter', 'bridge-core' ) => "random"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Box", 'bridge-core' ),
					"param_name" => "box",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Box Border Color", 'bridge-core' ),
					"param_name" => "box_border_color",
					"dependency" => array('element' => "box", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Position", 'bridge-core' ),
					"param_name" => "position",
					"value" => array(
						esc_html__( 'Left', 'bridge-core' ) => "left",
						esc_html__( 'Right', 'bridge-core' ) => "right",
						esc_html__( 'Center', 'bridge-core' ) => "center"
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Digit", 'bridge-core' ),
					"param_name" => "digit",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Font size (px)", 'bridge-core' ),
					"param_name" => "font_size"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Font weight", 'bridge-core' ),
					"param_name" => "font_weight",
					"value" => array_flip( bridge_qode_get_font_weight_array(true) )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Font Color", 'bridge-core' ),
					"param_name" => "font_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text", 'bridge-core' ),
					"param_name" => "text",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text Size (px)", 'bridge-core' ),
					"param_name" => "text_size"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text Font Weight", 'bridge-core' ),
					"param_name" => "text_font_weight",
					"value" =>	array_flip( bridge_qode_get_font_weight_array(true) )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text Transform", 'bridge-core' ),
					"param_name" => "text_transform",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) 			=> "",
						esc_html__( 'None', 'bridge-core' )				=> "none",
						esc_html__( 'Capitalize', 'bridge-core' ) 		=> "capitalize",
						esc_html__( 'Uppercase', 'bridge-core' )			=> "uppercase",
						esc_html__( 'Lowercase', 'bridge-core' )			=> "lowercase"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color", 'bridge-core' ),
					"param_name" => "text_color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Separator", 'bridge-core' ),
					"param_name" => "separator",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Separator Color", 'bridge-core' ),
					"param_name" => "separator_color",
					"dependency" => array('element' => "separator", 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Separator Transparency", 'bridge-core' ),
					"param_name" => "separator_transparency",
					"description" => esc_html__( "Value should be between 0 and 1", 'bridge-core' ),
					"dependency" => array('element' => "separator", 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( 'Element Appearance', 'bridge-core' ),
					"param_name" => "element_appearance",
					"description" => esc_html__( 'Set distance (related to browser bottom) to start the animation', 'bridge-core' )
				)
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_counter_vc_map');
}