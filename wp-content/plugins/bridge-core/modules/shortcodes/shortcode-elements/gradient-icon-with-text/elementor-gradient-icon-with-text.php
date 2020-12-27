<?php

class BridgeCoreElementorGradientIconWithText extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_gradient_icon_with_text';
    }

    public function get_title() {
        return esc_html__( 'Gradient Icon With Text', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-gradient-icon-with-text';
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

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( 'Target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''      => '',
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' )
                ],
                'default' => '_self'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_settings',
            [
                'label' => esc_html__( 'Icon Settings', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( 'Icon Size', 'bridge-core' ),
                'description' => esc_html__( "Doesn't work when Icon Position is Top", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "fa-lg" => esc_html__( 'Tiny', 'bridge-core' ),
                    "fa-2x" => esc_html__( 'Small', 'bridge-core' ),
                    "fa-3x" => esc_html__( 'Medium', 'bridge-core' ),
                    "fa-4x" => esc_html__( 'Large', 'bridge-core' ),
                    "fa-5x" => esc_html__( 'Very Large', 'bridge-core' )
                ]
            ]
        );

        $this->add_control(
            'custom_icon_size',
            [
                'label' => esc_html__( 'Custom Icon Size (px)', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'text_settings',
            [
                'label' => esc_html__( 'Text Settings', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h6'
            ]
        );

        $this->add_control(
            'title_text_transform',
            [
                'label' => esc_html__( 'Title Text Transform', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_text_transform_array(true)
            ]
        );

        $this->add_control(
            'title_text_font_weight',
            [
                'label' => esc_html__( 'Title Text Font Weight', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon_parameters'] = $this->getIconParameters($params);
        $params['gradient_classes'] = $this->getGradientClasses($params);
        $params['holder_classes']  = $this->getHolderClasses($params);
        $params['title_styles']    = $this->getTitleStyles($params);

        echo bridge_core_get_shortcode_template_part('templates/iwt', 'gradient-icon-with-text', '', $params);
    }

    private function getIconParameters($params) {
        $params_array = array();

        if(empty($params['custom_icon'])) {
            $iconPackName = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $params_array['icon_pack']   = $params['icon_pack'];
            $params_array[$iconPackName] = $params[$iconPackName];

            if(!empty($params['icon_size'])) {
                $params_array['size'] = $params['icon_size'];
            }

            if(!empty($params['custom_icon_size'])) {
                $params_array['custom_size'] = $params['custom_icon_size'];
            }

            if(!empty($params['icon_color'])) {
                $params_array['icon_color'] = $params['icon_color'];
            }

            $params_array['type'] = 'normal';

        }

        return $params_array;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $classes = array('qode-giwt');

        return $classes;
    }

    private function getGradientClasses($params) {
        $classes = 'qode-type1-gradient-bottom-to-top-text-hover';

        return $classes;
    }

    private function getTitleStyles($params) {
        $styles = array();

        if(!empty($params['title_color'])) {
            $styles[] = 'color: '.$params['title_color'];
        }

        if(!empty($params['title_text_transform'])) {
            $styles[] = 'text-transform: '.$params['title_text_transform'];
        }

        if(!empty($params['title_text_font_weight'])) {
            $styles[] = 'font-weight: '.$params['title_text_font_weight'];
        }

        return $styles;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorGradientIconWithText() );