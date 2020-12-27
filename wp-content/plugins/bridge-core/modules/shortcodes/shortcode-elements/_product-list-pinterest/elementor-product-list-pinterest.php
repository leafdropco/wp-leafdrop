<?php

if( bridge_core_is_installed('woocommerce') ){

    class BridgeCoreElementorProductListPinterest extends \Elementor\Widget_Base
    {
        public function get_name()
        {
            return 'bridge_product_list_pinterest';
        }

        public function get_title()
        {
            return esc_html__('Product List Pinterest', 'bridge-core');
        }

        public function get_icon()
        {
            return 'bridge-elementor-custom-icon bridge-elementor-product-list-pinterest';
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
                    'label' => esc_html__('Per Page', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::TEXT
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => esc_html__('Columns', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'two_columns' => esc_html__('Two', 'bridge-core'),
                        'three_columns' => esc_html__('Three', 'bridge-core'),
                        'four_columns' => esc_html__('Four', 'bridge-core'),
                    ],
                    'default' => 'two_columns'
                ]
            );

            $this->add_control(
                'category',
                [
                    'label' => esc_html__('Category Slug', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::TEXT
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
                        'ASC' => esc_html__('ASC', 'bridge-core'),
                        'DESC' => esc_html__('DESC', 'bridge-core')
                    ],
                    'default' => 'ASC'
                ]
            );

            $this->add_control(
                'title_tag',
                [
                    'label' => esc_html__('Product Title Tag', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => bridge_qode_get_title_tag(),
                    'default' => 'h5'
                ]
            );

            $this->add_control(
                'hover_background_color',
                [
                    'label' => esc_html__('Hover Background Color', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'category_color',
                [
                    'label' => esc_html__('Category Color', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'separator_color',
                [
                    'label' => esc_html__('Separator Color', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'price_color',
                [
                    'label' => esc_html__('Price Color', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::COLOR
                ]
            );

            $this->add_control(
                'price_font_size',
                [
                    'label' => esc_html__('Price Font Size (px)', 'bridge-core'),
                    'type' => \Elementor\Controls_Manager::TEXT
                ]
            );


            $this->end_controls_section();
        }

        protected function render()
        {
            $params = $this->get_settings_for_display();

            echo bridge_core_get_shortcode_template_part('templates/product-list-pinterest', '_product-list-pinterest', '', $params);
        }

    }

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new BridgeCoreElementorProductListPinterest());
}