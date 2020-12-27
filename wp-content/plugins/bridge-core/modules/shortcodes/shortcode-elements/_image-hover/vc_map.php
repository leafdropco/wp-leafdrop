<?php
if (!function_exists('bridge_core_image_hover_vc_map')) {

	function bridge_core_image_hover_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Image Hover", 'bridge-core' ),
			"base" => "image_hover",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-image_hover",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image", 'bridge-core' ),
					"param_name" => "image",
					'admin_label' => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Hover Image", 'bridge-core' ),
					"param_name" => "hover_image",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link", 'bridge-core' ),
					"param_name" => "link",
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Target", 'bridge-core' ),
					"param_name" => "target",
					"value" => array(
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Animation", 'bridge-core' ),
					"param_name" => "animation",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Transition delay", 'bridge-core' ),
					"param_name" => "transition_delay",
					"dependency" => array('element' => "animation", 'value' => array("yes"))
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_image_hover_vc_map');
}