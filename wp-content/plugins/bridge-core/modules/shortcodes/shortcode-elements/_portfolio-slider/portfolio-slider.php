<?php
/* Portfolio Slider shortcode */
if (!function_exists('bridge_core_portfolio_slider')) {
    function bridge_core_portfolio_slider($atts, $content = null ) {

        $args = array(
            "order_by"          =>  "menu_order",
            "order"             =>  "ASC",
            "number"            =>  "-1",
            "category"          =>  "",
            "selected_projects" =>  "",
            "number_of_items"	=>  "",
            "lightbox"          =>  "",
            "title_tag"         =>  "h3",
            "separator"         =>  "",
            "hide_button"		=>  "",
            "image_size"        =>  "portfolio-square",
            "enable_navigation" =>  ""
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/portfolio-slider', '_portfolio-slider', '', $params);
    }
    add_shortcode('portfolio_slider', 'bridge_core_portfolio_slider');
}