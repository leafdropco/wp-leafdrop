<?php

class BridgeCoreElementorBanner extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_banner';
    }

    public function get_title() {
        return esc_html__( 'Banner', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-banner';
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
                'label' => esc_html__( 'Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( 'Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'vertical_alignment',
            [
                'label' => esc_html__( 'Vertical Alignment', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'top' => esc_html__( 'Top', 'bridge-core' ),
                    'bottom' => esc_html__( 'Bottom', 'bridge-core' ),
                ],
                'default' => 'center'
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/banner', '_banner', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorBanner() );