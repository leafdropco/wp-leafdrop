<?php

if(!function_exists('bridge_core_simple_quote_map')) {
    function bridge_core_simple_quote_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Simple Quote', 'bridge-core'),
            'name'  => 'panel_simple_quote',
            'page'  => 'elementsPage'
        ));


        $text_group = bridge_qode_add_admin_group(array(
            'name'			=> 'text_group',
            'title'			=> esc_html__('Simple Quote Text', 'bridge-core'),
            'description'	=> esc_html__('Setup font options for simple quote text', 'bridge-core'),
            'parent'		=> $panel
        ));

        $text_row = bridge_qode_add_admin_row(array(
            'name' => 'text_row',
            'next' => true,
            'parent' => $text_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $text_row,
			'type'          => 'fontsimple',
			'name'          => 'sq_text_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row,
			'type'          => 'textsimple',
			'name'          => 'sq_text_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_text_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row,
			'type'          => 'textsimple',
			'name'          => 'sq_text_line_height',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'bridge-core')
		));
		

		$text_row2 = bridge_qode_add_admin_row(array(
			'name' => 'text_row2',
			'next' => true,
			'parent' => $text_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $text_row2,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_text_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row2,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_text_text_transform',
			'options'		=> bridge_qode_get_text_transform_array(),
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row2,
			'type'          => 'textsimple',
			'name'          => 'sq_text_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row2,
			'type'          => 'colorsimple',
			'name'          => 'sq_text_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core')
		));



		$author_group = bridge_qode_add_admin_group(array(
            'name'			=> 'author_group',
            'title'			=> esc_html__('Simple Quote Author', 'bridge-core'),
            'description'	=> esc_html__('Setup font options for simple quote author', 'bridge-core'),
            'parent'		=> $panel
        ));

        $author_row = bridge_qode_add_admin_row(array(
            'name' => 'author_row',
            'next' => true,
            'parent' => $author_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $author_row,
			'type'          => 'fontsimple',
			'name'          => 'sq_author_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row,
			'type'          => 'textsimple',
			'name'          => 'sq_author_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_author_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row,
			'type'          => 'textsimple',
			'name'          => 'sq_author_line_height',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'bridge-core')
		));
		

		$author_row2 = bridge_qode_add_admin_row(array(
			'name' => 'author_row2',
			'next' => true,
			'parent' => $author_group
		));

		bridge_qode_add_admin_field(array(
			'parent'        => $author_row2,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_author_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row2,
			'type'          => 'selectblanksimple',
			'name'          => 'sq_author_text_transform',
			'options'		=> bridge_qode_get_text_transform_array(),
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row2,
			'type'          => 'textsimple',
			'name'          => 'sq_author_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row2,
			'type'          => 'colorsimple',
			'name'          => 'sq_author_color',
			'default_value' => '',
			'label'         => esc_html__('Color', 'bridge-core')
		));
	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_simple_quote_map');
}