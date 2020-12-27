<?php
if (!function_exists('bridge_core_carousel_vc_map')) {

	function bridge_core_carousel_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Qode Carousel", 'bridge-core' ),
			"base" => "qode_carousel",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-qode_carousel",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Carousel Slider", 'bridge-core' ),
					"param_name" => "carousel",
					"value" => bridge_core_get_carousel_slider_array(),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Number Of Visible Items", 'bridge-core' ),
					"param_name" => "number_of_visible_items",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Four', 'bridge-core' ) => "four_items",
						esc_html__( 'Five', 'bridge-core' ) => "five_items",
					),
					'save_always' => true,
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "orderby",
					"value" => array(
						"" => "",
						esc_html__( 'Menu Orderve', 'bridge-core' ) => "menu_order",
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
						esc_html__('ASC', 'bridge-core' ) => "ASC",
						esc_html__('DESC', 'bridge-core' ) => "DESC"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Items In Two Rows?", 'bridge-core' ),
					"param_name" => "show_in_two_rows",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
					)
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_carousel_vc_map');
}