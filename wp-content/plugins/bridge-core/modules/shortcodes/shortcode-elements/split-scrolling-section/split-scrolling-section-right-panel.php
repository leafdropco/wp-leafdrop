<?php
namespace Bridge\Shortcodes\SplitScrollingSectionRightPanel;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class SplitScrollingSectionRightPanel implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qode_split_scrolling_section_right_panel';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(
			array(
				'name' => esc_html__('Qode Right Scrolling Panel', 'bridge-core'),
				'base' => $this->base,
				'as_parent'	=> array('only' => 'qode_split_scrolling_section_content_item'),
				'as_child'	=> array('only' => 'qode_split_scrolling_section'),
				'content_element' => true,
				'category' => esc_html__('by QODE', 'bridge-core'),
				'icon' => 'icon-wpb-split-scrolling-section-right-panel extended-custom-icon-qode',
				'show_settings_on_create' => false,
				'js_view' => 'VcColumnView'
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array();

		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '<div class="qode-sss-ms-right">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
