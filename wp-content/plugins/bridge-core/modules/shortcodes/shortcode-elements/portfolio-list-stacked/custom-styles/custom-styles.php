<?php

if(!function_exists('bridge_core_portfolio_list_stacked_styles')) {

    function bridge_core_portfolio_list_stacked_styles() {
        $selector = '#qode-portfolio-list-stacked .qode-pls-end-of-scroll .qode-eos-title *';
        $styles = array();

		$first_color = bridge_qode_options()->getOptionValue('first_color');
		if(!empty($first_color)) {
			$styles['color'] = $first_color;
			$styles['-webkit-text-stroke-color'] = $first_color;
		}
		
        echo bridge_qode_dynamic_css($selector, $styles);
		
	    $selector = '#qode-pls-info .qode-pls-title-holder .qode-pls-title a';
	    $styles = array();
	
	    $first_color = bridge_qode_options()->getOptionValue('first_color');
	    if(!empty($first_color)) {
		    $styles['color'] = $first_color;
	    }
	
	    echo bridge_qode_dynamic_css($selector, $styles);
	
	    $selector = '#qode-portfolio-list-stacked .qode-pls-scroll-note .qode-pls-down svg path';
	    $styles = array();
	
	    $first_color = bridge_qode_options()->getOptionValue('first_color');
	    if(!empty($first_color)) {
		    $styles['fill'] = $first_color;
	    }
	
	    echo bridge_qode_dynamic_css($selector, $styles);
    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_portfolio_list_stacked_styles');
}