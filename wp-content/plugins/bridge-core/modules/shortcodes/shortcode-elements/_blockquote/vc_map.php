<?php
if (!function_exists('bridge_core_blockquote_vc_map')) {

	function bridge_core_blockquote_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Blockquote", 'bridge-core' ),
			"base" => "blockquote",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-blockquote",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textarea",
					"heading" => esc_html__( "Text", 'bridge-core' ),
					"param_name" => "text",
					"value" => esc_html__( 'Blockquote text', 'bridge-core' ),
					'save_always' => true,
					'admin_label' => true

				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color", 'bridge-core' ),
					"param_name" => "text_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Width", 'bridge-core' ),
					"param_name" => "width",
					"description" => esc_html__( "Width (%)", 'bridge-core' ),
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Line Height", 'bridge-core' ),
					"param_name" => "line_height",
					"description" => esc_html__( "Line Height (px)", 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Border Color", 'bridge-core' ),
					"param_name" => "border_color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Quote Icon", 'bridge-core' ),
					"param_name" => "show_quote_icon",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' )	=> "no"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Quote Icon Color", 'bridge-core' ),
					"param_name" => "quote_icon_color",
					"dependency" => array('element' => "show_quote_icon", 'value' => 'yes'),
				)
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_blockquote_vc_map');
}