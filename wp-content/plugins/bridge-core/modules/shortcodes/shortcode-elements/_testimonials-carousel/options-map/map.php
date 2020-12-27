<?php

if(!function_exists('bridge_core_testimonial_carousel_map')) {
    function bridge_core_testimonial_carousel_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Testimonial Carousel', 'bridge-core'),
            'name'  => 'panel_testimonial_carousel',
            'page'  => 'elementsPage'
        ));


        $style_group = bridge_qode_add_admin_group(array(
            'name'			=> 'style_group',
            'title'			=> esc_html__('Testimonials Carousel Style', 'bridge-core'),
            'description'	=> esc_html__('Define Testimonials Carousel style', 'bridge-core'),
            'parent'		=> $panel
        ));

        $style_row = bridge_qode_add_admin_row(array(
            'name' => 'style_row',
            'next' => true,
            'parent' => $style_group
        ));

		bridge_qode_add_admin_field(array(
			'parent'        => $style_row,
			'type'          => 'textsimple',
			'name'          => 'testimonial_carousel_border_radius',
			'default_value' => '',
			'label'         => esc_html__('Navigation Border radius (px)', 'bridge-core'),
			'description'   => ''
		));

		$background_group = bridge_qode_add_admin_group(array(
            'name'			=> 'background_group',
            'title'			=> esc_html__('Testimonials Carousel Background Color', 'bridge-core'),
            'description'	=> esc_html__('Set up Testimonials Carousel background color', 'bridge-core'),
            'parent'		=> $panel
        ));

        $background_row = bridge_qode_add_admin_row(array(
            'name' => 'background_row',
            'next' => true,
            'parent' => $background_group
        ));

        bridge_qode_add_admin_field(array(
			'parent'        => $background_row,
			'type'          => 'colorsimple',
			'name'          => 'testimonial_carousel_background_color',
			'label'         => esc_html__('Choose Background Color', 'bridge-core'),
			'description'   => ''
		));

        $text_group = bridge_qode_add_admin_group(array(
            'name'			=> 'text_group',
            'title'			=> esc_html__('Testimonials Carousel Text Style', 'bridge-core'),
            'description'	=> esc_html__('Define Testimonials Carousel text style', 'bridge-core'),
            'parent'		=> $panel
        ));

        $text_row_1 = bridge_qode_add_admin_row(array(
            'name' => 'text_row_1',
            'next' => true,
            'parent' => $text_group
        ));

        bridge_qode_add_admin_field(array(
			'parent'        => $text_row_1,
			'type'          => 'colorsimple',
			'name'          => 'tc_text_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_1,
			'type'          => 'textsimple',
			'name'          => 'tc_text_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_1,
			'type'          => 'textsimple',
			'name'          => 'tc_text_line_height',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_1,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_text_transform',
			'options'		=> bridge_qode_get_text_transform_array(),
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'bridge-core')
		));

		$text_row_2 = bridge_qode_add_admin_row(array(
            'name' => 'text_row_2',
            'next' => true,
            'parent' => $text_group
        ));

        bridge_qode_add_admin_field(array(
			'parent'        => $text_row_2,
			'type'          => 'fontsimple',
			'name'          => 'tc_text_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_2,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_text_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_2,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_text_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $text_row_2,
			'type'          => 'textsimple',
			'name'          => 'tc_text_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));

		$author_group = bridge_qode_add_admin_group(array(
            'name'			=> 'author_group',
            'title'			=> esc_html__('Testimonials Carousel Author Style', 'bridge-core'),
            'description'	=> esc_html__('Define Testimonials Carousel author style', 'bridge-core'),
            'parent'		=> $panel
        ));

        $author_row_1 = bridge_qode_add_admin_row(array(
            'name' => 'author_row_1',
            'next' => true,
            'parent' => $author_group
        ));

        bridge_qode_add_admin_field(array(
			'parent'        => $author_row_1,
			'type'          => 'colorsimple',
			'name'          => 'tc_author_color',
			'default_value' => '',
			'label'         => esc_html__('Text Color', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_1,
			'type'          => 'textsimple',
			'name'          => 'tc_author_font_size',
			'default_value' => '',
			'label'         => esc_html__('Font Size', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_1,
			'type'          => 'textsimple',
			'name'          => 'tc_author_line_height',
			'default_value' => '',
			'label'         => esc_html__('Line Height', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_1,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_author_transform',
			'options'		=> bridge_qode_get_text_transform_array(),
			'default_value' => '',
			'label'         => esc_html__('Text Transform', 'bridge-core')
		));

		$author_row_2 = bridge_qode_add_admin_row(array(
            'name' => 'text_row_2',
            'next' => true,
            'parent' => $author_group
        ));

        bridge_qode_add_admin_field(array(
			'parent'        => $author_row_2,
			'type'          => 'fontsimple',
			'name'          => 'tc_author_font_family',
			'default_value' => '',
			'label'         => esc_html__('Font Family', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_2,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_author_font_style',
			'options'		=> bridge_qode_get_font_style_array(),
			'default_value' => '',
			'label'         => esc_html__('Font Style', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_2,
			'type'          => 'selectblanksimple',
			'name'          => 'tc_author_font_weight',
			'default_value' => '',
			'options'		=> bridge_qode_get_font_weight_array(),
			'label'         => esc_html__('Font Weight', 'bridge-core')
		));
		bridge_qode_add_admin_field(array(
			'parent'        => $author_row_2,
			'type'          => 'textsimple',
			'name'          => 'tc_author_letter_spacing',
			'default_value' => '',
			'label'         => esc_html__('Letter Spacing', 'bridge-core')
		));
		
	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_testimonial_carousel_map');
}