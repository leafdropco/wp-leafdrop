<?php

namespace Bridge\Shortcodes\InfoCard;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsGallery
 */
class InfoCard implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsGallery constructor.
	 */
	public function __construct() {
		$this->base = 'qode_info_card';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 *
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Info Card', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by QODE', 'bridge-core'),
			'icon'                      => 'icon-wpb-info-card extended-custom-icon-qode',
			'params'					=> array(
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Image', 'bridge-core'),
					'param_name'  => 'image'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Info Card Background Color', 'bridge-core'),
					'param_name' => 'background_color',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'bridge-core'),
					'param_name'  => 'title',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Title Tag', 'bridge-core'),
					'param_name' => 'title_tag',
					'value' => array(
						''   => '',
						'h2' => 'h2',
						'h3' => 'h3',
						'h4' => 'h4',
						'h5' => 'h5',
						'h6' => 'h6',
					),
					'dependency' => array('element' => 'title', 'not_empty'=>true)
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_html__('Text', 'bridge-core'),
					'param_name'  => 'text'
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Info Card Text Color', 'bridge-core'),
					'param_name' => 'text_color',
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Enable Button', 'bridge-core'),
					'param_name'	=> 'enable_button',
					'value'       => array(
						esc_html__('No', 'bridge-core')  	=> 'no',
						esc_html__('Yes', 'bridge-core') 	=> 'yes'
					)
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Button Link', 'bridge-core'),
					'param_name'	=> 'button_link',
					'dependency'	=> array('element' => 'enable_button', 'value' => 'yes')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Button Target', 'bridge-core'),
					'param_name'	=> 'button_target',
					'value' => array(
						esc_html__('Self', 'bridge-core')	=> '_self',
						esc_html__('Blank', 'bridge-core')	=> '_blank',
					),
					'dependency'	=> array('element' => 'enable_button', 'value' => 'yes')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Button Text', 'bridge-core'),
					'param_name'	=> 'button_text',
					'dependency'	=> array('element' => 'enable_button', 'value' => 'yes')
				),
				array(
					'type'			=> 'colorpicker',
					'heading'		=> esc_html__('Button Background Color', 'bridge-core'),
					'param_name'	=> 'button_background_color',
					'dependency'	=> array('element' => 'enable_button', 'value' => 'yes')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Button Height(px)', 'bridge-core'),
					'param_name'	=> 'button_height',
					'dependency'	=> array('element' => 'enable_button', 'value' => 'yes')
				)
			)

		));
	}

	/**
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
        $args = array(
            'image'						=> '',
            'background_color'			=> '#fff',
            'title'						=> '',
            'title_tag'					=> 'h3',
            'text'						=> '',
            'text_color'				=> '',
            'enable_button'				=> '',
            'button_link'				=> '',
            'button_target'				=> '_self',
            'button_text'				=> '',
            'button_background_color'	=> '',
            'button_height'				=> ''
        );

		$args	= array_merge($args, bridge_qode_icon_collections()->getShortcodeParams());
        $params	= shortcode_atts($args, $atts);

		$params['button_style']	= $this->getButtonStyle($params);
		$params['holder_style']	= $this->getHolderStyle($params);
		$params['text_style'] = $this->getTextStyle($params);

		return bridge_core_get_shortcode_template_part('templates/info-card-template', 'info-card', '', $params);
	}


	private function getButtonStyle ($params) {

		$style = array();

		if($params['button_background_color']) {
			$style[] = 'background-color:'. $params['button_background_color'];
		}

		if($params['button_height']) {
			$style[] = 'height:'. $params['button_height'].'px';
			$style[] = 'line-height:'. $params['button_height'].'px';
		}

		return implode(';', $style);
	}

	private function getHolderStyle($params){
		$style = array();

		if($params['background_color']){
			$style[] = 'background-color:'. $params['background_color'];
		}

		return $style;
	}

	private function getTextStyle($params){
		$style = array();

		if($params['text_color']){
			$style[] = 'color:'. $params['text_color'];
		}

		return $style;
	}

}