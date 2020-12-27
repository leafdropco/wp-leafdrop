<?php
namespace Bridge\Shortcodes\InteractiveProjectList;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class InteractiveProjectList
 */
class InteractiveProjectList implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'qode_interactive_project_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Portfolio category filter
        add_filter( 'vc_autocomplete_qode_interactive_project_list_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio category render
        add_filter( 'vc_autocomplete_qode_interactive_project_list_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio selected projects filter
        add_filter( 'vc_autocomplete_qode_interactive_project_list_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio selected projects render
        add_filter( 'vc_autocomplete_qode_interactive_project_list_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

        //Portfolio tag filter
        add_filter( 'vc_autocomplete_qode_interactive_project_list_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

        //Portfolio tag render
        add_filter( 'vc_autocomplete_qode_portfolio_project_slider_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map(array(
			'name'                      => esc_html__('Interactive Project List', 'bridge-core'),
			'base'                      => $this->base,
			'category'                  => 'by QODE',
			'icon'                      => 'icon-wpb-interactive-project-list extended-custom-icon-qode',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'param_name'  => 'number_of_items',
					'heading'     => esc_html__( 'Number of Projects Per Page', 'bridge-core' ),
					'description' => esc_html__( 'Set number of items for the project list. Enter -1 to show all.', 'bridge-core' ),
					'value'       => '-1'
				),
				array(
					'type'        => 'autocomplete',
					'param_name'  => 'category',
					'heading'     => esc_html__( 'One-Category Project List', 'bridge-core' ),
					'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'bridge-core' )
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
					'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'bridge-core' )
				),
				array(
					'type'        => 'autocomplete',
					'param_name'  => 'tag',
					'heading'     => esc_html__( 'One-Tag Project List', 'bridge-core' ),
					'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'bridge-core' )
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'orderby',
					'heading'     => esc_html__( 'Order By', 'bridge-core' ),
					'value'       => array_flip( bridge_qode_get_query_order_by_array() ),
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'order',
					'heading'     => esc_html__( 'Order', 'bridge-core' ),
					'value'       => array_flip( bridge_qode_get_query_order_array() ),
					'save_always' => true
				),
                array(
                    'type'       => 'dropdown',
                    'param_name' => 'layout',
                    'heading'    => esc_html__( 'Layout', 'bridge-core' ),
                    "value" => array(
                        esc_html__( 'Layout 1', 'bridge-core' ) => "layout-1",
                        esc_html__( 'Layout 2', 'bridge-core' ) => "layout-2",
                        esc_html__( 'Layout 3', 'bridge-core' ) => "layout-3"
                    ),
                    'group'      => esc_html__( 'Content Layout', 'bridge-core' )
                ),
				array(
					'type'       => 'dropdown',
					'param_name' => 'title_tag',
					'heading'    => esc_html__( 'Title Tag', 'bridge-core' ),
					'value'      => array_flip( bridge_qode_get_title_tag(true) ),
					'group'      => esc_html__( 'Content Layout', 'bridge-core' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => 'Title Font Size',
					'param_name' => 'title_font_size',
					'group'      => esc_html__( 'Content Layout', 'bridge-core' )
				),
				array(
					'type' => 'colorpicker',
					'heading' => 'Left Section Background Color',
					'param_name' => 'left_section_bg_color',
					'group'      => esc_html__( 'Content Layout', 'bridge-core' )
				),
				array(
					'type' => 'attach_image',
					'heading' => 'Right Section Background Image',
					'param_name' => 'right_section_bg_image',
					'group'      => esc_html__( 'Content Layout', 'bridge-core' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Left section widget area'),
					'param_name' => 'left_section_widget',
					'value' => $this->getAllCustomWidgetAreas(),
					'description' => esc_html__( 'Select widget area to display on the left section.', 'bridge-core' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Right section widget area'),
					'param_name' => 'right_section_widget',
					'value' => $this->getAllCustomWidgetAreas(),
					'description' => esc_html__( 'Select widget area to display on the right section.', 'bridge-core' )
				)
			)
		));

	}

	public function render($atts, $content = null) {

		$args = array(
			'number_of_items'          => '-1',
			'category'                 => '',
			'selected_projects'        => '',
			'tag'                      => '',
			'orderby'                  => 'date',
			'order'                    => 'ASC',
			'layout'                   => 'layout-1',
			'title_tag'                => 'h2',
			'title_font_size'          => '',
			'left_section_bg_color'    => '',
			'right_section_bg_image'   => '',
			'left_section_widget'      => '',
			'right_section_widget'     => ''
		);

		$params = shortcode_atts($args, $atts);
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;

        $params['holder_classes'] = $this->getHolderClasses($params);
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['left_section_styles']   = $this->getLeftSectionStyles( $params );
		$params['right_section_styles']   = $this->getRightSectionStyles( $params );
		
		$html = bridge_core_get_shortcode_template_part('templates/interactive-project-list', 'interactive-project-list', '', $params);

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
			
			$img = wp_get_attachment_image_src($params['right_section_bg_image'], 'full');
			$styles[] = 'background-image: url( ' . $img[0] . ')';
		}
		
		return implode( ';', $styles );
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

    private function getHolderClasses($params) {
        $holder_classes = '';

        if ( !empty($params['layout']) ) {
            $holder_classes = 'qode-ipl-' . $params['layout'];
        }

        return $holder_classes;
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
}