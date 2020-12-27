<?php

class BridgeCoreElementorIcon extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_icon';
    }

    public function get_title() {
        return esc_html__( "Icon", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-icon';
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

        bridge_qode_icon_collections()->getElementorParamsArray($this, array(), '', true);

        $this->add_control(
            'size',
            [
                'label' => esc_html__( "Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__( 'Tiny', 'bridge-core' ),
                    'fa-2x' => esc_html__( 'Small', 'bridge-core' ),
                    'fa-3x' => esc_html__( 'Medium', 'bridge-core' ),
                    'fa-4x' => esc_html__( 'Large', 'bridge-core' ),
                    'fa-5x' => esc_html__( 'Very Large', 'bridge-core' ),
                ],
                'default' => 'fa-lg'
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__( "Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'circle' => esc_html__( 'Circle', 'bridge-core' ),
                    'square' => esc_html__( 'Square', 'bridge-core' )
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'custom_size',
            [
                'label' => esc_html__( "Custom Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'custom_shape_size',
            [
                'label' => esc_html__( "Custom Shape Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => array("circle", "square")
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__( "Icon Hover Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__( "Border Radius (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'square'
                ]
            ]
        );

        $this->add_control(
            'position',
            [
                'label' => esc_html__( "Position", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Normal', 'bridge-core' ),
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' ),
                ]
            ]
        );

        $this->add_control(
            'border',
            [
                'label' => esc_html__( "Border", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'yes',
                'condition' => [
                    'type' => 'square'
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description' => esc_html__( "Only for Square type", 'bridge-core' ),
                'condition' => [
                    'type' => 'square'
                ]
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__( "Border Width (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__( "Only for Square type", 'bridge-core' ),
                'condition' => [
                    'type' => 'square'
                ]
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( "Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => array("circle", "square")
                ]
            ]
        );

        $this->add_control(
            'hover_background_color',
            [
                'label' => esc_html__( "Hover Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => array("circle", "square")
                ]
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => esc_html__( "Margin", 'bridge-core' ),
                "description" => esc_html__( "Margin (top right bottom left)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'icon_animation',
            [
                'label' => esc_html__( "Icon Animation", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'No', 'bridge-core' ),
                    'q_icon_animation' => esc_html__( 'Yes', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'icon_animation_delay',
            [
                'label' => esc_html__( "Icon Animation Delay (ms)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_animation' => 'q_icon_animation'
                ]
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( "Link", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'anchor_icon',
            [
                'label' => esc_html__( "Use Link as Anchor", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
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

        $this->end_controls_section();

        // Add predefined developer tab content for each shortcode element
        $this->start_controls_section(
            'developer_tools',
            [
                'label' => esc_html__( 'Developer Tools', 'bridge-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shortcode_snippet',
            [
                'label'   => esc_html__( 'Show Shortcode Snippet', 'bridge-core' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'no',
                'options' => array(
                    'no'  => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/icon', '_icon', '', $params);
        }
    }

    private function get_shortcode_snippet( $params ) {
        $atts = array();

        if ( empty( $this ) || ! is_object( $this ) ) {
            return '';
        }

        if ( ! empty( $params ) ) {
            foreach ( $params as $key => $value ) {
                if ( is_array( $value ) || $key === 'shortcode_snippet' ) {
                    continue;
                }

                if( empty( $value ) || $value == '' ){
                    continue;
                }

                $atts[] = $key . '="' . esc_attr( $value ) . '"';
            }
        }

        return sprintf( '<textarea class="qode-shortcode-snipper-holder" rows="3" readonly>[%s %s]</textarea>',
            'icons',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorIcon() );