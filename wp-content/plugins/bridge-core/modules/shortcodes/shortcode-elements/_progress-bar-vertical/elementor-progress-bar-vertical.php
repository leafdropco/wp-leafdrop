<?php

class BridgeCoreElementorProgressBarVertical extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_progress_bar_vertical';
    }

    public function get_title() {
        return esc_html__( 'Progress Bar Vertical', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-progress-bar-vertical';
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
			'title',
			[
				'label' => esc_html__( 'Title', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__( 'Title Tag', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_title_tag(),
				'default' => 'h5'
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => esc_html__( 'Title Size', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Bar Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'bar_border_color',
			[
				'label' => esc_html__( 'Bar Border Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Top Border Radius', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'percent',
			[
				'label' => esc_html__( 'Percent', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100'
			]
		);

		$this->add_control(
			'percentage_text_size',
			[
				'label' => esc_html__( 'Percentage Text Size', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'percent_color',
			[
				'label' => esc_html__( 'Percentage Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__( 'Text', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);




        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/progress-bar-vertical', '_progress-bar-vertical', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorProgressBarVertical() );