<?php

if(!function_exists('bridge_core_video_box_map')) {
    function bridge_core_video_box_map() {

		$panel = bridge_qode_add_admin_panel(array(
            'title' => esc_html__('Video Box', 'bridge-core'),
            'name'  => 'panel_video_box',
            'page'  => 'elementsPage'
        ));


        $color_group = bridge_qode_add_admin_group(array(
            'name'			=> 'color_group',
            'title'			=> esc_html__('Play Button Color Options', 'bridge-core'),
            'description'	=> esc_html__('Setup colors for play button', 'bridge-core'),
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
			'name'          => 'video_box_circle_color',
			'default_value' => '',
			'label'         => esc_html__('Circle Color', 'bridge-core'),
			'description'   => ''
		));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'video_box_circle_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Circle Hover Color', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'video_box_icon_color',
            'default_value' => '',
            'label'         => esc_html__('Icon Color', 'bridge-core')
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $color_row,
            'type'          => 'colorsimple',
            'name'          => 'video_box_icon_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Icon Hover Color', 'bridge-core')
        ));

        $border_group = bridge_qode_add_admin_group(array(
            'name'          => 'border_group',
            'title'         => esc_html__('Play Button Border Options', 'bridge-core'),
            'description'   => esc_html__('Setup settings for play button border', 'bridge-core'),
            'parent'        => $panel
        ));

        $border_row = bridge_qode_add_admin_row(array(
            'name' => 'border_row',
            'next' => true,
            'parent' => $border_group
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $border_row,
            'type'          => 'textsimple',
            'name'          => 'video_box_border_width',
            'default_value' => '',
            'label'         => esc_html__('Border Width', 'bridge-core'),
            'description'   => ''
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $border_row,
            'type'          => 'colorsimple',
            'name'          => 'video_box_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Initial Color', 'bridge-core'),
            'description'   => ''
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $border_row,
            'type'          => 'colorsimple',
            'name'          => 'video_box_border_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Border Hover Color', 'bridge-core'),
            'description'   => ''
        ));

        $size_group = bridge_qode_add_admin_group(array(
            'name'          => 'size_group',
            'title'         => esc_html__('Play Button Size Options', 'bridge-core'),
            'description'   => esc_html__('Setup size for play button border', 'bridge-core'),
            'parent'        => $panel
        ));

        $size_row = bridge_qode_add_admin_row(array(
            'name' => 'size_row',
            'next' => true,
            'parent' => $size_group
        ));

        bridge_qode_add_admin_field(array(
            'parent'        => $size_row,
            'type'          => 'textsimple',
            'name'          => 'video_box_height_width',
            'default_value' => '',
            'label'         => esc_html__('Play Button Height/Width', 'bridge-core'),
            'description'   => ''
        ));
	}

    add_action('bridge_qode_action_options_elements_page_map', 'bridge_core_video_box_map');
}