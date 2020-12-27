<?php

class BridgeCoreElementorLatestPosts extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_latest_posts';
    }

    public function get_title() {
        return esc_html__( 'Latest Posts', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-latest-posts';
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
            'type',
            [
                'label' => esc_html__( 'Type', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "image_in_box" => esc_html__("Image on the left", 'bridge-core'),
                    "image_on_the_left_boxed" => esc_html__("Image on the left - boxed", 'bridge-core'),
                    "minimal" => esc_html__("Minimal", 'bridge-core'),
                    "boxes" => esc_html__("Boxes", 'bridge-core'),
                    "dividers" => esc_html__("Boxes With Dividers", 'bridge-core'),
                ],
                'default' => 'image_in_box'
            ]
        );

        $this->add_control(
            'firts_as_featured',
            [
                'label' => esc_html__( 'Set first post as featured', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no',
                'condition' => [
                    'type' => 'image_on_the_left_boxed'
                ]
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__('Image Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__( 'Default/Predefined', 'bridge-core' ),
                    'full' => esc_html__( 'Full', 'bridge-core' ),
                    "portfolio-landscape" => esc_html__( 'Landscape', 'bridge-core' ),
                    "portfolio-portrait" => esc_html__( 'Portrait', 'bridge-core' )
                ],
                'default' => '',
                'condition' => [
                    'type' => ['boxes', 'dividers']
                ]
            ]
        );

        $this->add_control(
            'number_of_posts',
            [
                'label' => esc_html__( 'Number of Posts', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => array('date_in_box', 'image_in_box', 'minimal', 'image_on_the_left_boxed')
                ]
            ]
        );

        $this->add_control(
            'number_of_colums',
            [
                'label' => esc_html__( 'Number of Colums', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "2" => esc_html__("Two", 'bridge-core' ),
                    "3" => esc_html__("Three", 'bridge-core' ),
                    "4" => esc_html__("Four", 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('boxes', 'dividers')
                ]
            ]
        );

        $this->add_control(
            'number_of_rows',
            [
                'label' => esc_html__( 'Number of Rows', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "1" => esc_html__("One", 'bridge-core' ),
                    "2" => esc_html__("Two", 'bridge-core' ),
                    "3" => esc_html__("Three", 'bridge-core' ),
                    "4" => esc_html__("Four", 'bridge-core' ),
                    "5" => esc_html__("Five", 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('boxes','dividers')
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'text_from_edge',
            [
                'label' => esc_html__( 'Text from edge', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'condition' => [
                    'type' => array('boxes')
                ]
            ]
        );

        $this->add_control(
            'order_by',
            [
                'label' => esc_html__( 'Order By', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "title" => esc_html__("Title", 'bridge-core' ),
                    "date" => esc_html__("Date", 'bridge-core' ),
                ]
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( 'Order', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_query_order_array(false)
            ]
        );

        $this->add_control(
            'category',
            [
                'label' => esc_html__( 'Category Slug', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                "description" => esc_html__("Leave empty for all or use comma for list", 'bridge-core' )
            ]
        );

        $this->add_control(
            'text_length',
            [
                'label' => esc_html__( 'Text length', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                "description" => esc_html__("Number of characters", 'bridge-core' )
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ""   => "",
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
            'display_category',
            [
                'label' => esc_html__( 'Display category', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core' ),
                    "1" => esc_html__("Yes", 'bridge-core' ),
                    "0" => esc_html__("No", 'bridge-core' )
                ],
                'default' => '0'
            ]
        );

        $this->add_control(
            'display_time',
            [
                'label' => esc_html__( 'Display date', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core' ),
                    "1" => esc_html__("Yes", 'bridge-core' ),
                    "0" => esc_html__("No", 'bridge-core' )
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'display_comments',
            [
                'label' => esc_html__( 'Display comments', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core' ),
                    "1" => esc_html__("Yes", 'bridge-core' ),
                    "0" => esc_html__("No", 'bridge-core' )
                ],
                'default' => '1'
            ]
        );

        $this->add_control(
            'display_like',
            [
                'label' => esc_html__( 'Display like', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core' ),
                    "1" => esc_html__("Yes", 'bridge-core' ),
                    "0" => esc_html__("No", 'bridge-core' )
                ],
                'default' => '0'
            ]
        );

        $this->add_control(
            'display_share',
            [
                'label' => esc_html__( 'Display share', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core' ),
                    "1" => esc_html__("Yes", 'bridge-core' ),
                    "0" => esc_html__("No", 'bridge-core' )
                ],
                'default' => '0'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $args = array(
            "type"       			=> "date_in_box",
            "image_size"            => '',
            "number_of_posts"       => "",
            "number_of_colums"      => "",
            "number_of_rows"        => "1",
            "text_from_edge"      	=> "",
            "rows"                  => "",
            "order_by"              => "",
            "order"                 => "",
            "category"              => "",
            "text_length"           => "",
            "title_tag"             => "h5",
            "display_category"    	=> "0",
            "display_time"          => "1",
            "display_comments"      => "1",
            "display_like"          => "0",
            "display_share"         => "0",
            "firts_as_featured"     => "no",

        );

        $params	= shortcode_atts($args, $params);

        $params['this_object'] = $this;

        $params['blog_hide_comments'] = "";
        if (isset($bridge_qode_options['blog_hide_comments'])) {
            $params['blog_hide_comments'] = bridge_qode_options()->getOptionValue('blog_hide_comments');
        }

        $params['qode_like'] = "on";
        if (isset($bridge_qode_options['qode_like'])) {
            $params['qode_like'] = bridge_qode_options()->getOptionValue('qode_like');
        }

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

        if($params['type'] != "boxes" && $params['type'] != "dividers"){
            $params['q'] = new \WP_Query(
                array('orderby' => $params['order_by'], 'order' => $params['order'], 'posts_per_page' => $params['number_of_posts'], 'category_name' => $params['category'])
            );
        } else {
            $params['q'] = new \WP_Query(
                array('orderby' => $params['order_by'], 'order' => $params['order'], 'posts_per_page' => $params['number_of_colums']*$params['number_of_rows'], 'category_name' => $params['category'])
            );
        }

        $params['columns_number'] = "";
        if($params['type'] == 'boxes' || $params['type'] == 'dividers') {
            if($params['number_of_colums'] == 2){
                $params['columns_number'] = "two_columns";
            } else if ($params['number_of_colums'] == 3) {
                $params['columns_number'] = "three_columns";
            } else if ($params['number_of_colums'] == 4) {
                $params['columns_number'] = "four_columns";
            }
        }

        //get number of rows class for boxes type
        $params['rows_number'] = "";
        if($params['type'] == 'boxes' || $params['type'] == 'dividers') {
            switch($params['number_of_rows']) {
                case 1:
                    $params['rows_number'] = 'one_row';
                    break;
                case 2:
                    $params['rows_number'] = 'two_rows';
                    break;
                case 3:
                    $params['rows_number'] = 'three_rows';
                    break;
                case 4:
                    $params['rows_number'] = 'four_rows';
                    break;
                case 5:
                    $params['rows_number'] = 'five_rows';
                    break;
                default:
                    break;
            }
        }

        $params['padding_latest_post'] = "";
        if($params['text_from_edge'] == "yes" && $params['type'] == "boxes"){
            $params['padding_latest_post'] = " style=' padding-left:0; padding-right:0; '";
        }

        echo bridge_core_get_shortcode_template_part('templates/latest-posts', 'latest-posts', $params['type'], $params);
    }

    public function getExcerpt($id, $text_length){
        $excerpt = '';

        if($text_length !== '0') {
            $excerpt .= '<p itemprop="description" class="excerpt">';
            $excerpt .= $text_length > 0 ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt($id);
            $excerpt .= '...</p>';
        }

        return $excerpt;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorLatestPosts() );