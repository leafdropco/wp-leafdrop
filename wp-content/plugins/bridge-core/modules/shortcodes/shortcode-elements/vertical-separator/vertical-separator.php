<?php
namespace Bridge\Shortcodes\VerticalSeparator;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class VerticalSeparator implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_vertical_separator';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Vertical Separator', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-vertical-separator extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Height', 'bridge-core'),
						'param_name'	=> 'vs_height'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Width', 'bridge-core'),
						'param_name'	=> 'vs_width'
					),
					array(
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Color', 'bridge-core'),
						'param_name'	=> 'vs_color'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Separator Margins', 'bridge-core'),
						'description'	=> esc_html__('Please insert margin in format: 0px 0px 10px 0px', 'bridge-core'),
						'param_name'	=> 'vs_margin'
					),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'vs_height'	=> '',
            'vs_width'	=> '',
            'vs_color'	=> '',
            'vs_margin'	=> ''
        );

        $params = shortcode_atts($args, $atts);

        $params['holder_style'] = $this->getHolderStyle($params);

		extract($params);

        $html = bridge_core_get_shortcode_template_part('templates/vertical-separator-template', 'vertical-separator', '', $params);

        return $html;
    }

    private function getHolderStyle($params){
    	$styles = array();

    	if(!empty($params['vs_height'])){
    		$styles[] = 'height: '.$params['vs_height'].'px';
    	}

    	if(!empty($params['vs_width'])){
    		$styles[] = 'width: '.$params['vs_width'].'px';
    	}

    	if(!empty($params['vs_color'])){
    		$styles[] = 'background-color: '.$params['vs_color'];
    	}

    	if(!empty($params['vs_margin'])){
    		$styles[] = 'margin: '.$params['vs_margin'];
    	}

    	return $styles;
    }


}