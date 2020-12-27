<?php
if (!function_exists('bridge_core_line_graph_vc_map')) {

	function bridge_core_line_graph_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Line Graph", 'bridge-core' ),
			"base" => "line_graph",
			"icon" => "extended-custom-icon-qode icon-wpb-line_graph",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						"" => "",
						esc_html__( 'Rounded edges', 'bridge-core' ) => "rounded",
						esc_html__( 'Sharp edges', 'bridge-core' ) => "sharp"
					),
					"save_always" => true,
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Width", 'bridge-core' ),
					"param_name" => "width"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Height", 'bridge-core' ),
					"param_name" => "height"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Custom Color", 'bridge-core' ),
					"param_name" => "custom_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Scale steps", 'bridge-core' ),
					"param_name" => "scale_steps"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Scale step width", 'bridge-core' ),
					"param_name" => "scale_step_width"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Labels", 'bridge-core' ),
					"param_name" => "labels",
					"value" => esc_html__( 'Label 1, Label 2, Label 3', 'bridge-core' ),
					"save_always" => true
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => esc_html__( '#1abc9c,Legend One,1,5,10;#5ed0ba,Legend Two,3,7,20;#8cddcd,Legend Three,10,2,34', 'bridge-core' ),
					"save_always" => true
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_line_graph_vc_map');
}