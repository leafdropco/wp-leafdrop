<?php
namespace Bridge\Shortcodes\SplitScrollingSection;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class SplitScrollingSection implements ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qode_split_scrolling_section';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Qode Split Scrolling Section', 'bridge-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-split-scrolling-section extended-custom-icon-qode',
			'category' => esc_html__('by QODE', 'bridge-core'),
			'as_parent'	=> array('only' => 'qode_split_scrolling_section_left_panel, qode_split_scrolling_section_right_panel'),
			'js_view' => 'VcColumnView'
		));
	}

	public function render($atts, $content = null) {
		$args = array();
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['content'] = $content;

		$html = bridge_core_get_shortcode_template_part('templates/split-scrolling-section-template', 'split-scrolling-section', '', $params);

		return $html;
	}
}