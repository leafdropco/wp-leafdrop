<?php

if(!function_exists('bridge_core_latest_posts_styles')) {
    function bridge_core_latest_posts_styles(){
        $first_main_color = bridge_qode_options()->getOptionValue('first_color');
        $background_selector = '.latest_post_holder.image_on_the_left_boxed .date_hour_holder, .latest_post_holder.image_on_the_left_boxed .featured .read_more:before';

        if(!empty($first_main_color)){
            echo bridge_qode_dynamic_css($background_selector, array('background-color' => $first_main_color));
        }
    }
    add_action('bridge_qode_action_style_dynamic', 'bridge_core_latest_posts_styles');
}
