<?php

class BridgeCoreElementorAction extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_action';
    }

    public function get_title() {
        return esc_html__( 'Call to Action', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-call-to-action';
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
            'full_width',
            [
                'label' => esc_html__( "Full Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'content_in_grid',
            [
                'label' => esc_html__( "Content in grid", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'condition' => [
                    'full_width' => 'yes'
                ],
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__( "Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'simple' => esc_html__( 'Simple', 'bridge-core' ),
                    'with_icon' => esc_html__( 'With Icon', 'bridge-core' )
                ],
                'default' => 'normal'
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, ['type' => 'with_icon']);

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__( 'Small', 'bridge-core' ),
                    'fa-2x' => esc_html__( 'Medium', 'bridge-core' ),
                    'fa-3x' => esc_html__( 'Large', 'bridge-core' )
                ],
                'default' => 'fa-2x',
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
            'background_image',
            [
                'label' => esc_html__( "Background Image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'use_background_as_pattern',
            [
                'label' => esc_html__( 'Use background image as pattern?', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'padding_top',
            [
                'label' => esc_html__( "Padding Top (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'padding_bottom',
            [
                'label' => esc_html__( "Padding Bottom (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_size',
            [
                'label' => esc_html__( "Default Text Font Size", 'bridge-core' ),
                'description' => esc_html__( "Font size for p tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_font_weight',
            [
                'label' => esc_html__( "Text Font Weight", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'text_letter_spacing',
            [
                'label' => esc_html__( "Text Letter Spacing", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'show_button',
            [
                'label' => esc_html__( "Show Button", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'button_size',
            [
                'label' => esc_html__( "Button Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'small' => esc_html__( 'Small', 'bridge-core' ),
                    'medium' => esc_html__( 'Medium', 'bridge-core' ),
                    'large' => esc_html__( 'Large', 'bridge-core' ),
                    'big_large' => esc_html__( 'Big Large', 'bridge-core' ),
                ],
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( "Button Text", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( "Button Link", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_target',
            [
                'label' => esc_html__( "Button Target", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                ],
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__( "Button text color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__( "Button hover text color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__( "Button Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_hover_background_color',
            [
                'label' => esc_html__( "Button Hover Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_border_color',
            [
                'label' => esc_html__( "Button Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => esc_html__( "Button Hover Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "<p>".esc_html__( 'I am test text for Call to action.', 'bridge-core' )."</p>"
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['custom_icon'] ) ){
            $params['custom_icon'] = $params['custom_icon']['id'];
        }

        if( ! empty( $params['background_image'] ) ){
            $params['background_image'] = $params['background_image']['id'];
        }

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        echo bridge_core_get_shortcode_template_part('templates/action', '_action', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAction() );