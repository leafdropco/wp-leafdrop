<?php

class BridgeCoreElementorMasonryBlog extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_masonry_blog';
    }

    public function get_title() {
        return esc_html__( "Blog Masonry", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-masonry-blog';
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
            'order_by',
            [
                'label' => esc_html__( "Order By", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'title' => esc_html__( 'Title', 'bridge-core' ),
                    'date' => esc_html__( 'Date', 'bridge-core' ),
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
                    'DESC' => esc_html__( 'DESC', 'bridge-core' ),
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
                'label' => esc_html__( "Text length", 'bridge-core' ),
                "description" => esc_html__( "Number of characters", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
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
            'display_time',
            [
                'label' => esc_html__( "Display date", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    '1' => esc_html__( 'Yes', 'bridge-core' ),
                    '0' => esc_html__( 'No', 'bridge-core' ),
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'display_comments',
            [
                'label' => esc_html__( "Display comments", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    '1' => esc_html__( 'Yes', 'bridge-core' ),
                    '0' => esc_html__( 'No', 'bridge-core' ),
                ],
                'default' => '1'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/masonry-blog', '_masonry-blog', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorMasonryBlog() );