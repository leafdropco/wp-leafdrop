<?php
/*
Plugin Name: Bridge Core
Plugin URI: https://qodeinteractive.com
Description: Plugin that adds additional features needed by our theme
Author: Qode
Author URI: https://qodeinteractive.com
Version: 2.5.4
*/
if ( ! class_exists( 'BridgeCore' ) ) {
	class BridgeCore {
		private static $instance;
		
		public function __construct() {

			require_once 'constants.php';
			require_once 'helpers/helper.php';
			
			// Make plugin available for translation
			add_action( 'plugins_loaded', array( $this, 'load_plugin_text_domain' ) );
			
			// Add plugin's body classes
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			
			add_action( 'after_setup_theme', array( $this, 'init' ), 5 );

			add_action( 'admin_menu', array( $this, 'qode_theme_menu' ) );
			add_action('admin_bar_menu', array( $this, 'qode_add_theme_options_toolbar'), 999);
		}

        public static function get_instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof self ) ) {
                self::$instance = new self();
            }

            return self::$instance;
        }
		
		function load_plugin_text_domain() {
			load_plugin_textdomain( 'bridge-core', false, BRIDGE_CORE_REL_PATH . '/languages' );
		}
		
		function add_body_classes( $classes ) {
			$classes[] = 'bridge-core-' . BRIDGE_CORE_VERSION;
			
			return $classes;
		}
		
		function init() {
			
			if ( bridge_core_is_installed( 'theme' ) ) {
				include_once BRIDGE_CORE_MODULES_PATH . '/helper.php';
			}
		}


		function qode_theme_menu() {
			if ( bridge_core_is_installed('theme') ) {
				global $bridge_qode_framework;
				bridge_qode_init_qode_theme_options();
				$page_hook_suffix = add_menu_page(
					esc_html__('Qode Options', 'bridge-core'),                   // The value used to populate the browser's title bar when the menu page is active
					esc_html__('Qode Options', 'bridge-core'),                   // The text of the menu in the administrator's sidebar
					'administrator',                  // What roles are able to access the menu
					'qode_theme_menu',                // The ID used to bind submenu items to this menu
					'bridge_qode_theme_display', // The callback function used to render this menu
					BRIDGE_CORE_MODULES_URL_PATH . '/core-dashboard/assets/img/admin-logo-icon.png',
				4
				);
				foreach ($bridge_qode_framework->qodeOptions->adminPages as $key=>$value ) {
					$slug = "";
					if (!empty($value->slug)) $slug = "_tab".$value->slug;
					$subpage_hook_suffix = add_submenu_page(
						'qode_theme_menu',
						esc_html__('Qode Options - ', 'bridge-core').$value->title,                   // The value used to populate the browser's title bar when the menu page is active
						$value->title,                   // The text of the menu in the administrator's sidebar
						'administrator',                  // What roles are able to access the menu
						'qode_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
						'bridge_qode_theme_display'              // The callback function used to render this menu
					);
					add_action('admin_print_scripts-'.$subpage_hook_suffix, 'bridge_qode_enqueue_admin_scripts');
					add_action('admin_print_styles-'.$subpage_hook_suffix, 'bridge_qode_enqueue_admin_styles');
				};
				add_action('admin_print_scripts-'.$page_hook_suffix, 'bridge_qode_enqueue_admin_scripts');
				add_action('admin_print_styles-'.$page_hook_suffix, 'bridge_qode_enqueue_admin_styles');
			}
		}


		function qode_add_theme_options_toolbar($wp_admin_bar) {
			if ( bridge_core_is_installed('theme') && current_user_can( 'administrator' ) && !is_admin()) {
					$args = array(
						'id'    => 'qode_theme_menu',
						'title' => esc_html__('Qode Options', 'bridge-core'),
						'href'  => admin_url('admin.php?page=qode_theme_menu'),
						'parent' => 'site-name'
					);

					$wp_admin_bar->add_node($args);
			}
		}

	}

	BridgeCore::get_instance();
}

if ( ! function_exists( 'bridge_core_enqueue_our_prettyphoto_scripts_for_theme' ) ) {
    /**
     * Function that includes our prettyphoto script
     */
    function bridge_core_enqueue_our_prettyphoto_scripts_for_theme() {

        if ( bridge_core_is_installed('theme') && bridge_core_is_installed('visual-composer') ) {
            wp_deregister_script( 'prettyphoto' );
            wp_enqueue_script("prettyphoto", QODE_ROOT."/js/plugins/jquery.prettyPhoto.js",array('jquery'),false,true);

            wp_deregister_script( 'flexslider' );
            wp_enqueue_script("flexslider", QODE_ROOT."/js/plugins/jquery.flexslider-min.js",array('jquery'),false,true);

            wp_deregister_script( 'isotope' );
            wp_enqueue_script("isotope", QODE_ROOT."/js/plugins/jquery.isotope.min.js",array('jquery'),false,true);
        }
    }

    add_action( 'bridge_qode_action_enqueue_third_party_scripts', 'bridge_core_enqueue_our_prettyphoto_scripts_for_theme' );
}