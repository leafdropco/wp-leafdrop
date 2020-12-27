<?php

namespace Bridge\Shortcodes\LatestPosts;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsGallery
 */
class LatestPosts implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsGallery constructor.
	 */
	public function __construct() {
		$this->base = 'latest_post';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 *
	 */
	public function vcMap() {
		vc_map(array(
			"name" => "Latest Posts",
			"base" => $this->base,
			"icon" => "extended-custom-icon-qode icon-wpb-latest_post",
			"category" => 'by QODE',
			"allowed_container_element" => 'vc_row',
			"params" => array(
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Type", 'bridge-core'),
                    "param_name" => "type",
                    "value" => array(
                        "Image on the left" => "image_in_box",
                        "Image on the left - boxed" => "image_on_the_left_boxed",
                        "Minimal" => "minimal",
                        "Boxes" => "boxes",
                        "Boxes With Dividers" => "dividers"
                    ),
                    'save_always' => true,
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Set first post as featured",
                    "value" => array(
                        "No" => "no",
                        "Yes" => "yes"
                    ),
                    "param_name" => "firts_as_featured",
                    "dependency" => Array('element' => "type", 'value' => array('image_on_the_left_boxed'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__('Image Size', 'bridge-core'),
                    "param_name" => "image_size",
                    "value" => array(
                        esc_html__( 'Default/Predefined', 'bridge-core' ) => "",
                        esc_html__( 'Full', 'bridge-core' ) => "full",
                        esc_html__( 'Landscape', 'bridge-core' ) => "portfolio-landscape",
                        esc_html__( 'Portrait', 'bridge-core' ) => "portfolio-portrait"
                    ),
                    "dependency" => array('element' => 'type','value' => array('boxes', 'dividers'))
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Number of Posts",
                    "param_name" => "number_of_posts",
                    "admin_label" => true,
                    "dependency" => Array('element' => "type", 'value' => array('date_in_box', 'image_in_box', 'minimal', 'image_on_the_left_boxed'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Number of Colums",
                    "param_name" => "number_of_colums",
                    "value" => array(
                        "Two" => "2",
                        "Three" => "3",
                        "Four" => "4"
                    ),
                    'save_always' => true,
                    "admin_label" => true,
                    "dependency" => Array('element' => "type", 'value' => array('boxes','dividers'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Number of Rows",
                    "param_name" => "number_of_rows",
                    "value" => array(
                        "One"   => "1",
                        "Two"   => "2",
                        "Three" => "3",
                        "Four"  => "4",
                        "Five"  => "5"
                    ),
                    'save_always' => true,
                    "description" => "",
                    "dependency" => Array('element' => "type", 'value' => array('boxes','dividers'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Text from edge",
                    "param_name" => "text_from_edge",
                    "value" => array(
                        "Default" => "",
                        "No" => "no",
                        "Yes" => "yes"
                    ),
                    "description" => "",
                    "dependency" => Array('element' => "type", 'value' => array('boxes'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order By",
                    "param_name" => "order_by",
                    "value" => array(
                        "Title" => "title",
                        "Date" => "date"
                    ),
                    'save_always' => true,
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Order",
                    "param_name" => "order",
                    "value" => array(
                        "ASC" => "ASC",
                        "DESC" => "DESC"
                    ),
                    'save_always' => true,
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Category Slug",
                    "param_name" => "category",
                    "description" => "Leave empty for all or use comma for list",
                    "admin_label" => true
                ),
                array(
                    "type" => "textfield",
                    "heading" => "Text length",
                    "param_name" => "text_length",
                    "description" => "Number of characters"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Title Tag",
                    "param_name" => "title_tag",
                    "value" => array(
                        ""   => "",
                        "h2" => "h2",
                        "h3" => "h3",
                        "h4" => "h4",
                        "h5" => "h5",
                        "h6" => "h6",
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Display category",
                    "param_name" => "display_category",
                    "value" => array(
                        "Default" => "",
                        "Yes" => "1",
                        "No" => "0"
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Display date",
                    "param_name" => "display_time",
                    "value" => array(
                        "Default" => "",
                        "Yes" => "1",
                        "No" => "0"
                    ),
                    "dependency" => array('element' => 'type', 'value' => array("image_in_box","boxes","minimal","image_on_the_left_boxed"))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Display comments",
                    "param_name" => "display_comments",
                    "value" => array(
                        "Default" => "",
                        "Yes" => "1",
                        "No" => "0"
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Display like",
                    "param_name" => "display_like",
                    "value" => array(
                        "Default" => "",
                        "Yes" => "1",
                        "No" => "0"
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "Display share",
                    "param_name" => "display_share",
                    "value" => array(
                        "Default" => "",
                        "Yes" => "1",
                        "No" => "0"
                    )
                )
			)

		));
	}

	/**
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
        $args = array(
			"type"       			=> "date_in_box",
			'image_size'            => '',
			"number_of_posts"       => "",
			"number_of_colums"      => "",
			"number_of_rows"        => "1",
			"text_from_edge"      	=> "",
			"rows"                  => "",
			"order_by"              => "",
			"order"                 => "",
			"category"              => "",
			"text_length"           => "",
			"title_tag"             => "h5",
			"display_category"    	=> "0",
			"display_time"          => "1",
			"display_comments"      => "1",
			"display_like"          => "0",
			"display_share"         => "0",
			"firts_as_featured"     => "no",

        );
        $params	= shortcode_atts($args, $atts);

		$params['this_object'] = $this;

		$params['blog_hide_comments'] = "";
		if (isset($bridge_qode_options['blog_hide_comments'])) {
			$params['blog_hide_comments'] = bridge_qode_options()->getOptionValue('blog_hide_comments');
		}

		$params['qode_like'] = "on";
		if (isset($bridge_qode_options['qode_like'])) {
			$params['qode_like'] = bridge_qode_options()->getOptionValue('qode_like');
		}

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

		//get correct heading value. If provided heading isn't valid get the default one
		$params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

		if($params['type'] != "boxes" && $params['type'] != "dividers"){
			$params['q'] = new \WP_Query(
				array('orderby' => $params['order_by'], 'order' => $params['order'], 'posts_per_page' => $params['number_of_posts'], 'category_name' => $params['category'])
			);
		} else {
			$params['q'] = new \WP_Query(
				array('orderby' => $params['order_by'], 'order' => $params['order'], 'posts_per_page' => $params['number_of_colums']*$params['number_of_rows'], 'category_name' => $params['category'])
			);
		}

		$params['columns_number'] = "";
		if($params['type'] == 'boxes' || $params['type'] == 'dividers') {
			if($params['number_of_colums'] == 2){
				$params['columns_number'] = "two_columns";
			} else if ($params['number_of_colums'] == 3) {
				$params['columns_number'] = "three_columns";
			} else if ($params['number_of_colums'] == 4) {
				$params['columns_number'] = "four_columns";
			}
		}

		//get number of rows class for boxes type
		$params['rows_number'] = "";
		if($params['type'] == 'boxes' || $params['type'] == 'dividers') {
			switch($params['number_of_rows']) {
				case 1:
					$params['rows_number'] = 'one_row';
					break;
				case 2:
					$params['rows_number'] = 'two_rows';
					break;
				case 3:
					$params['rows_number'] = 'three_rows';
					break;
				case 4:
					$params['rows_number'] = 'four_rows';
					break;
				case 5:
					$params['rows_number'] = 'five_rows';
					break;
				default:
					break;
			}
		}

		$params['padding_latest_post'] = "";
		if($params['text_from_edge'] == "yes" && $params['type'] == "boxes"){
			$params['padding_latest_post'] = " style=' padding-left:0; padding-right:0; '";
		}

		return bridge_core_get_shortcode_template_part('templates/latest-posts', 'latest-posts', $params['type'], $params);
	}

	public function getExcerpt($id, $text_length){
		$excerpt = '';

		if($text_length !== '0') {
			$excerpt .= '<p itemprop="description" class="excerpt">';
			$excerpt .= $text_length > 0 ? mb_substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt($id);
			$excerpt .= '...</p>';
		}
		
		return $excerpt;
	}


}