<?php
if (!function_exists('bridge_core_ordered_list_vc_map')) {

	function bridge_core_ordered_list_vc_map(){

		vc_map( array(
			"name" => esc_html__( "List - Ordered", 'bridge-core' ),
			"base" => "ordered_list",
			"icon" => "extended-custom-icon-qode icon-wpb-ordered_list",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					'admin_label' => true,
					"value" => '<ol><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li></ol>'
				)

			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_ordered_list_vc_map');
}