<?php

class BridgeCoreElementorMessage extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_message';
    }

    public function get_title() {
        return esc_html__( "Message", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-message';
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
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'with_icon' => esc_html__( 'With Icon', 'bridge-core' ),
                ],
                'default' => 'normal'
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, ['type' => 'with_icon'], '', true);

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__( 'Small', 'bridge-core' ),
                    'fa-2x' => esc_html__( 'Medium', 'bridge-core' ),
                    'fa-3x' => esc_html__( 'Large', 'bridge-core' ),
                ],
                'default' => 'fa-lg',
                'condition' => [
                    'type' => 'with_icon'
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => 'with_icon'
                ]
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => esc_html__( "Icon Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => 'with_icon'
                ]
            ]
        );

        $this->add_control(
            'custom_icon',
            [
                'label' => esc_html__( "Custom Icon", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'type' => 'with_icon'
                ]
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( "Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'border',
            [
                'label' => esc_html__( "Border", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => ''
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__( "Border Width (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'border' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'border' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'close_button_color',
            [
                'label' => esc_html__( "Close Button Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<p>".esc_html__( 'I am test text for Message shortcode.', 'bridge-core' )."</p>"
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );
        $params['is_elementor'] = true;

        if( ! empty($params['custom_icon']) ){
            $params['custom_icon'] = $params['custom_icon']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/message', '_message', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorMessage() );