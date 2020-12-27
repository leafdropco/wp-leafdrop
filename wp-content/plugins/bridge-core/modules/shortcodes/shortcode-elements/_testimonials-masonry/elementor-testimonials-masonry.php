<?php

class BridgeCoreElementorTestimonialsMasonry extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_testimonials_masonry';
    }

    public function get_title() {
        return esc_html__( 'Testimonials Masonry', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-testimonials-masonry';
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
		    'order_by',
		    [
			    'label' => esc_html__( 'Order By', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    ''      => esc_html__( 'Default', 'bridge-core' ),
				    'title' => esc_html__( 'Title', 'bridge-core' ),
				    'date'  => esc_html__( 'Date', 'bridge-core' ),
				    'rand'  => esc_html__( 'Random', 'bridge-core' )
			    )
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
			    )
		    ]
	    );

	    $this->add_control(
		    'main_title',
		    [
			    'label' => esc_html__( 'Block Main Title', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'main_title_tag',
		    [
			    'label' => esc_html__( 'Block Main Title Tag', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_title_tag(true),
			    'condition' => [
				    'main_title!' => ''
			    ],
			    'default' => 'h3'
		    ]
	    );

	    $this->add_control(
		    'main_title_size',
		    [
			    'label' => esc_html__( 'Block Main Title Size (px)', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'condition' => [
				    'main_title!' => ''
			    ]
		    ]
	    );

	    $this->add_control(
		    'description',
		    [
			    'label' => esc_html__( 'Block Main Description', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'button_text',
		    [
			    'label' => esc_html__( 'Block Main Button Text', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'button_bckg_color',
		    [
			    'label' => esc_html__( 'Button Background Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR,
			    'condition' => [
				    'button_text!' => ''
			    ]
		    ]
	    );

	    $this->add_control(
		    'button_link',
		    [
			    'label' => esc_html__( 'Button Link', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT,
			    'condition' => [
				    'button_text!' => ''
			    ]
		    ]
	    );

	    $this->add_control(
		    'link_target',
		    [
			    'label' => esc_html__( 'Link Target', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_link_target_array(true),
			    'condition' => [
				    'button_link!' => ''
			    ]
		    ]
	    );

	    $this->add_control(
		    'author_image',
		    [
			    'label' => esc_html__( 'Show Author Image', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array(true),
			    'condition' => [
				    'button_link!' => ''
			    ]
		    ]
	    );

	    $this->add_control(
		    'title_tag',
		    [
			    'label' => esc_html__( 'Font Weight', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_title_tag(true),
			    'default' => 'h5'
		    ]
	    );

	    $this->add_control(
		    'title_size',
		    [
			    'label' => esc_html__( 'Title Size (px)', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'background_color',
		    [
			    'label' => esc_html__( 'Testimonial Background Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

	    $this->add_control(
		    'author_size',
		    [
			    'label' => esc_html__( 'Author Size (px)', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/testimonials-masonry', '_testimonials-masonry', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorTestimonialsMasonry() );