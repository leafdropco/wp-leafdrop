<?php

class BridgeCoreElementorBlockquote extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_blockquote';
    }

    public function get_title() {
        return esc_html__( 'Blockquote', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-blockquote';
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
            'text',
            [
                'label' => esc_html__( "Text", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Blockquote text', 'bridge-core' ),
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( "Text Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => esc_html__( "Width", 'bridge-core' ),
                'description' => esc_html__( "Width (%)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'line_height',
            [
                'label' => esc_html__( "Line Height", 'bridge-core' ),
                'description' => esc_html__( "Line Height (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( "Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'show_quote_icon',
            [
                'label' => esc_html__( "Show Quote Icon", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'quote_icon_color',
            [
                'label' => esc_html__( "Quote Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_quote_icon' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/blockquote', '_blockquote', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorBlockquote() );