<?php
if (!function_exists('bridge_core_progress_bar_vc_map')) {

	function bridge_core_progress_bar_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Progress Bar - Horizontal", 'bridge-core' ),
			"base" => "progress_bar",
			"icon" => "extended-custom-icon-qode icon-wpb-progress_bar",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'bridge-core' ),
					"param_name" => "title",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color", 'bridge-core' ),
					"param_name" => "title_color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Title Tag", 'bridge-core' ),
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Percentage", 'bridge-core' ),
					"param_name" => "percent",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Percentage Color", 'bridge-core' ),
					"param_name" => "percent_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Percentage Font Size", 'bridge-core' ),
					"param_name" => "percent_font_size"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Percentage Font weight", 'bridge-core' ),
					"param_name" => "percent_font_weight",
					"value" => array_flip(bridge_qode_get_font_weight_array(true))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Active Background Color", 'bridge-core' ),
					"param_name" => "active_background_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Active Border Color", 'bridge-core' ),
					"param_name" => "active_border_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Inactive Background Color", 'bridge-core' ),
					"param_name" => "noactive_background_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Inactive Background Color Transparency", 'bridge-core' ),
					"param_name" => "noactive_background_color_transparency",
					"description" => esc_html__( 'Value should be between 0 and 1. Works if field above isn\'t empty', 'bridge-core' )
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Enable Background Gradient', 'bridge-core'),
					'param_name'  => 'gradient',
					'value'       => array(
						esc_html__( 'No', 'bridge-core' )      => 'no',
						esc_html__( 'Yes', 'bridge-core' )     => 'yes'
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Progress Bar Height (px)", 'bridge-core' ),
					"param_name" => "height",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Progress Bar Border Radius)", 'bridge-core' ),
					"param_name" => "border_radius"
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_progress_bar_vc_map');
}