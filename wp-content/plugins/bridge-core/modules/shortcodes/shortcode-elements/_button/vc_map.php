<?php
if (!function_exists('bridge_core_button_vc_map')) {

	function bridge_core_button_vc_map(){
		global $qodeIconCollections;

		vc_map(array(
			"name" => esc_html__( "Button", 'bridge-core' ),
			"base" => "button",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-button",
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Size", 'bridge-core' ),
					"param_name" => "size",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Small', 'bridge-core' ) => "small",
						esc_html__( 'Medium', 'bridge-core' ) => "medium",
						esc_html__( 'Large', 'bridge-core' ) => "large",
						esc_html__( 'Extra Largerge', 'bridge-core' ) => "big_large",
						esc_html__( 'Extra Large Full Width', 'bridge-core' ) => "big_large_full_width"
					),
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Style", 'bridge-core' ),
					"param_name" => "style",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'White', 'bridge-core' ) => "white"
					),
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Custom CSS class', 'bridge-core'),
					'param_name' => 'custom_class',
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text", 'bridge-core' ),
					'admin_label' => true,
					"param_name" => "text"
				),
			),
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color",
						'admin_label' => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Link", 'bridge-core' ),
						"param_name" => "link"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Link Target", 'bridge-core' ),
						"param_name" => "target",
						"value" => array(
							esc_html__( 'Self', 'bridge-core' ) => "_self",
							esc_html__( 'Blank', 'bridge-core' ) => "_blank",
							esc_html__( 'Parent', 'bridge-core' ) => "_parent",
							esc_html__( 'Top', 'bridge-core' ) => "_top"
						),
						'save_always' => true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "ID", 'bridge-core' ),
						"param_name" => "button_id",
						"description" => esc_html__( "Set unique button ID attribute", 'bridge-core' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Hover Type", 'bridge-core' ),
						"param_name" => "hover_type",
						"value" => array(
							esc_html__( 'Default', 'bridge-core' ) => "default",
							esc_html__( 'Enlarge', 'bridge-core' ) => "enlarge",
						),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Color", 'bridge-core' ),
						"param_name" => "color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Hover Color", 'bridge-core' ),
						"param_name" => "hover_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Background Color", 'bridge-core' ),
						"param_name" => "background_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Hover Background Color", 'bridge-core' ),
						"param_name" => "hover_background_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( 'Border Color', 'bridge-core' ),
						"param_name" => "border_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( 'Hover Border Color', 'bridge-core' ),
						"param_name" => "hover_border_color"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Enable Button Background Gradient", 'bridge-core'),
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => 'no',
							esc_html__( 'Yes', 'bridge-core' ) => 'yes'
						),
						"param_name" => "gradient"
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Font Family', 'bridge-core'),
						'param_name' => 'font_family',
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Font Size (px)', 'bridge-core'),
						'param_name' => 'font_size',
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Letter Spacing (px)', 'bridge-core'),
						'param_name' => 'letter_spacing',
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Text Transform', 'bridge-core'),
						'param_name' => 'text_transform',
						'value' => array_flip(bridge_qode_get_text_transform_array(true)),
						'admin_label' => true,
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( 'Font Style', 'bridge-core' ),
						"param_name" => "font_style",
						"value" => array(
							"" => "",
							esc_html__( 'Normal', 'bridge-core' ) => "normal",
							esc_html__( 'Italic', 'bridge-core' ) => "italic"
						),
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( 'Font Weight', 'bridge-core' ),
						"param_name" => "font_weight",
						"value" => array(
							esc_html__( 'Default', 'bridge-core' ) => "",
							esc_html__( 'Thin 100', 'bridge-core' ) => "100",
							esc_html__( 'Extra-Light 200', 'bridge-core' ) => "200",
							esc_html__( 'Light 300', 'bridge-core' ) => "300",
							esc_html__( 'Regular 400', 'bridge-core' ) => "400",
							esc_html__( 'Medium 500', 'bridge-core' ) => "500",
							esc_html__( 'Semi-Bold 600', 'bridge-core' ) => "600",
							esc_html__( 'Bold 700', 'bridge-core' ) => "700",
							esc_html__( 'Extra-Bold 800', 'bridge-core' ) => "800",
							esc_html__( 'Ultra-Bold 900', 'bridge-core' ) => "900"
						),
						'group' => esc_html__('Design Options', 'bridge-core')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( 'Text Align', 'bridge-core' ),
						"param_name" => "text_align",
						"value" => array(
							"" => "",
							esc_html__( 'Left', 'bridge-core' ) => "left",
							esc_html__( 'Right', 'bridge-core' ) => "right",
							esc_html__( 'Center', 'bridge-core' ) => "center"
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( 'Margin', 'bridge-core' ),
						"param_name" => "margin",
						"description" => esc_html__("Please insert margin in format: 0px 0px 1px 0px", 'bridge-core')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( 'Border radius', 'bridge-core' ),
						"param_name" => "border_radius",
						"description" => esc_html__("Please insert border radius(Rounded corners) in px. For example: 4 ", 'bridge-core')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( 'Enable Button Shadow', 'bridge-core' ),
						"param_name" => "button_shadow",
						"value" => array(
							esc_html__( 'Default', 'bridge-core' ) => "",
							esc_html__( 'No', 'bridge-core') => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						)
					)
				))
		));
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_button_vc_map');
}