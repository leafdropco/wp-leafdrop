<?php

if(!function_exists('bridge_core_video_box_styles')) {

    function bridge_core_video_box_styles() {

		$circle_selector = '.qode_video_box .qode_video_image .qode_video_box_button';
		$circle_hover_selector = '.qode_video_box .qode_video_image:hover .qode_video_box_button';
		$icon_selector = '.qode_video_box .qode_video_image .qode_video_box_button_arrow';
		$icon_hover_selector = '.qode_video_box .qode_video_image:hover .qode_video_box_button_arrow';

        $circle_color = bridge_qode_options()->getOptionValue('video_box_circle_color');
        if(!empty($circle_color)) {
			echo bridge_qode_dynamic_css($circle_selector, array('background-color' => $circle_color));
        }

        $circle_hover_color = bridge_qode_options()->getOptionValue('video_box_circle_hover_color');
        if(!empty($circle_hover_color)) {
			echo bridge_qode_dynamic_css($circle_hover_selector, array('background-color' => $circle_hover_color));
        }

        $icon_color = bridge_qode_options()->getOptionValue('video_box_icon_color');
        if(!empty($icon_color)) {
			echo bridge_qode_dynamic_css($icon_selector, array('border-left-color' => $icon_color));
        }

        $icon_hover_color = bridge_qode_options()->getOptionValue('video_box_icon_hover_color');
        if(!empty($icon_hover_color)) {
			echo bridge_qode_dynamic_css($icon_hover_selector, array('border-left-color' => $icon_hover_color));
        }

        $border_array = array();

        $video_box_border_width = bridge_qode_options()->getOptionValue('video_box_border_width');
        if(!empty($video_box_border_width)){
            $border_array['border-width'] = $video_box_border_width . 'px';
        }

        $video_box_border_color = bridge_qode_options()->getOptionValue('video_box_border_color');
        if(!empty($video_box_border_color)){
            $border_array['border-color'] = $video_box_border_color;
        }

        if(!empty($video_box_border_color) || !empty($video_box_border_width)){
            $border_array['border-style'] = 'solid';
        }

        if(!empty($border_array)){
            echo bridge_qode_dynamic_css($circle_selector, $border_array);
        }

        $video_box_border_hover_color = bridge_qode_options()->getOptionValue('video_box_border_hover_color');
        if(!empty($video_box_border_hover_color)){
            echo bridge_qode_dynamic_css($circle_hover_selector, array('border-color' => $video_box_border_hover_color));
        }

        $size_array = array();

        $video_box_height_width = bridge_qode_options()->getOptionValue('video_box_height_width');
        if(!empty($video_box_height_width)){
            $size_array['height'] = $video_box_height_width . 'px';
            $size_array['width'] = $video_box_height_width . 'px';
        }

        if(!empty($size_array)){
            echo bridge_qode_dynamic_css($circle_selector, $size_array);
        }

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_video_box_styles');
}
