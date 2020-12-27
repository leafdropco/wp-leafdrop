<?php 

if(!function_exists('bridge_core_accordions_typography_styles')){
	function bridge_core_accordions_typography_styles(){
		$selector = '.qode-accordion-holder .qode-title-holder';
		$styles = array();
		
		$font_family = bridge_qode_options()->getOptionValue('accordions_font_family');
		if(bridge_qode_is_font_option_valid($font_family)){
			$styles['font-family'] = bridge_qode_get_font_option_val($font_family);
		}
		
		$text_transform = bridge_qode_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = bridge_qode_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = bridge_qode_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = bridge_qode_filter_px($letter_spacing).'px';
       }

       $font_weight = bridge_qode_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo bridge_qode_dynamic_css($selector, $styles);
	}
	add_action('bridge_qode_action_style_dynamic', 'bridge_core_accordions_typography_styles');
}

if(!function_exists('bridge_core_accordions_initial_color_styles')){

	function bridge_core_accordions_initial_color_styles(){

		$selector = '.qode-accordion-holder .qode-title-holder';
		$styles = array();
		
		if(bridge_qode_options()->getOptionValue('accordions_title_color')) {
			$styles['color'] = bridge_qode_options()->getOptionValue('accordions_title_color');
		}
		
		if(bridge_qode_options()->getOptionValue('accordions_back_color')) {
			$styles['background-color'] = bridge_qode_options()->getOptionValue('accordions_back_color');
		}

		echo bridge_qode_dynamic_css($selector, $styles);
	}

	add_action('bridge_qode_action_style_dynamic', 'bridge_core_accordions_initial_color_styles');
}

if(!function_exists('bridge_core_accordions_active_color_styles')){
	
	function bridge_core_accordions_active_color_styles(){
		$selector = array(
			'.qode-accordion-holder .qode-title-holder.ui-state-active',
			'.qode-accordion-holder .qode-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(bridge_qode_options()->getOptionValue('accordions_title_color_active')) {
			$styles['color'] = bridge_qode_options()->getOptionValue('accordions_title_color_active');
		}
		
		if(bridge_qode_options()->getOptionValue('accordions_back_color_active')) {
			$styles['background-color'] = bridge_qode_options()->getOptionValue('accordions_back_color_active');
		}

		echo bridge_qode_dynamic_css($selector, $styles);
	}

	add_action('bridge_qode_action_style_dynamic', 'bridge_core_accordions_active_color_styles');
}