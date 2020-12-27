<?php
if (!function_exists('bridge_core_progress_bar_vertical_vc_map')) {

	function bridge_core_progress_bar_vertical_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Progress Bar - Vertical", 'bridge-core' ),
			"base" => "progress_bar_vertical",
			"icon" => "extended-custom-icon-qode icon-wpb-vertical_progress_bar",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array (
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'bridge-core' ),
					"param_name" => "title",
					'admin_label' => true
				),
				array (
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
				array (
					"type" => "textfield",
					"heading" => esc_html__( "Title Size", 'bridge-core' ),
					"param_name" => "title_size"
				),
				array (
					"type" => "colorpicker",
					"heading" => esc_html__( "Bar Color", 'bridge-core' ),
					"param_name" => "bar_color"
				),
				array (
					"type" => "colorpicker",
					"heading" => esc_html__( "Bar Border Color", 'bridge-core' ),
					"param_name" => "bar_border_color"
				),
				array (
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array (
					"type" => "textfield",
					"heading" => esc_html__( "Top Border Radius", 'bridge-core' ),
					"param_name" => "border_radius"
				),
				array (
					"type" => "textfield",
					"heading" => esc_html__( "Percent", 'bridge-core' ),
					"param_name" => "percent",
					'admin_label' => true
				),
				array (
					"type" => "textfield",
					"heading" => esc_html__( "Percentage Text Size", 'bridge-core' ),
					"param_name" => "percentage_text_size"
				),
				array (
					"type" => "colorpicker",
					"heading" => esc_html__( "Percentage Color", 'bridge-core' ),
					"param_name" => "percent_color"
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__( "Text", 'bridge-core' ),
					"param_name" => "text",
					'admin_label' => true
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_progress_bar_vertical_vc_map');
}