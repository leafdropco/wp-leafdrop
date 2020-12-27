<?php

if(!function_exists('bridge_core_advanced_pricing_table_map')) {
    function bridge_core_advanced_pricing_table_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Advanced Pricing Table', 'bridge-core'),
            'name'  => 'panel_advanced_pricing_table',
            'page'  => 'elementsPage'
        ));


        $color_group = bridge_qode_add_admin_group(array(
            'name'			=> 'color_group',
            'title'			=> esc_html__('Color Options', 'bridge-core'),
            'description'	=> esc_html__('Setup colors for advanced pricing table', 'bridge-core'),
            'parent'		=> $panel
        ));

        $color_row = bridge_qode_add_admin_row(array(
            'name' => 'color_row',
            'next' => true,
            'parent' => $color_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'advanced_pricing_table_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'advanced_pricing_table_odd_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Odd Rows Background Color', 'bridge-core')
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'advanced_pricing_table_even_bckg_color',
			'default_value' => '',
			'label'         => esc_html__('Even Rows Background Color', 'bridge-core')
		));

	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_advanced_pricing_table_map');
}