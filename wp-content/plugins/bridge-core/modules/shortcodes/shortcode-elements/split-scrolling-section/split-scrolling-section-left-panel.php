<?php
namespace Bridge\Shortcodes\SplitScrollingSectionLeftPanel;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class SplitScrollingSectionLeftPanel implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qode_split_scrolling_section_left_panel';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name' => esc_html__('Qode Left Fixed Panel', 'bridge-core'),
				'base' => $this->base,
				'as_parent'	=> array('only' => 'qode_split_scrolling_section_content_item'),
				'as_child'	=> array('only' => 'qode_split_scrolling_section'),
				'content_element' => true,
				'category' => esc_html__('by QODE', 'bridge-core'),
				'icon' => 'icon-wpb-split-scrolling-section-left-panel extended-custom-icon-qode',
				'show_settings_on_create' => false,
				'js_view' => 'VcColumnView'
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array();
		
		$params = shortcode_atts($args, $atts);
		extract($params);
		
		$html = '<div class="qode-sss-ms-left">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
