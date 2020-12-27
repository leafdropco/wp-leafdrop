<?php

class BridgeCoreElementorPortfolioCarousel extends \Elementor\Widget_Base{
	public function get_name() {
		return 'bridge_portfolio_carousel';
	}
	
	public function get_title() {
		return esc_html__('Portfolio Carousel', 'bridge-core');
	}
	
	public function get_icon() {
		return 'bridge-elementor-custom-icon bridge-elementor-portfolio-carousel';
	}
	
	public function get_categories() {
		return [ 'qode' ];
	}
	
	protected function _register_controls(){
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'slider_loop',
			[
				'label' => esc_html__( "Enable Slider Loop", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => ''
			]
		);
		
		$this->add_control(
			'slider_mousewheel',
			[
				'label' => esc_html__( "Enable Mouse Wheel Scroll", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => ''
			]
		);

        $this->add_control(
            'auto_width',
            [
                'label' => esc_html__( "Enable Carousel Auto Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false),
                'default' => 'yes'
            ]
        );
		
		$this->add_control(
			'slider_autoplay',
			[
				'label' => esc_html__( "Enable Slider Autoplay", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => ''
			]
		);
		
		$this->add_control(
			'slider_speed',
			[
				'label' => esc_html__('Slide Duration', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 5000 (ms)', 'bridge-core' ),
				'default' => '5000'
			]
		);
		
		$this->add_control(
			'slider_speed_animation',
			[
				'label' => esc_html__('Slide Animation Duration', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 800.', 'bridge-core' ),
				'default' => '800'
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'query',
			[
				'label' => esc_html__( 'Query', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'number_of_items',
			[
				'label' => esc_html__('Number of Portfolios Per Page', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set number of items for your portfolio list. Enter -1 to show all.', 'bridge-core' )
			]
		);
		
		$this->add_control(
			'category',
			[
				'label' => esc_html__( "One-Category Portfolio List", 'bridge-core' ),
				"description" => esc_html__( "Enter one category slug (leave empty for showing all categories)", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'selected_projects',
			[
				'label' => esc_html__( "Show Only Projects with Listed IDs", 'bridge-core' ),
				"description" => esc_html__( "Delimit ID numbers by comma (leave empty for all)", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'tag',
			[
				'label' => esc_html__( "One-Tag Portfolio List", 'bridge-core' ),
				"description" => esc_html__( "Enter one tag slug (leave empty for showing all tags)", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( "Order By", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => '',
					'menu_order' => esc_html__( 'Menu Order', 'bridge-core' ),
					'title'      => esc_html__( 'Title', 'bridge-core' ),
					'date'       => esc_html__( 'Date', 'bridge-core' ),
				],
				'default' => ''
			]
		);
		
		$this->add_control(
			'order',
			[
				'label' => esc_html__( "Order", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => '',
					'ASC'  => esc_html__( 'ASC', 'bridge-core' ),
					'DESC' => esc_html__( 'DESC', 'bridge-core' ),
				],
				'default' => ''
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render(){
		$params = $this->get_settings_for_display();
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;
		
		$params['slider_attr']    = $this->get_slider_data( $params );
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['this_object'] = $this;
		
		echo bridge_core_get_shortcode_template_part( 'templates/portfolio-carousel-holder', 'portfolio-carousel', '', $params );
	}
	
	public function getQueryArray( $params ) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio_page',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['orderby'],
			'order'          => $params['order']
		);
		
		if ( ! empty( $params['category'] ) ) {
			$query_array['portfolio-category'] = $params['category'];
		}
		
		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}
		
		if ( ! empty( $params['tag'] ) ) {
			$query_array['portfolio-tag'] = $params['tag'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $query_array;
	}
	
	public function getItemLink() {
		$portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link      = ! empty( $portfolio_link_meta ) ? $portfolio_link_meta : get_permalink( get_the_ID() );
		
		return apply_filters( 'bridge_qode_filter_portfolio_external_link', $portfolio_link );
	}
	
	public function getItemLinkTarget() {
		$portfolio_link_meta   = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link_target = ! empty( $portfolio_link_meta ) ? '_blank' : '_self';
		
		return apply_filters( 'bridge_qode_filter_portfolio_external_link_target', $portfolio_link_target );
	}
	
	public function get_slider_data( $atts, $include = array() ) {
		$data = array();

        if ( isset( $atts['auto_width'] ) && $atts['auto_width'] === 'yes') {
            $data['slidesPerView'] = 'auto';
        } else {
            $data['slidesPerView']  = isset( $atts['columns'] ) ? $atts['columns'] : 1;
        }

		$data['spaceBetween']   =  0;
		$data['loop']           = isset( $atts['slider_loop'] ) ? $atts['slider_loop'] != 'no' : true;
		$data['mousewheel']     = isset( $atts['slider_mousewheel'] ) ? $atts['slider_mousewheel'] != 'no' : true;
		$data['autoplay']       = isset( $atts['slider_autoplay'] ) ? $atts['slider_autoplay'] != 'no' : true;
		$data['speed']          = isset( $atts['slider_speed'] ) ? $atts['slider_speed'] : '';
		$data['speedAnimation'] = isset( $atts['slider_speed_animation'] ) ? $atts['slider_speed_animation'] : '';
		
		if ( ! empty( $atts['columns_responsive'] ) && $atts['columns_responsive'] === 'custom' ) {
			$data['customStages']      = true;
			$data['slidesPerView1440'] = ! empty( $atts['columns_1440'] ) ? $atts['columns_1440'] : $atts['columns'];
			$data['slidesPerView1366'] = ! empty( $atts['columns_1366'] ) ? $atts['columns_1366'] : $atts['columns'];
			$data['slidesPerView1024'] = ! empty( $atts['columns_1024'] ) ? $atts['columns_1024'] : $atts['columns'];
			$data['slidesPerView768']  = ! empty( $atts['columns_768'] ) ? $atts['columns_768'] : $atts['columns'];
			$data['slidesPerView680']  = ! empty( $atts['columns_680'] ) ? $atts['columns_680'] : $atts['columns'];
			$data['slidesPerView480']  = ! empty( $atts['columns_480'] ) ? $atts['columns_480'] : $atts['columns'];
		}
		
		if ( ! empty( $include ) ) {
			foreach ( $include as $key => $value ) {
				if ( ! array_key_exists( $key, $data ) ) {
					$data[ $key ] = $value;
				}
			}
		}
		
		return json_encode( $data );
	}
	
	private function getHolderClasses($params){
		$holder_classes = '';

        if ( isset( $params['auto_width'] ) && $params['auto_width'] === 'yes') {
            $holder_classes = 'qode-auto-width-carousel';
        }
		
		return $holder_classes;
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPortfolioCarousel() );