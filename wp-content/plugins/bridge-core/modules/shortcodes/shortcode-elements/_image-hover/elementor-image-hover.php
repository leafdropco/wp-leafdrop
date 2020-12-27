<?php

class BridgeCoreElementorImageHover extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_image_hover';
    }

    public function get_title() {
        return esc_html__( "Image Hover", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-image-hover';
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
            'image',
            [
                'label' => esc_html__( "Image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'hover_image',
            [
                'label' => esc_html__( "Hover Image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( "Link", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( "Target", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );

        //had to be named bridge_animation instead of animation because of the conflict with elementor animation field
        $this->add_control(
            'bridge_animation',
            [
                'label' => esc_html__( "Animation", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'transition_delay',
            [
                'label' => esc_html__( "Transition delay", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'bridge_animation' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        if( ! empty( $params['hover_image'] ) ){
            $params['hover_image'] = $params['hover_image']['id'];
        }

        //revert bridge_animation to animation for template
        if( ! empty( $params['bridge_animation'] ) ){
            $params['animation'] = $params['bridge_animation'];
        }

        echo bridge_core_get_shortcode_template_part('templates/image-hover', '_image-hover', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorImageHover() );