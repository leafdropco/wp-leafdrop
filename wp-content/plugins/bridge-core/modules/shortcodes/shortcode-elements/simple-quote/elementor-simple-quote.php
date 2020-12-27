<?php

class BridgeCoreElementorSimpleQuote extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_simple_quote';
    }

    public function get_title() {
        return esc_html__( 'Simple Quote', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-simple-quote';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Simple Quote Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'simple_quote_text',
            [
                'label' => esc_html__('Simple Quote Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                    'p'  => 'p'
                ],
                'default' => 'h2'
            ]
        );

        $this->add_control(
            'simple_quote_author',
            [
                'label' => esc_html__('Simple Quote Author', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'author_title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                    'p'  => 'p'
                ],
                'default' => 'p'
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__( 'Style', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Simple Quote holder border radius', 'bridge-core'),
                'description'   => esc_html__('Please insert border radius(Rounded corners) in px. Omit px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'shadow',
            [
                'label' => esc_html__('Enable shadow', 'bridge-core'),
                'description' => esc_html__('Choose yes to enable shadow around simple quote', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'holder_padding',
            [
                'label' => esc_html__('Simple Quote holder padding', 'bridge-core'),
                'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'simple_quote_spacing',
            [
                'label' => esc_html__('Space between quote text and author', 'bridge-core'),
                'description' => esc_html__('Inset spacing between quote title and author in pixels, omit px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'quote_symbol_color',
            [
                'label' => esc_html__('Quote symbol color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['holder_style'] = $this->getHolderStyle($params);
        $params['triangle_style'] = $this->getTriangleStyle($params);

        echo bridge_core_get_shortcode_template_part('templates/simple-quote-template', 'simple-quote', '', $params);
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSimpleQuote() );