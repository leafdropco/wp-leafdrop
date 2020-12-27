<?php
namespace Bridge\Shortcodes\ComparisonSlider;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ComparisonSlider
 */
class ComparisonSlider implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qode_comparison_slider';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Comparison Slider', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => 'by QODE',
			'icon'                      => 'icon-wpb-comparison-slider extended-custom-icon-qode',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'attach_image',
					'admin_label' => true,
					'heading'     => esc_html__('Image Before', 'bridge-core'),
					'param_name'  => 'image_before',
					'description' => ''
				),
				array(
					'type'        => 'attach_image',
					'admin_label' => true,
					'heading'     => esc_html__('Image After', 'bridge-core'),
					'param_name'  => 'image_after',
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__('Orientation', 'bridge-core'),
					'param_name'  => 'orientation',
					'value'       => array(
						esc_html__('Horizontal', 'bridge-core') => 'horizontal',
						esc_html__('Vertical', 'bridge-core')   => 'vertical',
					),
					'save_always' => true
				),
				array(
				    'type'          => 'dropdown',
                    'param_name'    => 'enable_frame',
                    'heading'       => esc_html__('Enable Frame', 'bridge-core'),
                    'value'         => array_flip(bridge_qode_get_yes_no_select_array( false, false)),
                    'save_always'   => true,
                    'dependency'    => array('element' => 'orientation', 'value' => 'horizontal')
                ),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Default Offset', 'bridge-core'),
					'param_name'  => 'offset',
					'description' => esc_html__('Default value is 50 (%)', 'bridge-core')
				),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'nav_skin',
                    'heading'       => esc_html__('Slider Arrows Skin', 'bridge-core'),
                    'value'         => array(
                        esc_html__('Light/Default', 'bridge-core')     => 'light',
                        esc_html__('Dark', 'bridge-core') => 'dark'
                    ),
                    'save_always'   => true
                ),
			)
		));

	}

	public function render($atts, $content = null) {

		$args = array(
			'image_before' => '',
			'image_after'  => '',
			'orientation'  => 'horizontal',
			'enable_frame' => 'no',
			'offset'       => '',
            'nav_skin'     => 'light'
		);

		$params = shortcode_atts($args, $atts);

		$params['data_attrs'] = $this->getDataAttribute($params);

		$params['holder_classes'] = $this->getHolderClasses($params);

		$html = bridge_core_get_shortcode_template_part('templates/cmp-slider-template', 'comparison-slider', '', $params);

		return $html;
	}

	private function getDataAttribute($params) {

		$data_attrs = array();

		if ($params['orientation'] !== '') {
			$data_attrs['data-orientation'] = $params['orientation'];
		}

		$data_attrs['data-offset'] = $params['offset'] !== '' ? $params['offset'] : 50;

		return $data_attrs;
	}

	private function getHolderClasses($params){

	    $holder_classes[] = 'qode-comparison-slider';

	    if(!empty($params['enable_frame']) && $params['enable_frame'] =='yes'){
            $holder_classes[] = 'qode-comparison-slider-with-frame';
        }

        if(!empty($params['nav_skin'])){
            $holder_classes[] = 'qode-comparison-slider-' . $params['nav_skin'];
        }

        return implode(' ', $holder_classes);
    }
}