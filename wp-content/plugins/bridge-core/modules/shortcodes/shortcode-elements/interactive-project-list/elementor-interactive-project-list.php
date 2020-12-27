<?php

class BridgeCoreElementorInteractiveProjectList extends \Elementor\Widget_Base{
	public function get_name() {
		return 'bridge_interactive_project_list';
	}
	
	public function get_title() {
		return esc_html__('Interactive Project List', 'bridge-core');
	}
	
	public function get_icon() {
		return 'bridge-elementor-custom-icon bridge-elementor-interactive-project-list';
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
				'description' => esc_html__( 'Set number of items for the project list. Enter -1 to show all.', 'bridge-core' )
			]
		);
		
		$this->add_control(
			'category',
			[
				'label' => esc_html__( "One-Category Project List", 'bridge-core' ),
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
				'label' => esc_html__( "One-Tag Project List", 'bridge-core' ),
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
		
		$this->add_control(
			'left_section_widget',
			[
				'label' => esc_html__( "Left section widget area", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->getAllCustomWidgetAreas(),
				'default' => '',
				'description' => esc_html__( 'Select widget area to display on the left section.', 'bridge-core' )
			]
		);
		
		$this->add_control(
			'right_section_widget',
			[
				'label' => esc_html__( "Right section widget area", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->getAllCustomWidgetAreas(),
				'default' => '',
				'description' => esc_html__( 'Select widget area to display on the right section.', 'bridge-core' )
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'content_layout',
			[
				'label' => esc_html__( 'Content Layout', 'bridge-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'layout',
            [
                'label' => esc_html__( "Layout", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'layout-1'     => esc_html__( 'Layout 1', 'bridge-core' ),
                    'layout-2'     => esc_html__( 'Layout 2', 'bridge-core' ),
                    'layout-3'     => esc_html__( 'Layout 3', 'bridge-core' )
                ],
                'default' => 'layout-1'
            ]
        );
		
		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__( "Title Tag", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6",
				],
				'default' => 'h2',
			]
		);
		
		$this->add_control(
			'title_font_size',
			[
				'label' => esc_html__( "Title Font Size", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);
		
		$this->add_control(
			'left_section_bg_color',
			[
				'label' => esc_html__( "Left Section Background Color", 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);
		
		$this->add_control(
			'right_section_bg_image',
			[
				'label' => esc_html__('Right Section Background Image', 'bridge-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		
		$this->end_controls_section();
	}
	
	protected function render(){
		$params = $this->get_settings_for_display();
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;

        $params['holder_classes'] = $this->getHolderClasses($params);
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['left_section_styles']   = $this->getLeftSectionStyles( $params );
		$params['right_section_styles']   = $this->getRightSectionStyles( $params );
		
		echo bridge_core_get_shortcode_template_part('templates/interactive-project-list', 'interactive-project-list', '', $params);
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
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_font_size'] ) ) {
			$styles[] = 'font-size: ' . bridge_qode_filter_px( $params['title_font_size'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getLeftSectionStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['left_section_bg_color'] ) ) {
			$styles[] = 'background-color: ' . $params['left_section_bg_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getRightSectionStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['right_section_bg_image'] ) ) {
			$styles[] = 'background-image: url( ' . $params['right_section_bg_image']['url'] . ')';
		}
		
		return implode( ';', $styles );
	}

    private function getHolderClasses($params) {
        $holder_classes = '';

        if ( !empty($params['layout']) ) {
            $holder_classes = 'qode-ipl-' . $params['layout'];
        }

        return $holder_classes;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInteractiveProjectList() );