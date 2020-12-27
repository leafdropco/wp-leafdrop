<?php

if(!function_exists('bridge_core_report_sheet_map')) {
    function bridge_core_report_sheet_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Report Sheet', 'bridge-core'),
            'name'  => 'panel_report_sheet',
            'page'  => 'elementsPage'
        ));


        $color_group = bridge_qode_add_admin_group(array(
            'name'			=> 'color_group',
            'title'			=> esc_html__('Color Options', 'bridge-core'),
            'description'	=> esc_html__('Setup colors for report sheet', 'bridge-core'),
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
			'name'          => 'report_sheet_border_color',
			'default_value' => '',
			'label'         => esc_html__('Border Color', 'bridge-core'),
			'description'   => ''
		));

		bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'rs_header_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Header Background Color', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'rs_odd_bckg_color',
            'default_value' => '',
            'label'         => esc_html__('Odd Rows Background Color', 'bridge-core')
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $color_row,
			'type'          => 'colorsimple',
			'name'          => 'rs_even_bckg_color',
			'default_value' => '',
			'label'         => esc_html__('Even Rows Background Color', 'bridge-core')
		));

		$rs_button_group = bridge_qode_add_admin_group(array(
			'name'			=> 'rs_button_group',
			'title'			=> esc_html__('Button Options', 'bridge-core'),
			'description'	=> esc_html__('Setup button options for report sheet', 'bridge-core'),
			'parent'		=> $panel
		));

		$rs_button_row = bridge_qode_add_admin_row(array(
			'name' => 'rs_button_row',
			'next' => true,
			'parent' => $rs_button_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row,
			'type'          => 'fontsimple',
			'name'          => 'rs_btn_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row,
			'type'          => 'textsimple',
			'name'          => 'report_sheet_btn_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row,
			'type'          => 'selectblanksimple',
			'name'          => 'rs_btn_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row,
			'type'          => 'selectblanksimple',
			'name'          => 'rs_btn_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		$rs_button_row2 = bridge_qode_add_admin_row(array(
			'name' => 'rs_button_row2',
			'next' => true,
			'parent' => $rs_button_group
		));


		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row2,
			'type'          => 'selectblanksimple',
			'name'          => 'rs_btn_text_transform',
			'options'		=> bridge_qode_get_text_transform_array(),
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row2,
			'type'          => 'textsimple',
			'name'          => 'rs_table_btn_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row2,
			'type'          => 'colorsimple',
			'name'          => 'rs_btn_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $rs_button_row2,
			'type'          => 'colorsimple',
			'name'          => 'rs_btn_hover_color',
			'default_value' => '',
			'label'         => esc_html__('Hover Color', 'bridge-core')
		));
	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_report_sheet_map');
}