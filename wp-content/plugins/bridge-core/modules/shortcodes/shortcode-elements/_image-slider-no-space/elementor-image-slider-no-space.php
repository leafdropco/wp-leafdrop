<?php

class BridgeCoreElementorImageSliderNoSpace extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_image_slider_no_space';
    }

    public function get_title() {
        return esc_html__( "Qode Image Slider", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-image-slider-no-space';
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
            'images',
            [
                'label' => esc_html__( "Images", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY
            ]
        );

        $this->add_control(
            'on_click',
            [
                'label' => esc_html__( "On click", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Do nothing', 'bridge-core' ),
                    'prettyphoto' => esc_html__( 'Open image in prettyphoto', 'bridge-core' ),
                    'new_tab' => esc_html__( 'Open image in new tab', 'bridge-core' ),
                    'use_custom_links' => esc_html__( 'Use custom links', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'custom_links',
            [
                'label' => esc_html__( "Custom Links", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                "description" => esc_html__( "Enter links for each image here. Divide links with comma.", 'bridge-core' ),
                'condition' => [
                    'on_click' => 'use_custom_links'
                ]
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( "Slider height (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'navigation_style',
            [
                'label' => esc_html__( "Navigation style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'light' => esc_html__( 'Light', 'bridge-core' ),
                    'dark' => esc_html__( 'Dark', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'highlight_active_image',
            [
                'label' => esc_html__( "Highlight active image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => ''
            ]
        );

        $this->add_control(
            'highlight_inactive_color',
            [
                'label' => esc_html__( "Highlight Inactive Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'highlight_active_image' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'highlight_inactive_opacity',
            [
                'label' => esc_html__( "Highlight Inactive Opacity (0-1)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'highlight_active_image' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $images_array = array();

        foreach ( $params['images'] as $image ){
            $images_array[] = $image['id'];
        }

        $params['images'] = implode(',', $images_array);

        echo bridge_core_get_shortcode_template_part('templates/image-slider-no-space', '_image-slider-no-space', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorImageSliderNoSpace() );