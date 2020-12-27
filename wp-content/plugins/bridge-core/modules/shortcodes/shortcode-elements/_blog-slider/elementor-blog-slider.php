<?php

class BridgeCoreElementorBlogSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_blog_slider';
    }

    public function get_title() {
        return esc_html__( 'Blog Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-blog-slider';
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
                'label' => esc_html__( "Slider Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                "description" => esc_html__( "Default type is Carousel", 'bridge-core' ),
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'carousel' => esc_html__( 'Carousel', 'bridge-core' ),
                    'simple' => esc_html__( 'Simple', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'auto_start',
            [
                'label' => esc_html__( "Auto Start", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'false' => esc_html__( 'No', 'bridge-core' ),
                    'true' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'false'
            ]
        );

        $this->add_control(
            'info_position',
            [
                'label' => esc_html__( "Post Info Position", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default(Overlay)', 'bridge-core' ),
                    'info_in_bottom_always' => esc_html__( 'Bottom', 'bridge-core' )
                ],
                'default' => '',
                'condition' => [
                    'type' => array('carousel', '')
                ]
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__( "Image size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'full' => esc_html__( 'Original Size', 'bridge-core' ),
                    'landscape' => esc_html__( 'Landscape', 'bridge-core' ),
                    'portrait' => esc_html__( 'Portrait', 'bridge-core' ),
                    'custom' => esc_html__( 'Custom', 'bridge-core' )
                ],
                'default' => 'full',
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => esc_html__( "Image Width (px)", 'bridge-core' ),
                "description" => esc_html__( "Set image custom width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'image_size' => 'custom'
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
                    'image_size' => 'custom'
                ]
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
                'default' => 'date'
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
            'number',
            [
                'label' => esc_html__( "Number", 'bridge-core' ),
                "description" => esc_html__( "Number of blog posts on page (-1 is all)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '-1'
            ]
        );

        $this->add_control(
            'blogs_shown',
            [
                'label' => esc_html__( "Number of Blog Posts Shown", 'bridge-core' ),
                "description" => esc_html__( "Number of blog posts that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6"
                ],
                'condition' => [
                    'type' => array('carousel', '')
                ]
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( "Category", 'bridge-core' ),
                "description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'selected_projects',
            [
                'label' => esc_html__( "Selected Projects", 'bridge-core' ),
                "description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'hover_box_color',
            [
                'label' => esc_html__( "Info Box Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'post_info_position',
            [
                'label' => esc_html__( "Post Info Position", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'above_title' => esc_html__( 'Above Title', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => 'simple'
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'show_categories',
            [
                'label' => esc_html__( "Show Category Names", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( "Category Name Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_categories' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'day_color',
            [
                'label' => esc_html__( "Day Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'info_position' => 'info_in_bottom_always'
                ]
            ]
        );

        $this->add_control(
            'day_font_size',
            [
                'label' => esc_html__( "Day Font Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'info_position' => 'info_in_bottom_always'
                ]
            ]
        );

        $this->add_control(
            'month_color',
            [
                'label' => esc_html__( "Month Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'info_position' => 'info_in_bottom_always'
                ]
            ]
        );

        $this->add_control(
            'month_font_size',
            [
                'label' => esc_html__( "Month Font Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'info_position' => 'info_in_bottom_always'
                ]
            ]
        );

        $this->add_control(
            'show_date',
            [
                'label' => esc_html__( "Show Date", 'bridge-core' ),
                "description" => esc_html__( "Default value is Yes, does not affect Carousel type - post info position bottom", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => esc_html__( "Date Color", 'bridge-core' ),
                "description" => esc_html__( "Does not affect Carousel type - post info position bottom", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_date' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'show_author',
            [
                'label' => esc_html__( "Show Author", 'bridge-core' ),
                "description" => esc_html__( "Default value is Yes", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'condition' => [
                    'type' => 'simple'
                ]
            ]
        );

        $this->add_control(
            'author_color',
            [
                'label' => esc_html__( "Author Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_author' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ""   => "",
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
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'show_comments',
            [
                'label' => esc_html__( "Show Comments", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'condition' => [
                    'info_position' => 'info_in_bottom_always'
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'comments_color',
            [
                'label' => esc_html__( "Comments Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_comments' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'show_excerpt',
            [
                'label' => esc_html__( "Show Excerpt", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'condition' => [
                    'type' => 'simple'
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label' => esc_html__( "Excerpt Length", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'show_excerpt' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => esc_html__( "Excerpt Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_excerpt' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'show_read_more',
            [
                'label' => esc_html__( "Show Read More Button", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__( 'Default', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                    'no' => esc_html__( 'No', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => 'simple'
                ],
                'default' => 'default'
            ]
        );

        $this->add_control(
            'read_more_button_size',
            [
                'label' => esc_html__('Read More Button Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'small' => esc_html__('Small', 'bridge-core'),
                    'medium' => esc_html__( 'Medium', 'bridge-core' ),
                    'large' => esc_html__( 'Large', 'bridge-core' ),
                ],
                'condition' => [
                    'show_read_more' => 'yes'
                ],
                'default' => 'small'
            ]
        );

        $this->add_control(
            'enable_navigation',
            [
                'label' => esc_html__( 'Prev/Next navigation', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER
            ]
        );

        $this->add_control(
            'add_class',
            [
                'label' => esc_html__( "Extra class name", 'bridge-core' ),
                'description' => esc_html__( "If you wish to style this particular blog slider differently, you can use this field to add an extra class name to it and then refer to that class name in your css file.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/blog-slider', '_blog-slider', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorBlogSlider() );