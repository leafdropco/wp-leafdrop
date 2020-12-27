<?php

class BridgeCoreElementorCarousel extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_carousel';
    }

    public function get_title() {
        return esc_html__( "Qode Carousel", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-carousel';
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
            'carousel',
            [
                'label' => esc_html__( "Carousel Slider", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => bridge_core_get_carousel_slider_array(),
            ]
        );

        $this->add_control(
            'number_of_visible_items',
            [
                'label' => esc_html__( "Number Of Visible Items", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'four_items' => esc_html__( 'Four', 'bridge-core' ),
                    'five_items' => esc_html__( 'Five', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__( "Order By", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'bridge-core' ),
                    'title' => esc_html__( 'Title', 'bridge-core' ),
                    'date' => esc_html__( 'Date', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( "Order", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( '', 'bridge-core' ),
                    'ASC' => esc_html__( 'ASC', 'bridge-core' ),
                    'DESC' => esc_html__( 'DESC', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'show_in_two_rows',
            [
                'label' => esc_html__( "Show Items In Two Rows?", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/carousel', '_carousel', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCarousel() );