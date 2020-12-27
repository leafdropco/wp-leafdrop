<?php

if(!function_exists('bridge_core_portfolio_carousel_styles')) {

    function bridge_core_portfolio_carousel_styles() {
        $selector = '.qode-portfolio-carousel .qode-pc-custom-cursor';
        $styles = array();

        $first_color = bridge_qode_options()->getOptionValue('first_color');
        if(!empty($first_color)) {
            $styles['color'] = $first_color;
            $styles['border-color'] = $first_color;
        }

        echo bridge_qode_dynamic_css($selector, $styles);
    }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_portfolio_carousel_styles');
}