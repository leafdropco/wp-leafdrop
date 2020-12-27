<?php

class BridgeCoreElementorButtonV2 extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_button_v2';
    }

    public function get_title() {
        return esc_html__('Qode Button V2', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-button-v2';
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
            'type',
            [
                'label' => esc_html__( 'Type', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Solid/Default', 'bridge-core' ),
                    'simple' => esc_html__( 'Simple', 'bridge-core' )
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__('Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' =>  esc_html__('Blank', 'bridge-core')
                ]
            ]
        );

        $this->add_control(
            'custom_class',
            [
                'label' => esc_html__('Custom CSS class', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->end_controls_section();


        $this->start_controls_section(
            'design',
            [
                'label' => esc_html__( 'Design Options', 'bridge-core' ),
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
            'hover_color',
            [
                'label' => esc_html__('Hover Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__('Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => ''
                ]
            ]
        );

        $this->add_control(
            'hover_background_color',
            [
                'label' => esc_html__('Hover Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => ''
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__('Icon Left Border Color', 'bridge-core'),
                'description' => esc_html__('Only for solid type when icon is set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons', 'kiko')
                ]
            ]
        );

        $this->add_control(
            'icon_border_hover_color',
            [
                'label' => esc_html__('Hover Icon Left Border Color', 'bridge-core'),
                'description' => esc_html__('Only for solid type when icon is set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons'),
                    'type' => ''
                ]
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => esc_html__('Icon Background Color', 'bridge-core'),
                'description' => esc_html__('Only for solid type when icon is set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons'),
                    'type' => ''
                ]
            ]
        );

        $this->add_control(
            'icon_background_hover_color',
            [
                'label' => esc_html__('Icon Background Hover Color', 'bridge-core'),
                'description' => esc_html__('Only for solid type when icon is set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons'),
                    'type' => ''
                ]
            ]
        );

        $this->add_control(
            'enable_shadow',
            [
                'label' => esc_html__('Enable Shadow', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ],
                'condition' => [
                    'type' => ''
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'enable_icon_gradient',
            [
                'label' => esc_html__('Enable Icon Gradient', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ],
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons')
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'enable_icon_square',
            [
                'label' => esc_html__('Enable Icon Square', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ],
                'condition' => [
                    'icon_pack' => array('font_awesome', 'font_elegant', 'linea_icons', 'dripicons')
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'font_family',
            [
                'label' => esc_html__('Font Family', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
                'label' => esc_html__('Font Weight (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => esc_html__('Text Transform', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_text_transform_array(true)
            ]
        );

        $this->add_control(
            'font_style',
            [
                'label' => esc_html__('Font Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_style_array(true)
            ]
        );

        $this->add_control(
            'letter_spacing',
            [
                'label' => esc_html__('Letter Spacing (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
            'margin',
            [
                'label' => esc_html__('Margin', 'bridge-core'),
                'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
            'hover_effect',
            [
                'label' => esc_html__('Hover Effect', 'bridge-core'),
                'description' => esc_html__('Icon Rotate Hover should only be used when icon set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    '3d_rotate' => esc_html__('3D Rotate', 'bridge-core'),
                    'shadow_enhance' => esc_html__('Shadow Enhance', 'bridge-core'),
                    'icon_rotate' => esc_html__('Icon Rotate', 'bridge-core')
                ],
                'condition' => [
                    'type' => ''
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'gradient',
            [
                'label' => esc_html__('Enable Background Gradient', 'bridge-core'),
                'description' => esc_html__('Icon Rotate Hover should only be used when icon set', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ],
                'condition' => [
                    'type' => ''
                ]
            ]
        );

        $this->end_controls_section();

        // Add predefined developer tab content for each shortcode element
        $this->start_controls_section(
            'developer_tools',
            [
                'label' => esc_html__( 'Developer Tools', 'bridge-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shortcode_snippet',
            [
                'label'   => esc_html__( 'Show Shortcode Snippet', 'bridge-core' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'no',
                'options' => array(
                    'no'  => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                ),
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'solid';
        $params['html_type'] = 'anchor';
        $params['hover_animation'] = '';


        $params['link']   = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes']				= $this->getButtonClasses($params);
        $params['button_icon_holder_classes']	= $this->getButtonIconHolderClasses($params);
        $params['button_custom_attrs']			= !empty($params['custom_attrs']) ? $params['custom_attrs'] : array();
        $params['button_styles']				= $this->getButtonStyles($params);
        $params['button_icon_holder_styles']	= $this->getButtonIconHolderStyles($params);
        $params['button_data']					= $this->getButtonDataAttr($params);
        $params['button_icon_holder_data']		= $this->getButtonIconHolderDataAttr($params);

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/'.$params['html_type'], 'button-v2', $params['hover_animation'], $params);
        }
    }

    private function getButtonStyles($params) {
        $styles = array();

        if(!empty($params['color'])) {
            $styles[] = 'color: '.$params['color'];
        }

        if(!empty($params['background_color']) && $params['type'] !== 'outline') {
            $styles[] = 'background-color: '.$params['background_color'];
        }

        if(!empty($params['border_color'])) {
            $styles[] = 'border-color: '.$params['border_color'];
        }

        if(!empty($params['font_family'])) {
            $styles[] = 'font-family: '. bridge_qode_get_font_option_val($params['font_family']);
        }

        if(!empty($params['font_size'])) {
            $styles[] = 'font-size: '.bridge_qode_filter_px($params['font_size']).'px';
        }

        if(!empty($params['font_weight'])) {
            $styles[] = 'font-weight: '.$params['font_weight'];
        }

        if(!empty($params['text_transform'])) {
            $styles[] = 'text-transform: '.$params['text_transform'];
        }

        if(!empty($params['font_style'])) {
            $styles[] = 'font-style: '.$params['font_style'];
        }

        if(!empty($params['letter_spacing'])) {
            $styles[] = 'letter-spacing: '.bridge_qode_filter_px($params['letter_spacing']).'px';
        }

        if(!empty($params['margin'])) {
            $styles[] = 'margin: '.$params['margin'];
        }

        return $styles;
    }

    /**
     * Returns array of button icon holder styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonIconHolderStyles($params) {
        $styles = array();

        if (!empty($params['icon_font_size'])) {
            $styles[] = 'font-size: '.bridge_qode_filter_px($params['icon_font_size']).'px';
        }

        if(!empty($params['icon_border_color'])) {
            $styles[] = 'border-color: '.$params['icon_border_color'];
        }

        if(!empty($params['icon_background_color'])) {
            $styles[] = 'background-color: '.$params['icon_background_color'];
        }

        return $styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $data = array();

        if(!empty($params['hover_background_color'])) {
            $data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if(!empty($params['hover_color'])) {
            $data['data-hover-color'] = $params['hover_color'];
        }

        if(!empty($params['hover_border_color'])) {
            $data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $data;
    }

    /**
     *
     * Returns array of button icon holder data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonIconHolderDataAttr($params) {
        $data = array();

        if(!empty($params['icon_border_hover_color'])) {
            $data['data-hover-icon-border-color'] = $params['icon_border_hover_color'];
        }

        if(!empty($params['icon_background_hover_color'])) {
            $data['data-hover-icon-bg-color'] = $params['icon_background_hover_color'];
        }

        return $data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $buttonClasses = array(
            'qode-btn',
            'qode-btn-'.$params['size'],
            'qode-btn-'.$params['type']
        );

        if(!empty($params['hover_background_color'])) {
            $buttonClasses[] = 'qode-btn-custom-hover-bg';
        }

        if(!empty($params['hover_border_color'])) {
            $buttonClasses[] = 'qode-btn-custom-border-hover';
        }

        if(!empty($params['hover_color'])) {
            $buttonClasses[] = 'qode-btn-custom-hover-color';
        }

        if(!empty($params['icon_background_hover_color'])) {
            $buttonClasses[] = 'qode-btn-custom-icon-bg-hover-color';
        }

        if(!empty($params['icon'])) {
            $buttonClasses[] = 'qode-btn-icon';
        }

        if(!empty($params['custom_class'])) {
            $buttonClasses[] = $params['custom_class'];
        }

        if(!empty($params['hover_animation'])) {
            $buttonClasses[] = 'qode-btn-'.$params['hover_animation'];
        }

        if($params['enable_shadow'] === 'yes') {
            $buttonClasses[] = 'qode-btn-with-shadow';
        }

        if ($params['enable_icon_square'] == 'yes'){
            $buttonClasses[] = 'qodef-btn-icon-square';
        }

        if($params['hover_effect'] === '') {
            $buttonClasses[] = 'qode-btn-default-hover';
        } else {
            if ($params['hover_effect'] === '3d_rotate') {
                $buttonClasses[] = 'qode-btn-3d-hover';
            }
            if ($params['hover_effect'] === 'shadow_enhance') {
                $buttonClasses[] = 'qode-btn-shadow-hover';
            }
            if ($params['hover_effect'] === 'icon_rotate') {
                $buttonClasses[] = 'qode-btn-icon-rotate';
            }
        }

        if($params['gradient'] == 'yes'){
            $buttonClasses[] = 'qode-type1-gradient-left-to-right';
        }

        return implode(' ', $buttonClasses);
    }

    /**
     * Returns array of HTML classes for button icon holder
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonIconHolderClasses($params) {
        $buttonClasses = array(
            'qode-button-v2-icon-holder'
        );

        if( $params['enable_icon_gradient'] === 'yes') {
            $buttonClasses[] = 'qode-type1-gradient-bottom-to-top-text';
        }

        return implode(' ', $buttonClasses);
    }

    private function get_shortcode_snippet( $params ) {
        $atts = array();

        if ( empty( $this ) || ! is_object( $this ) ) {
            return '';
        }

        if ( ! empty( $params ) ) {
            foreach ( $params as $key => $value ) {
                if ( is_array( $value ) || $key === 'shortcode_snippet' ) {
                    continue;
                }

                if( empty( $value ) || $value == '' ){
                    continue;
                }

                $atts[] = $key . '="' . esc_attr( $value ) . '"';
            }
        }

        return sprintf( '<textarea class="qode-shortcode-snipper-holder" rows="3" readonly>[%s %s]</textarea>',
            'qode_button_v2',
            implode( ' ', $atts )
        );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorButtonV2() );

