<?php

class BridgeCoreElementorPricingCalculator extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_pricing_calculator';
    }

    public function get_title() {
        return esc_html__( 'Pricing Calculator', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-pricing-calculator';
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'subtitle_title_tag',
            [
                'label' => esc_html__('Subtitle Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'p'  => 'p',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h4'
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
            'text',
            [
                'label' => esc_html__('Text', 'bridge-core'),
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
            'item_price',
            [
                'label' => esc_html__( 'Item Price', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'item_active',
            [
                'label' => esc_html__( 'Item Active', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core'),
                ],
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
            'title_tag',
            [
                'label' => esc_html__('Items Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'p'  => 'p',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'p'
            ]
        );

        $this->add_control(
            'enable_button',
            [
                'label' => esc_html__('Enable Button', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no'   => esc_html__('No', 'bridge-core'),
                    'yes'  => esc_html__('Yes', 'bridge-core'),
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_target',
            [
                'label' => esc_html__('Button Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' => esc_html__('Blank', 'bridge-core')
                ],
                'condition' => [
                    'enable_button' => 'yes'
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
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
            'border_color',
            [
                'label' => esc_html__('Border Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'left_section_background_color',
            [
                'label' => esc_html__('Left Section Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'right_section_background_color',
            [
                'label' => esc_html__('Right Section Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['total_price'] = $this->getPrice($params);
        $params['holder_style'] = $this->getHolderStyle($params);
        $params['left_section_style'] = $this->getLeftSectionStyle($params);
        $params['right_section_style'] = $this->getRightSectionStyle($params);
        $params['enable_button'] = $params['enable_button'] == 'yes' ? true : false;


        echo bridge_core_get_shortcode_template_part('templates/pricing-calculator-template', 'pricing-calculator', '', $params);
    }

    private  function getPrice($params) {

        $total_price = 0;

        if(is_array($params['pricing_items']) && count($params['pricing_items']) > 0) {
            foreach($params['pricing_items'] as $pricing_item) {

                if($pricing_item['item_active'] == 'yes'){
                    $total_price = ((int)$total_price) + ((int)$pricing_item['item_price']);
                }

            }
        }
        return $total_price;
    }

    private function getHolderStyle($params) {

        $style = array();

        if($params['border_color']) {
            $style[] = 'border-color:'. $params['border_color'];
        }

        return implode(';', $style);
    }

    private function getLeftSectionStyle($params) {

        $style = array();

        if($params['left_section_background_color']) {
            $style[] = 'background-color:'. $params['left_section_background_color'];
        }

        return implode(';', $style);
    }

    private function getRightSectionStyle($params) {

        $style = array();

        if($params['right_section_background_color']) {
            $style[] = 'background-color:'. $params['right_section_background_color'];
        }

        return implode(';', $style);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPricingCalculator() );