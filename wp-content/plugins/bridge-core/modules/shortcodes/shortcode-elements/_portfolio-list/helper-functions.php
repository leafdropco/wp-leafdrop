<?php

if( ! function_exists('bridge_core_generate_portfolio_list_holder_classes') ){
    function bridge_core_generate_portfolio_list_holder_classes( $params ){
        $portfolio_holder_classes = array();

        switch ($params['type']){
            case "hover_text":
                $portfolio_holder_classes[] = "portfolio_with_space portfolio_with_hover_text";
                break;

            case "standard":
            case "masonry_with_space":
            case "masonry_with_space_without_description":
                $portfolio_holder_classes[] = "portfolio_with_space portfolio_standard";

                if($params['type'] == "masonry_with_space" || $params['type'] == "masonry_with_space_without_description"){
                    $portfolio_holder_classes[] = ' masonry_with_space';

                    if($params['type'] == "masonry_with_space_without_description") {
                        $portfolio_holder_classes[] .= ' masonry_with_space_only_image';
                    }
                }
                break;

            case "standard_no_space":
                $portfolio_holder_classes[] = "portfolio_no_space portfolio_standard";
                break;

            case "hover_text_no_space":
                $portfolio_holder_classes[] = "portfolio_no_space portfolio_with_hover_text";
                break;

            case "justified_gallery":
                $portfolio_holder_classes[] = "portfolio_no_space";
                break;

            case "alternating_sizes":
                $portfolio_holder_classes[] = "portfolio_with_space portfolio_with_hover_text";
                break;
        }

        if($params['filter_number_of_items'] == 'yes'){
            $portfolio_holder_classes[] = "portfolio_holder_fwn";
        }

        return $portfolio_holder_classes;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_universal_classes') ){
    function bridge_core_generate_portfolio_list_universal_classes( $params ){
        $portfolio_holder_universal_classes = array();

        if($params['filter_number_of_items'] == 'yes'){
            $portfolio_holder_universal_classes[] = 'portfolio_holder_fwn';
        }

        return $portfolio_holder_universal_classes;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_box_style') ){
    function bridge_core_generate_portfolio_list_box_style( $params ){
        $portfolio_box_style = '';

        if($params['box_border'] == "yes" || $params['box_background_color'] != ""){

            $portfolio_box_style .= "style=";
            if($params['box_border'] == "yes"){
                $portfolio_box_style .= "border-style:solid;";
                if($params['box_border_color'] != "" ){
                    $portfolio_box_style .= "border-color:" . $params['box_border_color'] . ";";
                }
                if($params['box_border_width'] != "" ){
                    $portfolio_box_style .= "border-width:" . $params['box_border_width'] . "px;";
                }
            }
            if($params['box_background_color'] != ""){
                $portfolio_box_style .= "background-color:" . $params['box_background_color'] . ";";
            }

            $portfolio_box_style .= "'";

        }

        return $portfolio_box_style;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_article_style') ){
    function bridge_core_generate_portfolio_list_article_style( $params ){
        $article_style = "";

        if (($params['type'] == "masonry_with_space" || $params['type'] == 'masonry_with_space_without_description') && $params['spacing'] !== ''){
            $article_style .= "padding: 0 " . intval($params['spacing'])/2 . "px;";
            $article_style .= "margin-bottom: ".$params['spacing']."px !important;";
        }

        $article_style = "style='".$article_style."'";

        return $article_style;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_hover_type') ){
    function bridge_core_generate_portfolio_list_hover_type( $params ){
        $hover_type = "";

        if ($params['type'] == 'standard' || $params['type'] == 'standard_no_space' || $params['type'] == 'masonry_with_space') {
            $hover_type = $params['hover_type_standard'];
        }
        if ($params['type'] == 'hover_text' || $params['type'] == 'hover_text_no_space' || $params['type'] == 'masonry_with_space_without_description' || $params['type'] == 'alternating_sizes') {
            $hover_type = $params['hover_type_text_on_hover_image'];
        }
        if (in_array($params['type'],array('masonry','masonry_gallery_with_space','justified_gallery'))) {
            $hover_type = $params['hover_type_masonry'];
        }

        return $hover_type;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_additional_hover_type') ){
    function bridge_core_generate_portfolio_list_additional_hover_type( $params ){
        $additional_hover_types = array('subtle_vertical_hover', 'image_subtle_rotate_zoom_hover', 'image_text_zoom_hover', 'thin_plus_only', 'cursor_change_hover', 'grayscale');
        $additional_hover_type = '';

        if (in_array($params['hover_type'], $additional_hover_types)) {
            $additional_hover_type = 'additional-hover';
        } else if( in_array($params['hover_type'], array('slow_zoom', 'split_up')) ){
            $additional_hover_type = 'slow-hover';
        } else if( $params['hover_type'] == 'slide_up' ){
            $additional_hover_type = 'slide-up';
        } else if( $params['hover_type'] == 'flip_from_left' ){
            $additional_hover_type = 'flip-from-left';
        }

        return $additional_hover_type;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_like_option') ){
    function bridge_core_generate_portfolio_list_like_option( $params ){
        $portfolio_qode_like = "on";
        $global_like_option = bridge_qode_options()->getOptionValue('portfolio_qode_like');

        if (! empty($global_like_option)) {
            $portfolio_qode_like = $global_like_option;
        }

        return $portfolio_qode_like;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_loading_class') ){
    function bridge_core_generate_portfolio_list_loading_class( $params ){
        $portfolio_loading_class = '';

        if($params['portfolio_loading_type'] !== '' && (!in_array($params['type'], array('masonry_with_space', 'masonry','masonry_with_space_without_description'))) ) {
            $portfolio_loading_class = $params['portfolio_loading_type'];
        }
        elseif($params['portfolio_loading_type_masonry'] !== ''){
            $portfolio_loading_class = $params['portfolio_loading_type_masonry'];
        }

        return $portfolio_loading_class;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_type_classes') ){
    function bridge_core_generate_portfolio_list_type_classes( $params ){
        $portfolio_type_classes = array();

        switch ($params['type']){
            case "hover_text":
                $portfolio_type_classes[] = " hover_text";;
                break;

            case "standard":
            case "masonry_with_space":
            case "masonry_with_space_without_description":
                $portfolio_type_classes[] = "standard";
                break;

            case "standard_no_space":
                $portfolio_type_classes[] = " standard_no_space";
                break;

            case "hover_text_no_space":
                $portfolio_type_classes[] = " hover_text no_space";
                break;

            case "justified_gallery":
                $portfolio_type_classes[] = " justified_gallery";
                break;

            case "alternating_sizes":
                $portfolio_type_classes[] = " alternating_sizes";
                break;
        }

        if(in_array($params['type'],array('hover_text'))){
            switch ($params['frame_around_item']){
                case 'monitor_frame':
                    $portfolio_type_classes[] = ' monitor_frame';
                    break;
            }
        }

        return $portfolio_type_classes;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_query_array') ){
    function bridge_core_generate_portfolio_list_query_array($params ){
        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($params['category'] == "") {
            $args = array(
                'post_type' => 'portfolio_page',
                'orderby' => $params['order_by'],
                'order' => $params['order'],
                'posts_per_page' => $params['number'],
                'paged' => $paged
            );
        } else {
            $args = array(
                'post_type' => 'portfolio_page',
                'portfolio_category' => $params['category'],
                'orderby' => $params['order_by'],
                'order' => $params['order'],
                'posts_per_page' => $params['number'],
                'paged' => $paged
            );
        }
        $params['project_ids'] = null;
        if ($params['selected_projects'] != "") {
            $params['project_ids'] = explode(",", $params['selected_projects']);
            $args['post__in'] = $params['project_ids'];
        }

        return $args;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_item_classes') ){
    function bridge_core_generate_portfolio_list_item_classes(){
        $classes = array();

        $terms = wp_get_post_terms( get_the_ID(), 'portfolio_category' );
        foreach ( $terms as $term ) {
            $classes[] = "portfolio_category_" . $term->term_id;
        }

        $masonry_size = "default";
        $masonry_size = get_post_meta(get_the_ID(), "qode_portfolio_type_masonry_style", true);

        $classes[] = $masonry_size;

        return $classes;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_list_thumbs_size_class')){
    function bridge_core_generate_portfolio_list_thumbs_size_class( $params ){
        $thumb_size_class = "";
        //get proper image size
        switch($params['image_size']) {
            case 'landscape':
                $thumb_size_class = 'portfolio_landscape_image';
                break;
            case 'portrait':
                $thumb_size_class = 'portfolio_portrait_image';
                break;
            case 'square':
                $thumb_size_class = 'portfolio_square_image';
                break;
            default:
                $thumb_size_class = 'portfolio_full_image';
                break;
        }

        return $thumb_size_class;
    }
}

if( ! function_exists('bridge_core_generate_portfolio_link') ){
    function bridge_core_generate_portfolio_link(){
        $custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
        $portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();

        return $portfolio_link;
    }
}