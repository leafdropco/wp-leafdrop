<?php

if(!function_exists('bridge_core_button_v2_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function bridge_core_button_v2_typography_styles() {
        $selector = '.qode-btn';
        $styles = array();

		$font_size = bridge_qode_options()->getOptionValue('button_v2_font_size');
		if(bridge_qode_is_font_option_valid($font_size)) {
			$styles['font-size'] = bridge_qode_get_font_option_val($font_size).'px';
		}

		$line_height = bridge_qode_options()->getOptionValue('button_v2_line_height');
		if(bridge_qode_is_font_option_valid($line_height)) {
			$styles['line-height'] = bridge_qode_get_font_option_val($line_height).'px';
		}

        $font_family = bridge_qode_options()->getOptionValue('button_v2_font_family');
        if(bridge_qode_is_font_option_valid($font_family)) {
            $styles['font-family'] = bridge_qode_get_font_option_val($font_family);
        }

        $text_transform = bridge_qode_options()->getOptionValue('button_v2_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = bridge_qode_options()->getOptionValue('button_v2_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = bridge_qode_options()->getOptionValue('button_v2_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = bridge_qode_filter_px($letter_spacing).'px';
        }

        $font_weight = bridge_qode_options()->getOptionValue('button_v2_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        $border_radius = bridge_qode_options()->getOptionValue('button_v2_border_radius');
        if($border_radius !== '') {
            $styles['border-radius'] = bridge_qode_filter_px($border_radius).'px';
        }

		$padding = bridge_qode_options()->getOptionValue('button_v2_padding');
		if($padding !== '') {
			$styles['padding'] = $padding;
		}
        

        echo bridge_qode_dynamic_css($selector, $styles);
    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_button_v2_typography_styles');
}

if(!function_exists('bridge_core_button_v2_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function bridge_core_button_v2_solid_styles() {
        //solid styles
        $solid_selector = '.qode-btn.qode-btn-solid';
        $solid_icon_selector = '.qode-btn.qode-btn-solid .qode-button-v2-icon-holder';
        $solid_styles = array();
        $solid_icon_styles = array();

        if(bridge_qode_options()->getOptionValue('btn_v2_solid_text_color')) {
            $solid_styles['color'] = bridge_qode_options()->getOptionValue('btn_v2_solid_text_color');
        }

        if(bridge_qode_options()->getOptionValue('btn_v2_solid_border_color')) {
            $solid_styles['border-color'] = bridge_qode_options()->getOptionValue('btn_v2_solid_border_color');
        }

        if(bridge_qode_options()->getOptionValue('btn_v2_solid_bg_color')) {
            $solid_styles['background-color'] = bridge_qode_options()->getOptionValue('btn_v2_solid_bg_color');
        }

		if(bridge_qode_options()->getOptionValue('btn_v2_solid_icon_border_color')) {
			$solid_icon_styles['border-color'] = bridge_qode_options()->getOptionValue('btn_v2_solid_icon_border_color');
		}

		if(bridge_qode_options()->getOptionValue('btn_v2_solid_icon_bg_color')) {
			$solid_icon_styles['background-color'] = bridge_qode_options()->getOptionValue('btn_v2_solid_icon_bg_color');
		}

        echo bridge_qode_dynamic_css($solid_selector, $solid_styles);
        echo bridge_qode_dynamic_css($solid_icon_selector, $solid_icon_styles);

        //solid hover styles
        if(bridge_qode_options()->getOptionValue('btn_v2_solid_hover_text_color')) {
            echo bridge_qode_dynamic_css(
                '.qode-btn.qode-btn-solid:not(.qode-btn-custom-hover-color):hover',
                array('color' => bridge_qode_options()->getOptionValue('btn_v2_solid_hover_text_color').'!important')
            );
        }

        if(bridge_qode_options()->getOptionValue('btn_v2_solid_hover_bg_color')) {
            echo bridge_qode_dynamic_css(
                '.qode-btn.qode-btn-solid:not(.qode-btn-custom-hover-bg):hover',
                array('background-color' => bridge_qode_options()->getOptionValue('btn_v2_solid_hover_bg_color').'!important')
            );
        }

		if(bridge_qode_options()->getOptionValue('btn_v2_solid_icon_border_hover_color')) {
            echo bridge_qode_dynamic_css(
                '.qode-btn.qode-btn-solid:hover .qode-button-v2-icon-holder',
                array('border-color' => bridge_qode_options()->getOptionValue('btn_v2_solid_icon_border_hover_color'))
            );
        }

		if(bridge_qode_options()->getOptionValue('btn_v2_solid_icon_bg_hover_color')) {
            echo bridge_qode_dynamic_css(
                '.qode-btn.qode-btn-solid:not(.qode-btn-custom-icon-bg-hover-color):hover .qode-button-v2-icon-holder',
                array('background-color' => bridge_qode_options()->getOptionValue('btn_v2_solid_icon_bg_hover_color').'!important')
            );
        }

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_button_v2_solid_styles');
}