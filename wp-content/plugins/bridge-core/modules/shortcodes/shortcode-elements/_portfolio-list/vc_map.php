<?php
if (!function_exists('bridge_core_portfolio_list_vc_map')) {

	function bridge_core_portfolio_list_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Portfolio List", 'bridge-core' ),
			"base" => "portfolio_list",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-portfolio",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						esc_html__( 'Standard', 'bridge-core' )						=> "standard",
						esc_html__( 'Standard No Space', 'bridge-core' )				=> "standard_no_space",
						esc_html__( 'Hover Text', 'bridge-core' )					=> "hover_text",
						esc_html__( 'Hover Text No Space', 'bridge-core' )			=> "hover_text_no_space",
						esc_html__( 'Masonry without space', 'bridge-core' )			=> "masonry",
						esc_html__( 'Masonry with space', 'bridge-core' )			=> "masonry_gallery_with_space",
						esc_html__( 'Masonry(Pinterest) with space', 'bridge-core' ) => "masonry_with_space",
						esc_html__( 'Masonry(Pinterest) with space (image only)', 'bridge-core' ) => "masonry_with_space_without_description",
						esc_html__( 'Justified Gallery', 'bridge-core' )				=> "justified_gallery",
						esc_html__( 'Alternating Sizes', 'bridge-core' )				=> "alternating_sizes"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Hover Animation Type", 'bridge-core' ),
					"param_name" => "hover_type_standard",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "default",
						esc_html__( 'Subtle Vertical', 'bridge-core' ) => "subtle_vertical_hover",
						esc_html__( 'Image Subtle Rotate Zoom', 'bridge-core' ) => "image_subtle_rotate_zoom_hover",
						esc_html__( 'Image Text Zoom', 'bridge-core' ) => "image_text_zoom_hover",
						esc_html__( 'Thin Plus Only', 'bridge-core' ) => "thin_plus_only",
						esc_html__( 'Slow Zoom', 'bridge-core' ) => "slow_zoom",
						esc_html__( 'Split Up', 'bridge-core' ) => "split_up"
					),
					'save_always' => true,
					'admin_label' => true,
					"dependency" => array('element' => "type", 'value' => array('standard', 'standard_no_space', 'masonry_with_space'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Hover Animation Type", 'bridge-core' ),
					"param_name" => "hover_type_text_on_hover_image",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "default",
						esc_html__( 'Subtle Vertical', 'bridge-core' ) => "subtle_vertical_hover",
						esc_html__( 'Image Subtle Rotate Zoom', 'bridge-core' ) => "image_subtle_rotate_zoom_hover",
						esc_html__( 'Image Text Zoom', 'bridge-core' ) => "image_text_zoom_hover",
						esc_html__( 'Cursor Change', 'bridge-core' ) => "cursor_change_hover",
						esc_html__( 'Thin Plus Only', 'bridge-core' ) => "thin_plus_only",
						esc_html__( 'Slow Zoom', 'bridge-core' ) => "slow_zoom",
						esc_html__( 'Split Up', 'bridge-core' ) => "split_up",
						esc_html__( 'Grayscale', 'bridge-core' ) => "grayscale",
						esc_html__( 'Slide Up', 'bridge-core' ) => "slide_up",
						esc_html__( 'Flip From Left', 'bridge-core' ) => "flip_from_left"

					),
					'save_always' => true,
					'admin_label' => true,
					"dependency" => array('element' => "type", 'value' => array('hover_text', 'hover_text_no_space', 'masonry_with_space_without_description', 'alternating_sizes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Hover Animation Type", 'bridge-core' ),
					"param_name" => "hover_type_masonry",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "default",
						esc_html__( 'Subtle Vertical', 'bridge-core' ) => "subtle_vertical_hover",
						esc_html__( 'Image Subtle Rotate & Zoom', 'bridge-core' ) => "image_subtle_rotate_zoom_hover",
						esc_html__( 'Image & Text Zoom', 'bridge-core' ) => "image_text_zoom_hover",
						esc_html__( 'Cursor Change', 'bridge-core' ) => "cursor_change_hover",
						esc_html__( 'Thin Plus Only', 'bridge-core' ) => "thin_plus_only",
						esc_html__( 'Slow Zoom', 'bridge-core' ) => "slow_zoom",
						esc_html__( 'Split Up', 'bridge-core' ) => "split_up"
					),
					'save_always' => true,
					'admin_label' => true,
					"dependency" => array('element' => "type", 'value' => array('masonry', 'masonry_gallery_with_space', 'justified_gallery'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Spacing between items (px)", 'bridge-core' ),
					"param_name" => "spacing",
					"value" => "",
					"dependency" => array('element' => "type","value" => array("masonry_with_space", "masonry_with_space_without_description", "justified_gallery"))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Box Background Color", 'bridge-core' ),
					"param_name" => "box_background_color",
					"value" => "",
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space', 'masonry_with_space'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Box Border", 'bridge-core' ),
					"param_name" => "box_border",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space', 'masonry_with_space'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Box Border Width", 'bridge-core' ),
					"param_name" => "box_border_width",
					"value" => "",
					"dependency" => array('element' => "box_border", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Box Border Color", 'bridge-core' ),
					"param_name" => "box_border_color",
					"value" => "",
					"dependency" => array('element' => "box_border", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Columns", 'bridge-core' ),
					"param_name" => "columns",
					"value" => array(
						"" => "",
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6"
					),
					"save_always" => true,
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description','alternating_sizes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Grid Size", 'bridge-core' ),
					"param_name" => "grid_size",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( '3 Columns Grid', 'bridge-core' ) => "3",
						esc_html__( '4 Columns Grid', 'bridge-core' ) => "4",
						esc_html__( '5 Columns Grid', 'bridge-core' ) => "5"
					),
					"dependency" => array('element' => "type", 'value' => array('masonry', 'masonry_gallery_with_space'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Frame", 'bridge-core' ),
					"param_name" => "frame_around_item",
					"value" => array(
						esc_html__( 'No Frame', 'bridge-core' ) => "no_frame",
						esc_html__( 'Monitor Frame', 'bridge-core' ) => "monitor_frame"
					),
					"dependency" => array('element' => "type", 'value' => array('hover_text'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Portfolio Loading Type", 'bridge-core' ),
					"param_name" => "portfolio_loading_type",
					"value" => array(
						"" => "",
						esc_html__( 'Fade - one by one', 'bridge-core' ) => "portfolio_one_by_one",
						esc_html__( 'Fade - diagonal', 'bridge-core' ) => "diagonal_fade",
						esc_html__( 'Slide from top - diagonal', 'bridge-core' ) => "slide_from_top",
						esc_html__( 'Slide from left - random', 'bridge-core' ) => "slide_from_left"
					),
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Portfolio Loading Type", 'bridge-core' ),
					"param_name" => "portfolio_loading_type_masonry",
					"value" => array(
						"" => "",
						esc_html__( 'Fade - one by one', 'bridge-core' ) => "portfolio_one_by_one",
						esc_html__( 'Fade - from bottom', 'bridge-core' ) => "portfolio_fade_from_bottom"
					),
					"dependency" => array('element' => "type", 'value' => array('masonry','masonry_gallery_with_space','masonry_with_space','masonry_with_space_without_description'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Image proportions", 'bridge-core' ),
					"param_name" => "image_size",
					"value" => array(
						esc_html__( 'Original', 'bridge-core' ) => "",
						esc_html__( 'Square', 'bridge-core' ) => "square",
						esc_html__( 'Landscape', 'bridge-core' ) => "landscape",
						esc_html__( 'Portrait', 'bridge-core' ) => "portrait"
					),
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space','alternating_sizes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Image Color Overlay", 'bridge-core' ),
					"param_name" => "overlay_background_color",
					"value" => "",
					"description" => esc_html__( "Choose color for overlay that appears on hover. Not available for default hover types", 'bridge-core' ),
					"dependency" => array('element' => 'type', 'value' => array('standard', 'standard_no_space', 'hover_text', 'hover_text_no_space', 'masonry', 'masonry_gallery_with_space', 'masonry_with_space','masonry_with_space_without_description', 'justified_gallery','alternating_sizes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Row Height (px)", 'bridge-core' ),
					"param_name" => "row_height",
					"value" => "200",
					"save_always" => true,
					"description" => esc_html__( "Targeted row height, which may vary depending on the proportions of the images.", 'bridge-core' ),
					"dependency" => array('element' => "type", 'value' => array('justified_gallery'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Last Row Behavior", 'bridge-core' ),
					"param_name" => "justify_last_row",
					"value" => array(
						esc_html__( 'Align left', 'bridge-core' ) => "nojustify",
						esc_html__( 'Align right', 'bridge-core' ) => "right",
						esc_html__( 'Align centrally', 'bridge-core' ) => "center",
						esc_html__( 'Justify', 'bridge-core' ) => "justify",
						esc_html__( 'Hide', 'bridge-core' ) => "hide"
					),
					"description" => esc_html__( "Defines whether to justify the last row, align it in a certain way, or hide it.", 'bridge-core' ),
					"dependency" => array('element' => "type", 'value' => array('justified_gallery'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Justify Threshold (0-1)", 'bridge-core' ),
					"param_name" => "justify_threshold",
					"value" => "0.75",
					"description" => esc_html__( "If the last row takes up more than this part of available width, it will be justified despite the defined alignment. Enter 1 to never justify the last row.", 'bridge-core' ),
					"dependency" => array('element' => "justify_last_row", 'value' => array('nojustify','right','center'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order By", 'bridge-core' ),
					"param_name" => "order_by",
					"value" => array(
						"" => "",
						esc_html__( 'Menu Order', 'bridge-core' ) => "menu_order",
						esc_html__( 'Title', 'bridge-core' ) => "title",
						esc_html__( 'Date', 'bridge-core' ) => "date"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Order", 'bridge-core' ),
					"param_name" => "order",
					"value" => array(
						"" => "",
						esc_html__( 'ASC', 'bridge-core') => "ASC",
						esc_html__( 'DESC', 'bridge-core') => "DESC",
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Filter", 'bridge-core' ),
					"param_name" => "filter",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Filter Color", 'bridge-core' ),
					"param_name" => "filter_color",
					"dependency" => array('element' => "filter", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Filter Order By", 'bridge-core' ),
					"param_name" => "filter_order_by",
					"value" => array(
						esc_html__( 'Name', 'bridge-core' ) => "name",
						esc_html__( 'Slug', 'bridge-core' ) => "slug",
						esc_html__( 'ID', 'bridge-core' ) => "id",
						esc_html__( 'Description', 'bridge-core' ) => "description"
					),
					"dependency" => array('element' => "filter", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Enable Number of Items in Filter", 'bridge-core' ),
					"param_name" => "filter_number_of_items",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					),
					"dependency" => array('element' => "filter", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Lightbox", 'bridge-core' ),
					"param_name" => "lightbox",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show View Button", 'bridge-core' ),
					"param_name" => "view_button",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Load More", 'bridge-core' ),
					"param_name" => "show_load_more",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					),
					"dependency" => array('element' => "type", 'value' => array('standard','standard_no_space','hover_text','hover_text_no_space', 'masonry_with_space', 'masonry_with_space_without_description', 'justified_gallery','alternating_sizes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Number", 'bridge-core' ),
					"param_name" => "number",
					"value" => "-1",
					"admin_label" => true,
					"description" => esc_html__( "Number of portfolios on page (-1 is all)", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Category", 'bridge-core' ),
					"param_name" => "category",
					"admin_label" => true,
					"description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' )
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Selected Projects", 'bridge-core' ),
					"param_name" => "selected_projects",
					"value" => "",
					"admin_label" => true,
					"description" => esc_html__( "Selected Projects (leave empty for all, delimit by comma)", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Title", 'bridge-core' ),
					"param_name" => "show_title",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Title Tag", 'bridge-core' ),
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"dependency" => array("element" => "show_title", "value" => array("", "yes"))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color", 'bridge-core' ),
					"param_name" => "title_color",
					"dependency" => array("element" => "show_title", "value" => array("", "yes"))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title Font Size (px)", 'bridge-core' ),
					"param_name" => "title_font_size",
					"value" => "",
					"dependency" => array("element" => "show_title", "value" => array("", "yes"))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Enable separator below title", 'bridge-core' ),
					"param_name" => "portfolio_separator",
					"value" => array(
						""   	=>	"",
						esc_html__( 'No', 'bridge-core' )   	=>	"no",
						esc_html__( 'Yes', 'bridge-core' )	=>	"yes"

					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Separator Color", 'bridge-core' ),
					"param_name" => "separator_color",
					"value" => "",
					"dependency" => array("element" => "portfolio_separator", "value" => array("yes"))
				),
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__( "Show Categories", 'bridge-core' ),
					"param_name" => "show_categories",
					"value" => array(
						""   	=>	"",
						esc_html__( 'Yes', 'bridge-core' )	=>	"yes",
						esc_html__( 'No', 'bridge-core' )   	=>	"no"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Category Name Color", 'bridge-core' ),
					"param_name" => "category_color",
					"dependency" => array("element" => "show_categories", "value" => array("", "yes"))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text align", 'bridge-core' ),
					"param_name" => "text_align",
					"value" => array(
						""   => "",
						esc_html__( 'Left', 'bridge-core' ) => "left",
						esc_html__( 'Center', 'bridge-core' ) => "center",
						esc_html__( 'Right', 'bridge-core' ) => "right"
					),
					"dependency" => array('element' => 'type', 'value' => array('standard', 'standard_no_space', 'masonry_with_space'))
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_portfolio_list_vc_map');
}