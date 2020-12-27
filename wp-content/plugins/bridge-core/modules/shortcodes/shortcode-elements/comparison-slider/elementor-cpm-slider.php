<?php

class BridgeCoreElementorComparisonSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_comparison_slider';
    }

    public function get_title() {
        return esc_html__('Comparison Slider', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-comparison-slider';
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
            'image_before',
            [
                'label' => esc_html__('Image Before', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'image_after',
            [
                'label' => esc_html__('Image After', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'orientation',
            [
                'label' => esc_html__('Orientation', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'horizontal' => esc_html__('Horizontal', 'bridge-core'),
                    'vertical' => esc_html__('Vertical', 'bridge-core')
                ],
                'default' => 'horizontal'
            ]
        );

        $this->add_control(
            'enable_frame',
            [
                'label' => esc_html__('Enable Frame', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'offset',
            [
                'label' => esc_html__('Default Offset', 'bridge-core'),
                'description' => esc_html__('Default value is 50 (%)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'nav_skin',
            [
                'label' => esc_html__('Slider Arrows Skin', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'light' => esc_html__('Light/Default', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core')
                ],
                'default' => 'horizontal'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['image_before'] ) ){
            $params['image_before'] = $params['image_before']['id'];
        }

        if( ! empty( $params['image_after'] ) ){
            $params['image_after'] = $params['image_after']['id'];
        }

        $params['data_attrs'] = $this->getDataAttribute($params);

        $params['holder_classes'] = $this->getHolderClasses($params);

        echo bridge_core_get_shortcode_template_part('templates/cmp-slider-template', 'comparison-slider', '', $params);
    }

    private function getDataAttribute($params) {

        $data_attrs = array();

        if ($params['orientation'] !== '') {
            $data_attrs['data-orientation'] = $params['orientation'];
        }

        $data_attrs['data-offset'] = $params['offset'] !== '' ? $params['offset'] : 50;

        return $data_attrs;
    }

    private function getHolderClasses($params){

        $holder_classes[] = 'qode-comparison-slider';

        if(!empty($params['enable_frame']) && $params['enable_frame'] =='yes'){
            $holder_classes[] = 'qode-comparison-slider-with-frame';
        }

        if(!empty($params['nav_skin'])){
            $holder_classes[] = 'qode-comparison-slider-' . $params['nav_skin'];
        }

        return implode(' ', $holder_classes);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorComparisonSlider() );