<?php

class BridgeCoreElementorPieChartWithIcon extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_pie_chart_with_icon';
    }

    public function get_title() {
        return esc_html__( "Pie Chart With Icon", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-pie-chart-with-icon';
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
            'percent',
            [
                'label' => esc_html__( "Percentage", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '25'
            ]
        );

        $this->add_control(
            'active_color',
            [
                'label' => esc_html__( "Bar Active Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'noactive_color',
            [
                'label' => esc_html__( "Bar Noactive Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'line_width',
            [
                'label' => esc_html__( "Pie Chart Line Width (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
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
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ],
                'default' => 'h3'
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "fa-lg" =>  esc_html__( 'Tiny', 'bridge-core' ),
                    "fa-2x" => esc_html__( 'Small', 'bridge-core' ),
                    "fa-3x" => esc_html__( 'Medium', 'bridge-core' ),
                    "fa-4x" => esc_html__( 'Large', 'bridge-core' ),
                    "fa-5x" => esc_html__( 'Very Large', 'bridge-core' ),
                ],
                'default' => 'fa-lg'
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
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

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        echo bridge_core_get_shortcode_template_part('templates/pie-chart-with-icon', '_pie-chart-with-icon', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPieChartWithIcon() );