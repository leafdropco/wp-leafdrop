<?php
namespace Bridge\Shortcodes\InteractiveIconShowcase;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class InteractiveIconShowcase implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qode_interactive_icon_showcase';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'						=> esc_html__('Interactive Icon Showcase', 'bridge-core'),
			'base'						=> $this->base,
			'icon'						=> 'icon-wpb-interactive-icon-showcase extended-custom-icon-qode',
			'category'					=> 'by QODE',
			'as_parent'					=> array('only' => 'qode_interactive_icon_showcase_item'),
			'show_settings_on_create'	=> true,
			'js_view'					=> 'VcColumnView',
			'params'					=> array(
				array(
					'type'			=> 'dropdown',
					'admin_label'	=> true,
					'heading'		=> esc_html__( 'Autoplay', 'bridge-core' ),
					'param_name'	=> 'autoplay',
					'value'			=> array(
						esc_html__( 'Yes', 'bridge-core' ) => 'yes',
						esc_html__( 'No', 'bridge-core' ) => 'no'
					)
				),
				array(
					'type'			=> 'textfield',
					'admin_label'	=> true,
					'heading'		=> esc_html__( 'Autoplay Interval (ms)', 'bridge-core' ),
					'param_name'	=> 'autoplay_interval',
					'description'	=> 'Default value is 3000.'
				),
				array(
					'type'	=> 'textfield',
					'heading'	=> esc_html__('Border width', 'bridge-core'),
					'param_name'	=> 'border_width',
					'description' => esc_html__('Set width of the border in px, omit px', 'bridge-core')
				),
				array(
					'type'	=> 'dropdown',
					'heading'	=> esc_html__('Border style', 'bridge-core'),
					'param_name'	=> 'border_style',
					'value'	=> array(
						''	=> '',
						esc_html__('Solid', 'bridge-core') => 'solid',
						esc_html__('Dotted', 'bridge-core') => 'dotted',
						esc_html__('Dashed', 'bridge-core') => 'dashed'
					),
					'description'	=> esc_html__('Set style of the border', 'bridge-core')
				),
				array(
					'type'	=> 'colorpicker',
					'heading'	=> esc_html__('Border color', 'bridge-core'),
					'param_name'	=> 'border_color',
					'description'	=> esc_html__('Set color of the border', 'bridge-core')
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'autoplay' => 'yes',
			'autoplay_interval' => '3000',
			'border_width'	=> '',
			'border_style'	=> '',
			'border_color'	=> ''
		);

		$params = shortcode_atts($args, $atts);

		$icon_showcase_classes = array();
		$icon_showcase_classes[] = 'qode-int-icon-showcase';
		if ($params['autoplay'] == 'yes') {
			$icon_showcase_classes[] = 'qode-autoplay';
		}
		$icon_showcase_class = implode(' ', $icon_showcase_classes);

        $data_attr = $this->getDataAttr($params);
        $holder_style = $this->getHolderStyle($params);


		$html = '';

		$html .= '<div '. bridge_qode_get_class_attribute($icon_showcase_class) . bridge_qode_get_inline_attrs($data_attr) . '>';
		$html .= '<div class="qode-int-icon-showcase-inner">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '<div class="qode-int-icon-circle"'. bridge_qode_get_inline_style($holder_style) .'></div>';
		$html .= '</div>';

		return $html;

	}

	/**
	 *
	 * Returns array of data attr
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getDataAttr($params) {
	    $data_attr = array();

	    if(!empty($params['autoplay_interval'])) {
	        $data_attr['data-interval'] = $params['autoplay_interval'];
	    }

	    return $data_attr;
	}

	private function getHolderStyle($params){
		$style = array();

		if(!empty($params['border_width'])){
			$style[] = 'border-width: '.$params['border_width'].'px';
		}

		if(!empty($params['border_style'])){
			$style[] = 'border-style: '.$params['border_style'];
		}

		if(!empty($params['border_color'])){
			$style[] = 'border-color: '.$params['border_color'];
		}

		return $style;
	}

}
