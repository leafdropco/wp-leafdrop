<?php
namespace Bridge\Shortcodes\SimpleQuote;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class SimpleQuote implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_simple_quote';
        add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Simple Quote', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-simple-quote extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => esc_html__('Simple Quote Background Color', 'bridge-core'),
                        'param_name'    => 'background_color'
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Simple Quote holder border radius', 'bridge-core'),
                        'param_name'    => 'border_radius',
                        'description'   => esc_html__('Please insert border radius(Rounded corners) in px. Omit px', 'bridge-core'),
                        'group'        => esc_html__('Style', 'bridge-core')
                    ),
                    array(
                        'type'          => 'dropdown',
                        'heading'       => esc_html__('Enable shadow', 'bridge-core'),
                        'param_name'    => 'shadow',
                        'description'   => esc_html__('Choose yes to enable shadow around simple quote', 'bridge-core'),
                        'value'         => array(
                            esc_html__( 'No', 'bridge-core' )    => 'no',
                            esc_html__( 'Yes', 'bridge-core' )   => 'yes'
                        ),
                        'group'        => esc_html__('Style', 'bridge-core')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Simple Quote holder padding', 'bridge-core'),
                        'param_name'    => 'holder_padding',
                        'description'   => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'bridge-core'),
                        'group'        => esc_html__('Style', 'bridge-core')
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Simple Quote Text', 'bridge-core'),
                        'param_name'    => 'simple_quote_text'
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Title Tag', 'bridge-core'),
                        'param_name' => 'text_title_tag',
                        'value' => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                            'p'  => 'p'
                        )
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Simple Quote Author', 'bridge-core'),
                        'param_name'    => 'simple_quote_author'
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Title Tag', 'bridge-core'),
                        'param_name' => 'author_title_tag',
                        'value' => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                            'p'  => 'p'
                        )
                    ),
                    array(
                        'type'          => 'textfield',
                        'heading'       => esc_html__('Space between quote text and author', 'bridge-core'),
                        'param_name'    => 'simple_quote_spacing',
                        'description'   => esc_html__('Inset spacing between quote title and author in pixels, omit px', 'bridge-core'),
                        'group'        => esc_html__('Style', 'bridge-core')
                    ),
                    array(
                        'type'          => 'colorpicker',
                        'heading'       => esc_html__('Quote symbol color', 'bridge-core'),
                        'param_name'    => 'quote_symbol_color',
                        'group'        => esc_html__('Style', 'bridge-core')
                    ),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'background_color'      => '',
            'border_radius'         => '',
            'holder_padding'        => '',
            'simple_quote_text'     => '',
            'text_title_tag'        => 'h2',
            'simple_quote_author'   => '',
            'author_title_tag'      => 'p',
            'simple_quote_spacing'  => '',
            'quote_symbol_color'    => '',
            'shadow'                => 'no'
        );

        $params = shortcode_atts($args, $atts);

        $params['holder_style'] = $this->getHolderStyle($params);
        $params['triangle_style'] = $this->getTriangleStyle($params); 

        extract($params);

        $html = bridge_core_get_shortcode_template_part('templates/simple-quote-template', 'simple-quote', '', $params);

        return $html;
    }

    private function getHolderStyle($params){
        $styles = array();

        if (!empty($params['background_color'])) {
            $styles[] = 'background-color: '.$params['background_color'];
            $styles[] = 'border-color: '.$params['background_color'];
        }

        if(!empty($params['border_radius'])) {
            $styles[] = 'border-radius: '.$params['border_radius'].'px';
        }

        if(!empty($params['holder_padding'])) {
            $styles[] = 'padding: '.$params['holder_padding'];
        }

        return $styles;
    }

    private function getTriangleStyle($params){
        $styles = array();

        if (!empty($params['background_color'])) {
            $styles[] = 'border-bottom-color: '.$params['background_color'];
        }

        return $styles;
    }


}