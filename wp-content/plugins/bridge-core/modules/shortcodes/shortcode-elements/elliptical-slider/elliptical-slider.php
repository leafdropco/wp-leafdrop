<?php
namespace Bridge\Shortcodes\EllipticalSlider;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class EllipticalSlider implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_elliptical_slider';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Elliptical Slider', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'extended-custom-icon-qode icon-wpb-elliptical-slider',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'as_parent' => array('only' => 'qode_elliptical_slide'),
				'content_element'	=> true,
                'js_view' => 'VcColumnView',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Animation speed', 'bridge-core'),
                        'admin_label' => true,
                        'param_name' => 'animation_speed',
                        'value' => '',
                        'description' => esc_html__('Speed of slide animation in miliseconds', 'bridge-core')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Autoplay', 'bridge-core'),
                        'admin_label' => true,
                        'param_name' => 'autoplay',
                        'value' => array(
                            'No' => 'no',
                            'Yes' => 'yes'
                        ),
                        'description' => esc_html__('Enable this option if you want to have autoplay Elliptical Slider ', 'bridge-core')
                    )
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'animation_speed' => '',
            'autoplay'        => 'no'  
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';
        $html .= '<div class="qode-elliptical-slider">';
        $html .= '<div class="qode-elliptical-slider-slides"';
        if(!empty($animation_speed)){
            $html .= ' data-animation-speed = ' . $animation_speed;
        }

        $html .= ' data-autoplay = ' . $autoplay . '>';
        	$html .= do_shortcode($content);
        $html.= '</div>';
        $html.= '</div>';

        return $html;
    }
    
}