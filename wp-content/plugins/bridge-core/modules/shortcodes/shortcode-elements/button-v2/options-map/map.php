<?php

if(!function_exists('bridge_core_button_v2_map')) {
    function bridge_core_button_v2_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => 'Button V2',
            'name'  => 'panel_button_v2',
            'page'  => 'elementsPage'
        ));

        //Typography options
        bridge_qode_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => 'Typography',
            'parent' => $panel
        ));

        $typography_group = bridge_qode_add_admin_group(array(
            'name' => 'typography_group',
            'title' => 'Typography',
            'description' => 'Setup typography for all button types',
            'parent' => $panel
        ));

        $typography_row = bridge_qode_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'button_v2_font_size',
			'default_value' => '',
			'label'         => 'Font Size (px)'
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'button_v2_line_height',
			'default_value' => '',
			'label'         => 'Line Height (px)'
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row,
			'type'          => 'textsimple',
			'name'          => 'button_v2_letter_spacing',
			'default_value' => '',
			'label'         => 'Letter Spacing (px)',
			'args'          => array(
				'suffix' => 'px'
			)
		));


        $typography_row2 = bridge_qode_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row2,
			'type'          => 'fontsimple',
			'name'          => 'button_v2_font_family',
			'default_value' => '',
			'label'         => 'Font Family',
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'button_v2_text_transform',
			'default_value' => '',
			'label'         => 'Text Transform',
			'options'       => bridge_qode_get_text_transform_array()
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row2,
			'type'          => 'selectsimple',
			'name'          => 'button_v2_font_style',
			'default_value' => '',
			'label'         => 'Font Style',
			'options'       => bridge_qode_get_font_style_array()
		));

		$typography_row3 = bridge_qode_add_admin_row(array(
			'name' => 'typography_row3',
			'next' => true,
			'parent' => $typography_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row3,
			'type'          => 'selectsimple',
			'name'          => 'button_v2_font_weight',
			'default_value' => '',
			'label'         => 'Font Weight',
			'options'       => bridge_qode_get_font_weight_array(true)
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row3,
			'type'          => 'textsimple',
			'name'          => 'button_v2_border_radius',
			'default_value' => '',
			'label'         => 'Border Radius'
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $typography_row3,
			'type'          => 'textsimple',
			'name'          => 'button_v2_padding',
			'default_value' => '',
			'label'         => 'Padding (ex. 10px 10px 10px 10px)'
		));


        //Solid type options
        $solid_group = bridge_qode_add_admin_group(array(
            'name' => 'solid_group',
            'title' => 'Solid Type',
            'description' => 'Setup solid button type',
            'parent' => $panel
        ));

        $solid_row = bridge_qode_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_text_color',
            'default_value' => '',
            'label'         => 'Text Color',
            'description'   => ''
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_hover_text_color',
            'default_value' => '',
            'label'         => 'Text Hover Color',
            'description'   => ''
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_bg_color',
            'default_value' => '',
            'label'         => 'Background Color',
            'description'   => ''
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_v2_solid_hover_bg_color',
            'default_value' => '',
            'label'         => 'Hover Background Color',
            'description'   => ''
        ));

		$solid_row2 = bridge_qode_add_admin_row(array(
			'name' => 'solid_row2',
			'next' => true,
			'parent' => $solid_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_border_color',
			'default_value' => '',
			'label'         => 'Icon Left Border Color',
			'description'   => ''
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_border_hover_color',
			'default_value' => '',
			'label'         => 'Icon Left Border Hover Color',
			'description'   => ''
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_bg_color',
			'default_value' => '',
			'label'         => 'Icon Background Color',
			'description'   => ''
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $solid_row2,
			'type'          => 'colorsimple',
			'name'          => 'btn_v2_solid_icon_bg_hover_color',
			'default_value' => '',
			'label'         => 'Icon Background Hover Color',
			'description'   => ''
		));
    }

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_button_v2_map', 1);
}