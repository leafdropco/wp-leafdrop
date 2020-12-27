<?php

class BridgeCoreElementorButton extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_button';
    }

    public function get_title() {
        return esc_html__( 'Button', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-button';
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
            'size',
            [
                'label' => esc_html__( "Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'small' => esc_html__( 'Small', 'bridge-core' ),
                    'medium' => esc_html__( 'Medium', 'bridge-core' ),
                    'large' => esc_html__( 'Large', 'bridge-core' ),
                    'big_large' => esc_html__( 'Extra Large', 'bridge-core' ),
                    'big_large_full_width' => esc_html__( 'Extra Large Full Width', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( "Style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'white' => esc_html__( 'White', 'bridge-core' )
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'custom_class',
            [
                'label' => esc_html__('Custom CSS class', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__( "Text", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( "Link", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( "Link Target", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                    '_top' => esc_html__( 'Top', 'bridge-core' ),
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'button_id',
            [
                'label' => esc_html__( "ID", 'bridge-core' ),
                "description" => esc_html__( "Set unique button ID attribute", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'hover_type',
            [
                'label' => esc_html__( "Hover Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__( 'Default', 'bridge-core' ),
                    'enlarge' => esc_html__( 'Enlarge', 'bridge-core' ),
                ],
                'default' => 'default'
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__( "Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'hover_color',
            [
                'label' => esc_html__( "Hover Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( "Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'hover_background_color',
            [
                'label' => esc_html__( "Hover Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'hover_border_color',
            [
                'label' => esc_html__( 'Hover Border Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'gradient',
            [
                'label' => esc_html__("Enable Button Background Gradient", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
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
            'font_family',
            [
                'label' => esc_html__('Font Family', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'font_size',
            [
                'label' => esc_html__('Font Size (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'letter_spacing',
            [
                'label' => esc_html__('Letter Spacing (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_transform',
            [
                'label' => esc_html__('Text Transform', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_text_transform_array(true),
                'default' => ''
            ]
        );

        $this->add_control(
            'font_style',
            [
                'label' => esc_html__( 'Font Style', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'italic' => esc_html__( 'Italic', 'bridge-core' )
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'font_weight',
            [
                'label' => esc_html__( 'Font Weight', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true),
                'default' => ''
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => esc_html__( 'Text Align', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' ),
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => esc_html__( 'Margin', 'bridge-core' ),
                "description" => esc_html__("Please insert margin in format: 0px 0px 1px 0px", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__( 'Border radius', 'bridge-core' ),
                "description" => esc_html__("Please insert border radius(Rounded corners) in px. For example: 4 ", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,

            ]
        );

        $this->add_control(
            'button_shadow',
            [
                'label' => esc_html__( 'Enable Button Shadow', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'Default', 'bridge-core' ),
                    'no' => esc_html__( 'No', 'bridge-core'),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => ''

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
	    $params['html_type'] = 'anchor';
        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/button', '_button', '', $params);
        }
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

        return sprintf( '<textarea class="qode-shortcode-snipper-holder" readonly>[%s %s]</textarea>',
            'button',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorButton() );