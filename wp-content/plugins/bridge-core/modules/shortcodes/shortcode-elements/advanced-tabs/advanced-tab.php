<?php

namespace Bridge\Shortcodes\AdvancedTab;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class AdvancedTab implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'qode_advanced_tab';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'						=> esc_html__('Advanced Tab', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => 'by QODE',
			'icon'                      => 'extended-custom-icon-qode icon-wpb-advanced-tab',
			'allowed_container_element' => 'vc_row',
			'js_view'					=> 'VcColumnView',
			'as_child'                  => array('only' => 'qode_advanced_tabs'),
			'as_parent'					=> array(''),
			'params' => array_merge(
				bridge_qode_icon_collections()->getVCParamsArray(array(), '', true),
				array(
					array(
						'type' => 'textfield',
						'admin_label' => true,
						'heading' => esc_html__('Title', 'bridge-core'),
						'param_name' => 'tab_title',
					)
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'tab_title' => 'Tab',
			'tab_id' => ''
		);

		$default_atts = array_merge($default_atts, bridge_qode_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);
		extract($params);

		if(!empty($params['icon_pack'])) {
			$iconPackName = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
			$params['icon'] = $params[$iconPackName];
		}
		$rand_number = rand(0, 1000);
		$params['tab_title'] = $params['tab_title'].'-'.$rand_number;

		$params['content'] = $content;

		return bridge_core_get_shortcode_template_part('templates/advanced-tab-template', 'advanced-tabs', '', $params);
	}

}