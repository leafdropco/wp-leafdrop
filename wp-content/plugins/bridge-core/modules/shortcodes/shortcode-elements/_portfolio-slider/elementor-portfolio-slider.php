<?php

class BridgeCoreElementorPortfolioSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_portfolio_slider';
    }

    public function get_title() {
        return esc_html__( "Portfolio Slider", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-portfolio-slider';
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
            'order_by',
            [
                'label' => esc_html__( "Order By", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'menu_order' => esc_html__( 'Menu Order', 'bridge-core' ),
                    'title' => esc_html__( 'Title', 'bridge-core' ),
                    'date' => esc_html__( 'Date', 'bridge-core' )
                ],
                'default' => 'menu_order'
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( "Order", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'ASC' => esc_html__( 'ASC', 'bridge-core' ),
                    'DESC' => esc_html__( 'DESC', 'bridge-core' )
                ],
                'default' => 'ASC'
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( "Number", 'bridge-core' ),
                "description" => esc_html__( "Number of portolios on page (-1 is all)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '-1'
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( "Category", 'bridge-core' ),
                "description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'selected_projects',
            [
                'label' => esc_html__( "Selected Projects", 'bridge-core' ),
                "description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'number_of_items',
            [
                'label' => esc_html__( "Number of Items Shown", 'bridge-core' ),
                "description" => esc_html__( " Number of items that are showing at the same time in full width (on smaller screens/sizes, due to responsiveness, there will be less items shown)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '4' => esc_html__( 'Four', 'bridge-core' ),
                    '5' => esc_html__( 'Five', 'bridge-core' ),
                ],
                'default' => '4'
            ]
        );

        $this->add_control(
            'lightbox',
            [
                'label' => esc_html__( "Lightbox", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'separator',
            [
                'label' => esc_html__( "Separator", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'hide_button',
            [
                'label' => esc_html__( 'Hide "View" Button', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__( "Image proportions", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Original', 'bridge-core' ),
                    'square' => esc_html__( 'Square (cropped to 570x570)', 'bridge-core' ),
                    'landscape' => esc_html__( 'Landscape (cropped to 800x600)', 'bridge-core' ),
                    'portfolio_slider' => esc_html__( 'Landscape (cropped to 500x380)', 'bridge-core' ),
                    'portrait' => esc_html__( 'Portrait (cropped to 600x800)', 'bridge-core' ),
                ],
                'default' => 'portfolio-square'
            ]
        );

        $this->add_control(
            'enable_navigation',
            [
                'label' => esc_html__( "Prev/Next navigation", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'portfolio-square'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/portfolio-slider', '_portfolio-slider', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPortfolioSlider() );