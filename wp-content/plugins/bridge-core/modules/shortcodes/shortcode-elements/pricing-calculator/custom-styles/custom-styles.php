<?php

if(!function_exists('bridge_core_pricing_calculator_styles')) {

    function bridge_core_pricing_calculator_styles() {

        $border_color = bridge_qode_options()->getOptionValue('pricing_calculator_border_color');
        if(!empty($border_color)) {
			echo bridge_qode_dynamic_css('.qode-pricing-calculator', array('border-color' => bridge_qode_options()->getOptionValue('pricing_calculator_border_color')));
        }

		$pricing_calculator_left_section_bckg_color = bridge_qode_options()->getOptionValue('pricing_calculator_left_section_bckg_color');
		if(!empty($pricing_calculator_left_section_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-pricing-calculator .qode-pricing-calculator-items', array('background-color' => $pricing_calculator_left_section_bckg_color));
		}

		$pricing_calculator_right_section_bckg_color = bridge_qode_options()->getOptionValue('pricing_calculator_right_section_bckg_color');
		if(!empty($pricing_calculator_right_section_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-pricing-calculator .qode-pricing-calculator-text-holder', array('background-color' => $pricing_calculator_right_section_bckg_color));
		}

		$pricing_calculator_switch_color = bridge_qode_options()->getOptionValue('pricing_calculator_switch_color');
		if(!empty($pricing_calculator_switch_color)) {
			echo bridge_qode_dynamic_css('.qode-pricing-calculator .qode-pricing-calculator-switch .qode-pricing-calculator-slider', array('background-color' => $pricing_calculator_switch_color));
		}

		$pricing_calculator_switch_active_color = bridge_qode_options()->getOptionValue('pricing_calculator_switch_active_color');
		if(!empty($pricing_calculator_switch_color)) {
			echo bridge_qode_dynamic_css('.qode-pricing-calculator .qode-pricing-calculator-switch input:checked+.qode-pricing-calculator-slider', array('background-color' => $pricing_calculator_switch_active_color));
		}


		$pc_price_style = array();

		$pricing_calculator_price_font_family = bridge_qode_options()->getOptionValue('pricing_calculator_price_font_family');
		if(bridge_qode_is_font_option_valid($pricing_calculator_price_font_family)) {
			$pc_price_style['font-family'] = bridge_qode_get_font_option_val($pricing_calculator_price_font_family);
		}

		$pricing_calculator_price_font_size = bridge_qode_options()->getOptionValue('pricing_calculator_price_font_size');
		if(!empty($pricing_calculator_price_font_size)) {
			$pc_price_style['font-size'] = $pricing_calculator_price_font_size.'px';
		}

		$pricing_calculator_price_font_weight = bridge_qode_options()->getOptionValue('pricing_calculator_price_font_weight');
		if(!empty($pricing_calculator_price_font_weight)) {
			$pc_price_style['font-weight'] = $pricing_calculator_price_font_weight;
		}

		$pricing_calculator_price_font_style = bridge_qode_options()->getOptionValue('pricing_calculator_price_font_style');
		if(!empty($pricing_calculator_price_font_style)) {
			$pc_price_style['font-style'] = $pricing_calculator_price_font_style;
		}

		$pricing_calculator_price_letter_spacing = bridge_qode_options()->getOptionValue('pricing_calculator_price_letter_spacing');
		if($pricing_calculator_price_letter_spacing != '') {
			$pc_price_style['letter-spacing'] = $pricing_calculator_price_letter_spacing.'px';
		}

		$pricing_calculator_price_color = bridge_qode_options()->getOptionValue('pricing_calculator_price_color');
		if(!empty($pricing_calculator_price_color)) {
			$pc_price_style['color'] = $pricing_calculator_price_color;
		}

		echo bridge_qode_dynamic_css('.qode-pricing-calculator .qode-pricing-calculator-total-price-holder', $pc_price_style);

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_pricing_calculator_styles');
}
