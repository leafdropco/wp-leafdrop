<?php
if (!function_exists('bridge_core_product_list_elegant_vc_map')) {

	function bridge_core_product_list_elegant_vc_map(){

        if(function_exists("is_woocommerce")) {

			/*** Product List - Elegant ***/
			vc_map(
				array(
					"name" => esc_html__( "Product List - Elegant", 'bridge-core' ),
					"base" => "product_list_elegant",
					"icon" => "extended-custom-icon-qode icon-wpb-product_list_elegant",
					"category" => esc_html__( 'by QODE', 'bridge-core' ),
					"allowed_container_element" => 'vc_row',
					"params" => array(
						array(
							"type" => "textfield",
							"heading" => esc_html__( "Per Page", 'bridge-core' ),
							"param_name" => "per_page",
							"value" => "12",
							'admin_label' => true,
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Columns", 'bridge-core' ),
							"param_name" => "columns",
							"value" => array(
								esc_html__( 'Two', 'bridge-core' ) => "two_columns",
								esc_html__( 'Three', 'bridge-core' ) => "three_columns",
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__( "Category Slug", 'bridge-core' ),
							"param_name" => "category",
							'admin_label' => true,
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Order By", 'bridge-core' ),
							"param_name" => "order_by",
							"value" => array(
								esc_html__( 'Date', 'bridge-core' ) => "date",
								esc_html__( 'Title', 'bridge-core' ) => "title",
								esc_html__( 'Menu Order', 'bridge-core' ) => "menu_order"
							),
							'save_always' => true,
							'admin_label' => true
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
							'admin_label' => true
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Product Title Tag", 'bridge-core' ),
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
							"heading" => esc_html__( "Holder Padding (top right bottom left)", 'bridge-core' ),
							"param_name" => "holder_padding",
							'group'       => esc_html__( 'Design Options', 'bridge-core' ),
							"description" => esc_html__( "Our suggestion is to use values with percentage mark because of responsiveness", 'bridge-core' )
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__( "Separator Color", 'bridge-core' ),
							"param_name" => "separator_color",
							'group'       => esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__( "Price Color", 'bridge-core' ),
							"param_name" => "price_color",
							'group'       => esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__( "Price Font Size (px)", 'bridge-core' ),
							"param_name" => "price_font_size",
							'group'       => esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Button Size", 'bridge-core' ),
							"param_name" => "button_size",
							"value" => array(
								esc_html__( 'Default', 'bridge-core' ) => "",
								esc_html__( 'Small', 'bridge-core' ) => "small",
								esc_html__( 'Large', 'bridge-core' ) => "large",
								esc_html__( 'Huge', 'bridge-core' ) => "big_large",
							),
							'save_always' => true,
							'group'       => esc_html__( 'Design Options', 'bridge-core' )
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( "Button Hover Type", 'bridge-core' ),
							"param_name" => "button_hover_type",
							"value" => array(
								esc_html__( 'Default', 'bridge-core' ) => "default",
								esc_html__( 'Enlarge', 'bridge-core' ) => "enlarge",
							),
							'save_always' => true,
							'group'       => esc_html__( 'Design Options', 'bridge-core' )
						),
					)
				)
			);
		}
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_product_list_elegant_vc_map');
}