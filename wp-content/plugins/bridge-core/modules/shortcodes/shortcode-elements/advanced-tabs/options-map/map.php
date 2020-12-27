<?php

if(!function_exists('bridge_core_advanced_tabs_map')) {
    function bridge_core_advanced_tabs_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Advanced Tabs', 'bridge-core'),
            'name'  => 'panel_advanced_tabs',
            'page'  => 'elementsPage'
        ));


        $color_group = bridge_qode_add_admin_group(array(
            'name'			=> 'color_group',
            'title'			=> esc_html__('Title Color Options', 'bridge-core'),
            'description'	=> esc_html__('Setup colors for advanced tabs title', 'bridge-core'),
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
			'name'          => 'advanced_tabs_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'advanced_tabs_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'advanced_tabs_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Active Color', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'advanced_tabs_hover_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Background Active Color', 'bridge-core')
        ));

	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_advanced_tabs_map');
}