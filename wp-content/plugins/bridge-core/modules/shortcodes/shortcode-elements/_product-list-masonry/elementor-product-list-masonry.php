<?php

if( bridge_core_is_installed('woocommerce') ){

    class BridgeCoreElementorProductListMasonry extends \Elementor\Widget_Base
    {
        public function get_name()
        {
            return 'bridge_product_list_masonry';
        }

        public function get_title()
        {
            return esc_html__("Product List - Masonry", 'bridge-core');
        }

        public function get_icon()
        {
            return 'bridge-elementor-custom-icon bridge-elementor-product-list-masonry';
        }

        public function get_categories()
        {
            return ['qode'];
        }

        protected function _register_controls()
        {

            $this->start_controls_section(
                'general',
                [
                    'label' => esc_html__('General', 'bridge-core'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'per_page',
                [
                    'label' => esc_html__("Per Page", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::TEXT
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_html__("Columns", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        "two_columns" => esc_html__('Two', 'bridge-core'),
                        "three_columns" => esc_html__('Three', 'bridge-core'),
                        "four_columns" => esc_html__('Four', 'bridge-core'),
                    ],
                    'default' => 'two_columns'
                ]
            );

            $this->add_control(
                'category',
                [
                    'label' => esc_html__("Category Slug", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::TEXT
                ]
            );

            $this->add_control(
                'order_by',
                [
                    'label' => esc_html__("Order By", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        "date" => esc_html__('Date', 'bridge-core'),
                        "title" => esc_html__('Title', 'bridge-core'),
                        "menu_order" => esc_html__('Menu Order', 'bridge-core'),
                    ],
                    'default' => 'date'
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_html__("Order", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        "ASC" => esc_html__('ASC', 'bridge-core'),
                        "DESC" => esc_html__('DESC', 'bridge-core')
                    ],
                    'default' => 'ASC'
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__("Product Title Tag", 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6"
                    ],
                    'default' => 'h4'
                ]
            );

            $this->add_control(
                'show_separator',
                [
                    'label' => esc_html__( 'Show Separator', 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'yes' => esc_html__( 'Yes', 'bridge-core' ),
                        'no' => esc_html__( 'No', 'bridge-core' )
                    ],
                    'default' => 'yes'
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'design_options',
                [
                    'label' => esc_html__('Design Options', 'bridge-core'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'hover_background_color',
                [
                    'label' => esc_html__( "Hover Background Color", 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'category_color',
                [
                    'label' => esc_html__( "Category Color", 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'separator_color',
                [
                    'label' => esc_html__( "Separator Color", 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'condition' => [
                        'show_separator' => 'yes'
                    ]
                ]
            );

            $this->add_control(
                'price_color',
                [
                    'label' => esc_html__( "Price Color", 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'price_font_size',
                [
                    'label' => esc_html__( "Price Font Size (px)", 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::TEXT
                ]
            );

            $this->add_control(
                'image_size',
                [
                    'label' => esc_html__( 'Image Proportions', 'bridge-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        '' => esc_html__( 'Default - from Woo Settings', 'bridge-core' ),
                        'original' => esc_html__( 'Original', 'bridge-core' ),
                        'square' => esc_html__( 'Square', 'bridge-core' ),
                    ],
                    'default' => ''
                ]
            );

            $this->end_controls_section();

        }

        protected function render()
        {
            $params = $this->get_settings_for_display();

            echo bridge_core_get_shortcode_template_part('templates/product-list-masonry', '_product-list-masonry', '', $params);
        }

    }

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new BridgeCoreElementorProductListMasonry());

}