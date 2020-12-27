<?php

class BridgeCoreElementorLatestPostsTwo extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_latest_posts_two';
    }

    public function get_title() {
        return esc_html__( "Latest Posts 2", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-latest-posts-two';
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
            'number_of_posts',
            [
                'label' => esc_html__( "Number of Posts", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'number_of_columns',
            [
                'label' => esc_html__( "Number of Colums", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__( 'One', 'bridge-core' ),
                    '2' => esc_html__( 'Two', 'bridge-core' ),
                    '3' => esc_html__( 'Three', 'bridge-core' ),
                    '4' => esc_html__( 'Four', 'bridge-core' ),
                ],
                'default' => '3'
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__( "Order By", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'title' => esc_html__( 'Title', 'bridge-core' ),
                    'date' => esc_html__( 'Date', 'bridge-core' )
                ],
                'default' => 'title'
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( "Order", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'ASC', 'bridge-core' ),
                    'DESC' => esc_html__( 'DESC', 'bridge-core' )
                ],
                'default' => 'ASC'
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( "Category Slug", 'bridge-core' ),
                "description" => esc_html__( "Leave empty for all or use comma for list", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_length',
            [
                'label' => esc_html__( "Text Length", 'bridge-core' ),
                "description" => esc_html__( "Number of characters", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '50'
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
                'default' => 'h5'
            ]
        );

        $this->add_control(
            'display_featured_images',
            [
                'label' => esc_html__( "Display Featured Images", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'featured_image_size',
            [
                'label' => esc_html__( "Image size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'full' => esc_html__( 'Full', 'bridge-core' ),
                    'landscape' => esc_html__( 'Landscape', 'bridge-core' ),
                    'portrait' => esc_html__( 'Portrait', 'bridge-core' ),
                    'custom' => esc_html__( 'Custom', 'bridge-core' ),
                ],
                'default' => '',
                'condition' => [
                    'display_featured_images' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => esc_html__( "Image Width (px)", 'bridge-core' ),
                "description" => esc_html__( "Set image custom width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'featured_image_size' => 'custom'
                ]
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => esc_html__( "Image Height (px)", 'bridge-core' ),
                "description" => esc_html__( "Set image custom height", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'featured_image_size' => 'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design_options',
            [
                'label' => esc_html__( 'Design Options', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__( "Separator Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'separator_gradient',
            [
                'label' => esc_html__( "Separator Gradient", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => esc_html__( "Excerpt Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'post_info_color',
            [
                'label' => esc_html__( "Post Info Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'post_info_separator_color',
            [
                'label' => esc_html__( "Post Info Separator Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( "Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/latest-posts-two', '_latest-posts-two', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorLatestPostsTwo() );