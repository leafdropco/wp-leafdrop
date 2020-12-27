<?php

class BridgeCoreElementorPortfolioList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_portfolio_list';
    }

    public function get_title() {
        return esc_html__( "Portfolio List", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-portfolio-list';
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
                'label' => esc_html__( "Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'standard' => esc_html__( 'Standard', 'bridge-core' ),
                    'standard_no_space' => esc_html__( 'Standard No Space', 'bridge-core' ),
                    'hover_text' => esc_html__( 'Hover Text', 'bridge-core' ),
                    'hover_text_no_space' => esc_html__( 'Hover Text No Space', 'bridge-core' ),
                    'masonry' => esc_html__( 'Masonry without space', 'bridge-core' ),
                    'masonry_gallery_with_space' => esc_html__( 'Masonry with space', 'bridge-core' ),
                    'masonry_with_space' => esc_html__( 'Masonry(Pinterest) with space', 'bridge-core' ),
                    'masonry_with_space_without_description' => esc_html__( 'Masonry(Pinterest) with space (image only)', 'bridge-core' ),
                    'justified_gallery' => esc_html__( 'Justified Gallery', 'bridge-core' ),
                    'alternating_sizes' => esc_html__( 'Alternating Sizes', 'bridge-core' ),
                ],
                'default' => 'standard'
            ]
        );

        $this->add_control(
            'hover_type_standard',
            [
                'label' => esc_html__( "Hover Animation Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__( 'Default', 'bridge-core' ),
                    'subtle_vertical_hover' => esc_html__( 'Subtle Vertical', 'bridge-core' ),
                    'image_subtle_rotate_zoom_hover' => esc_html__( 'Image Subtle Rotate Zoom', 'bridge-core' ),
                    'image_text_zoom_hover' => esc_html__( 'Image Text Zoom', 'bridge-core' ),
                    'thin_plus_only' => esc_html__( 'Thin Plus Only', 'bridge-core' ),
                    'slow_zoom' => esc_html__( 'Slow Zoom', 'bridge-core' ),
                    'split_up' => esc_html__( 'Split Up', 'bridge-core' ),
                ],
                'default' => 'default',
                'condition' => [
                    'type' => array('standard', 'standard_no_space', 'masonry_with_space')
                ]
            ]
        );

        $this->add_control(
            'hover_type_text_on_hover_image',
            [
                'label' => esc_html__( "Hover Animation Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "default" => esc_html__( 'Default', 'bridge-core' ),
                    'subtle_vertical_hover' => esc_html__( 'Subtle Vertical', 'bridge-core' ),
                    'image_subtle_rotate_zoom_hover' => esc_html__( 'Image Subtle Rotate Zoom', 'bridge-core' ),
                    'image_text_zoom_hover' => esc_html__( 'Image Text Zoom', 'bridge-core' ),
                    "cursor_change_hover" => esc_html__( 'Cursor Change', 'bridge-core' ),
                    "thin_plus_only" => esc_html__( 'Thin Plus Only', 'bridge-core' ),
                    "slow_zoom" => esc_html__( 'Slow Zoom', 'bridge-core' ),
                    "split_up" => esc_html__( 'Split Up', 'bridge-core' ),
                    "grayscale" => esc_html__( 'Grayscale', 'bridge-core' ),
                    "slide_up" => esc_html__( 'Slide Up', 'bridge-core' ),
                    "flip_from_left" => esc_html__( 'Flip From Left', 'bridge-core' )
                ],
                'default' => 'default',
                'condition' => [
                    'type' => array('hover_text', 'hover_text_no_space', 'masonry_with_space_without_description', 'alternating_sizes')
                ]
            ]
        );

        $this->add_control(
            'hover_type_masonry',
            [
                'label' => esc_html__( "Hover Animation Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "default" => esc_html__( 'Default', 'bridge-core' ),
                    'subtle_vertical_hover' => esc_html__( 'Subtle Vertical', 'bridge-core' ),
                    'image_subtle_rotate_zoom_hover' => esc_html__( 'Image Subtle Rotate Zoom', 'bridge-core' ),
                    'image_text_zoom_hover' => esc_html__( 'Image Text Zoom', 'bridge-core' ),
                    "cursor_change_hover" => esc_html__( 'Cursor Change', 'bridge-core' ),
                    "thin_plus_only" => esc_html__( 'Thin Plus Only', 'bridge-core' ),
                    "slow_zoom" => esc_html__( 'Slow Zoom', 'bridge-core' ),
                    "split_up" => esc_html__( 'Split Up', 'bridge-core' ),
                    "grayscale" => esc_html__( 'Grayscale', 'bridge-core' ),
                    "slide_up" => esc_html__( 'Slide Up', 'bridge-core' ),
                    "flip_from_left" => esc_html__( 'Flip From Left', 'bridge-core' )
                ],
                'default' => 'default',
                'condition' => [
                    'type' => array('masonry', 'masonry_gallery_with_space', 'justified_gallery')
                ]
            ]
        );

        $this->add_control(
            'spacing',
            [
                'label' => esc_html__( "Spacing between items (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => array("masonry_with_space", "masonry_with_space_without_description", "justified_gallery")
                ]
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'label' => esc_html__( "Box Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => array('standard', 'standard_no_space', 'masonry_with_space')
                ]
            ]
        );

        $this->add_control(
            'box_border',
            [
                'label' => esc_html__( "Box Border", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'condition' => [
                    'type' => array('standard', 'standard_no_space', 'masonry_with_space')
                ]
            ]
        );

        $this->add_control(
            'box_border_width',
            [
                'label' => esc_html__( "Box Border Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'box_border' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'box_border_color',
            [
                'label' => esc_html__( "Box Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'box_border' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( "Columns", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                ],
                'condition' => [
                    'type' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description','alternating_sizes')
                ],
                'default' => '3'
            ]
        );

        $this->add_control(
            'grid_size',
            [
                'label' => esc_html__( "Grid Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__( 'Default', 'bridge-core' ),
                    "3" => esc_html__( '3 Columns Grid', 'bridge-core' ),
                    "4" => esc_html__( '4 Columns Grid', 'bridge-core' ),
                    "5" => esc_html__( '5 Columns Grid', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('masonry', 'masonry_gallery_with_space')
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'frame_around_item',
            [
                'label' => esc_html__( "Frame", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no_frame' => esc_html__( 'No Frame', 'bridge-core' ),
                    'monitor_frame' => esc_html__( 'Monitor Frame', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => 'hover_text'
                ],
                'default' => 'no_frame'
            ]
        );

        $this->add_control(
            'portfolio_loading_type',
            [
                'label' => esc_html__( "Portfolio Loading Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'portfolio_one_by_one' => esc_html__( 'Fade - one by one', 'bridge-core' ),
                    'diagonal_fade' => esc_html__( 'Fade - diagonal', 'bridge-core' ),
                    'slide_from_top' => esc_html__( 'Slide from top - diagonal', 'bridge-core' ),
                    'slide_from_left' => esc_html__( 'Slide from left - random', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes')
                ],
                'default' => 'portfolio_one_by_one'
            ]
        );

        $this->add_control(
            'portfolio_loading_type_masonry',
            [
                'label' => esc_html__( "Portfolio Loading Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'portfolio_one_by_one' => esc_html__( 'Fade - one by one', 'bridge-core' ),
                    'portfolio_fade_from_bottom' => esc_html__( 'Fade - from bottom', 'bridge-core' )
                ],
                'condition' => [
                    'type' => array('masonry','masonry_gallery_with_space','masonry_with_space','masonry_with_space_without_description')
                ],
                'default' => 'portfolio_one_by_one'
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__( "Image proportions", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Original', 'bridge-core' ),
                    'square' => esc_html__( 'Square', 'bridge-core' ),
                    'landscape' => esc_html__( 'Landscape', 'bridge-core' ),
                    'portrait' => esc_html__( 'Portrait', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes')
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'overlay_background_color',
            [
                'label' => esc_html__( "Image Color Overlay", 'bridge-core' ),
                "description" => esc_html__( "Choose color for overlay that appears on hover. Not available for default hover types", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => array('standard', 'standard_no_space', 'hover_text', 'hover_text_no_space', 'masonry', 'masonry_gallery_with_space', 'masonry_with_space','masonry_with_space_without_description', 'justified_gallery','alternating_sizes'),
                ]
            ]
        );

        $this->add_control(
            'row_height',
            [
                'label' => esc_html__( "Row Height (px)", 'bridge-core' ),
                "description" => esc_html__( "Targeted row height, which may vary depending on the proportions of the images.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'justified_gallery'
                ],
                'default' => '200'
            ]
        );

        $this->add_control(
            'justify_last_row',
            [
                'label' => esc_html__( "Last Row Behavior", 'bridge-core' ),
                "description" => esc_html__( "Defines whether to justify the last row, align it in a certain way, or hide it.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'nojustify' => esc_html__( 'Align left', 'bridge-core' ),
                    'right' => esc_html__( 'Align right', 'bridge-core' ),
                    'center' => esc_html__( 'Align centrally', 'bridge-core' ),
                    'justify' => esc_html__( 'Justify', 'bridge-core' ),
                    'hide' => esc_html__( 'Hide', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => 'justified_gallery'
                ],
                'default' => 'nojustify'
            ]
        );

        $this->add_control(
            'justify_threshold',
            [
                'label' => esc_html__( "Justify Threshold (0-1)", 'bridge-core' ),
                "description" => esc_html__( "If the last row takes up more than this part of available width, it will be justified despite the defined alignment. Enter 1 to never justify the last row.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'justified_gallery'
                ],
                'default' => '0.75'
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
                    '' => '',
                    'ASC' => esc_html__( 'ASC', 'bridge-core' ),
                    'DESC' => esc_html__( 'DESC', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'filter',
            [
                'label' => esc_html__( "Filter", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
            ]
        );

        $this->add_control(
            'filter_color',
            [
                'label' => esc_html__( "Filter Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'filter' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'filter_order_by',
            [
                'label' => esc_html__( "Filter Order By", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'name' => esc_html__( 'Name', 'bridge-core' ),
                    'slug' => esc_html__( 'Slug', 'bridge-core' ),
                    'id' => esc_html__( 'ID', 'bridge-core' ),
                    'description' => esc_html__( 'Description', 'bridge-core' ),
                ],
                'condition' => [
                    'filter' => 'yes'
                ],
                'default' => 'name'
            ]
        );

        $this->add_control(
            'filter_number_of_items',
            [
                'label' => esc_html__( "Enable Number of Items in Filter", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'condition' => [
                    'filter' => 'yes'
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'lightbox',
            [
                'label' => esc_html__( "Lightbox", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'view_button',
            [
                'label' => esc_html__( "Show View Button", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'show_load_more',
            [
                'label' => esc_html__( "Show Load More", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => 'no',
                'condition' => [
                    'type' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description', 'justified_gallery','alternating_sizes')
                ]
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( "Number", 'bridge-core' ),
                "description" => esc_html__( "Number of portfolios on page (-1 is all)", 'bridge-core' ),
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
            'show_title',
            [
                'label' => esc_html__( "Show Title", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
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
                'default' => 'h5',
                'condition' => [
                    'show_title' => array("", "yes")
                ]
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_title' => array("", "yes")
                ]
            ]
        );

        $this->add_control(
            'title_font_size',
            [
                'label' => esc_html__( "Title Font Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'show_title' => array("", "yes")
                ]
            ]
        );

        $this->add_control(
            'portfolio_separator',
            [
                'label' => esc_html__( "Enable separator below title", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, false),
                'default' => ''
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__( "Separator Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'portfolio_separator' => array("", "yes")
                ]
            ]
        );

        $this->add_control(
            'show_categories',
            [
                'label' => esc_html__( "Show Categories", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label' => esc_html__( "Category Name Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'show_categories' => array("", "yes")
                ]
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => esc_html__( "Text align", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' ),
                ],
                'condition' => [
                    'type' => array('standard', 'standard_no_space', 'masonry_with_space')
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

        $params['portfolio_holder_classes'] = bridge_core_generate_portfolio_list_holder_classes( $params );
        $params['portfolio_holder_universal_classes'] = bridge_core_generate_portfolio_list_universal_classes( $params );
        $params['_type_class'] = bridge_core_generate_portfolio_list_type_classes( $params );
        $params['article_style'] = bridge_core_generate_portfolio_list_article_style( $params );
        $params['portfolio_description_class'] = $params['text_align'] !== '' ? 'text_align_'.$params['text_align'] : '';
        $params['portfolio_box_style'] = bridge_core_generate_portfolio_list_box_style( $params );
        $params['portfolio_separator_aignment'] = $params['text_align'] != "" ? $params['text_align'] : 'center';
        $params['portfolio_loading_class'] = bridge_core_generate_portfolio_list_loading_class( $params );
        $params['columns'] = $params['columns'] == "" ? '3' : $params['columns'];
        $params['show_description_box'] = $params['show_title'] == 'no' && $params['show_categories'] == 'no' ? false : true;
        $params['hover_type'] = bridge_core_generate_portfolio_list_hover_type( $params );
        $params['overlay_styles'][] = $params['hover_type'] !== 'default' && $params['overlay_background_color'] !== '' ? 'background-color: '.$params['overlay_background_color'] : '';
        $params['show_icons'] = $params['hover_type'] == 'cursor_change_hover' || $params['hover_type'] == 'thin_plus_only' || $params['hover_type'] == 'split_up' ? 'no' : 'yes';
        $params['disable_link'] = ($params['hover_type'] == 'subtle_vertical_hover' || $params['hover_type'] == 'image_subtle_rotate_zoom_hover' || $params['hover_type'] == 'image_text_zoom_hover') && $params['show_icons'] == 'yes' ? 'yes' : 'no';
        $params['additional_hover_type'] = bridge_core_generate_portfolio_list_additional_hover_type( $params );
        $params['portfolio_qode_like'] = bridge_core_generate_portfolio_list_like_option( $params );

        $query_array             = bridge_core_generate_portfolio_list_query_array( $params );
        $query_results           = new \WP_Query( $query_array );
        $params['query'] = $query_results;
        $params['slug_list_'] = "pretty_photo_gallery";

        echo bridge_core_get_shortcode_template_part('templates/portfolio-holder', '_portfolio-list', $params['type'], $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPortfolioList() );