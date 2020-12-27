<?php

class BridgeCoreElementorCustomFont extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_custom_font';
    }

    public function get_title() {
        return esc_html__( "Custom Font", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-custom-font';
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
            'font_family',
            [
                'label' => esc_html__( "Font family", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'font_size',
            [
                'label' => esc_html__( "Font size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '15'
            ]
        );

        $this->add_control(
            'line_height',
            [
                'label' => esc_html__( "Line height", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '26'
            ]
        );

        $this->add_control(
            'font_style',
            [
                'label' => esc_html__( "Font Style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'normal' => esc_html__( 'Normal', 'bridge-core' ),
                    'italic' => esc_html__( 'Italic', 'bridge-core' )
                ],
                'default' => 'normal'
            ]
        );

        $this->add_control(
            'text_align',
            [
                'label' => esc_html__( "Text Align", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__( 'Left', 'bridge-core' ),
                    'center' => esc_html__( 'Center', 'bridge-core' ),
                    'right' => esc_html__( 'Right', 'bridge-core' )
                ],
                'default' => 'left'
            ]
        );

        $this->add_control(
            'font_weight',
            [
                'label' => esc_html__( "Font weight", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(false),
                'default' => '300'
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
            'text_decoration',
            [
                'label' => esc_html__( "Text decoration", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_text_decorations(false),
                'default' => 'none'
            ]
        );

        $this->add_control(
            'text_shadow',
            [
                'label' => esc_html__( "Text shadow", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'letter_spacing',
            [
                'label' => esc_html__( "Letter Spacing (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
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
            'padding',
            [
                'label' => esc_html__( "Padding (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => esc_html__( "Margin (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__( "Border Width (px)", 'bridge-core' ),
                "description" => esc_html__( "Enter just number, omit px", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<p>' . esc_html__( 'content content content', 'bridge-core' ) . '</p>'
            ]
        );

        $this->add_control(
            'type_out_effect',
            [
                'label' => esc_html__( 'Enable Type Out Effect', 'bridge-core' ),
                'description' => esc_html__( 'Adds a type out effect inside custom font content', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'type_out_position',
            [
                'label' => esc_html__( 'Position of Type Out Effect', 'bridge-core' ),
                'description' => esc_html__( 'Enter the position of the word after which you would like to display type out effect (e.g. if you would like the type out effect after the 3rd word, you would enter "3")', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type_out_effect' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'typed_color',
            [
                'label' => esc_html__( 'Typed Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type_out_effect' => 'yes'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'typed_ending',
            [
                'label' => esc_html__( 'Typed Ending', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'typed_endings',
            [
                'label' => esc_html__( 'Typed Endings', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ typed_ending }}}',
                'condition' => [
                    'type_out_effect' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/custom-font', '_custom-font', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCustomFont() );