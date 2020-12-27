<?php

class BridgeCoreElementorInfoCard extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_info_card';
    }

    public function get_title() {
        return esc_html__('Info Card', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-info-card';
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
            'image',
            [
                'label' => esc_html__('Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Info Card Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'title_tag',
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
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Info Card Text Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'enable_button',
            [
                'label' => esc_html__('Enable Button', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_target',
            [
                'label' => esc_html__('Button Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' => esc_html__('Blank', 'bridge-core'),
                ],
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_height',
            [
                'label' => esc_html__('Button Height(px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        $params['button_style']	= $this->getButtonStyle($params);
        $params['holder_style']	= $this->getHolderStyle($params);
        $params['text_style'] = $this->getTextStyle($params);

        echo bridge_core_get_shortcode_template_part('templates/info-card-template', 'info-card', '', $params);
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

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInfoCard() );