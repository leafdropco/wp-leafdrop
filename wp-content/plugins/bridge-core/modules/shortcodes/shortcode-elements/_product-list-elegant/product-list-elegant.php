<?php
if (!function_exists('bridge_core_product_list_elegant') && function_exists("is_woocommerce")) {
    function bridge_core_product_list_elegant($atts, $content = null) {
        $args = array(
            "per_page"          => "",
            "columns"           => "",
            "category"          => "",
            "order_by"          => "",
            "order"             => "",
            "title_tag"         => "h4",
            "holder_padding"    => "",
            "separator_color"   => "",
            "price_color"       => "",
            "price_font_size"   => "",
            "button_size"       => "",
            "button_hover_type"       => "",
        );

        extract(shortcode_atts($args, $atts));

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/product-list-elegant', '_product-list-elegant', '', $params);
    }
    add_shortcode('product_list_elegant', 'bridge_core_product_list_elegant');
}