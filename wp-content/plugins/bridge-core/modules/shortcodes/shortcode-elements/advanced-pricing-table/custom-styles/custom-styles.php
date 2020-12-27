<?php

if(!function_exists('bridge_core_advanced_pricing_table_styles')) {

    function bridge_core_advanced_pricing_table_styles() {

		$border_selector = array(
			'.qode-advanced-pricing-table',
			'.qode-advanced-pricing-table .qode-apt-row'
		);

        $border_color = bridge_qode_options()->getOptionValue('advanced_pricing_table_border_color');
        if(!empty($border_color)) {
			echo bridge_qode_dynamic_css($border_selector, array('border-color' => $border_color));
        }

		$advanced_pricing_table_odd_bckg_color = bridge_qode_options()->getOptionValue('advanced_pricing_table_odd_bckg_color');
		if(!empty($advanced_pricing_table_odd_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-pricing-table .qode-apt-row:nth-child(odd)', array('background-color' => $advanced_pricing_table_odd_bckg_color));
		}

		$advanced_pricing_table_even_bckg_color = bridge_qode_options()->getOptionValue('advanced_pricing_table_even_bckg_color');
		if(!empty($advanced_pricing_table_even_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-pricing-table .qode-apt-row:nth-child(even)', array('background-color' => $advanced_pricing_table_even_bckg_color));
		}

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_advanced_pricing_table_styles');
}
