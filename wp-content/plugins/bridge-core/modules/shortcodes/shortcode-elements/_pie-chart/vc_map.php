<?php
if (!function_exists('bridge_core_pie_chart_vc_map')) {

	function bridge_core_pie_chart_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Pie Chart", 'bridge-core' ),
			"base" => "pie_chart",
			"icon" => "extended-custom-icon-qode icon-wpb-pie_chart",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Percentage", 'bridge-core' ),
					"param_name" => "percent",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Percentage Color", 'bridge-core' ),
					"param_name" => "percentage_color"
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
					"heading" => esc_html__( "Bar Active Color", 'bridge-core' ),
					"param_name" => "active_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Bar Noactive Color", 'bridge-core' ),
					"param_name" => "noactive_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Pie Chart Line Width (px)", 'bridge-core' ),
					"param_name" => "line_width"
				),
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
					"heading" => esc_html__( "Text", 'bridge-core' ),
					"param_name" => "text",
					'admin_label' => true
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
					"heading" => esc_html__('Element Appearance', 'bridge-core'),
					"param_name" => "element_appearance",
					"description" => esc_html__('Set distance (related to browser bottom) to start the animation', 'bridge-core')
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_pie_chart_vc_map');
}