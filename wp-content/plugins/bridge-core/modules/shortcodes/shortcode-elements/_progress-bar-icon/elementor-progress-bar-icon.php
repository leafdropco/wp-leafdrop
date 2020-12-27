<?php

class BridgeCoreElementorProgressBarIcon extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_progress_bar_icon';
    }

    public function get_title() {
        return esc_html__( 'Progress Bar Icon', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-progress-bar-icon';
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
			'icons_number',
			[
				'label' => esc_html__( 'Number of Icons', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'active_number',
			[
				'label' => esc_html__( 'Number of Active Icons', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'type',
			[
				'label' => esc_html__( 'Type', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'bridge-core' ),
					'circle' => esc_html__( 'Circle', 'bridge-core' ),
					'square' => esc_html__( 'Square', 'bridge-core' )
				),
				'default' => 'normal'
			]
		);

		bridge_qode_icon_collections()->getElementorParamsArray($this);

		$this->add_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'tiny'			=> esc_html__( 'Tiny', 'bridge-core' ),
					'small'			=> esc_html__( 'Small', 'bridge-core' ),
					'medium'		=> esc_html__( 'Medium', 'bridge-core' ),
					'large'			=> esc_html__( 'Large', 'bridge-core' ),
					'very_large'	=> esc_html__( 'Very Large', 'bridge-core' )
				),
				'default' => 'tiny'
			]
		);

		$this->add_control(
			'custom_size',
			[
				'label' => esc_html__( 'Custom Size (px)', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => ''
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Icon Active Color', 'bridge-core' ),
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
			'background_active_color',
			[
				'label' => esc_html__( 'Background Active Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( '"Border Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Only for Square and Circle type', 'bridge-core' ),
				'condition' => [
					'type' => ['square', 'circle']
				]
			]
		);

		$this->add_control(
			'border_active_color',
			[
				'label' => esc_html__( '"Border Active Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Only for Square and Circle type', 'bridge-core' ),
				'condition' => [
					'type' => ['square', 'circle']
				]
			]
		);

		$this->add_control(
			'element_appearance',
			[
				'label' => esc_html__( 'Element Appearance', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set distance (related to browser bottom) to start the animation', 'bridge-core' )
			]
		);

	    $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

		bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        echo bridge_core_get_shortcode_template_part('templates/progress-bar-icon', '_progress-bar-icon', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorProgressBarIcon() );