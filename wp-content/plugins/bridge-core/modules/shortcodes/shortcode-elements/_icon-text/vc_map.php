<?php
if (!function_exists('bridge_core_icon_text_vc_map')) {

	function bridge_core_icon_text_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Icon With Text", 'bridge-core' ),
			"base" => "icon_text",
			"icon" => "extended-custom-icon-qode icon-wpb-icon_text",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array_merge(
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Box type", 'bridge-core' ),
						"param_name" => "box_type",
						"value" => array(
							esc_html__( 'Normal', 'bridge-core' ) => "normal",
							"Icon in a box" => "icon_in_a_box"
						),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'	=> 'dropdown',
						'heading'	=> esc_html__('Enable hover effect','bridge-core'),
						'param_name'	=> 'holder_hover_effect',
						'value' => array(
							esc_html__( 'No', 'bridge-core' ) => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						),
						'dependency' => array('element' => 'box_type', 'value' => 'normal')
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Box Border Color", 'bridge-core' ),
						"param_name" => "box_border_color",
						"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Box Background Color", 'bridge-core' ),
						"param_name" => "box_background_color",
						"dependency" => Array('element' => "box_type", 'value' => array('icon_in_a_box'))
					)
				),
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "attach_image",
						"heading" => esc_html__( "Image", 'bridge-core' ),
						"param_name" => "image"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Type", 'bridge-core' ),
						"param_name" => "icon_type",
						"value" => array(
							esc_html__( 'Normal', 'bridge-core' ) => "normal",
							esc_html__( 'Circle', 'bridge-core' ) => "circle",
							esc_html__( 'Square', 'bridge-core' ) => "square"
						),
						'save_always' => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon/Image Position", 'bridge-core' ),
						"param_name" => "icon_position",
						"value" => array(
							esc_html__( 'Top', 'bridge-core' ) => "top",
							esc_html__( 'Left', 'bridge-core' ) => "left",
							esc_html__( 'Left From Title', 'bridge-core' ) => "left_from_title",
							esc_html__( 'Right', 'bridge-core' ) => "right"
						),
						'save_always' => true,
						'admin_label' => true,
						"description" => esc_html__( "Icon Position (only for normal box type)", 'bridge-core' ),
						"dependency" => Array('element' => "box_type", 'value' => array('normal'))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Content Alignment", 'bridge-core' ),
						"param_name" => "content_alignment",
						"value" => array(
							esc_html__( 'Center', 'bridge-core' ) => "center",
							esc_html__( 'Left', 'bridge-core' ) => "left",
							esc_html__( 'Right', 'bridge-core' ) => "right"
						),
						"dependency" => array('element' => "icon_position", 'value' => array('top'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Icon Margin", 'bridge-core' ),
						"param_name" => "icon_margin",
						"value" => "",
						"description" => esc_html__( "Margin should be set in a top right bottom left format", 'bridge-core' ),
						"dependency" => array('element' => "icon_position", 'value' => array('top'))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Size", 'bridge-core' ),
						"param_name" => "icon_size",
						"value" => array(
							esc_html__( 'Tiny', 'bridge-core' ) => "fa-lg",
							esc_html__( 'Small', 'bridge-core' ) => "fa-2x",
							esc_html__( 'Medium', 'bridge-core' ) => "fa-3x",
							esc_html__( 'Large', 'bridge-core' ) => "fa-4x",
							esc_html__( 'Very Large', 'bridge-core' ) => "fa-5x"
						),
						'save_always' => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Use Custom Icon Size", 'bridge-core' ),
						"param_name" => "use_custom_icon_size",
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						),
						'save_always' => true,
						"description" => esc_html__("Select Yes if you want to use custom icon size and margin", 'bridge-core')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Icon Size (px)", 'bridge-core' ),
						"param_name" => "custom_icon_size",
						"value" => "",
						"description" => esc_html__("Enter just number, omit px", 'bridge-core'),
						"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Icon Size inside a circle or square (px)", 'bridge-core' ),
						"param_name" => "custom_icon_size_inner",
						"value" => "",
						"description" => esc_html__("Enter just number, omit px. Applied only for circle or square icon type", 'bridge-core'),
						"dependency" => array('element' => 'use_custom_icon_size', 'value' => array('yes'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Custom Icon Margin (px)", 'bridge-core' ),
						"param_name" => "custom_icon_margin",
						"value" => "",
						"description" => esc_html__("Spacing between icon and text (for left icon/margin position). Enter just number, omit px", 'bridge-core'),
						"dependency" => array('element' => "use_custom_icon_size", 'value' => array('yes'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Border Color", 'bridge-core' ),
						"param_name" => "icon_border_color",
						"description" => esc_html__( "Only for Square and Circle type", 'bridge-core' ),
						"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Hover Color", 'bridge-core' ),
						"param_name" => "icon_hover_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Background Color", 'bridge-core' ),
						"param_name" => "icon_background_color",
						"description" => esc_html__( "Icon Background Color (only for square and circle icon type)", 'bridge-core' ),
						"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Enable Icon Gradient",'bridge-core'),
						"param_name" => "icon_gradient",
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						)
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Hover Background Color", 'bridge-core' ),
						"param_name" => "icon_hover_background_color",
						"description" => esc_html__( "Icon Hover Background Color (only for square and circle icon type)", 'bridge-core' ),
						"dependency" => Array('element' => "icon_type", 'value' => array('square','circle'))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Animation", 'bridge-core' ),
						"param_name" => "icon_animation",
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => "",
							esc_html__( 'Yes', 'bridge-core' ) => "q_icon_animation"
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Icon Animation Delay (ms)", 'bridge-core' ),
						"param_name" => "icon_animation_delay",
						"value" => "",
						"dependency" => Array('element' => "icon_animation", 'value' => array('q_icon_animation'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title", 'bridge-core' ),
						"param_name" => "title"
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__( "Title Tag", 'bridge-core' ),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h1" => "h1",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						)
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Title Color", 'bridge-core' ),
						"param_name" => "title_color"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Title Font Weight", 'bridge-core' ),
						"param_name" => "title_font_weight",
						"value" => array_flip(bridge_qode_get_font_weight_array(true))
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Separator", 'bridge-core' ),
						"param_name" => "separator",
						"value" => array(
							esc_html__( 'No', 'bridge-core' ) => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						),
						'save_always' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Separator Color", 'bridge-core' ),
						"param_name" => "separator_color",
						"dependency" => Array('element' => "separator", 'value' => array('yes'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Separator Top Margin", 'bridge-core' ),
						"param_name" => "separator_top_margin",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Separator Bottom Margin", 'bridge-core' ),
						"param_name" => "separator_bottom_margin",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Separator Width", 'bridge-core' ),
						"param_name" => "separator_width",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Text", 'bridge-core' ),
						"param_name" => "text",
						"value" => ""
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Text Color", 'bridge-core' ),
						"param_name" => "text_color"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Link", 'bridge-core' ),
						"param_name" => "link",
						"value" => ""
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Link Text", 'bridge-core' ),
						"param_name" => "link_text",
						"value" => ""
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Link Color", 'bridge-core' ),
						"param_name" => "link_color"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Target", 'bridge-core' ),
						"param_name" => "target",
						"value" => array(
							""   => "",
							esc_html__( 'Self', 'bridge-core' ) => "_self",
							esc_html__( 'Blank', 'bridge-core' ) => "_blank",
							esc_html__( 'Parent', 'bridge-core' ) => "_parent",
						)
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Link Icon", 'bridge-core' ),
						"param_name" => "link_icon",
						"value" => array(
							'' => '',
							esc_html__( 'Yes', 'bridge-core' ) => 'yes',
							esc_html__( 'No', 'bridge-core' ) => 'no'
						)
					)
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_icon_text_vc_map');
}