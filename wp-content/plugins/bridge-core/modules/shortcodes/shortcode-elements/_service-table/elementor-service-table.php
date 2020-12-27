<?php

class BridgeCoreElementorServiceTable extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_service_table';
    }

    public function get_title() {
        return esc_html__( 'Bridge Service Table', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-service-table';
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
                'label' => esc_html__( "Title", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

	    $this->add_control(
		    'title_tag',
		    [
			    'label' => esc_html__( "Title Tag", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_title_tag(true)
		    ]
	    );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

	    $this->add_control(
		    'title_background_type',
		    [
			    'label' => esc_html__( "Title Background Type", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    "background_color_type"   => esc_html__( 'Background Color', 'bridge-core' ),
				    "background_image_type"   => esc_html__( 'Background Image', 'bridge-core' )
			    )
		    ]
	    );

	    $this->add_control(
		    'title_background_color',
		    [
			    'label' => esc_html__( "Title Background Color", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'condition' => [
			        'title_background_type' => 'background_color_type'
		        ]
		    ]
	    );

	    $this->add_control(
		    'background_image',
		    [
			    'label' => esc_html__( 'Background Image', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA,
			    'condition' => [
				    'title_background_type' => 'background_image_type'
			    ]
		    ]
	    );

	    $this->add_control(
		    'background_image_height',
		    [
			    'label' => esc_html__( "Background Image Height (px)", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'condition' => [
				    'title_background_type' => 'background_image_type'
			    ]
		    ]
	    );

		bridge_qode_icon_collections()->getElementorParamsArray($this);


	    $this->add_control(
		    'icon_size',
		    [
			    'label' => esc_html__( "Icon Size", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    "fa-lg" => esc_html__( 'Tiny', 'bridge-core' ),
				    "fa-2x" => esc_html__( 'Small', 'bridge-core' ),
				    "fa-3x" => esc_html__( 'Medium', 'bridge-core' ),
				    "fa-4x" => esc_html__( 'Large', 'bridge-core' ),
	                "fa-5x" => esc_html__( 'Very Large', 'bridge-core' )
			    )
		    ]
	    );

	    $this->add_control(
		    'custom_size',
		    [
			    'label' => esc_html__( "Custom Size (px)", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
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
		    'content_background_color',
		    [
			    'label' => esc_html__( "Content Background Color", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

	    $this->add_control(
		    'border',
		    [
			    'label' => esc_html__( "Border Around", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array()
		    ]
	    );

	    $this->add_control(
		    'border_width',
		    [
			    'label' => esc_html__( "Border width (px)", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'condition' => [
				    'border' => 'yes'
			    ]
		    ]
	    );

	    $this->add_control(
		    'border_color',
		    [
			    'label' => esc_html__( "Border color", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'condition' => [
				    'border' => 'yes'
			    ]
		    ]
	    );

	    $this->add_control(
		    'content',
		    [
			    'label' => esc_html__( "Content", 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::WYSIWYG,
			    'default' => '<li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li><li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li><li>' . esc_html__( 'content content content', 'bridge-core' ) . '</li>'

		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

	    bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

		if( ! empty( $params['background_image'] ) ){
			$params['background_image'] = $params['background_image']['id'];
		}

        echo bridge_core_get_shortcode_template_part('templates/service-table', '_service-table', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorServiceTable() );