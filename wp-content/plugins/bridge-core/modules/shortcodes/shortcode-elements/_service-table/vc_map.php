<?php
if (!function_exists('bridge_core_service_table_vc_map')) {

	function bridge_core_service_table_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Service Table", 'bridge-core' ),
			"base" => "service_table",
			"icon" => "extended-custom-icon-qode icon-wpb-service_table",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" =>array_merge(
				array(
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title", 'bridge-core' ),
						"param_name" => "title",
						"value" => "",
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
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
						"heading" => esc_html__( "Title Background Type", 'bridge-core' ),
						"param_name" => "title_background_type",
						"value" => array(
							esc_html__( 'Background Color', 'bridge-core' ) => "background_color_type",
							esc_html__( 'Background Image', 'bridge-core' ) => "background_image_type"
						),
						'save_always' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Title Background Color", 'bridge-core' ),
						"param_name" => "title_background_color",
						"dependency" => array('element' => "title_background_type", 'value' => array('background_color_type'))
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__( 'Background Image', 'bridge-core' ),
						"param_name" => "background_image",
						"dependency" => array('element' => "title_background_type", 'value' => array('background_image_type'))
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Background Image Height (px)", 'bridge-core' ),
						"param_name" => "background_image_height",
						"value" => "",
						"dependency" => array('element' => "title_background_type", 'value' => array('background_image_type'))
					)
				),
				$qodeIconCollections->getVCParamsArray(),
				array(
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
						"type" => "textfield",
						"heading" => esc_html__( "Custom Size (px)", 'bridge-core' ),
						"param_name" => "custom_size",
						"value" => ""
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Content Background Color", 'bridge-core' ),
						"param_name" => "content_background_color"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Border Around", 'bridge-core' ),
						"param_name" => "border",
						"value" => array(
							esc_html__( 'Default', 'bridge-core' ) => "",
							esc_html__( 'No', 'bridge-core' ) => "no",
							esc_html__( 'Yes', 'bridge-core' ) => "yes"
						)
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Border width (px)", 'bridge-core' ),
						"param_name" => "border_width",
						"value" => "",
						"dependency" => array('element' => "border", 'value' => array('yes'))
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Border color", 'bridge-core' ),
						"param_name" => "border_color",
						"value" => "",
						"dependency" => array('element' => "border", 'value' => array('yes'))
					),
					array(
						"type" => "textarea_html",
						"admin_label" => true,
						"heading" => esc_html__( "Content", 'bridge-core' ),
						"param_name" => "content",
						"value" => '<li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li><li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li><li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li>'
					)
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_service_table_vc_map');
}