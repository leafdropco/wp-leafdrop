<?php
if (!function_exists('bridge_core_testimonials_masonry_vc_map')) {

	function bridge_core_testimonials_masonry_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Testimonials Masonry", 'bridge-core' ),
			"base" => "testimonials_masonry",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-testimonials-masonry",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category", 'bridge-core' ),
					"param_name" => "category",
					"value" => "",
					"description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' )
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
					"type" => "textfield",
					"heading" => esc_html__( "Block Main Title", 'bridge-core' ),
					"param_name" => "main_title"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Block Main Title Tag", 'bridge-core' ),
					"param_name" => "main_title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"dependency" => array('element' => "main_title", 'not_empty' => true)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Block Main Title Size (px)", 'bridge-core' ),
					"param_name" => "main_title_size",
					"dependency" => array('element' => "main_title", 'not_empty' => true)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Block Main Description", 'bridge-core' ),
					"param_name" => "description"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Block Main Button Text", 'bridge-core' ),
					"param_name" => "button_text"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button Background Color", 'bridge-core' ),
					"param_name" => "button_bckg_color",
					"value" => "",
					"dependency" => array('element' => "button_text", 'not_empty' => true)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Link", 'bridge-core' ),
					"param_name" => "button_link",
					"value" => "",
					"dependency" => array('element' => "button_text", 'not_empty' => true)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Link Target", 'bridge-core' ),
					"param_name" => "link_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					),
					"dependency" => array('element' => "button_link", 'not_empty' => true)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Author Image", 'bridge-core' ),
					"param_name" => "author_image",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
					)
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
					"type" => "textfield",
					"heading" => esc_html__( "Title Size (px)", 'bridge-core' ),
					"param_name" => "title_size"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Testimonial Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Author Size (px)", 'bridge-core' ),
					"param_name" => "author_size"
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_testimonials_masonry_vc_map');
}