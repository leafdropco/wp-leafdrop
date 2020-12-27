<?php

class BridgeCoreElementorTestimonials extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_testimonials';
    }

    public function get_title() {
        return esc_html__( 'Testimonials', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-testimonials';
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
		    'category',
		    [
			    'label' => esc_html__( 'Category', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__('Category Slug (leave empty for all)', 'bridge-core')
		    ]
	    );

	    $this->add_control(
		    'number',
		    [
			    'label' => esc_html__( 'Number', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__('Number of Testimonials', 'bridge-core')
		    ]
	    );

	    $this->add_control(
		    'number_per_slide',
		    [
			    'label' => esc_html__( 'Number per slide', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    '1' => esc_html__( '1', 'bridge-core' ),
				    '2' => esc_html__( '2', 'bridge-core' ),
				    '3' => esc_html__( '3', 'bridge-core' )
			    ),
			    'description' => esc_html__('Number of Testimonials per slide', 'bridge-core'),
			    'default' => '1'
		    ]
	    );

	    $this->add_control(
		    'order_by',
		    [
			    'label' => esc_html__( 'Order By', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    ''      => esc_html__( 'Default', 'bridge-core' ),
				    'title' => esc_html__( 'Title', 'bridge-core' ),
				    'date'  => esc_html__( 'Date', 'bridge-core' ),
				    'rand'  => esc_html__( 'Random', 'bridge-core' )
			    ),
			    'default' => 'date'
		    ]
	    );

	    $this->add_control(
		    'order',
		    [
			    'label' => esc_html__( 'Order Type', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    'ASC'   => esc_html__( 'Ascending', 'bridge-core' ),
				    'DESC'  => esc_html__( 'Descending', 'bridge-core' )
			    ),
			    'default' => 'DESC'
		    ]
	    );

	    $this->add_control(
		    'author_image',
		    [
			    'label' => esc_html__( 'Show Author Image', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array()
		    ]
	    );

	    $this->add_control(
		    'text_color',
		    [
			    'label' => esc_html__( 'Text Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

	    $this->add_control(
		    'text_font_size',
		    [
			    'label' => esc_html__( 'Text Font Size', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'author_text_font_weight',
		    [
			    'label' => esc_html__( 'Author Text Font Weight', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_font_weight_array(true)
		    ]
	    );

	    $this->add_control(
		    'author_text_color',
		    [
			    'label' => esc_html__( 'Author Text Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

	    $this->add_control(
		    'author_text_font_size',
		    [
			    'label' => esc_html__( 'Author Text Font Size (px)', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__( 'Enter just number. Omit px', 'bridge-core' )
		    ]
	    );

	    $this->add_control(
		    'show_navigation',
		    [
			    'label' => esc_html__( 'Show Navigation', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array(false, true),
			    'default' => 'yes'
		    ]
	    );

	    $this->add_control(
		    'navigation_style',
		    [
			    'label' => esc_html__( 'Link Target', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				   'dark'   => esc_html__( 'Dark', 'bridge-core' ),
				   'light'  => esc_html__( 'Light', 'bridge-core' )
			    ),
			    'condition' => [
			        'show_navigation' => 'yes'
		        ],
			    'default' => 'dark'
		    ]
	    );

	    $this->add_control(
		    'auto_rotate_slides',
		    [
			    'label' => esc_html__( 'Slideshow Interval (sec)', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				   '3'  => esc_html__( '3', 'bridge-core' ),
				   '5'  => esc_html__( '5', 'bridge-core' ),
				   '10' => esc_html__( '10', 'bridge-core' ),
				   '15' => esc_html__( '15', 'bridge-core' ),
				   '0'  => esc_html__( 'Disable', 'bridge-core' )
			    ),
			    'default' => '3'
		    ]
	    );

	    $this->add_control(
		    'animation_type',
		    [
			    'label' => esc_html__( 'Animation type', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				   'fade_option'    => esc_html__( 'Fade', 'bridge-core' ),
				   'slide_option'   => esc_html__( 'Slide', 'bridge-core' )
			    ),
			    'default' => 'fade_option'
		    ]
	    );

	    $this->add_control(
		    'animation_speed',
		    [
			    'label' => esc_html__( 'Animation speed', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'description' => esc_html__( 'Speed of slide animation in milliseconds', 'bridge-core' )
		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/testimonials', '_testimonials', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorTestimonials() );