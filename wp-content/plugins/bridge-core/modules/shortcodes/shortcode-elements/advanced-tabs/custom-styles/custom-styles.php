<?php

if(!function_exists('bridge_core_advanced_tabs_styles')) {

    function bridge_core_advanced_tabs_styles() {

		$advanced_tabs_color = bridge_qode_options()->getOptionValue('advanced_tabs_color');
		if(!empty($advanced_tabs_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-tabs .qode-advanced-tabs-nav li a', array('color' => $advanced_tabs_color));
		}

		$advanced_tabs_bckg_color = bridge_qode_options()->getOptionValue('advanced_tabs_bckg_color');
		if(!empty($advanced_tabs_bckg_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-tabs .qode-advanced-tabs-nav li', array('background-color' => $advanced_tabs_bckg_color));
		}

		$advanced_tabs_hover_color = bridge_qode_options()->getOptionValue('advanced_tabs_hover_color');
		if(!empty($advanced_tabs_hover_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-tabs.qode-advanced-horizontal-tab .qode-advanced-tabs-nav li.ui-state-active a', array('color' => $advanced_tabs_hover_color));
		}

		$advanced_tabs_bckg_hover_color = bridge_qode_options()->getOptionValue('advanced_tabs_hover_bckg_color');
		if(!empty($advanced_tabs_bckg_hover_color)) {
			echo bridge_qode_dynamic_css('.qode-advanced-tabs.qode-advanced-horizontal-tab .qode-advanced-tabs-nav li.ui-state-active', array('background-color' => $advanced_tabs_bckg_hover_color));
		}

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_advanced_tabs_styles');
}
