<?php
if (!function_exists('bridge_core_unordered_vc_map')) {

	function bridge_core_unordered_vc_map(){

		vc_map( array(
			"name" => esc_html__( "List - Unordered", 'bridge-core' ),
			"base" => "unordered_list",
			"icon" => "extended-custom-icon-qode icon-wpb-unordered_list",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Style", 'bridge-core' ),
					"param_name" => "style",
					"value" => array(
						esc_html__( 'Circle', 'bridge-core' ) => "circle",
						esc_html__( 'Number', 'bridge-core' ) => "number"
					),
					'save_always' => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number Type", 'bridge-core' ),
					"param_name" => "number_type",
					"value" => array(
						esc_html__( 'Circle', 'bridge-core' ) => "circle_number",
						esc_html__( 'Transparent', 'bridge-core' ) => "transparent_number"
					),
					'save_always' => true,
					"dependency" => array('element' => "style", 'value' => array('number'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Animate List", 'bridge-core' ),
					"param_name" => "animate",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Font Weight", 'bridge-core' ),
					"param_name" => "font_weight",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Light', 'bridge-core' ) => "light",
						esc_html__( 'Normal', 'bridge-core' ) => "normal",
						esc_html__( 'Bold', 'bridge-core' ) => "bold"
					)
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => '<ul><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li></ul>'
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_unordered_vc_map');
}