<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Qode_Horizontal_Timeline extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Qode_Horizontal_Timeline_Item extends WPBakeryShortCodesContainer {}
}

if(!function_exists('bridge_core_add_horizontal_timeline_shortcodes')) {
	function bridge_core_add_horizontal_timeline_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'Bridge\Shortcodes\HorizontalTimeline\HorizontalTimeline',
			'Bridge\Shortcodes\HorizontalTimeline\HorizontalTimelineItem'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('bridge_core_filter_add_vc_shortcode', 'bridge_core_add_horizontal_timeline_shortcodes');
}