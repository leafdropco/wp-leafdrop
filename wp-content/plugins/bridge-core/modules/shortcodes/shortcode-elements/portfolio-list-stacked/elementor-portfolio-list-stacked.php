<?php

class BridgeCoreElementorPortfolioListStacked extends \Elementor\Widget_Base{
	public function get_name() {
		return 'bridge_portfolio_list_stacked';
	}
	
	public function get_title() {
		return esc_html__('Portfolio List - Stacked', 'bridge-core');
	}
	
	public function get_icon() {
		return 'bridge-elementor-custom-icon bridge-elementor-portfolio-list-stacked';
	}
	
	public function get_categories() {
		return [ 'qode' ];
	}
	
	public function getAllCustomWidgetAreas(){
		$custom_sidebars = get_option( 'qode_sidebars' );
		$formatted_array             = array(
			'' => ''
		);
		
		if ( is_array( $custom_sidebars ) && count( $custom_sidebars ) ) {
			foreach ( $custom_sidebars as $custom_sidebar ) {
				$formatted_array[ sanitize_title( $custom_sidebar ) ] = $custom_sidebar;
			}
		}
		
		return $formatted_array;
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
			'number_of_items',
			[
				'label' => esc_html__('Number of Projects Per Page', 'bridge-core'),
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
		
		$this->start_controls_section(
			'end_of_scroll',
			[
				'label' => esc_html__( 'End Of Scroll', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'content',
			[
				'label' => esc_html__( "Title", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'static_content',
			[
				'label' => esc_html__( 'Static Content', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'widget_area',
			[
				'label' => esc_html__( "Widget Area", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->getAllCustomWidgetAreas(),
				'default' => '',
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render(){
		$params = $this->get_settings_for_display();
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;
		
		$params['this_object'] = $this;
		
		echo bridge_core_get_shortcode_template_part('templates/portfolio-list-stacked-holder', 'portfolio-list-stacked', '', $params );
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
			$query_array['portfolio_category'] = $params['category'];
		}
		
		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['orderby'] = 'post__in';
			$query_array['post__in'] = $project_ids;
		}
		
		if ( ! empty( $params['tag'] ) ) {
			$query_array['portfolio_tag'] = $params['tag'];
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
	
	public function getStackedImage() {
		$image = '';
		
		if (!empty(get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_image_meta", true ))) {
			$image = get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_image_meta", true );
		}
		
		return $image;
	}
	
	public function getArticleOffsets() {
		$offsets = [];
		
		if (!empty(get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_x_meta", true ))) {
			$offsets['x'] = get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_x_meta", true );
		} else {
			$offsets['x'] = 'center';
		}
		
		if (!empty(get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_y_meta", true ))) {
			$offsets['y'] = get_post_meta( get_the_ID(), "qode_portfolio_list_stacked_y_meta", true );
		} else {
			$offsets['y'] = 'center';
		}
		
		return $offsets;
	}
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPortfolioListStacked() );