<?php
if (!function_exists('bridge_core_product_list_pinterest') && function_exists("is_woocommerce")) {
    function bridge_core_product_list_pinterest($atts, $content = null) {
        $args = array(
            "per_page"                  => "",
			"columns"                   => "two_columns",
            "category"                  => "",
            "order_by"                  => "date",
            "order"                     => "ASC",
            "title_tag"                 => "h5",
            "hover_background_color"    => "",
            "category_color"            => "",
            "separator_color"           => "",
            "price_color"               => "",
            "price_font_size"           => ""
        );

        $params = shortcode_atts($args, $atts);
        $params['args'] = $args;

        return bridge_core_get_shortcode_template_part('templates/product-list-pinterest', '_product-list-pinterest', '', $params);
    }
    add_shortcode('product_list_pinterest', 'bridge_core_product_list_pinterest');
}