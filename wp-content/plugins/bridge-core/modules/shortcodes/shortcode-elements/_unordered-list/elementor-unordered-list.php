<?php

class BridgeCoreElementorUnorderedList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_unordered_list';
    }

    public function get_title() {
        return esc_html__( 'Unordered List', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-unordered-list';
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
		    'style',
		    [
			    'label' => esc_html__( 'Style', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    'circle'    => esc_html__( 'Circle', 'bridge-core' ),
				    'number'    => esc_html__( 'Number', 'bridge-core' )
			    ),
			    'default' => 'circle'
		    ]
	    );

	    $this->add_control(
		    'number_type',
		    [
			    'label' => esc_html__( 'Number Type', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    'circle_number'         => esc_html__( 'Circle', 'bridge-core' ),
				    'transparent_number'    => esc_html__( 'Transparent', 'bridge-core' )
			    ),
			    'default' => 'circle_number',
			    'condition' => [
				    'style' => 'number'
			    ]
		    ]
	    );

	    $this->add_control(
		    'animate',
		    [
			    'label' => esc_html__( 'Animate List', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array(false),
			    'default' => 'no'
		    ]
	    );

	    $this->add_control(
		    'font_weight',
		    [
			    'label' => esc_html__( 'Font Weight', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    ''          => esc_html__( 'Default', 'bridge-core' ),
				    'light'     => esc_html__( 'Light', 'bridge-core' ),
				    'normal'    => esc_html__( 'Normal', 'bridge-core' ),
				    'bold'      => esc_html__( 'Bold', 'bridge-core' )
			    )
		    ]
	    );

	    $this->add_control(
		    'content',
		    [
			    'label' => esc_html__( "Content", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::WYSIWYG,
			    'default' => '<ul><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li><li>' . esc_html__( 'Lorem Ipsum', 'bridge-core' ) . '</li></ul>'

		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/unordered-list', '_unordered-list', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorUnorderedList() );