<?php

if ( ! function_exists( 'bridge_core_load_widget_class' ) ) {
	/**
	 * Loades widget class file.
	 */
	function bridge_core_load_widget_class() {
		include_once 'widget-class.php';
	}
	
	add_action( 'bridge_qode_action_before_options_map', 'bridge_core_load_widget_class' );
}

if ( ! function_exists( 'bridge_core_load_widgets' ) ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to qodef_themename_action_after_options_map action
	 */
	function bridge_core_load_widgets() {
		
		if ( bridge_core_is_installed('theme') ) {
			foreach ( glob( QODE_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
				include_once $widget_load;
			}
		}
		
		include_once 'widget-loader.php';
	}
	
	add_action( 'bridge_qode_action_before_options_map', 'bridge_core_load_widgets' );
}