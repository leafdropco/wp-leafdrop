<?php
if (!function_exists('bridge_core_masonry_blog_vc_map')) {

	function bridge_core_masonry_blog_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Blog Masonry", 'bridge-core' ),
			"base" => "masonry_blog",
			"icon" => "extended-custom-icon-qode icon-wpb-masonry_blog",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number of Posts", 'bridge-core' ),
					"param_name" => "number_of_posts",
					'admin_label' => true
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
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						esc_html__( 'ASC', 'bridge-core' ) => "ASC",
						esc_html__( 'DESC', 'bridge-core' ) => "DESC"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category Slug", 'bridge-core' ),
					"param_name" => "category",
					"description" => esc_html__( "Leave empty for all or use comma for list", 'bridge-core' ),
					'admin_label' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text length", 'bridge-core' ),
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
					"heading" => esc_html__( "Display date", 'bridge-core' ),
					"param_name" => "display_time",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Yes', 'bridge-core' ) => "1",
						esc_html__( 'No', 'bridge-core' ) => "0"
					),
					"description" => esc_html__( '', 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Display comments", 'bridge-core' ),
					"param_name" => "display_comments",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Yes', 'bridge-core' ) => "1",
						esc_html__( 'No', 'bridge-core' ) => "0"
					),
					"description" => esc_html__( '', 'bridge-core' )
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_masonry_blog_vc_map');
}