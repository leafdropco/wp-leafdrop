<?php

class BridgeCoreElementorTextMarquee extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_text_marquee';
    }

    public function get_title() {
        return esc_html__( 'Text Marquee', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-text-marquee';
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
			    'label' => esc_html__( "Title Color", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/text-marquee', '_text-marquee', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorTextMarquee() );