<?php
if (!function_exists('bridge_core_text_marquee_vc_map')) {

	function bridge_core_text_marquee_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Text Marquee", 'bridge-core' ),
			"base" => "text_marquee",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-text-marquee",
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
					"param_name" => "title_color",
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_text_marquee_vc_map');
}