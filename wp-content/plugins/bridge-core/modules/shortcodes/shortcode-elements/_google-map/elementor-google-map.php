<?php

class BridgeCoreElementorGoogleMap extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_google_map';
    }

    public function get_title() {
        return esc_html__( "Qode Google Map", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-google-map';
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
            'address1',
            [
                'label' => esc_html__( "Address 1", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'address2',
            [
                'label' => esc_html__( "Address 2", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'address3',
            [
                'label' => esc_html__( "Address 3", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'address4',
            [
                'label' => esc_html__( "Address 4", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'address5',
            [
                'label' => esc_html__( "Address 5", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label' => esc_html__( "Map Height", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'pin',
            [
                'label' => esc_html__( "Pin", 'bridge-core' ),
                'description' => esc_html__( "Select a pin image to be used on Google Map", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'snazzy_map_style',
            [
                'label' => esc_html__( 'Snazzy Map Style', 'bridge-core' ),
                'description' => esc_html__( 'Enabling this option will set predefined snazzy map style', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'snazzy_map_code',
            [
                'label' => esc_html__( 'Snazzy Map Code', 'bridge-core' ),
                'description' => sprintf( esc_html__( 'Fill code from snazzy map site %s to add predefined style for your google map', 'bridge-core' ), '<a href="https://snazzymaps.com/" target="_blank">https://snazzymaps.com/</a>' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'snazzy_map_style' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'custom_map_style',
            [
                'label' => esc_html__( 'Custom Map Style', 'bridge-core' ),
                'description' => esc_html__( "Enabling this option will allow to style map", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'false' => esc_html__('No', 'bridge-core'),
                    'true' => esc_html__('Yes', 'bridge-core'),
                ],
                'default' => 'false'
            ]
        );

        $this->add_control(
            'color_overlay',
            [
                'label' => esc_html__( "Color Overlay", 'bridge-core' ),
                'description' => esc_html__( "Choose a Map color overlay", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'custom_map_style' => 'true'
                ]
            ]
        );

        $this->add_control(
            'saturation',
            [
                'label' => esc_html__( "Saturation", 'bridge-core' ),
                "description" => esc_html__( "Choose a level of saturation (-100 = least saturated, 100 = most saturated)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'custom_map_style' => 'true'
                ]
            ]
        );

        $this->add_control(
            'lightness',
            [
                'label' => esc_html__( "Lightness", 'bridge-core' ),
                "description" => esc_html__( "Choose a level of lightness (-100 = darkest, 100 = lightest)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'custom_map_style' => 'true'
                ]
            ]
        );

        $this->add_control(
            'zoom',
            [
                'label' => esc_html__( "Map Zoom", 'bridge-core' ),
                "description" => esc_html__( "Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'google_maps_scroll_wheel',
            [
                'label' => esc_html__( "Zoom Map on Mouse Wheel", 'bridge-core' ),
                "description" => esc_html__( "Enabling this option will allow users to zoom in on Map using mouse wheel", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'false' => esc_html__('No', 'bridge-core'),
                    'true' => esc_html__('Yes', 'bridge-core'),
                ],
                'default' => 'false'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['is_elementor'] = true;
        if( ! empty( $params['pin'] ) ){
            $params['pin'] = $params['pin']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/google-map', '_google-map', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorGoogleMap() );