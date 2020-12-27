<?php
if (!function_exists('bridge_core_register_widgets')) {

	function bridge_core_register_widgets() {

		$widgets = apply_filters( 'bridge_core_filter_register_widgets', $widgets = array());

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}

	add_action('widgets_init', 'bridge_core_register_widgets');
}