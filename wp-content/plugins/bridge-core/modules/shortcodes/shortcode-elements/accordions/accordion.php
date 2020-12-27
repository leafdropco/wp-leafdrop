<?php
namespace Bridge\Shortcodes\Accordion;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class Accordion implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_accordion';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Qode Accordion', 'bridge-core'),
                'base' => $this->base,
				'as_parent' => array('only' => 'qode_accordion_tab'),
				'content_element' => true,
                'icon' => 'icon-wpb-accordion extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
				'js_view' => 'VcColumnView',
                'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Style', 'bridge-core'),
						'param_name' => 'style',
						'value' => array(
							esc_html__('Accordion', 'bridge-core')             => 'accordion',
							esc_html__('Toggle', 'bridge-core')                => 'toggle'
						)
					),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'style'					=> 'accordion',
        );

        $params = shortcode_atts($args, $atts);

		extract($params);
		
 		$acc_class = $this->getAccordionClasses($params);
		$params['acc_class'] = $acc_class;
		$params['content'] = $content;

        $html = bridge_core_get_shortcode_template_part('templates/accordion-holder-template', 'accordions', '', $params);

        return $html;
    }


	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		
		$acc_class = array();
		$style = $params['style'];
		switch($style) {
			case 'toggle':
				$acc_class[] = 'qode-toggle';
				$acc_class[] = 'qode-initial';
				break;
			default:
				$acc_class[] = 'qode-accordion';
				$acc_class[] = 'qode-initial';
		}

		return implode(' ', $acc_class);
	}
}