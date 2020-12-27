<?php

if(!function_exists('bridge_core_interactive_project_list_title_styles')) {

    function bridge_core_interactive_project_list_styles() {
        $selector = '.qode-interactive-project-list .qode-ipl-inner .qode-ipl-left article .qode-ipl-item-inner .qode-ipl-item-text .qode-ipl-title, .qode-interactive-project-list .qode-ipl-inner .qode-ipl-left article .qode-ipl-item-inner .qode-ipl-item-text .qode-ipl-title-aux';
        $styles = array();

		$first_color = bridge_qode_options()->getOptionValue('first_color');
		if(!empty($first_color)) {
			$styles['color'] = $first_color;
			$styles['-webkit-text-stroke-color'] = $first_color;
		}
		
        echo bridge_qode_dynamic_css($selector, $styles);
		
	    $selector = '.qode-interactive-project-list .qode-ipl-inner .qode-ipl-left article .qode-ipl-item-inner .qode-ipl-item-text .qode-ipl-category-holder a';
	    $styles = array();
	
	    $first_color = bridge_qode_options()->getOptionValue('first_color');
	    if(!empty($first_color)) {
		    $styles['color'] = $first_color;
	    }
	
	    echo bridge_qode_dynamic_css($selector, $styles);
	    
	    $selector = '.qode-interactive-project-list .qode-ipl-inner .qode-ipl-left article .qode-ipl-item-inner .qode-ipl-item-text .qode-ipl-item-number-holder span';
	    $styles = array();
	
	    $first_color = bridge_qode_options()->getOptionValue('first_color');
	    if(!empty($first_color)) {
		    $styles['color'] = $first_color;
		    $styles['border-color'] = 'rgba(' . implode(', ', bridge_qode_hex2rgb($first_color) ) . ', .2)';
	    }
	
	    echo bridge_qode_dynamic_css($selector, $styles);
    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_interactive_project_list_styles');
}