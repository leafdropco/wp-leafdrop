<?php
if (!function_exists('bridge_core_parallax_layers_vc_map')) {

	function bridge_core_parallax_layers_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Parallax Layers", 'bridge-core' ),
			"base" => "qode_parallax_layers",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-parallax-layers",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "attach_images",
					"heading" => esc_html__( "Layers", 'bridge-core' ),
					"param_name" => "images"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Full Screen Height", 'bridge-core' ),
					"param_name" => "full_screen",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Height (px)", 'bridge-core' ),
					"param_name" => "height",
					"value" => "",
					"dependency" => array('element' => 'full_screen', 'value' => 'no')
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => "",
					"description" => esc_html__( "This content will be displayed as final (top) layer over all other layers", 'bridge-core' )
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_parallax_layers_vc_map');
}