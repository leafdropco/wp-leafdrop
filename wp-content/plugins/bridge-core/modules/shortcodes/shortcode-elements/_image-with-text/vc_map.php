<?php
if (!function_exists('bridge_core_image_with_text_vc_map')) {

	function bridge_core_image_with_text_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Image With Text", 'bridge-core' ),
			"base" => "image_with_text",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-image_with_text",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image", 'bridge-core' ),
					"param_name" => "image",
					'admin_label' => true
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
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => "<p>".esc_html__( 'I am test text for Image with text shortcode.', 'bridge-core' )."</p>",
					'admin_label' => true
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_image_with_text_vc_map');
}