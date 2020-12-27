<?php

class BridgeCoreElementorProgressBar extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_progress_bar';
    }

    public function get_title() {
        return esc_html__( 'Progress Bar', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-progress-bar';
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
			'percent',
			[
				'label' => esc_html__( 'Percent', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '100'
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
			'percent_font_size',
			[
				'label' => esc_html__( 'Percentage Font Size', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'percent_font_weight',
			[
				'label' => esc_html__( 'Percentage Font weight', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_font_weight_array(true),
				'default' => ''
			]
		);

		$this->add_control(
			'active_background_color',
			[
				'label' => esc_html__( 'Active Background Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'active_border_color',
			[
				'label' => esc_html__( 'Active Border Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'noactive_background_color',
			[
				'label' => esc_html__( 'Inactive Background Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'noactive_background_color_transparency',
			[
				'label' => esc_html__( 'Inactive Background Color Transparency', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Value should be between 0 and 1. Works if field above isn\'t empty', 'bridge-core' )
			]
		);

		$this->add_control(
			'gradient',
			[
				'label' => esc_html__( 'Percentage Font weight', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => 'no'
			]
		);

		$this->add_control(
			'height',
			[
				'label' => esc_html__( 'Progress Bar Height (px)', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Progress Bar Border Radius)', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);




        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/progress-bar', '_progress-bar', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorProgressBar() );