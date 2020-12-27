<?php
if (!function_exists('bridge_core_product_list_masonry') && function_exists("is_woocommerce")) {
    function bridge_core_product_list_masonry($atts, $content = null) {
        $args = array(
            "per_page"                  => "",
            "columns"                   => "",
            "category"                  => "",
            "order_by"                  => "",
            "order"                     => "",
            "title_tag"                 => "h5",
            "hover_background_color"    => "",
            "category_color"            => "",
            "show_separator"			=> "yes",
            "separator_color"           => "",
            "price_color"               => "",
            "price_font_size"           => "",
            "image_size"                => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/product-list-masonry', '_product-list-masonry', '', $params);
    }
    add_shortcode('product_list_masonry', 'bridge_core_product_list_masonry');
}