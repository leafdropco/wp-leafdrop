<?php

class BridgeCoreElementorCallToActionSection extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_call_to_action_section';
    }

    public function get_title() {
        return esc_html__( 'Call To Action Section', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-call-to-action-section';
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
            'section_image',
            [
                'label' => esc_html__( 'Section Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'bridge-core' ),
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
            'link_text',
            [
                'label' => esc_html__( 'Link Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link_target',
            [
                'label' => esc_html__( 'Link Target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_blank' => esc_html__( 'New Window', 'bridge-core' ),
                    '_self' => esc_html__( 'Same Window', 'bridge-core' )
                ],
                'default' => '_blank'
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'design',
            [
                'label' => esc_html__( 'Design Options', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'advanced',
            [
                'label' => esc_html__( 'Advanced Options', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'appear_animation',
            [
                'label' => esc_html__( 'Appear animation effect', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                    'no' => esc_html__( 'No', 'bridge-core' )
                ],
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if($params['background_color'] !== ''){
            $params['background_color'] = 'background-color:'.$params['background_color'];
        }

        if( ! empty( $params['section_image'] ) ){
            $params['section_image'] = $params['section_image']['id'];
        }

        $params['separator_parameters'] = $this->getSeparatorParameters($params);
        $params['button_parameters'] = $this->getButtonParameters($params);
        $params['holder_classes'] = $this->getHolderClasses($params);

        echo bridge_core_get_shortcode_template_part('templates/call-to-action-section-template', 'call-to-action-section', '', $params);
    }

    private function getSeparatorParameters($params) {
        $params_array = array();

        $params_array['type'] = 'small';
        $params_array['position'] = 'center';
        $params_array['gradient_color'] = 'yes';
        $params_array['thickness'] = '2';
        $params_array['width'] = '150';
        $params_array['up'] = '27';
        $params_array['down'] = '31';

        return $params_array;
    }

    /**
     * Returns parameters for button shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonParameters($params) {
        $params_array = array();

        $params_array['icon_pack'] = 'font_elegant';
        $params_array['fe_icon'] = 'arrow_carrot-right';
        $params_array['target'] = $params['link_target'];
        $params_array['enable_shadow'] = 'yes';
        $params_array['enable_icon_gradient'] = 'yes';
        $params_array['text'] = $params['link_text'];
        $params_array['link'] = $params['link'];
        $params_array['hover_effect'] = 'shadow_enhance';

        return $params_array;
    }

    /**
     * Returns classes for holder
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $params_array = array();

        $params_array[] = 'qode-cta-section';
        if ($params['appear_animation'] == 'yes') {
            $params_array[] = 'qode-cta-appear-effect';
        }

        return implode(' ',$params_array);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCallToActionSection() );