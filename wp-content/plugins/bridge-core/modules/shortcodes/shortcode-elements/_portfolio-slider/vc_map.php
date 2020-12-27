<?php
if (!function_exists('bridge_core_portfolio_slider_vc_map')) {

	function bridge_core_portfolio_slider_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Portfolio Slider", 'bridge-core' ),
			"base" => "portfolio_slider",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-portfolio_slider",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "order_by",
					"value" => array(
						"" => "",
						esc_html__( 'Menu Order', 'bridge-core' ) => "menu_order",
						esc_html__( 'Title', 'bridge-core' ) => "title",
						esc_html__( 'Date', 'bridge-core' ) => "date"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						"" => "",
						esc_html__( 'ASC', 'bridge-core' ) => "ASC",
						esc_html__( 'DESC', 'bridge-core' ) => "DESC",
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number", 'bridge-core' ),
					"param_name" => "number",
					"value" => "-1",
					"description" => esc_html__( "Number of portolios on page (-1 is all)", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category", 'bridge-core' ),
					"param_name" => "category",
					"value" => "",
					"description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Selected Projects", 'bridge-core' ),
					"param_name" => "selected_projects",
					"value" => "",
					"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number of Items Shown", 'bridge-core' ),
					"param_name" => "number_of_items",
					"value" => array(
						"" => "",
						esc_html__( 'Four', 'bridge-core' ) => "4",
						esc_html__( 'Five', 'bridge-core' ) => "5"
					),
					"description" => esc_html__( " Number of items that are showing at the same time in full width (on smaller screens/sizes, due to responsiveness, there will be less items shown)", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Lightbox", 'bridge-core' ),
					"param_name" => "lightbox",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "dropdown",
					"class" => "",
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
					"heading" => esc_html__( "Separator", 'bridge-core' ),
					"param_name" => "separator",
					"value" => array(
						"" => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"

					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Hide "View" Button', 'bridge-core' ),
					"param_name" => "hide_button",
					"value" => array(
						"" => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					)
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Image proportions", 'bridge-core' ),
					"param_name" => "image_size",
					"value" => array(
						esc_html__( 'Original', 'bridge-core' ) => "",
						esc_html__( 'Square (cropped to 570x570)', 'bridge-core' ) => "square",
						esc_html__( 'Landscape (cropped to 800x600)', 'bridge-core' ) => "landscape",
						esc_html__( 'Landscape (cropped to 500x380)', 'bridge-core' ) => "portfolio_slider",
						esc_html__( 'Portrait (cropped to 600x800)', 'bridge-core' ) => "portrait"
					)
				),
				array(
					"type" => "checkbox",
					"heading" => esc_html__( "Prev/Next navigation", 'bridge-core' ),
					"value" => array("Enable prev/next navigation?" => "enable_navigation"),
					"param_name" => "enable_navigation"
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_portfolio_slider_vc_map');
}