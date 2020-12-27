<?php

namespace Bridge\Shortcodes\InfoCardWithIcon;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsGallery
 */
class InfoCardWithIcon implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsGallery constructor.
	 */
	public function __construct() {
		$this->base = 'qode_info_card_with_icon';

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
			'name'                      => esc_html__('Info Card With Icon', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by QODE', 'bridge-core'),
			'icon'                      => 'icon-wpb-info-card-with-icon extended-custom-icon-qode',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__('Image', 'bridge-core'),
						'param_name'  => 'image'
					)),
				bridge_qode_icon_collections()->getVCParamsArray(array(), '', true),
				array(
					array(
						'type'        => 'dropdown',
						'heading' => esc_html__( 'Icon Size', 'bridge-core' ),
						'admin_label' => true,
						'save_always' => true,
						'param_name'  => 'icon_size',
						'group' 	 => esc_html__('Icon Style', 'bridge-core'),
						'value'       => array(
							esc_html__( 'Tiny', 'bridge-core' )       => 'qode-icon-tiny',
							esc_html__( 'Small', 'bridge-core' )      => 'qode-icon-small',
							esc_html__( 'Medium', 'bridge-core' )     => 'qode-icon-medium',
							esc_html__( 'Large', 'bridge-core' )      => 'qode-icon-large',
							esc_html__( 'Very Large', 'bridge-core' ) => 'qode-icon-huge'
						),
						'dependency' => array('element' => 'icon_pack', 'not_empty'=>true)
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading' => esc_html__( 'Icon Custom Size (px)', 'bridge-core' ),
						'param_name'  => 'custom_icon_size',
						'value'       => '',
						'group'		  => esc_html__('Icon Style', 'bridge-core'),
						'dependency' => array('element' => 'icon_pack', 'not_empty'=>true)
					),

					array(
						'type'        => 'textfield',
						'heading' => esc_html__( 'Icon Shape Size (px)', 'bridge-core' ),
						'param_name'  => 'icon_shape_size',
						'value'       => '',
						'group'		  => esc_html__('Icon Style', 'bridge-core'),
						'dependency' => array('element' => 'icon_pack', 'not_empty'=>true)
					),
					array(
						'type'        => 'colorpicker',
						'heading' => esc_html__( 'Icon Color', 'bridge-core' ),
						'param_name'  => 'icon_color',
						'admin_label' => true,
						'group'		  => esc_html__('Icon Style', 'bridge-core')
					),
					array(
						'type'        => 'colorpicker',
						'heading' => esc_html__( 'Icon Background Color', 'bridge-core' ),
						'param_name'  => 'icon_background_color',
						'group'		  => esc_html__('Icon Style', 'bridge-core')
					),
					array(
						'type'        => 'colorpicker',
						'heading' => esc_html__( 'Hover Icon Color', 'bridge-core' ),
						'param_name'  => 'hover_icon_color',
						'group'		  => esc_html__('Icon Style', 'bridge-core')
					),
					array(
						'type'        => 'colorpicker',
						'heading' => esc_html__( 'Hover Icon Background Color', 'bridge-core' ),
						'param_name'  => 'hover_icon_background_color',
						'group'		  => esc_html__('Icon Style', 'bridge-core')
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
						'type'        => 'textfield',
						'heading'     => esc_html__('Link', 'bridge-core'),
						'param_name'  => 'link',
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Target', 'bridge-core'),
						'param_name'  => 'target',
						'value' => array(
							esc_html__('Self', 'bridge-core')	=> '_self',
							esc_html__('Blank', 'bridge-core')	=> '_blank',
						),
					)
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
            'icon_size'				=> 'qode-icon-medium',
            'custom_icon_size'		=> '',
            'icon_shape_size'		=> '',
            'icon_color'		=> '',
            'icon_background_color'		=> '',
            'hover_icon_color'		=> '',
            'hover_icon_background_color'		=> '',
            'image'					=> '',
            'title'					=> '',
            'title_tag'				=> 'h3',
            'text'					=> '',
            'link'					=> '',
            'target'				=> ''
        );

		$args	= array_merge($args, bridge_qode_icon_collections()->getShortcodeParams());
        $params	= shortcode_atts($args, $atts);

		$iconPackName   = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$params['icon'] = $params[$iconPackName];

		$params['holder_classes'] = $this->getIconHolderClasses($params);
		$params['icon_holder_style'] = $this->getIconHolderStyle($params);
		$params['icon_holder_data'] = $this->getIconHolderData($params);
		$params['icon_style'] = $this->getIconStyle($params);

		return bridge_core_get_shortcode_template_part('templates/info-card-with-icon-template', 'info-card-with-icon', '', $params);
	}

	private function getIconHolderClasses($params) {
		$classes = array('qode-icon-holder', 'qode-icon-circle');

		if($params['custom_icon_size'] == '') {
			$classes[] = $params['icon_size'];
		}

		return implode(' ', $classes);
	}

	private function getIconHolderStyle($params) {
		$style = array();

		if($params['custom_icon_size']) {
			$style[] = 'font-size:' . $params['custom_icon_size'] . 'px';
		}
		if($params['icon_background_color']) {
			$style[] = 'background-color:' . $params['icon_background_color'];
		}
		if(!empty($params['icon_shape_size'])) {
			$style[] = 'width: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
			$style[] = 'height: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
			$style[] = 'line-height: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
		}
		return $style;
	}
	private function getIconStyle($params) {
		$style = array();


		if($params['icon_color']) {
			$style[] = 'color:' . $params['icon_color'];
		}

		return implode(';', $style);
	}
	private function getIconHolderData($params) {
		$iconHolderData = array();


		if(!empty($params['hover_icon_background_color'])) {
			$iconHolderData['data-hover-background-color'] = $params['hover_icon_background_color'];
		}

		if(!empty($params['hover_icon_color'])) {
			$iconHolderData['data-hover-color'] = $params['hover_icon_color'];
		}

		if(!empty($params['icon_color'])) {
			$iconHolderData['data-color'] = $params['icon_color'];
		}

		return $iconHolderData;
	}
}