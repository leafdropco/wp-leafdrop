<?php

class BridgeCoreElementorAdvancedPricingTable extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_advanced_pricing_table';
    }

    public function get_title() {
        return esc_html__( 'Advanced Pricing Table', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-advanced-pricing-table';
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
            'table_title',
            [
                'label' => esc_html__('Table Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'column_title',
            [
                'label' => esc_html__('Column Title', 'bridge-core'),
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
                    'p'	 => 'p',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h5'
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__( 'Item Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_price',
            [
                'label' => esc_html__( 'Item Price', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'pricing_items',
            [
                'label' => esc_html__( 'Pricing Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ item_title }}}',
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => esc_html__('Currency', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '$'
            ]
        );

        $this->add_control(
            'table_footer_image',
            [
                'label' => esc_html__('Table Footer Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'table_footer_text',
            [
                'label' => esc_html__('Table Footer Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['table_footer_image'] ) ) {
            $params['table_footer_image'] = $params['table_footer_image']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/advanced-pricing-table-template', 'advanced-pricing-table', '', $params);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAdvancedPricingTable() );