<?php
if (get_next_posts_link('', $query->max_num_pages)) {
    if ($show_load_more == "yes" || $show_load_more == "") { ?>
        <?php if( is_front_page() || is_home() ){
            bridge_qode_set_global_paged_variable( $query->query['paged'] );
        } ?>
        <div class="portfolio_paging"><span rel="<?php echo esc_attr( $query->max_num_pages ); ?>" class="load_more"><?php echo get_next_posts_link(esc_html__('Show more', 'bridge-core'), $query->max_num_pages) ?></span></div>
        <div class="portfolio_paging_loading"><a href="javascript: void(0)" class="qbutton"><?php esc_html_e('Loading...', 'bridge-core'); ?></a></div>

    <?php }
}