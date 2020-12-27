<?php

if(!function_exists('bridge_core_simple_quote_styles')) {

    function bridge_core_simple_quote_styles() {

		$sq_text_style = array();

		$simple_quote_text_font_family = bridge_qode_options()->getOptionValue('sq_text_font_family');
		if(bridge_qode_is_font_option_valid($simple_quote_text_font_family)) {
			$sq_text_style['font-family'] = bridge_qode_get_font_option_val($simple_quote_text_font_family);
		}

		$simple_quote_text_font_size = bridge_qode_options()->getOptionValue('sq_text_font_size');
		if(!empty($simple_quote_text_font_size)) {
			$sq_text_style['font-size'] = $simple_quote_text_font_size.'px';
		}

		$simple_quote_text_line_height = bridge_qode_options()->getOptionValue('sq_text_line_height');
		if(!empty($simple_quote_text_line_height)) {
			$sq_text_style['line-height'] = $simple_quote_text_line_height.'px';
		}

		$simple_quote_text_font_weight = bridge_qode_options()->getOptionValue('sq_text_font_weight');
		if(!empty($simple_quote_text_font_weight)) {
			$sq_text_style['font-weight'] = $simple_quote_text_font_weight;
		}

		$simple_quote_text_font_style = bridge_qode_options()->getOptionValue('sq_text_font_style');
		if(!empty($simple_quote_text_font_style)) {
			$sq_text_style['font-style'] = $simple_quote_text_font_style;
		}

		$simple_quote_text_text_transform = bridge_qode_options()->getOptionValue('sq_text_text_transform');
		if(!empty($simple_quote_text_text_transform)) {
			$sq_text_style['text-transform'] = $simple_quote_text_text_transform;
		}

		$simple_quote_text_letter_spacing = bridge_qode_options()->getOptionValue('sq_text_letter_spacing');
		if($simple_quote_text_letter_spacing != '') {
			$sq_text_style['letter-spacing'] = $simple_quote_text_letter_spacing.'px';
		}

		$simple_quote_table_text_color = bridge_qode_options()->getOptionValue('sq_text_color');
		if(!empty($simple_quote_table_text_color)) {
			$sq_text_style['color'] = $simple_quote_table_text_color;
		}

		echo bridge_qode_dynamic_css('.qode-simple-quote-holder .qode-simple-quote-holder-inner .qode-simple-quote-content-holder .qode-simple-quote-text-holder .qode-simple-quote-text-title', $sq_text_style);



		$sq_author_style = array();

		$simple_quote_author_font_family = bridge_qode_options()->getOptionValue('sq_author_font_family');
		if(bridge_qode_is_font_option_valid($simple_quote_author_font_family)) {
			$sq_author_style['font-family'] = bridge_qode_get_font_option_val($simple_quote_author_font_family);
		}

		$simple_quote_author_font_size = bridge_qode_options()->getOptionValue('sq_author_font_size');
		if(!empty($simple_quote_author_font_size)) {
			$sq_author_style['font-size'] = $simple_quote_author_font_size.'px';
		}

		$simple_quote_author_line_height = bridge_qode_options()->getOptionValue('sq_author_line_height');
		if(!empty($simple_quote_author_line_height)) {
			$sq_author_style['line-height'] = $simple_quote_author_line_height.'px';
		}

		$simple_quote_author_font_weight = bridge_qode_options()->getOptionValue('sq_author_font_weight');
		if(!empty($simple_quote_author_font_weight)) {
			$sq_author_style['font-weight'] = $simple_quote_author_font_weight;
		}

		$simple_quote_author_font_style = bridge_qode_options()->getOptionValue('sq_author_font_style');
		if(!empty($simple_quote_author_font_style)) {
			$sq_author_style['font-style'] = $simple_quote_author_font_style;
		}

		$simple_quote_author_author_transform = bridge_qode_options()->getOptionValue('sq_author_author_transform');
		if(!empty($simple_quote_author_author_transform)) {
			$sq_author_style['author-transform'] = $simple_quote_author_author_transform;
		}

		$simple_quote_author_letter_spacing = bridge_qode_options()->getOptionValue('sq_author_letter_spacing');
		if($simple_quote_author_letter_spacing != '') {
			$sq_author_style['letter-spacing'] = $simple_quote_author_letter_spacing.'px';
		}

		$simple_quote_table_author_color = bridge_qode_options()->getOptionValue('sq_author_color');
		if(!empty($simple_quote_table_author_color)) {
			$sq_author_style['color'] = $simple_quote_table_author_color;
		}

		echo bridge_qode_dynamic_css('.qode-simple-quote-holder .qode-simple-quote-holder-inner .qode-simple-quote-content-holder .qode-simple-quote-author-holder .qode-simple-quote-author-title', $sq_author_style);

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_simple_quote_styles');
}
