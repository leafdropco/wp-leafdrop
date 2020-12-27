<?php

include_once BRIDGE_CORE_MODULES_PATH . '/core-dashboard/core-dashboard.php';

if ( ! function_exists( 'bridge_core_dashboard_load_files' ) ) {
	function bridge_core_dashboard_load_files() {
		include_once BRIDGE_CORE_MODULES_PATH . '/core-dashboard/rest/include.php';
		include_once BRIDGE_CORE_MODULES_PATH . '/core-dashboard/registration-rest.php';
		include_once BRIDGE_CORE_MODULES_PATH . '/core-dashboard/sub-pages/sub-page.php';
		
		foreach ( glob( BRIDGE_CORE_MODULES_PATH . '/core-dashboard/sub-pages/*/load.php' ) as $subpages ) {
			include_once $subpages;
		}
	}
	
	add_action( 'after_setup_theme', 'bridge_core_dashboard_load_files' );
}