<?php
if (!function_exists('bridge_core_social_share_list_vc_map')) {

	function bridge_core_social_share_list_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Social Share List", 'bridge-core' ),
			"base" => "social_share_list",
			"icon" => "extended-custom-icon-qode icon-wpb-social_share_list",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"show_settings_on_create" => false,
			"params" => array()
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_social_share_list_vc_map');
}