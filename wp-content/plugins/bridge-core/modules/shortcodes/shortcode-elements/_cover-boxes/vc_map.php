<?php
if (!function_exists('bridge_core_cover_boxes_vc_map')) {

	function bridge_core_cover_boxes_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Cover Boxes", 'bridge-core' ),
			"base" => "cover_boxes",
			'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
			"icon" => "extended-custom-icon-qode icon-wpb-cover_boxes",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Active element", 'bridge-core' ),
					"param_name" => "active_element",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image 1", 'bridge-core' ),
					"param_name" => "image1",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title 1", 'bridge-core' ),
					"param_name" => "title1",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color 1", 'bridge-core' ),
					"param_name" => "title_color1"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text 1", 'bridge-core' ),
					"param_name" => "text1",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color 1", 'bridge-core' ),
					"param_name" => "text_color1"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link 1", 'bridge-core' ),
					"param_name" => "link1",
					"value" => ""
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link label 1", 'bridge-core' ),
					"param_name" => "link_label1",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Target 1", 'bridge-core' ),
					"param_name" => "target1",
					"value" => array(
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent",
						esc_html__( 'Top', 'bridge-core' ) => "_top"
					),
					'save_always' => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image 2", 'bridge-core' ),
					"param_name" => "image2",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title 2", 'bridge-core' ),
					"param_name" => "title2",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color 2", 'bridge-core' ),
					"param_name" => "title_color2"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text 2", 'bridge-core' ),
					"param_name" => "text2",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color 2", 'bridge-core' ),
					"param_name" => "text_color2"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link 2", 'bridge-core' ),
					"param_name" => "link2",
					"value" => ""
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link label 2", 'bridge-core' ),
					"param_name" => "link_label2",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Target 2", 'bridge-core' ),
					"param_name" => "target2",
					"value" => array(
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent",
						esc_html__( 'Top', 'bridge-core' ) => "_top"
					),
					'save_always' => true
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image 3", 'bridge-core' ),
					"param_name" => "image3",
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title 3", 'bridge-core' ),
					"param_name" => "title3",
					"value" => "",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color 3", 'bridge-core' ),
					"param_name" => "title_color3"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text 3", 'bridge-core' ),
					"param_name" => "text3",
					"value" => ""
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color 3", 'bridge-core' ),
					"param_name" => "text_color3"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link 3", 'bridge-core' ),
					"param_name" => "link3",
					"value" => ""
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Link label 3", 'bridge-core' ),
					"param_name" => "link_label3",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Target 3", 'bridge-core' ),
					"param_name" => "target3",
					"value" => array(
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent",
						esc_html__( 'Top', 'bridge-core' ) => "_top"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Read More Button Style", 'bridge-core' ),
					"param_name" => "read_more_button_style",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					)
				)
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_cover_boxes_vc_map');
}