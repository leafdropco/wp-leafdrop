<?php

namespace Bridge\Shortcodes\ImageWithIconAndText;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsGallery
 */
class ImageWithIconAndText implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsGallery constructor.
	 */
	public function __construct() {
		$this->base = 'qode_image_with_icon_and_text';

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
			'name'                      => esc_html__('Image With Icon And Text', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by QODE', 'bridge-core'),
			'icon'                      => 'icon-wpb-image-with-icon-and-text extended-custom-icon-qode',
            'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__('Image', 'bridge-core'),
						'param_name'  => 'image'
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Margin Below Image', 'bridge-core'),
						'param_name'  => 'margin_below_image'
					)),
				bridge_qode_icon_collections()->getVCParamsArray(array(), '', true),
				array(
                    array(
                        'type'       => 'attach_image',
                        'param_name' => 'custom_icon',
                        'heading'    => esc_html__( 'Custom Icon', 'bridge-core' )
                    ),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Icon Size', 'bridge-core' ),
						'admin_label' => true,
						'save_always' => true,
						'param_name'  => 'icon_size',
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
						'heading'     => esc_html__( 'Icon Shape Size (px)', 'bridge-core' ),
						'param_name'  => 'icon_shape_size',
						'value'       => ''
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => esc_html__( 'Icon Custom Size (px)', 'bridge-core' ),
						'param_name'  => 'custom_icon_size',
						'value'       => ''
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
            'custom_icon'		    => '',
            'image'					=> '',
            'margin_below_image'	=> '',
            'title'					=> '',
            'title_tag'				=> 'h3',
            'text'					=> ''
        );

		$args	= array_merge($args, bridge_qode_icon_collections()->getShortcodeParams());
        $params	= shortcode_atts($args, $atts);

        if($params['icon_pack'] != '') {
			$iconPackName = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
			$params['icon'] = $params[$iconPackName];
		}
		$params['holder_classes'] = $this->getIconHolderClasses($params);
		$params['icon_style'] = $this->getIconHolderStyle($params);
		$params['image_style'] = $this->getImageStyle($params);

		return bridge_core_get_shortcode_template_part('templates/image-with-icon-and-text-template', 'image-with-icon-and-text', '', $params);
	}

	private function getIconHolderClasses($params) {
		$classes = array('qode-icon-holder', 'qode-icon-circle');

		if($params['custom_icon_size'] == '') {
			$classes[] = $params['icon_size'];
		}

		return implode(' ', $classes);
	}
	private function getImageStyle($params) {
		$style = array();

		if($params['margin_below_image']) {
			$style[] = 'margin-bottom:' . $params['margin_below_image'] . 'px';
		}

		return $style;
	}

	private function getIconHolderStyle($params) {
		$style = array();

		if($params['custom_icon_size']) {
			$style[] = 'font-size:' . $params['custom_icon_size'] . 'px';
		}
		if(!empty($params['icon_shape_size'])) {
			$style[] = 'width: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
			$style[] = 'height: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
			$style[] = 'line-height: '.bridge_qode_filter_px($params['icon_shape_size']).'px';
		}
		return $style;
	}
}