<?php

if(!function_exists('bridge_core_pricing_calculator_map')) {
    function bridge_core_pricing_calculator_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Pricing Calculator', 'bridge-core'),
            'name'  => 'panel_pricing_calculator',
            'page'  => 'elementsPage'
        ));


        $color_group = bridge_qode_add_admin_group(array(
            'name' => 'color_group',
            'title' => esc_html__('Color Options', 'bridge-core'),
            'description' => esc_html__('Setup colors for pricing calculator', 'bridge-core'),
            'parent' => $panel
        ));

        $color_row = bridge_qode_add_admin_row(array(
            'name' => 'color_row',
            'next' => true,
            'parent' => $color_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'pricing_calculator_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'pricing_calculator_left_section_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Left Section Background Color', 'bridge-core')
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'pricing_calculator_right_section_bckg_color',
			'default_value' => '',
			'label'         => esc_html__('Right Section Background Color', 'bridge-core')
		));

        $color_row2 = bridge_qode_add_admin_row(array(
            'name' => 'color_row2',
            'next' => true,
            'parent' => $color_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row2,
			'type'          => 'colorsimple',
			'name'          => 'pricing_calculator_switch_color',
			'default_value' => '',
			'label'         => esc_html__('Switch Color', 'bridge-core'),
			'description'   => ''
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row2,
			'type'          => 'colorsimple',
			'name'          => 'pricing_calculator_switch_active_color',
			'default_value' => '',
			'label'         => esc_html__('Switch Active Color', 'bridge-core'),
			'description'   => ''
		));

		$pc_price_group = bridge_qode_add_admin_group(array(
			'name'			=> 'pc_price_group',
			'title'			=> esc_html__('Price Options', 'bridge-core'),
			'description'	=> esc_html__('Setup price options for pricing calculator', 'bridge-core'),
			'parent'		=> $panel
		));

		$pc_price_row = bridge_qode_add_admin_row(array(
			'name' => 'pc_price_row',
			'next' => true,
			'parent' => $pc_price_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row,
			'type'          => 'fontsimple',
			'name'          => 'pricing_calculator_price_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row,
			'type'          => 'textsimple',
			'name'          => 'pricing_calculator_price_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row,
			'type'          => 'selectblanksimple',
			'name'          => 'pricing_calculator_price_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row,
			'type'          => 'selectblanksimple',
			'name'          => 'pricing_calculator_price_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		$pc_price_row2 = bridge_qode_add_admin_row(array(
			'name' => 'pc_price_row2',
			'next' => true,
			'parent' => $pc_price_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row2,
			'type'          => 'textsimple',
			'name'          => 'pricing_calculator_price_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $pc_price_row2,
			'type'          => 'colorsimple',
			'name'          => 'pricing_calculator_price_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core')
		));


    }

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_pricing_calculator_map');
}