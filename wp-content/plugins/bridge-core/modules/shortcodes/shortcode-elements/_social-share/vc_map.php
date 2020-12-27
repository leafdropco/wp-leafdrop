<?php
if (!function_exists('bridge_core_social_share_vc_map')) {

	function bridge_core_social_share_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Social Share", 'bridge-core' ),
			"base" => "social_share",
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show share icon", 'bridge-core' ),
					"param_name" => "show_share_icon",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show share text", 'bridge-core' ),
					"param_name" => "social_share_icon_pack",
					"value" => bridge_qode_icon_collections()->getIconCollectionsVC(),
					"dependency" => array('element' => "show_share_icon", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show share text", 'bridge-core' ),
					"param_name" => "show_share_text",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					)
				)
			),
			"icon" => "extended-custom-icon-qode icon-wpb-social_share",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"show_settings_on_create" => true
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_social_share_vc_map');
}