<?php

if(!function_exists('bridge_core_advanced_numbered_process_map')) {
    function bridge_core_advanced_numbered_process_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Numbered Process', 'bridge-core'),
            'name'  => 'panel_numbered_process',
            'page'  => 'elementsPage'
        ));


        $line_group = bridge_qode_add_admin_group(array(
            'name'			=> 'line_group',
            'title'			=> esc_html__('Line Options', 'bridge-core'),
            'description'	=> esc_html__('Setup options for line in numbered process', 'bridge-core'),
            'parent'		=> $panel
        ));

        $line_row = bridge_qode_add_admin_row(array(
            'name' => 'line_row',
            'next' => true,
            'parent' => $line_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $line_row,
			'type'          => 'colorsimple',
			'name'          => 'numbered_process_border_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $line_row,
            'type'          => 'textsimple',
            'name'          => 'numbered_process_border_width',
            'default_value' => '',
            'label'         => esc_html__('Thickness (px)', 'bridge-core')
        ));

        $number_group = bridge_qode_add_admin_group(array(
            'name'			=> 'number_group',
            'title'			=> esc_html__('Number Options', 'bridge-core'),
            'description'	=> esc_html__('Setup options for number in numbered process', 'bridge-core'),
            'parent'		=> $panel
        ));

        $number_row = bridge_qode_add_admin_row(array(
            'name' => 'number_row',
            'next' => true,
            'parent' => $number_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $number_row,
			'type'          => 'colorsimple',
			'name'          => 'numbered_process_number_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $number_row,
            'type'          => 'textsimple',
            'name'          => 'numbered_process_number_font_size',
            'default_value' => '',
            'label'         => esc_html__('Font Size (px)', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $number_row,
            'type'          => 'colorsimple',
            'name'          => 'numbered_process_number_background_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'bridge-core')
        ));

        $item_border_group = bridge_qode_add_admin_group(array(
            'name'			=> 'item_border_group',
            'title'			=> esc_html__('Process Item Border Options', 'bridge-core'),
            'description'	=> esc_html__('Setup options for process item border', 'bridge-core'),
            'parent'		=> $panel
        ));

        $item_border_row = bridge_qode_add_admin_row(array(
            'name' => 'item_border_row',
            'next' => true,
            'parent' => $item_border_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $item_border_row,
			'type'          => 'colorsimple',
			'name'          => 'numbered_process_item_border_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $item_border_row,
            'type'          => 'textsimple',
            'name'          => 'numbered_process_item_border_width',
            'default_value' => '',
            'label'         => esc_html__('Width (px)', 'bridge-core')
        ));

	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_advanced_numbered_process_map');
}