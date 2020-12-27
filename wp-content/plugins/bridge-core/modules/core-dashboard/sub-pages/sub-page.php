<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class BridgeCoreSubPage {

	private $base;
	private $title;
	private $atts = array();

	public function __construct() {
		$this->add_sub_page();

	}
	
	abstract public function add_sub_page();

	public function get_base() {
		return $this->base;
	}

	public function set_base( $base ) {
		return $this->base = $base;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_title( $title ) {
		return $this->title = $title;
	}

	public function get_atts() {
		return $this->atts;
	}

	public function set_atts( $atts ) {
		return $this->atts = $atts;
	}

	public function render() {

		echo bridge_core_get_module_template_part('sub-pages/' . $this->get_base() . '/templates/'. $this->get_base(), 'core-dashboard', '', $this->get_atts());

	}

}