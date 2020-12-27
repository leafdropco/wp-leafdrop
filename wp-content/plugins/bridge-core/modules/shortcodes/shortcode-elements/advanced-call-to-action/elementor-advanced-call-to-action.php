<?php

class BridgeCoreElementorAdvancedCallToAction extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_advanced_call_to_action';
    }

    public function get_title() {
        return esc_html__( 'Advanced Call to Action', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-advanced-call-to-action';
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
            'cta_text',
            [
                'label' => esc_html__('Call To Action Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'cta_link',
            [
                'label' => esc_html__('Call To Action Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'cta_link_anchor',
            [
                'label' => esc_html__('Enable Anchor Link Functionality', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
            ]
        );

        $this->add_control(
            'cta_link_target',
            [
                'label' => esc_html__('Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array()
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->end_controls_section();




        $this->start_controls_section(
            'design_options',
            [
                'label' => esc_html__('Design Options', 'bridge-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__('Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'font_size',
            [
                'label' => esc_html__('Font Size (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'font_weight',
            [
                'label' => esc_html__('Font Weight', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html__('Icon Font Size (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'icon_font_weight',
            [
                'label' => esc_html__('Font Weight', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(),
            ]
        );

        $this->add_control(
            'icon_left_margin',
            [
                'label' => esc_html__('Icon Left Margin (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'icon_border_shape',
            [
                'label' => esc_html__('Icon Border Shape', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' =>  esc_html__('None', 'bridge-core'),
                    'circle' => esc_html__('Circle', 'bridge-core')
                ],
            ]
        );

        $this->add_control(
            'icon_border_shape_size',
            [
                'label' => esc_html__('Icon Border Shape Size (px)', 'bridge-core'),
                'default' => '45px',
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'icon_horizontal_offset_adj',
            [
                'label' => esc_html__('Icon Horizontal Offset Adjust (px)', 'bridge-core'),
                'description' => esc_html__('Adjust icon alignment within border shape', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'icon_vertical_offset_adj',
            [
                'label' => esc_html__('Icon Vertical Offset Adjust (px)', 'bridge-core'),
                'description' => esc_html__('Adjust icon alignment within border shape', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__('Shortcode Height (px)', 'bridge-core'),
                'default' => '110px',
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'advanced_options',
            [
                'label' => esc_html__('Advanced Options', 'bridge-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_gradient',
            [
                'label' => esc_html__('Enable Gradient', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
            ]
        );

        $this->add_control(
            'enable_gradient_animation',
            [
                'label' => esc_html__('Enable Gradient Animation', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'condition' => [
                    'enable_gradient' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        $params['shortcode_classes']= $this->getShortcodeClasses($params);
        $params['shortcode_styles']= $this->getShortcodeStyles($params);
        $params['link_classes']= $this->getLinkClasses($params);
        $params['text_styles']= $this->getTextStyles($params);
        $params['icon_styles']= $this->getIconStyles($params);
        $params['icon_offsets']= $this->getIconOffsets($params);

        echo bridge_core_get_shortcode_template_part('templates/advanced-call-to-action-template', 'advanced-call-to-action', '', $params);
    }

    private function getShortcodeClasses($params) {
        $classes = array('qode-advanced-call-to-action');

        if($params['enable_gradient'] == 'yes') {
            $classes[] = 'qode-advanced-cta-gradient';

            if($params['enable_gradient_animation'] == 'yes') {
                $classes[] = 'qode-advanced-cta-gradient-animation';
            }

        }

        if(!empty($params['icon_border_shape']) == 'circle') {
            $classes[] = 'qode-advanced-cta-icon-'.$params['icon_border_shape'];
        }

        return implode(' ', $classes);
    }

    private function getLinkClasses($params) {
        $classes = array('advanced-cta-link');

        if($params['cta_link_anchor'] == 'yes') {
            $classes[] = 'anchor';
        }

        return implode(' ', $classes);
    }

    private function getShortcodeStyles($params) {
        $styles = array();

        if($params['height']) {
            $styles[] = 'height:'. bridge_qode_filter_px($params['height']).'px';
        }

        return implode(';', $styles);
    }

    private function getTextStyles($params) {
        $styles = array();

        if ($params['color']) {
            $styles[] = 'color:'. $params['color'];
        }

        if ($params['font_size']) {
            $styles[] = 'font-size:'. bridge_qode_filter_px($params['font_size']).'px';
        }

        if ($params['font_weight']) {
            $styles[] = 'font-weight:'. $params['font_weight'];
        }

        return implode(';', $styles);
    }

    private function getIconStyles($params) {
        $styles = array();

        if ($params['icon_color']) {
            $styles[] = 'color:'. $params['icon_color'];
        }

        if ($params['icon_font_size']) {
            $styles[] = 'font-size:'. bridge_qode_filter_px($params['icon_font_size']).'px';
        }

        if ($params['icon_font_weight']) {
            $styles[] = 'font-weight:'. $params['icon_font_weight'];
        }

        if ($params['icon_left_margin']) {
            $styles[] = 'margin-left:'. bridge_qode_filter_px($params['icon_left_margin']).'px';
        }

        if ($params['icon_border_shape_size']) {
            $styles[] = 'height:'. bridge_qode_filter_px($params['icon_border_shape_size']).'px';
            $styles[] = 'width:'. bridge_qode_filter_px($params['icon_border_shape_size']).'px';
        }


        return implode(';', $styles);
    }

    private function getIconOffsets($params) {
        $styles = array();

        if ($params['icon_horizontal_offset_adj']) {
            $styles[] = 'left:'. bridge_qode_filter_px($params['icon_horizontal_offset_adj']).'px';
        }

        if ($params['icon_vertical_offset_adj']) {
            $styles[] = 'top:'. bridge_qode_filter_px($params['icon_vertical_offset_adj']).'px';
        }
        return implode(';', $styles);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAdvancedCallToAction() );