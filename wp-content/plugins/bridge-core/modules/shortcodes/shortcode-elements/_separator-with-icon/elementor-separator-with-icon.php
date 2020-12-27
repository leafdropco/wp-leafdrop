<?php

class BridgeCoreElementorSeparatorWithIcon extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_separator_with_icon';
    }

    public function get_title() {
        return esc_html__( 'Separator With Icon', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-separator-with-icon';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

		global $qodeIconCollections;
		$collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

	    $this->add_control(
		    'icon',
		    [
			    'label' => esc_html__( 'Icon', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array_flip($icons),
				'default' => 'fa-codepen'
		    ]
	    );

	    $this->add_control(
		    'color',
		    [
			    'label' => esc_html__( 'Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

		$this->add_control(
			'opacity',
			[
				'label' => esc_html__( 'Opacity', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set opacity from 0 to 1', 'bridge-core' ),
			]
		);

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

		if( ! empty( $params['team_image'] ) ){
			$params['team_image'] = $params['team_image']['id'];
		}

        echo bridge_core_get_shortcode_template_part('templates/separator-with-icon', '_separator-with-icon', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSeparatorWithIcon() );