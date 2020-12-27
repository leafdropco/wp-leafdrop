<?php
namespace Bridge\Shortcodes\GradientIconWithText;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class GradientIconWithText
 * @package Bridge\Shortcodes\GradientIconWithText
 */
class GradientIconWithText implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 *
	 */
	public function __construct() {
		$this->base = 'qode_gradient_icon_with_text';

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
			'name' => esc_html__( 'Gradient Icon With Text', 'bridge-core' ),
			'base'                      => $this->base,
			'icon'                      => 'icon-wpb-icon_text extended-custom-icon-qode',
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				bridge_qode_icon_collections()->getVCParamsArray(array(), '', true),
				array(
					array(
						'type'        => 'dropdown',
						'heading' => esc_html__( 'Icon Size', 'bridge-core' ),
						'param_name'  => 'icon_size',
						'value'       => array(
                            esc_html__( 'Tiny', 'bridge-core' ) => "fa-lg",
                            esc_html__( 'Small', 'bridge-core' ) => "fa-2x",
                            esc_html__( 'Medium', 'bridge-core' ) => "fa-3x",
                            esc_html__( 'Large', 'bridge-core' ) => "fa-4x",
                            esc_html__( 'Very Large', 'bridge-core' ) => "fa-5x"
						),
						'admin_label' => true,
						'save_always' => true,
						'group'       => esc_html__( 'Icon Settings', 'bridge-core' ),
						'description' => esc_html__( "Doesn't work when Icon Position is Top", 'bridge-core' )
					),
					array(
						'type'       => 'textfield',
						'heading' => esc_html__( 'Custom Icon Size (px)', 'bridge-core' ),
						'param_name' => 'custom_icon_size',
						'group'      => esc_html__( 'Icon Settings', 'bridge-core' )
					),
                    array(
                        'type'       => 'colorpicker',
                        'heading' => esc_html__( 'Icon Color', 'bridge-core' ),
                        'param_name' => 'icon_color',
                        'group'      => esc_html__( 'Icon Settings', 'bridge-core' )
                    ),
					array(
						'type'        => 'textfield',
						'heading' => esc_html__( 'Title', 'bridge-core' ),
						'param_name'  => 'title',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'       => 'dropdown',
						'heading' => esc_html__( 'Title Tag', 'bridge-core' ),
						'param_name' => 'title_tag',
						'value'      => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'dependency' => array('element' => 'title', 'not_empty' => true),
						'group'      => esc_html__( 'Text Settings', 'bridge-core' )
					),
					array(
						'type'        => 'dropdown',
						'heading' => esc_html__( 'Title Text Transform', 'bridge-core' ),
						'param_name'  => 'title_text_transform',
						'value'       => array_flip(bridge_qode_get_text_transform_array(true)),
						'save_always' => true,
						'group'       => esc_html__( 'Text Settings', 'bridge-core' )
					),
					array(
						'type'        => 'dropdown',
						'heading' => esc_html__( 'Title Text Font Weight', 'bridge-core' ),
						'param_name'  => 'title_text_font_weight',
						'value'       => array_flip(bridge_qode_get_font_weight_array(true)),
						'save_always' => true,
						'group'       => esc_html__( 'Text Settings', 'bridge-core' )
					),
					array(
						'type'       => 'colorpicker',
						'heading' => esc_html__( 'Title Color', 'bridge-core' ),
						'param_name' => 'title_color',
						'dependency' => array('element' => 'title', 'not_empty' => true),
						'group'      => esc_html__( 'Text Settings', 'bridge-core' )
					),
					array(
						'type'        => 'textfield',
						'heading' => esc_html__( 'Link', 'bridge-core' ),
						'param_name'  => 'link',
						'value'       => '',
						'admin_label' => true
					),
					array(
						'type'       => 'dropdown',
						'heading' => esc_html__( 'Target', 'bridge-core' ),
						'param_name' => 'target',
						'value'      => array(
							''      => '',
							esc_html__( 'Self', 'bridge-core' )  => '_self',
							esc_html__( 'Blank', 'bridge-core' ) => '_blank'
						),
						'dependency' => array('element' => 'link', 'not_empty' => true),
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
		$default_atts = array(
			'icon_size'                   => '',
			'custom_icon_size'            => '',
			'icon_color'                  => '',
			'title'                       => '',
			'title_tag'                   => 'h6',
			'title_text_transform'        => '',
			'title_text_font_weight'      => '',
			'title_color'                 => '',
			'link'                        => '',
			'target'                      => '_self'
		);

		$default_atts = array_merge($default_atts, bridge_qode_icon_collections()->getShortcodeParams());
		$params       = shortcode_atts($default_atts, $atts);

		$params['icon_parameters'] = $this->getIconParameters($params);
		$params['gradient_classes'] = $this->getGradientClasses($params);
		$params['holder_classes']  = $this->getHolderClasses($params);
		$params['title_styles']    = $this->getTitleStyles($params);

		return bridge_core_get_shortcode_template_part('templates/iwt', 'gradient-icon-with-text', '', $params);
	}

	/**
	 * Returns parameters for icon shortcode as a string
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getIconParameters($params) {
		$params_array = array();

		if(empty($params['custom_icon'])) {
			$iconPackName = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

			$params_array['icon_pack']   = $params['icon_pack'];
			$params_array[$iconPackName] = $params[$iconPackName];

			if(!empty($params['icon_size'])) {
				$params_array['size'] = $params['icon_size'];
			}

			if(!empty($params['custom_icon_size'])) {
				$params_array['custom_size'] = $params['custom_icon_size'];
			}

            if(!empty($params['icon_color'])) {
				$params_array['icon_color'] = $params['icon_color'];
			}

			$params_array['type'] = 'normal';

		}

		return $params_array;
	}

	/**
	 * Returns array of holder classes
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getHolderClasses($params) {
		$classes = array('qode-giwt');

		return $classes;
	}

    private function getGradientClasses($params) {
        $classes = 'qode-type1-gradient-bottom-to-top-text-hover';

        return $classes;
    }

	private function getTitleStyles($params) {
		$styles = array();

		if(!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}

		if(!empty($params['title_text_transform'])) {
			$styles[] = 'text-transform: '.$params['title_text_transform'];
		}

		if(!empty($params['title_text_font_weight'])) {
			$styles[] = 'font-weight: '.$params['title_text_font_weight'];
		}

		return $styles;
	}

}