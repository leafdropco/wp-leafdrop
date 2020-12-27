<?php
if (!function_exists('bridge_core_testimonials_carousel_vc_map')) {

	function bridge_core_testimonials_carousel_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Testimonials Carousel", 'bridge-core' ),
			"base" => "testimonials_carousel",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-testimonials-carousel",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category", 'bridge-core' ),
					"param_name" => "category",
					"value" => "",
					'admin_label' => true,
					"description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number", 'bridge-core' ),
					"param_name" => "number",
					"value" => "",
					'admin_label' => true,
					"description" => esc_html__( "Number of Testimonials", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number per slide", 'bridge-core' ),
					"param_name" => "number_per_slide",
					"value" => array(
						"1"         => "1",
						"2"         => "2",
						"3"         => "3",
						"4"			=> "4"
					),
					'admin_label' => true,
					"description" => esc_html__( "Number of Testimonials per slide", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "order_by",
					"value" => array(
						"" => "",
						esc_html__( 'Title', 'bridge-core' ) => "title",
						esc_html__( 'Date', 'bridge-core' ) => "date",
						esc_html__( 'Random', 'bridge-core' ) => "rand"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order Type", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						"" => "",
						esc_html__( 'Ascending', 'bridge-core' ) => "ASC",
						esc_html__( 'Descending', 'bridge-core' ) => "DESC",
					),
					"dependency" => array("element" => "order_by", "value" => array("title", "date"))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Title", 'bridge-core' ),
					"param_name" => "show_title",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Title tag", 'bridge-core' ),
					"param_name" => "title_tag",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "h5",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6"
					),
					"dependency" => array('element' => 'show_title', 'value' => 'yes')
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Rating", 'bridge-core' ),
					"param_name" => "show_rating",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Author Image", 'bridge-core' ),
					"param_name" => "author_image",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
					),
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color", 'bridge-core' ),
					"param_name" => "text_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text Font Size", 'bridge-core' ),
					"param_name" => "text_font_size"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Author Text Font Weight", 'bridge-core' ),
					"param_name" => "author_text_font_weight",
					"value" => array_flip(bridge_qode_get_font_weight_array(true))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Author Text Color", 'bridge-core' ),
					"param_name" => "author_text_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Author Text Font Size (px)", 'bridge-core' ),
					"param_name" => "author_text_font_size",
					"description" => esc_html__( "Enter just number. Omit px", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show navigation", 'bridge-core' ),
					"param_name" => "show_navigation",
					"value" => array(
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Navigation Style", 'bridge-core' ),
					"param_name" => "navigation_style",
					"value" => array(
						esc_html__( 'Dark', 'bridge-core' ) => "dark",
						esc_html__( 'Light', 'bridge-core' ) => "light"
					),
					'save_always' => true,
					"dependency" => array("element" => "show_navigation", "value" => array("yes"))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Slideshow Interval (sec)", 'bridge-core' ),
					"param_name" => "auto_rotate_slides",
					"value" => array(
						"3"         => "3",
						"5"         => "5",
						"10"        => "10",
						"15"        => "15",
						"Disable"   => "0"
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Animation speed", 'bridge-core' ),
					"param_name" => "animation_speed",
					"value" => "",
					"description" => esc_html__("Speed of slide animation in milliseconds", "bridge-core")
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_testimonials_carousel_vc_map');
}