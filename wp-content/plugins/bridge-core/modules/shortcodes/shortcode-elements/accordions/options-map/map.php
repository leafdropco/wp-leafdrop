<?php 
if(!function_exists('bridge_core_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function bridge_core_accordions_map() {
		
       $panel = bridge_qode_add_admin_panel(array(
           'title' => esc_html__('Accordions', 'bridge-core'),
           'name'  => 'panel_accordions',
           'page'  => 'elementsPage'
       ));

       //Typography options
       bridge_qode_add_admin_section_title(array(
			'name' => 'typography_section_title',
			'title' => esc_html__('Typography', 'bridge-core'),
			'parent' => $panel
       ));

		$typography_group = bridge_qode_add_admin_group(array(
			'name' => 'typography_group',
			'title' => esc_html__('Typography', 'bridge-core'),
			'description' => esc_html__('Setup typography for accordions navigation', 'bridge-core'),
			'parent' => $panel
		));

       $typography_row = bridge_qode_add_admin_row(array(
           'name' => 'typography_row',
           'next' => true,
           'parent' => $typography_group
       ));

       bridge_qode_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'fontsimple',
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html__('Font Family', 'bridge-core'),
       ));

       bridge_qode_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html__('Text Transform', 'bridge-core'),
           'options'       => bridge_qode_get_text_transform_array()
       ));

       bridge_qode_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html__('Font Style', 'bridge-core'),
           'options'       => bridge_qode_get_font_style_array()
       ));

       bridge_qode_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         => esc_html__('Letter Spacing', 'bridge-core'),
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
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html__('Font Weight', 'bridge-core'),
           'options'       => bridge_qode_get_font_weight_array(true)
       ));
		
		//Initial Accordion Color Styles
		
		bridge_qode_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' => esc_html__('Accordions Color Styles', 'bridge-core'),
           'parent' => $panel
       ));
		
		$accordions_color_group = bridge_qode_add_admin_group(array(
			'name' => 'accordions_color_group',
			'title' => esc_html__('Accordion Color Styles', 'bridge-core'),
			'description' => esc_html__('Set color styles for accordion title', 'bridge-core'),
			'parent' => $panel
       ));

		$accordions_color_row = bridge_qode_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		bridge_qode_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color', 'bridge-core')
       ));

		bridge_qode_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color',
           'default_value' => '',
           'label'         => esc_html__('Background Color', 'bridge-core')
       ));
		
		$active_accordions_color_group = bridge_qode_add_admin_group(array(
			'name' => 'active_accordions_color_group',
			'title' => esc_html__('Active and Hover Accordion Color Styles', 'bridge-core'),
			'description' => esc_html__('Set color styles for active and hover accordions', 'bridge-core'),
			'parent' => $panel
       ));
		$active_accordions_color_row = bridge_qode_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		bridge_qode_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html__('Title/Icon Color', 'bridge-core')
       ));

		bridge_qode_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_back_color_active',
           'default_value' => '',
           'label'         => esc_html__('Background Color', 'bridge-core')
       ));
       
   }
   add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_accordions_map');
}