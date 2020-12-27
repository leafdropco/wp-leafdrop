<?php

if(!function_exists('bridge_core_comparative_features_table_styles')) {

    function bridge_core_comparative_features_table_styles() {

		$border_selector = array(
			'.qode-comparative-features-table',
			'.qode-comparative-features-table .qode-cft-row',
			'.qode-comparative-features-table .qode-cft-row > *'
		);

        $border_color = bridge_qode_options()->getOptionValue('comparative_features_table_border_color');
        if(!empty($border_color)) {
			echo bridge_qode_dynamic_css($border_selector, array('border-color' => $border_color));
        }

		$comparative_features_table_odd_bckg_color = bridge_qode_options()->getOptionValue('comparative_features_table_odd_bckg_color');
		if(!empty($comparative_features_table_odd_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-comparative-features-table .qode-cft-row:nth-child(odd)', array('background-color' => $comparative_features_table_odd_bckg_color));
		}

		$comparative_features_table_even_bckg_color = bridge_qode_options()->getOptionValue('comparative_features_table_even_bckg_color');
		if(!empty($comparative_features_table_even_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-comparative-features-table .qode-cft-row:nth-child(even)', array('background-color' => $comparative_features_table_even_bckg_color));
		}

		$cft_button_style = array();

		$comparative_features_table_btn_font_family = bridge_qode_options()->getOptionValue('comparative_features_table_btn_font_family');
		if(bridge_qode_is_font_option_valid($comparative_features_table_btn_font_family)) {
			$cft_button_style['font-family'] = bridge_qode_get_font_option_val($comparative_features_table_btn_font_family);
		}

		$comparative_features_table_btn_font_size = bridge_qode_options()->getOptionValue('comparative_features_table_btn_font_size');
		if(!empty($comparative_features_table_btn_font_size)) {
			$cft_button_style['font-size'] = $comparative_features_table_btn_font_size.'px';
		}

		$comparative_features_table_btn_font_weight = bridge_qode_options()->getOptionValue('comparative_features_table_btn_font_weight');
		if(!empty($comparative_features_table_btn_font_weight)) {
			$cft_button_style['font-weight'] = $comparative_features_table_btn_font_weight;
		}

		$comparative_features_table_btn_font_style = bridge_qode_options()->getOptionValue('comparative_features_table_btn_font_style');
		if(!empty($comparative_features_table_btn_font_style)) {
			$cft_button_style['font-style'] = $comparative_features_table_btn_font_style;
		}

		$comparative_features_table_btn_text_transform = bridge_qode_options()->getOptionValue('comparative_features_table_btn_text_transform');
		if(!empty($comparative_features_table_btn_text_transform)) {
			$cft_button_style['text-transform'] = $comparative_features_table_btn_text_transform;
		}

		$comparative_features_table_btn_letter_spacing = bridge_qode_options()->getOptionValue('comparative_features_table_btn_letter_spacing');
		if($comparative_features_table_btn_letter_spacing != '') {
			$cft_button_style['letter-spacing'] = $comparative_features_table_btn_letter_spacing.'px';
		}

		$comparative_features_table_btn_color = bridge_qode_options()->getOptionValue('comparative_features_table_btn_color');
		if(!empty($comparative_features_table_btn_color)) {
			$cft_button_style['color'] = $comparative_features_table_btn_color;
		}

		echo bridge_qode_dynamic_css('.qode-comparative-features-table .qode-cft-link', $cft_button_style);

		$comparative_features_table_btn_hover_color = bridge_qode_options()->getOptionValue('comparative_features_table_btn_hover_color');
		if(!empty($comparative_features_table_btn_hover_color)) {
			echo bridge_qode_dynamic_css('.qode-comparative-features-table .qode-cft-link:hover', array('color' => $comparative_features_table_btn_hover_color));
		}

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_comparative_features_table_styles');
}
