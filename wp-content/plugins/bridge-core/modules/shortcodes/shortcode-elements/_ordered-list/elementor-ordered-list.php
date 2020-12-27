<?php

class BridgeCoreElementorOrderedList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_ordered_list';
    }

    public function get_title() {
        return esc_html__( 'Ordered List', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-ordered-list';
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
		    'content',
		    [
			    'label' => esc_html__( "Content", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::WYSIWYG,
			    'default' => '<ol><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li></ol>'

		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/ordered-list', '_ordered-list', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorOrderedList() );