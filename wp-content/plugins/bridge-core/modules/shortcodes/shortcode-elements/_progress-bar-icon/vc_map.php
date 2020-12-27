<?php
if (!function_exists('bridge_core_progress_bar_icon_vc_map')) {

	function bridge_core_progress_bar_icon_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Progress Bar - Icon", 'bridge-core' ),
			"base" => "progress_bar_icon",
			"icon" => "extended-custom-icon-qode icon-wpb-progress_bar_icon",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				array(
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Number of Icons", 'bridge-core' ),
						"param_name" => "icons_number",
						'admin_label' => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Number of Active Icons", 'bridge-core' ),
						"param_name" => "active_number",
						'admin_label' => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Type", 'bridge-core' ),
						"param_name" => "type",
						"value" => array(
							esc_html__( 'Normal', 'bridge-core' ) => "normal",
							esc_html__( 'Circle', 'bridge-core' ) => "circle",
							esc_html__( 'Square', 'bridge-core' ) => "square"
						),
						'save_always' => true,
						'admin_label' => true
					)
				),
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Size", 'bridge-core' ),
						"param_name" => "size",
						"value" => array(
							esc_html__( 'Tiny', 'bridge-core' ) => "tiny",
							esc_html__( 'Small', 'bridge-core' ) => "small",
							esc_html__( 'Medium', 'bridge-core' ) => "medium",
							esc_html__( 'Large', 'bridge-core' ) => "large",
							esc_html__( 'Very Large', 'bridge-core' ) => "very_large",
						),
						'save_always' => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Size (px)", 'bridge-core' ),
						"param_name" => "custom_size"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Active Color", 'bridge-core' ),
						"param_name" => "icon_active_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Background Color", 'bridge-core' ),
						"param_name" => "background_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Background Active Color", 'bridge-core' ),
						"param_name" => "background_active_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Border Color", 'bridge-core' ),
						"param_name" => "border_color",
						"description" => esc_html__( "Only for Square and Circle type", 'bridge-core' ),
						"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Border Active Color", 'bridge-core' ),
						"param_name" => "border_active_color",
						"description" => esc_html__( "Only for Square and Circle type", 'bridge-core' ),
						"dependency" => array('element' => "type", 'value' => array('square', 'circle'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__('Element Appearance', 'bridge-core'),
						"param_name" => "element_appearance",
						"description" => esc_html__('Set distance (related to browser bottom) to start the animation', 'bridge-core')
					)
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_progress_bar_icon_vc_map');
}