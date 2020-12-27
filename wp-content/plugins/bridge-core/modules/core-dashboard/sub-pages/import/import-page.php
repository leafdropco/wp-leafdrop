<?php
if ( ! function_exists( 'bridge_core_add_import_sub_page_to_list' ) ) {
	function bridge_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'BridgeCoreImportPage';
		return $sub_pages;
	}
	
	add_filter( 'bridge_core_filter_add_welcome_sub_page', 'bridge_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'BridgeCoreSubPage' ) ) {
	class BridgeCoreImportPage extends BridgeCoreSubPage {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__('Import', 'bridge-core'));
			$this->set_atts( $this->set_atributtes());
		}

		public function set_atributtes(){
			$params = array();

			$iparams = BridgeCoreDashboard::get_instance()->get_import_params();
			if(is_array($iparams) && isset($iparams['submit'])) {
				$params['submit'] = $iparams['submit'];
			}

			$params['demos_list'] = bridge_core_demos_list();
			$params['filter_categories'] = $this->get_categories();

			return $params;
		}

		public function get_categories() {
			return array(

				'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				'business'	=> esc_html__('Business', 'bridge-core'),
				'creative'	=> esc_html__('Creative', 'bridge-core'),
				'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				'blog'		=> esc_html__('Blog', 'bridge-core'),
				'shop'		=> esc_html__('Shop', 'bridge-core'),
				'one-page'	=> esc_html__('One Page', 'bridge-core'),
				'special'	=> esc_html__('Special', 'bridge-core'),
				'other'		=> esc_html__('Other', 'bridge-core'),
			);
		}

	}
}