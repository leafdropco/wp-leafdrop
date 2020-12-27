<?php
if (!function_exists('bridge_core_blog_slider_vc_map')) {

	function bridge_core_blog_slider_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Blog Slider", 'bridge-core' ),
			"base" => "blog_slider",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-blog-slider",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Slider Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Carousel', 'bridge-core' ) => "carousel",
						esc_html__( 'Simple', 'bridge-core' ) => "simple"
					),
					"description" => esc_html__( "Default type is Carousel", 'bridge-core' ),
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Auto Start", 'bridge-core' ),
					"param_name" => "auto_start",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "false",
						esc_html__( 'Yes', 'bridge-core' ) => "true"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Post Info Position", 'bridge-core' ),
					"param_name" => "info_position",
					"value" => array(
						esc_html__( 'Default(Overlay)', 'bridge-core' ) => "",
						esc_html__( 'Bottom', 'bridge-core' ) => "info_in_bottom_always"
					),
					"dependency" => array('element' => 'type', 'value' => array('carousel',''))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Image size", 'bridge-core' ),
					"param_name" => "image_size",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Original Size', 'bridge-core' ) => "full",
						esc_html__( 'Landscape', 'bridge-core' ) => "landscape",
						esc_html__( 'Portrait', 'bridge-core' ) => "portrait",
						esc_html__( 'Custom', 'bridge-core' ) => "custom"
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Image Width (px)", 'bridge-core' ),
					"param_name" => "image_width",
					"value" => "",
					"description" => esc_html__( "Set image custom width", 'bridge-core' ),
					"dependency" => array('element' => 'image_size','value' => array('custom'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Image Height (px)", 'bridge-core' ),
					"param_name" => "image_height",
					"value" => "",
					"description" => esc_html__( "Set image custom height", 'bridge-core' ),
					"dependency" => array('element' => 'image_size','value' => array('custom'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "order_by",
					"value" => array(
						"" => "",
						esc_html__( 'Title', 'bridge-core' ) => "title",
						esc_html__( 'Date', 'bridge-core' ) => "date"
					),
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						"" => "",
						esc_html__( 'ASC', 'bridge-core' )		=> "ASC",
						esc_html__( 'DESC', 'bridge-core' )	=> "DESC",
					),
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number", 'bridge-core' ),
					"param_name" => "number",
					"value" => "-1",
					"description" => esc_html__( "Number of blog posts on page (-1 is all)", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number of Blog Posts Shown", 'bridge-core' ),
					"param_name" => "blogs_shown",
					"value" => array(
						"" => "",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6"
					),
					"save_always" => true,
					"description" => esc_html__( "Number of blog posts that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)", 'bridge-core' ),
					"dependency" => array('element' => 'type', 'value' => array('carousel',''))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category", 'bridge-core' ),
					"param_name" => "category",
					"value" => "",
					"description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' ),
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Selected Projects", 'bridge-core' ),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge-core' ),
					"admin_label" => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Info Box Color", 'bridge-core' ),
					"param_name" => "hover_box_color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Post Info Position", 'bridge-core' ),
					"param_name" => "post_info_position",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Above Title', 'bridge-core' ) => "above_title"
					),
					"dependency" => array('element' => "type", 'value' => array('simple'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Category Names", 'bridge-core' ),
					"param_name" => "show_categories",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true,
					"description" => esc_html__( "Default value is Yes", 'bridge-core' ),
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Category Name Color", 'bridge-core' ),
					"param_name" => "category_color",
					"value" => "",
					"dependency" => array('element' => "show_categories", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Day Color", 'bridge-core' ),
					"param_name" => "day_color",
					"value" => "",
					"dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Day Font Size (px)", 'bridge-core' ),
					"param_name" => "day_font_size",
					"value" => "",
					"dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Month Color", 'bridge-core' ),
					"param_name" => "month_color",
					"value" => "",
					"dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Month Font Size (px)", 'bridge-core' ),
					"param_name" => "month_font_size",
					"value" => "",
					"dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Date", 'bridge-core' ),
					"param_name" => "show_date",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true,
					"description" => esc_html__( "Default value is Yes, does not affect Carousel type - post info position bottom", 'bridge-core' ),
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Date Color", 'bridge-core' ),
					"param_name" => "date_color",
					"value" => "",
					"description" => esc_html__( "Does not affect Carousel type - post info position bottom", 'bridge-core' ),
					"dependency" => array('element' => "show_date", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Author", 'bridge-core' ),
					"param_name" => "show_author",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true,
					"description" => esc_html__( "Default value is Yes", 'bridge-core' ),
					"dependency" => array('element' => "type", 'value' => array('simple'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Author Color", 'bridge-core' ),
					"param_name" => "author_color",
					"value" => "",
					"dependency" => array('element' => "show_author", 'value' => array('yes'))
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
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color", 'bridge-core' ),
					"param_name" => "title_color",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Comments", 'bridge-core' ),
					"param_name" => "show_comments",
					"value" => array(
						esc_html__( 'No', 'bridge-core' )  => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true,
					"dependency" => array('element' => "info_position", 'value' => array('info_in_bottom_always'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Comments Color", 'bridge-core' ),
					"param_name" => "comments_color",
					"value" => "",
					"dependency" => array('element' => "show_comments", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Excerpt", 'bridge-core' ),
					"param_name" => "show_excerpt",
					"value" => array(
						esc_html__( 'No', 'bridge-core' )  => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					'save_always' => true,
					"dependency" => array('element' => "type", 'value' => array('simple'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Excerpt Length", 'bridge-core' ),
					"param_name" => "excerpt_length",
					"value" => "",
					"dependency" => array('element' => "show_excerpt", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Excerpt Color", 'bridge-core' ),
					"param_name" => "excerpt_color",
					"value" => "",
					"dependency" => array('element' => "show_excerpt", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Read More Button", 'bridge-core' ),
					"param_name" => "show_read_more",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' )  => "default",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' )  => "no"
					),
					'save_always' => true,
					"dependency" => array('element' => "type", 'value' => array('simple'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__('Read More Button Size', 'bridge-core'),
					"param_name" => "read_more_button_size",
					"value" => array(
						esc_html__('Small', 'bridge-core')		=> "small",
						esc_html__('Medium', 'bridge-core')	=> "medium",
						esc_html__('Large', 'bridge-core')		=> "large"
					),
					"dependency" => array('element' => 'show_read_more', 'value' => array('yes'))
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( esc_html__( 'Prev/Next navigation', 'bridge-core' ), 'bridge-core' ),
					"value" => array("Enable prev/next navigation?" => "enable_navigation"),
					"param_name" => "enable_navigation"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Extra class name", 'bridge-core' ),
					"param_name" => "add_class",
					"value" => "",
					"description" => esc_html__( "If you wish to style this particular blog slider differently, you can use this field to add an extra class name to it and then refer to that class name in your css file.", 'bridge-core' )
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_blog_slider_vc_map');
}