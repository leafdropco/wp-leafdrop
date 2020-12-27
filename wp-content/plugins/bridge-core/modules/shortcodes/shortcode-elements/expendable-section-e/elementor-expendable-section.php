<?php

class BridgeCoreElementorExpendableSection extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_expendable_section';
    }

    public function get_title() {
        return esc_html__( 'Qode Expendable Section', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-expandable-section';
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
            'header_style',
            [
                'label' => esc_html__( 'Header Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core'),
                    'light' => esc_html__('Light', 'bridge-core'),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'anchor_id',
            [
                'label' => esc_html__( 'Anchor ID', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label' => esc_html__( 'Label Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'label_hover_color',
            [
                'label' => esc_html__( 'Label Hover Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'more_label',
            [
                'label' => esc_html__( 'More Label', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('More Facts', 'bridge-core')
            ]
        );

        $this->add_control(
            'less_label',
            [
                'label' => esc_html__( 'Less Label', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Less Facts', 'bridge-core')
            ]
        );

        $this->add_control(
            'label_position',
            [
                'label' => esc_html__( 'Label Position', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__('Left', 'bridge-core'),
                    'center' => esc_html__('Center', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core')
                ],
                'default' => 'center'
            ]
        );

        $this->add_control(
            'top_padding',
            [
                'label' => esc_html__( 'Expandable Content Top Padding (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '70'
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG
            ]
        );

        bridge_core_generate_elementor_templates_control( $this, array('content' => '') );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( empty( $params['content'] ) ){
            $params['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $params['template_id'] );
        }

        echo bridge_core_get_shortcode_template_part('templates/expendable-section', 'expendable-section-e', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorExpendableSection() );