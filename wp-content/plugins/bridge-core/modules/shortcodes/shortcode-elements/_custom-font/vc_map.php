<?php
if (!function_exists('bridge_core_custom_font_vc_map')) {

	function bridge_core_custom_font_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Custom Font", 'bridge-core' ),
			"base" => "custom_font",
			"icon" => "extended-custom-icon-qode icon-wpb-custom_font",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Font family", 'bridge-core' ),
					"param_name" => "font_family",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Font size", 'bridge-core' ),
					"param_name" => "font_size",
					"value" => "15",
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Line height", 'bridge-core' ),
					"param_name" => "line_height",
					"value" => "26",
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Font Style", 'bridge-core' ),
					"param_name" => "font_style",
					"value" => array(
						esc_html__( 'Normal', 'bridge-core' ) => "normal",
						esc_html__( 'Italic', 'bridge-core' ) => "italic"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text Align", 'bridge-core' ),
					"param_name" => "text_align",
					"value" => array(
						esc_html__( 'Left', 'bridge-core' ) => "left",
						esc_html__( 'Center', 'bridge-core' ) => "center",
						esc_html__( 'Right', 'bridge-core' ) => "right"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Font weight", 'bridge-core' ),
					"param_name" => "font_weight",
					"value" => "300",
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Color", 'bridge-core' ),
					"param_name" => "color",
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text decoration", 'bridge-core' ),
					"param_name" => "text_decoration",
					"value" => array(
						esc_html__( 'None', 'bridge-core' ) => "none",
						esc_html__( 'Underline', 'bridge-core' ) => "underline",
						esc_html__( 'Overline', 'bridge-core' ) => "overline",
						esc_html__( 'Line Through', 'bridge-core' ) => "line-through"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text shadow", 'bridge-core' ),
					"param_name" => "text_shadow",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Letter Spacing (px)", 'bridge-core' ),
					"param_name" => "letter_spacing",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Padding (px)", 'bridge-core' ),
					"param_name" => "padding",
					"value" => "0"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Margin (px)", 'bridge-core' ),
					"param_name" => "margin",
					"value" => "0"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Border Color", 'bridge-core' ),
					"param_name" => "border_color",
					"value" => ""
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Border Width (px)", 'bridge-core' ),
					"param_name" => "border_width",
					"value" => "",
					"description" => esc_html__( "Enter just number, omit px", 'bridge-core' )
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => '<p>' . esc_html__( 'content content content', 'bridge-core' ) . '</p>',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'type_out_effect',
					'heading'     => esc_html__( 'Enable Type Out Effect', 'bridge-core' ),
					'description' => esc_html__( 'Adds a type out effect inside custom font content', 'bridge-core' ),
					'value'       => array_flip( bridge_qode_get_yes_no_select_array( false ) )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'type_out_position',
					'heading'     => esc_html__( 'Position of Type Out Effect', 'bridge-core' ),
					'description' => esc_html__( 'Enter the position of the word after which you would like to display type out effect (e.g. if you would like the type out effect after the 3rd word, you would enter "3")', 'bridge-core' ),
					'dependency'  => array( 'element' => 'type_out_effect', 'value' => array( 'yes' ) )
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'typed_color',
					'heading'    => esc_html__( 'Typed Color', 'bridge-core' ),
					'dependency' => array( 'element' => 'type_out_effect', 'value' => array( 'yes' ) )
				),
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Typed Endings', 'bridge-core' ),
					'param_name' => 'typed_endings',
					'value' => '',
					'dependency' => Array( 'element' => 'type_out_effect', 'value' => array( 'yes' ) ),
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Typed Ending', 'bridge-core' ),
							'param_name' => 'typed_ending',
							'admin_label' => true,
						)
					)
				)
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_custom_font_vc_map');
}