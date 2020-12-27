<?php
if (!function_exists('bridge_core_product_list_pinterest_vc_map')) {

	function bridge_core_product_list_pinterest_vc_map(){

		if(function_exists('is_woocommerce')) {

			/*** Product List - Pinterest ***/
			vc_map(
				array(
					'name' => esc_html__( 'Product List - Pinterest', 'bridge-core' ),
					'base' => 'product_list_pinterest',
					'icon' => 'extended-custom-icon-qode icon-wpb-product-list-pinterest',
					'category' => esc_html__( 'by QODE', 'bridge-core' ),
					'allowed_container_element' => 'vc_row',
					'params' => array(
						array(
							'type'			=> 'textfield',
							'heading' => esc_html__( 'Per Page', 'bridge-core' ),
							'param_name'	=> 'per_page',
							'admin_label'	=> true,
						),
						array(
							'type'			=> 'dropdown',
							'heading' => esc_html__( 'Columns', 'bridge-core' ),
							'param_name'	=> 'columns',
							'value'			=> array(
								esc_html__( 'Two', 'bridge-core' ) => 'two_columns',
								esc_html__( 'Three', 'bridge-core' ) => 'three_columns',
								esc_html__( 'Four', 'bridge-core' ) => 'four_columns',
							),
							'admin_label'	=> true
						),
						array(
							'type'			=> 'textfield',
							'heading' => esc_html__( 'Category Slug', 'bridge-core' ),
							'param_name'	=> 'category',
							'admin_label'	=> true
						),
						array(
							'type'			=> 'dropdown',
							'heading' => esc_html__( 'Order By', 'bridge-core' ),
							'param_name'	=> 'order_by',
							'value'			=> array(
								esc_html__( 'Date', 'bridge-core' )			=> 'date',
								esc_html__( 'Title', 'bridge-core' )			=> 'title'
							),
							'admin_label'	=> true
						),
						array(
							'type'			=> 'dropdown',
							'heading' => esc_html__( 'Order', 'bridge-core' ),
							'param_name'	=> 'order',
							'value'			=> array(
								esc_html__('ASC', 'bridge-core')	=> 'ASC',
								esc_html__('DESC', 'bridge-core')	=> 'DESC'
							),
							'admin_label'	=> true
						),
						array(
							'type'			=> 'dropdown',
							'heading'		=> esc_html__( 'Product Title Tag', 'bridge-core' ),
							'param_name'	=> 'title_tag',
							'value'			=> array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							)
						),
						array(
							'type'			=> 'colorpicker',
							'heading'		=> esc_html__( 'Hover Background Color', 'bridge-core' ),
							'param_name'	=> 'hover_background_color',
							'group'			=> esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							'type'			=> 'colorpicker',
							'heading'		=> esc_html__( 'Category Color', 'bridge-core' ),
							'param_name'	=> 'category_color',
							'group'			=> esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							'type'			=> 'colorpicker',
							'heading'		=> esc_html__( 'Separator Color', 'bridge-core' ),
							'param_name'	=> 'separator_color',
							'group'			=> esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							'type'			=> 'colorpicker',
							'heading'		=> esc_html__( 'Price Color', 'bridge-core' ),
							'param_name'	=> 'price_color',
							'group'			=> esc_html__( 'Design Options', 'bridge-core' ),
						),
						array(
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Price Font Size (px)', 'bridge-core' ),
							'param_name'	=> 'price_font_size',
							'group'			=> esc_html__( 'Design Options', 'bridge-core' ),
						)
					)
				)
			);
		}
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_product_list_pinterest_vc_map');
}