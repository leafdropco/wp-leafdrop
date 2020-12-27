<?php

if(!function_exists('bridge_core_numbered_process_styles')) {

    function bridge_core_numbered_process_styles() {
    	$line_style = array();
    	$number_style = array();
    	$item_border_style = array();

		if (bridge_qode_options()->getOptionValue('numbered_process_border_color') !== ''){
			$line_style['border-bottom-color'] = bridge_qode_options()->getOptionValue('numbered_process_border_color');
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_border_width') !== ''){
			$line_style['border-bottom-width'] = bridge_qode_filter_px(bridge_qode_options()->getOptionValue('numbered_process_border_width')).'px';
		}

		if (is_array($line_style) && count($line_style)){
			echo bridge_qode_dynamic_css('.qode-numbered-process-holder .qode-np-line', $line_style);
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_number_color') !== ''){
			$number_style['color'] = bridge_qode_options()->getOptionValue('numbered_process_number_color');
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_number_font_size') !== ''){
			$number_style['font-size'] = bridge_qode_filter_px(bridge_qode_options()->getOptionValue('numbered_process_number_font_size')).'px';
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_number_background_color') !== ''){
			$number_style['background-color'] = bridge_qode_options()->getOptionValue('numbered_process_number_background_color');
		}

		if (is_array($number_style) && count($number_style)){
			echo bridge_qode_dynamic_css('.qode-numbered-process-holder .qode-np-item-image-holder .qode-np-item-number', $number_style);
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_item_border_color') !== ''){
			$item_border_style['border-color'] = bridge_qode_options()->getOptionValue('numbered_process_item_border_color');
		}

		if (bridge_qode_options()->getOptionValue('numbered_process_item_border_width') !== ''){
			$item_border_style['border-width'] = bridge_qode_filter_px(bridge_qode_options()->getOptionValue('numbered_process_item_border_width')).'px';
		}

		if (is_array($item_border_style) && count($item_border_style)){
			echo bridge_qode_dynamic_css('.qode-numbered-process-holder .qode-np-item-image-holder .qode-np-item-image-inner', $item_border_style);
		}

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_numbered_process_styles');
}
