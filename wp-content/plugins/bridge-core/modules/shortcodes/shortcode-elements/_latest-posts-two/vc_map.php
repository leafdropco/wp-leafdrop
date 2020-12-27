<?php
if (!function_exists('bridge_core_latest_post_two_vc_map')) {

	function bridge_core_latest_post_two_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Latest Posts 2", 'bridge-core' ),
			"base" => "latest_post_two",
			"icon" => "extended-custom-icon-qode icon-wpb-latest_post_two",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number of Posts", 'bridge-core' ),
					"param_name" => "number_of_posts",
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number of Colums", 'bridge-core' ),
					"param_name" => "number_of_columns",
					"value" => array(
						esc_html__( 'One', 'bridge-core' )   => "1",
						esc_html__( 'Two', 'bridge-core' )   => "2",
						esc_html__( 'Three', 'bridge-core' ) => "3",
						esc_html__( 'Four', 'bridge-core' )  => "4"
					),
					'save_always' => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "order_by",
					"value" => array(
						esc_html__( 'Title', 'bridge-core' ) => "title",
						esc_html__( 'Date', 'bridge-core' ) => "date"
					),
					'save_always' => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						esc_html__( 'ASC', 'bridge-core') => "ASC",
						esc_html__( 'DESC', 'bridge-core') => "DESC"
					),
					'save_always' => true,
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category Slug", 'bridge-core' ),
					"param_name" => "category",
					"description" => esc_html__( "Leave empty for all or use comma for list", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text Length", 'bridge-core' ),
					"param_name" => "text_length",
					"description" => esc_html__( "Number of characters", 'bridge-core' )
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
					"type" => "dropdown",
					"heading" => esc_html__( "Display Featured Images", 'bridge-core' ),
					"param_name" => "display_featured_images",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Image size", 'bridge-core' ),
					"param_name" => "featured_image_size",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Full', 'bridge-core' ) => "full",
						esc_html__( 'Landscape', 'bridge-core' ) => "landscape",
						esc_html__( 'Portrait', 'bridge-core' ) => "portrait",
						esc_html__( 'Custom', 'bridge-core' ) => "custom"
					),
					"dependency" => array('element' => 'display_featured_images','value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Image Width (px)", 'bridge-core' ),
					"param_name" => "image_width",
					"value" => "",
					"description" => esc_html__( "Set image custom width", 'bridge-core' ),
					"dependency" => array('element' => 'featured_image_size','value' => array('custom'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Image Height (px)", 'bridge-core' ),
					"param_name" => "image_height",
					"value" => "",
					"description" => esc_html__( "Set image custom height", 'bridge-core' ),
					"dependency" => array('element' => 'featured_image_size','value' => array('custom'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color", 'bridge-core' ),
					"param_name" => "title_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Separator Color", 'bridge-core' ),
					"param_name" => "separator_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Separator Gradient", 'bridge-core' ),
					"param_name" => "separator_gradient",
					"value" => array(
						esc_html__( 'No', 'bridge-core' )	=> "no",
						esc_html__( 'Yes', 'bridge-core' )	=> "yes"
					),
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Excerpt Color", 'bridge-core' ),
					"param_name" => "excerpt_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Post Info Color", 'bridge-core' ),
					"param_name" => "post_info_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Post Info Separator Color", 'bridge-core' ),
					"param_name" => "post_info_separator_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color",
					"group" => esc_html__( 'Design Options', 'bridge-core' )
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_latest_post_two_vc_map');
}