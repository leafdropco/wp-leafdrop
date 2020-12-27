<?php
if (!function_exists('bridge_core_masonry_gallery_vc_map')) {

	function bridge_core_masonry_gallery_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Masonry Gallery", 'bridge-core' ),
			"base" => "qode_masonry_gallery",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-masonry_gallery",
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
					"type" => "textfield",
					"heading" => esc_html__( "Number", 'bridge-core' ),
					"param_name" => "number",
					"value" => "",
					"description" => esc_html__( "Number of Masonry Gallery Items", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						esc_html__('DESC', 'bridge-core') => "DESC",
						esc_html__('ASC', 'bridge-core') => "ASC"
					),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Parallax Item Speed", 'bridge-core' ),
					"param_name" => "parallax_item_speed",
					"value" => "",
					"description" => esc_html__( 'This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0.3', 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Parallax Item Offset", 'bridge-core' ),
					"param_name" => "parallax_item_offset",
					"value" => "",
					"description" => esc_html__('This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0', 'bridge-core' )
				),
			)
		));
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_masonry_gallery_vc_map');
}