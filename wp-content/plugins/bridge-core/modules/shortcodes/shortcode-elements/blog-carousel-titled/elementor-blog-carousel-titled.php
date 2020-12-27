<?php

class BridgeCoreElementorBlogCarouselTitled extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_blog_carousel_titled';
    }

    public function get_title() {
        return esc_html__( 'Blog Carousel - Titled', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-blog-carousel-titled';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls(){

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'posts_title_tag',
            [
                'label' => esc_html__('Posts Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__('Image size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'full' => esc_html__('Original Size', 'bridge-core'),
                    'landscape' => esc_html__('Landscape', 'bridge-core'),
                    'portrait' => esc_html__('Portrait', 'bridge-core'),
                ],
                'default' => 'full'
            ]
        );

        $this->add_control(
            'excerpt_length',
            [
                'label' => esc_html__('Excerpt Length', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'posts_shown',
            [
                'label' => esc_html__('Number of Blog Posts Shown', 'bridge-core'),
                'description' => esc_html__('Number of blog posts that are showing at the same time (on smaller screens is responsive so there will be less items shown)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'query',
            [
                'label' => esc_html__( 'Build Query', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__('Number', 'bridge-core'),
                'description'	=> esc_html__('Number of blog posts on page (Leave empty for all)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '-1'
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__('Order By', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'date' => esc_html__('Date', 'bridge-core'),
                    'title' => esc_html__('Title', 'bridge-core')
                ],
                'default' => 'date'
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Order', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'DESC' => esc_html__('DESC', 'bridge-core'),
                    'ASC' => esc_html__('ASC', 'bridge-core')
                ],
                'default' => 'DESC'
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__('Category', 'bridge-core'),
                'description'	=> esc_html__('Category Slug (leave empty for all)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'selected_projects',
            [
                'label' => esc_html__('Selected Posts', 'bridge-core'),
                'description' => esc_html__('Selected Posts (leave empty for all, delimit by comma)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__( 'Style', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_background_color',
            [
                'label' => esc_html__('Title Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $query_args = $this->createQueryArgs($params);
        $blog_query = new \WP_Query($query_args);
        $params['blog_query'] = $blog_query;
        $params['holder_data'] = $this->getHolderData($params);
        $params['thumb_size'] = $this->getImageSize($params);
        $params['title_style'] = $this->getTitleStyle($params);

        echo bridge_core_get_shortcode_template_part('templates/blog-carousel-titled-template', 'blog-carousel-titled', '', $params);
    }

    private function createQueryArgs($params) {

        $args = array(
            'post_type'			=> 'post',
            'orderby'			=> $params['order_by'],
            'order'				=> $params['order'],
            'posts_per_page'	=> $params['number']
        );

        if($params['category'] !== '') {
            $args['category_name'] = $params['category'];
        }

        if($params['selected_projects'] !== '') {
            $args['post__in'] = explode(",", $params['selected_projects']);
        }

        return $args;
    }

    private function getHolderData($params) {

        $data = array();

        if($params['posts_shown'] != '') {
            $data['data-posts-shown'] = $params['posts_shown'];
        }


        return $data;
    }

    private function getImageSize($params) {

        switch ($params['image_size']) {
            case 'landscape':
                $thumb_size = 'portfolio-landscape';
                break;
            case 'portrait':
                $thumb_size = 'portfolio-portrait';
                break;
            default:
                $thumb_size = 'full';
                break;
        }

        return $thumb_size;
    }

    private function getTitleStyle($params) {

        $style = array();

        if($params['title_background_color'] != '') {
            $style[] = 'background-color:'.$params['title_background_color'];
        }

        if($params['title_color'] != '') {
            $style[] = 'color:'.$params['title_color'];
        }


        return implode(';',$style);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorBlogCarouselTitled() );