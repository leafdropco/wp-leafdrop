<?php

class BridgeCoreElementorVerticalSeparator extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_vertical_separator';
    }

    public function get_title() {
        return esc_html__( 'Vertical Separator', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-vertical-separator';
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
            'vs_height',
            [
                'label' => esc_html__('Height', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

	    $this->add_control(
		    'vs_width',
		    [
			    'label' => esc_html__('Width', 'bridge-core'),
			    'type' => \Elementor\Controls_Manager::TEXT,
		    ]
	    );

        $this->add_control(
            'vs_color',
            [
                'label' => esc_html__('Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

	    $this->add_control(
		    'vs_margin',
		    [
			    'label'         => esc_html__('Separator Margins', 'bridge-core'),
			    'description'   => esc_html__('Please insert margin in format: 0px 0px 10px 0px', 'bridge-core'),
			    'type'          => \Elementor\Controls_Manager::TEXT,
		    ]
	    );

        $this->end_controls_section();


    }

    protected function render(){
        $params = $this->get_settings_for_display();

	    $params['holder_style']   = $this->getHolderStyle($params);


	    echo bridge_core_get_shortcode_template_part('templates/vertical-separator-template', 'vertical-separator', '', $params);
    }

	private function getHolderStyle($params){
		$styles = array();

		if(!empty($params['vs_height'])){
			$styles[] = 'height: '.$params['vs_height'].'px';
		}

		if(!empty($params['vs_width'])){
			$styles[] = 'width: '.$params['vs_width'].'px';
		}

		if(!empty($params['vs_color'])){
			$styles[] = 'background-color: '.$params['vs_color'];
		}

		if(!empty($params['vs_margin'])){
			$styles[] = 'margin: '.$params['vs_margin'];
		}

		return $styles;
	}

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorVerticalSeparator() );