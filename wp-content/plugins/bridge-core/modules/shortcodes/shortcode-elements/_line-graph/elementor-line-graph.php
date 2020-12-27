<?php

class BridgeCoreElementorLineGraph extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_line_graph';
    }

    public function get_title() {
        return esc_html__( "Line Graph", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-line-graph';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__( "Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'rounded' => esc_html__( 'Rounded edges', 'bridge-core' ),
                    'sharp' => esc_html__( 'Sharp edges', 'bridge-core' ),
                ],
                'default' => 'rounded'
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => esc_html__( "Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '750'
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( "Height", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '350'
            ]
        );

        $this->add_control(
            'custom_color',
            [
                'label' => esc_html__( "Custom Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'scale_steps',
            [
                'label' => esc_html__( "Scale steps", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '6'
            ]
        );

        $this->add_control(
            'scale_step_width',
            [
                'label' => esc_html__( "Scale step width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '20'
            ]
        );

        $this->add_control(
            'labels',
            [
                'label' => esc_html__( "Labels", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Label 1, Label 2, Label 3', 'bridge-core' ),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__( '#1abc9c,Legend One,1,5,10;#5ed0ba,Legend Two,3,7,20;#8cddcd,Legend Three,10,2,34', 'bridge-core' )
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/line-graph', '_line-graph', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorLineGraph() );