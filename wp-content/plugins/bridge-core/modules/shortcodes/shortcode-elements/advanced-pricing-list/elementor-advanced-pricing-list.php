<?php

class BridgeCoreElementorAdvancedPricingList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_advanced_pricing_list';
    }

    public function get_title() {
        return esc_html__( 'Advanced Pricing List', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-advanced-pricing-list';
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
            'list_title',
            [
                'label' => esc_html__('List Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
            'item_description',
            [
                'label' => esc_html__( 'Item Description', 'bridge-core' ),
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

        $this->end_controls_section();


        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__( 'Style', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'list_title_tag',
            [
                'label' => esc_html__('List Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'list_title_alignment',
            [
                'label' => esc_html__('List Title Alignment', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' )
                ]
            ]
        );

        $this->add_control(
            'list_title_margin_bottom',
            [
                'label' => esc_html__( 'List Title Margin Bottom(px)', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'list_title_color',
            [
                'label' => esc_html__('List Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'line_style',
            [
                'label' => esc_html__('Line Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => esc_html__('Solid', 'bridge-core'),
                    'dashed' => esc_html__('Dashed', 'bridge-core'),
                    'dotted' => esc_html__('Dotted', 'bridge-core')
                ],
                'default' => 'solid'
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label' => esc_html__('Line Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'item_title_tag',
            [
                'label' => esc_html__('Item Title Tag', 'bridge-core'),
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

        $this->add_control(
            'item_title_color',
            [
                'label' => esc_html__('Item Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'item_description_color',
            [
                'label' => esc_html__('Item Description Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['line_style'] = $this->getLineStyle($params);
        $params['list_title_style'] = $this->getTitleStyle($params);
        $params['item_title_style'] = $this->getItemTitleStyle($params);
        $params['item_description_style'] = $this->getDescriptionStyle($params);


        echo bridge_core_get_shortcode_template_part('templates/advanced-pricing-list-template', 'advanced-pricing-list', '', $params);
    }

    private function getLineStyle($params) {

        $style = array();

        if($params['line_style']) {
            $style[] = 'border-style:'. $params['line_style'];
        }

        if($params['line_color']) {
            $style[] = 'border-color:'. $params['line_color'];
        }

        return implode(';', $style);

    }

    private function getItemTitleStyle($params) {

        $style = array();


        if($params['item_title_color']) {
            $style[] = 'color:'. $params['item_title_color'];
        }

        return implode(';', $style);

    }
    private function getTitleStyle($params) {

        $style = array();


        if($params['list_title_color']) {
            $style[] = 'color:'. $params['list_title_color'];
        }
        if($params['list_title_alignment']) {
            $style[] = 'text-align:'. $params['list_title_alignment'];
        }
        if($params['list_title_margin_bottom']) {
            $style[] = 'margin-bottom:'. $params['list_title_margin_bottom'].'px';
        }
        return implode(';', $style);

    }
    private function getDescriptionStyle($params) {

        $style = array();

        if($params['item_description_color']) {
            $style[] = 'color:'. $params['item_description_color'];
        }

        return implode(';', $style);

    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAdvancedPricingList() );