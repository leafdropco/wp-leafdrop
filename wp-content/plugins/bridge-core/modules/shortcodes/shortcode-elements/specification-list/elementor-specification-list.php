<?php

class BridgeCoreElementorSpecificationList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_specification_list';
    }

    public function get_title() {
        return esc_html__( 'Specification List', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-specification-list';
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
            'image',
            [
                'label' => esc_html__('Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'label',
            [
                'label' => esc_html__( 'Label', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'value',
            [
                'label' => esc_html__( 'Value', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__( 'Pricing Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ label }}}',
            ]
        );

        $this->add_control(
            'enable_button',
            [
                'label' => esc_html__('Enable Button', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
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
                    '_blank' => esc_html__('Blank', 'bridge-core'),
                ],
                'default' => '_self',
                'condition' => [
                    'enable_button' => 'yes'
                ]
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

        $this->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Button Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_height',
            [
                'label' => esc_html__('Button Height(px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        $params['enable_button'] = $params['enable_button'] == 'yes' ? true : false;

        $params['button_style']	= $this->getButtonStyle($params);

        echo bridge_core_get_shortcode_template_part('templates/specification-list-template', 'specification-list', '', $params);
    }

    private function getButtonStyle ($params) {

        $style = array();

        if($params['button_background_color']) {
            $style[] = 'background-color:'. $params['button_background_color'];
        }

        if($params['button_height']) {
            $style[] = 'height:'. $params['button_height'].'px';
            $style[] = 'line-height:'. $params['button_height'].'px';
        }

        return implode(';', $style);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSpecificationList() );