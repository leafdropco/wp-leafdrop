<?php

class BridgeCoreElementorIconText extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_icon_text';
    }

    public function get_title() {
        return esc_html__( "Icon With Text", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-icon-with-text';
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
            'box_type',
            [
                'label' => esc_html__( "Box type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'icon_in_a_box' => esc_html__( 'Icon in a box', 'bridge-core' ),
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'holder_hover_effect',
            [
                'label' => esc_html__('Enable hover effect','bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no',
                'condition' => [
                    'box_type' => 'normal'
                ]
            ]
        );

        $this->add_control(
            'box_border_color',
            [
                'label' => esc_html__( "Box Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'box_type' => 'icon_in_a_box'
                ]
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'label' => esc_html__( "Box Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'box_type' => 'icon_in_a_box'
                ]
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'image',
            [
                'label' => esc_html__( "Image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => esc_html__( "Icon Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'circle' => esc_html__( 'Circle', 'bridge-core' ),
                    'square' => esc_html__( 'Square', 'bridge-core' ),
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => esc_html__( "Icon/Image Position", 'bridge-core' ),
                "description" => esc_html__( "Icon Position (only for normal box type)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'top' => esc_html__( 'Top', 'bridge-core' ),
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'left_from_title' => esc_html__( 'Left From Title', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' ),
                ],
                'default' => 'top',
                'condition' => [
                    'box_type' => 'normal'
                ]
            ]
        );

        $this->add_control(
            'content_alignment',
            [
                'label' => esc_html__( "Content Alignment", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' )
                ],
                'default' => 'center',
                'condition' => [
                    'icon_position' => 'top'
                ]
            ]
        );

        $this->add_control(
            'icon_margin',
            [
                'label' => esc_html__( "Icon Margin", 'bridge-core' ),
                "description" => esc_html__( "Margin should be set in a top right bottom left format", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_position' => 'top',
                    'box_type' => 'normal'
                ]
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__( 'Tiny', 'bridge-core' ),
                    'fa-2x' => esc_html__( 'Small', 'bridge-core' ),
                    'fa-3x' => esc_html__( 'Medium', 'bridge-core' ),
                    'fa-4x' => esc_html__( 'Large', 'bridge-core' ),
                    'fa-5x' => esc_html__( 'Very Large', 'bridge-core' ),
                ]
            ]
        );

        $this->add_control(
            'use_custom_icon_size',
            [
                'label' => esc_html__( "Use Custom Icon Size", 'bridge-core' ),
                "description" => esc_html__("Select Yes if you want to use custom icon size and margin", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'custom_icon_size',
            [
                'label' => esc_html__( "Custom Icon Size (px)", 'bridge-core' ),
                "description" => esc_html__("Enter just number, omit px", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'custom_icon_size_inner',
            [
                'label' => esc_html__( "Custom Icon Size inside a circle or square (px)", 'bridge-core' ),
                "description" => esc_html__("Enter just number, omit px. Applied only for circle or square icon type", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'use_custom_icon_size' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'custom_icon_margin',
            [
                'label' => esc_html__( "Custom Icon Margin (px)", 'bridge-core' ),
                "description" => esc_html__("Spacing between icon and text (for left icon/margin position). Enter just number, omit px", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'use_custom_icon_size' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__( "Icon Border Color", 'bridge-core' ),
                "description" => esc_html__( "Only for Square and Circle type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => array('square','circle')
                ]
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html__( "Icon Hover Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => esc_html__( "Icon Background Color", 'bridge-core' ),
                "description" => esc_html__( "Icon Background Color (only for square and circle icon type)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => array('square', 'circle')
                ]
            ]
        );

        $this->add_control(
            'icon_gradient',
            [
                'label' => esc_html__("Enable Icon Gradient",'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'icon_hover_background_color',
            [
                'label' => esc_html__( "Icon Hover Background Color", 'bridge-core' ),
                "description" => esc_html__( "Icon Hover Background Color (only for square and circle icon type)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => array('square', 'circle')
                ]
            ]
        );

        $this->add_control(
            'icon_animation',
            [
                'label' => esc_html__( "Icon Animation", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'No', 'bridge-core' ),
                    'q_icon_animation' => esc_html__( 'Yes', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'icon_animation_delay',
            [
                'label' => esc_html__( "Icon Animation Delay (ms)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'icon_animation' => 'q_icon_animation'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( "Title", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ""   => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6"
                ],
                'default' => 'h5'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'title_font_weight',
            [
                'label' => esc_html__( "Title Font Weight", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'separator',
            [
                'label' => esc_html__( "Separator", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'separator_color',
            [
                'label' => esc_html__( "Separator Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'separator' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'separator_top_margin',
            [
                'label' => esc_html__( "Separator Top Margin", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0',
                'condition' => [
                    'separator' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'separator_bottom_margin',
            [
                'label' => esc_html__( "Separator Bottom Margin", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '15',
                'condition' => [
                    'separator' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'separator_width',
            [
                'label' => esc_html__( "Separator Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '20',
                'condition' => [
                    'separator' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__( "Text", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__( "Text Color", 'bridge-core' ),
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
            'link_text',
            [
                'label' => esc_html__( "Link Text", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__( "Link Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( "Target", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                    '_parent' => esc_html__( 'Parent', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'link_icon',
            [
                'label' => esc_html__( "Link Icon", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
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

        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/icon-text', '_icon-text', '', $params);
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

        return sprintf( '<textarea class="qode-shortcode-snipper-holder" rows="3" readonly>[%s %s]</textarea>',
            'icon_text',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorIconText() );