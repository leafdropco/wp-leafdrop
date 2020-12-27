<?php

class BridgeCoreElementorScrollingImage extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_scrolling_image';
    }

    public function get_title() {
        return esc_html__( 'Scrolling Image', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-scrolling-image';
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
            'scrolling_image',
            [
                'label' => esc_html__('Scrolling Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'rounded_image',
            [
                'label' => esc_html__('Enable Rounded Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false)
            ]
        );

        $this->add_control(
            'box_shadow',
            [
                'label' => esc_html__('Enable Box Shadow', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false)
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
            'link',
            [
                'label' => esc_html__('Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'link_target',
            [
                'label' => esc_html__('Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_blank' => esc_html__('New Window', 'bridge-core'),
                    '_self' => esc_html__('Same Window', 'bridge-core'),
                ],
                'default' => '_blank'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design_options',
            [
                'label' => esc_html__( 'Design Options', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => esc_html__('Icon Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['scrolling_image'] ) ){
            $params['scrolling_image'] = $params['scrolling_image']['id'];
        }

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['title_styles'] = $this->getTitleStyles($params);
        $params['icon_background_styles'] = $this->getIconBackgroundStyles($params);

        echo bridge_core_get_shortcode_template_part('templates/scrolling-image-template', 'scrolling-image', '', $params);
    }

    private function getHolderClasses($params) {
        $classes_array = array();

        $classes_array[] = 'qode-scrolling-image-holder';

        if (!empty($params['rounded_image'])) {
            $classes_array[] = 'qode-si-rounded-'. $params['rounded_image'];
        }

        if (!empty($params['box_shadow'])) {
            $classes_array[] = 'qode-si-box-shadow-'. $params['box_shadow'];
        }

        return implode(' ',$classes_array);
    }

    /**
     * Returns title styles
     *
     * @param $params
     *
     * @return array
     */
    private function getTitleStyles($params){
        $title_styles = array();

        if ($params['title_color'] !== ''){
            $title_styles[] = 'color: '.$params['title_color'];
        }

        return implode('; ', $title_styles);
    }

    /**
     * Returns icon background styles
     *
     * @param $params
     *
     * @return array
     */
    private function getIconBackgroundStyles($params){
        $icon_background_styles = array();

        if ($params['icon_background_color'] !== ''){
            $icon_background_styles[] = 'background-color: '. $params['icon_background_color']. ';';
        }

        return implode('; ', $icon_background_styles);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorScrollingImage() );