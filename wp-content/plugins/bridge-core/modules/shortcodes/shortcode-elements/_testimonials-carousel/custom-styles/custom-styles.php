<?php

if(!function_exists('bridge_core_testimonial_carousel_styles')) {

    function bridge_core_testimonial_carousel_styles() {

    	$background_selector = '.testimonials_c_holder .testimonial_content_inner';

    	$background_color = bridge_qode_options()->getOptionValue('testimonial_carousel_background_color');
    	if(!empty($background_color)) {
			echo bridge_qode_dynamic_css($background_selector, array('background' => $background_color));
        }

        $text_selector = '.testimonials_c_holder .testimonial_content_inner .testimonial_text_inner p:first-child';

        $tc_text_style = array();

        $tc_text_color = bridge_qode_options()->getOptionValue('tc_text_color');
		if(!empty($tc_text_color)) {
			$tc_text_style['color'] = $tc_text_color;
		}

		$tc_text_font_size = bridge_qode_options()->getOptionValue('tc_text_font_size');
		if(!empty($tc_text_font_size)) {
			$tc_text_style['font-size'] = $tc_text_font_size.'px';
		}

		$tc_text_line_height = bridge_qode_options()->getOptionValue('tc_text_line_height');
		if(!empty($tc_text_line_height)) {
			$tc_text_style['line-height'] = $tc_text_line_height.'px';
		}

		$tc_text_text_transform = bridge_qode_options()->getOptionValue('tc_text_transform');
		if(!empty($tc_text_text_transform)) {
			$tc_text_style['text-transform'] = $tc_text_text_transform;
		}

		$tc_text_font_family = bridge_qode_options()->getOptionValue('tc_text_font_family');
		if(bridge_qode_is_font_option_valid($tc_text_font_family)) {
			$tc_text_style['font-family'] = bridge_qode_get_font_option_val($tc_text_font_family);
		}

		$tc_text_font_style = bridge_qode_options()->getOptionValue('tc_text_font_style');
		if(!empty($tc_text_font_style)) {
			$tc_text_style['font-style'] = $tc_text_font_style;
		}

		$tc_text_font_weight = bridge_qode_options()->getOptionValue('tc_text_font_weight');
		if(!empty($tc_text_font_weight)) {
			$tc_text_style['font-weight'] = $tc_text_font_weight;
		}

		$tc_text_letter_spacing = bridge_qode_options()->getOptionValue('tc_text_letter_spacing');
		if($tc_text_letter_spacing != '') {
			$tc_text_style['letter-spacing'] = $tc_text_letter_spacing.'px';
		}

        echo bridge_qode_dynamic_css($text_selector, $tc_text_style);

        $author_selector = '.testimonials_c_holder .testimonial_content_inner .testimonial_text_inner .testimonial_author';

        $tc_author_style = array();

        $tc_author_color = bridge_qode_options()->getOptionValue('tc_author_color');
		if(!empty($tc_author_color)) {
			$tc_author_style['color'] = $tc_author_color;
		}

		$tc_author_font_size = bridge_qode_options()->getOptionValue('tc_author_font_size');
		if(!empty($tc_author_font_size)) {
			$tc_author_style['font-size'] = $tc_author_font_size.'px';
		}

		$tc_author_line_height = bridge_qode_options()->getOptionValue('tc_author_line_height');
		if(!empty($tc_author_line_height)) {
			$tc_author_style['line-height'] = $tc_author_line_height.'px';
		}

		$tc_author_text_transform = bridge_qode_options()->getOptionValue('tc_author_transform');
		if(!empty($tc_author_text_transform)) {
			$tc_author_style['text-transform'] = $tc_author_text_transform;
		}

		$tc_author_font_family = bridge_qode_options()->getOptionValue('tc_author_font_family');
		if(bridge_qode_is_font_option_valid($tc_author_font_family)) {
			$tc_author_style['font-family'] = bridge_qode_get_font_option_val($tc_author_font_family);
		}

		$tc_author_font_style = bridge_qode_options()->getOptionValue('tc_author_font_style');
		if(!empty($tc_author_font_style)) {
			$tc_author_style['font-style'] = $tc_author_font_style;
		}

		$tc_author_font_weight = bridge_qode_options()->getOptionValue('tc_author_font_weight');
		if(!empty($tc_author_font_weight)) {
			$tc_author_style['font-weight'] = $tc_author_font_weight;
		}

		$tc_author_letter_spacing = bridge_qode_options()->getOptionValue('tc_author_letter_spacing');
		if($tc_author_letter_spacing != '') {
			$tc_author_style['letter-spacing'] = $tc_author_letter_spacing.'px';
		}

		echo bridge_qode_dynamic_css($author_selector, $tc_author_style);
        

    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_testimonial_carousel_styles');
}
