<?php

namespace Bridge\Shortcodes\PortfolioProjectSlider;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class PortfolioProjectSlider implements ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qode_portfolio_project_slider';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Portfolio category filter
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio category render
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects filter
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects render
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)
		
		//Portfolio tag filter
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio tag render
		add_filter( 'vc_autocomplete_qode_portfolio_project_slider_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
					'name'     => esc_html__( 'Portfolio Project Slider', 'bridge-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by QODE', 'bridge-core' ),
					'icon'     => 'icon-wpb-portfolio-project-slider extended-custom-icon-qode',
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'content_skin',
							'heading'     => esc_html__('Content Skin', 'bridge-core'),
							'value'       => array(
								esc_html__('Default', 'bridge-core') => '',
								esc_html__('Light', 'bridge-core')   => 'light',
							),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_yes_no_select_array(false) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_mousewheel',
							'heading'     => esc_html__( 'Enable Mouse Wheel Scroll', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_yes_no_select_array(false) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_yes_no_select_array(false) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'bridge-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'bridge-core' ),
							'value'       => '5000'
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'bridge-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 800.', 'bridge-core' ),
							'value'       => '800'
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_yes_no_select_array(false) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'widget_area',
							'heading'     => esc_html__( 'Widget Area', 'bridge-core' ),
							'value'       => array_merge(
								array(
									'' => ''
								),
								array_flip(bridge_qode_get_custom_sidebars())
							)
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Portfolios Per Page', 'bridge-core' ),
							'description' => esc_html__( 'Set number of items for your portfolio list. Enter -1 to show all.', 'bridge-core' ),
							'value'       => '-1',
							'group'     => esc_html__( 'Query', 'bridge-core' ),
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'One-Category Portfolio List', 'bridge-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'bridge-core' ),
							'group'       => esc_html__( 'Query', 'bridge-core' ),
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'selected_projects',
							'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'bridge-core' ),
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'bridge-core' ),
							'group'       => esc_html__( 'Query', 'bridge-core' ),
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'tag',
							'heading'     => esc_html__( 'One-Tag Portfolio List', 'bridge-core' ),
							'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'bridge-core' ),
							'group'       => esc_html__( 'Query', 'bridge-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_query_order_by_array()),
							'save_always' => true,
							'group'       => esc_html__( 'Query', 'bridge-core' ),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'bridge-core' ),
							'value'       => array_flip( bridge_qode_get_query_order_array() ),
							'save_always' => true,
							'group'       => esc_html__( 'Query', 'bridge-core' ),
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'content_skin'             => '',
			'slider_pagination'        => '',
			'number_of_items'          => '-1',
			'category'                 => '',
			'enable_category'          => 'yes',
			'selected_projects'        => '',
			'tag'                      => '',
			'orderby'                  => 'date',
			'order'                    => 'ASC',
			'widget_area'			   => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		/***
		 * @params query_results
		 * @params holder_data
		 * @params holder_classes
		 * @params holder_inner_classes
		 */
		$additional_params = array();
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;
		
		$params['slider_attr']    = $this->get_slider_data( $atts );
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['this_object'] = $this;
		$params['content'] = $content;

		$html = bridge_core_get_shortcode_template_part( 'templates/portfolio-project-slider-holder', 'portfolio-project-slider', '', $params );
		
		return $html;
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
			$query_array['post__in'] = $project_ids;
		}
		
		if ( ! empty( $params['tag'] ) ) {
			$query_array['portfolio_tag'] = $params['tag'];
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
	
	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio_category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'bridge-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio_category' );
			if ( is_object( $portfolio_category ) ) {
				
				$portfolio_category_slug  = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;
				
				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'bridge-core' ) . ': ' . $portfolio_category_title;
				}
				
				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'bridge-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'bridge-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {
				
				$portfolio_id    = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;
				
				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'bridge-core' ) . ': ' . $portfolio_title;
				}
				
				$portfolio_id_display = esc_html__( 'Id', 'bridge-core' ) . ': ' . $portfolio_id;
				
				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio_tag' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_tag_title'] ) > 0 ) ? esc_html__( 'Tag', 'bridge-core' ) . ': ' . $value['portfolio_tag_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio tag by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioTagAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_tag = get_term_by( 'slug', $query, 'portfolio_tag' );
			if ( is_object( $portfolio_tag ) ) {
				
				$portfolio_tag_slug  = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;
				
				$portfolio_tag_title_display = '';
				if ( ! empty( $portfolio_tag_title ) ) {
					$portfolio_tag_title_display = esc_html__( 'Tag', 'bridge-core' ) . ': ' . $portfolio_tag_title;
				}
				
				$data          = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
	public function get_slider_data( $atts, $include = array() ) {
		$data = array();
		
		$data['slidesPerView']  = isset( $atts['columns'] ) ? $atts['columns'] : 1;
		$data['spaceBetween']   = isset( $atts['space'] ) ? pearce_core_get_space_value( $atts['space'] ) : 0;
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
		
		if ( !empty($params['content_skin']) && $params['content_skin'] === 'light' ){
			$holder_classes = 'qode-pps-light';
		}
		
		return $holder_classes;
	}
}