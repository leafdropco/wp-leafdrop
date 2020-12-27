<?php
if (!function_exists('bridge_core_image_with_text_over_vc_map')) {

	function bridge_core_image_with_text_over_vc_map(){

		global $qodeIconCollections;

		vc_map( array(
			"name" => esc_html__( "Image With Text Over", 'bridge-core' ),
			"base" => "image_with_text_over",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-image_with_text_over",
			"allowed_container_element" => 'vc_row',
			"params" =>array_merge(
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Width", 'bridge-core' ),
						"param_name" => "layout_width",
						"value" => array(
							""   => "",
							"1/2" => "one_half",
							"1/3" => "one_third",
							"1/4" => "one_fourth",
						)
					),
					array(
						"type" => "attach_image",
						"heading" => esc_html__( "Image", 'bridge-core' ),
						"param_name" => "image",
						'admin_label' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Image Shader Color", 'bridge-core' ),
						"param_name" => "image_shader_color",
						'admin_label' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Image Shader Hover Color", 'bridge-core' ),
						"param_name" => "image_shader_hover_color"
					)
				),
				$qodeIconCollections->getVCParamsArray(),
				array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Icon Size", 'bridge-core' ),
						"param_name" => "icon_size",
						"value" => array(
							"Tiny" => "fa-lg",
							"Small" => "fa-2x",
							"Medium" => "fa-3x",
							"Large" => "fa-4x",
							"Very Large" => "fa-5x"
						),
						'save_always' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Icon Color", 'bridge-core' ),
						"param_name" => "icon_color"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title", 'bridge-core' ),
						"param_name" => "title",
						'admin_label' => true
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__( "Title Color", 'bridge-core' ),
						"param_name" => "title_color"
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__( "Title Size (px)", 'bridge-core' ),
						"param_name" => "title_size"
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__( "Title Tag", 'bridge-core' ),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						)
					),
					array(
						"type" => "textarea_html",
						"heading" => esc_html__( "Content", 'bridge-core' ),
						"param_name" => "content",
						"value" => "<p>".esc_html__( 'I am test text for Image with text shortcode.', 'bridge-core' )."</p>",
						'admin_label' => true
					)
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_image_with_text_over_vc_map');
}