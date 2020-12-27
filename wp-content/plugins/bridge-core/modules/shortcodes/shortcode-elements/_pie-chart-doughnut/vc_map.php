<?php
if (!function_exists('bridge_core_pie_chart_doughnut_vc_map')) {

	function bridge_core_pie_chart_doughnut_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Pie Chart 3 (Doughnut)", 'bridge-core' ),
			"base" => "pie_chart3",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-pie_chart3",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Width", 'bridge-core' ),
					"param_name" => "width",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Height", 'bridge-core' ),
					"param_name" => "height",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Legend Text Color", 'bridge-core' ),
					"param_name" => "color"
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => esc_html__( '15,#1abc9c,Legend One; 35,#5ed0ba,Legend Two; 50,#8cddcd,Legend Three', 'bridge-core' ),
					"save_always" => true,
					'admin_label' => true
				)

			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_pie_chart_doughnut_vc_map');
}