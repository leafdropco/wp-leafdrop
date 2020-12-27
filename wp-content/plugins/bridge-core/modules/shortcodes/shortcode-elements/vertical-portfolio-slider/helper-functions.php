<?php

if ( ! function_exists( 'bridge_core_add_vertical_portfolio_slider_shortcode' ) ) {
	function bridge_core_add_vertical_portfolio_slider_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'Bridge\Shortcodes\VerticalPortfolioSlider\VerticalPortfolioSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'bridge_core_filter_add_vc_shortcode', 'bridge_core_add_vertical_portfolio_slider_shortcode' );
}