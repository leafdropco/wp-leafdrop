<?php
/* Portfolio list shortcode */
if (!function_exists('bridge_core_portfolio_list')) {

    function bridge_core_portfolio_list($atts, $content = null) {

        $args = array(
            "type"                  		    => "standard",
            "spacing"						    => "",
            "hover_type_standard"               => "default",
            "hover_type_text_on_hover_image"    => "default",
            "hover_type_text_before_hover"      => "default",
            "hover_type_masonry"                => "default",
            "box_border"            		    => "",
            "box_background_color"  		    => "",
            "box_border_color"      		    => "",
            "box_border_width"      		    => "",
            "columns"               		    => "3",
            "frame_around_item"                 => "no_frame",
            "portfolio_loading_type" 		    => "",
            "portfolio_loading_type_masonry"    => "",
            "grid_size"               		    => "",
            "image_size"            		    => "",
            "overlay_background_color"          => "",
            "order_by"              		    => "date",
            "order"                 		    => "ASC",
            "number"                		    => "-1",
            "filter"                		    => "no",
            "filter_color"          		    => "",
            "filter_order_by"          		    => "name",
            "filter_number_of_items"          	=> "",
            "lightbox"              		    => "yes",
            "view_button"           		    => "yes",
            "category"              		    => "",
            "selected_projects"     		    => "",
            "show_load_more"        		    => "yes",
            "show_title"             		    => "",
            "title_tag"             		    => "h5",
            "title_color"                       => "",
            "title_font_size"                   => "",
            "show_categories"                   => "",
            "category_color"                    => "",
            "portfolio_separator"   			=> "",
            "separator_color"                   => "",
            "text_align"			            => "",
            "row_height"                        => "",
            "justify_last_row"                  => "nojustify",
            "justify_threshold"                 => 0.75
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        //get correct heading value. If provided heading isn't valid get the default one
        $params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

        $params['portfolio_holder_classes'] = bridge_core_generate_portfolio_list_holder_classes( $params );
        $params['portfolio_holder_universal_classes'] = bridge_core_generate_portfolio_list_universal_classes( $params );
        $params['_type_class'] = bridge_core_generate_portfolio_list_type_classes( $params );
        $params['article_style'] = bridge_core_generate_portfolio_list_article_style( $params );
        $params['portfolio_description_class'] = $params['text_align'] !== '' ? 'text_align_'.$params['text_align'] : '';
        $params['portfolio_box_style'] = bridge_core_generate_portfolio_list_box_style( $params );
        $params['portfolio_separator_aignment'] = $params['text_align'] != "" ? $params['text_align'] : 'center';
        $params['portfolio_loading_class'] = bridge_core_generate_portfolio_list_loading_class( $params );
        $params['columns'] = $params['columns'] == "" ? '3' : $params['columns'];
        $params['show_description_box'] = $params['show_title'] == 'no' && $params['show_categories'] == 'no' ? false : true;
        $params['hover_type'] = bridge_core_generate_portfolio_list_hover_type( $params );
        $params['overlay_styles'][] = $params['hover_type'] !== 'default' && $params['overlay_background_color'] !== '' ? 'background-color: '.$params['overlay_background_color'] : '';
        $params['show_icons'] = $params['hover_type'] == 'cursor_change_hover' || $params['hover_type'] == 'thin_plus_only' || $params['hover_type'] == 'split_up' ? 'no' : 'yes';
        $params['disable_link'] = ($params['hover_type'] == 'subtle_vertical_hover' || $params['hover_type'] == 'image_subtle_rotate_zoom_hover' || $params['hover_type'] == 'image_text_zoom_hover') && $params['show_icons'] == 'yes' ? 'yes' : 'no';
        $params['additional_hover_type'] = bridge_core_generate_portfolio_list_additional_hover_type( $params );
        $params['portfolio_qode_like'] = bridge_core_generate_portfolio_list_like_option( $params );

        $query_array             = bridge_core_generate_portfolio_list_query_array( $params );
        $query_results           = new \WP_Query( $query_array );
        $params['query'] = $query_results;
        $params['slug_list_'] = "pretty_photo_gallery";

        return bridge_core_get_shortcode_template_part('templates/portfolio-holder', '_portfolio-list', $params['type'], $params);
        //return bridge_core_get_shortcode_template_part('templates/portfolio-list', '_portfolio-list', '', $params);
    }
    add_shortcode('portfolio_list', 'bridge_core_portfolio_list');
}