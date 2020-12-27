<?php

$custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
$portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();

if(get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true) != ""){
    $custom_portfolio_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);
} else {
    $custom_portfolio_link_target = '_blank';
}

$target = $custom_portfolio_link != "" ? $custom_portfolio_link_target : '_self';

if ($view_button !== "no") {

    if($additional_hover_type == 'additional-hover' || $additional_hover_type == 'slow-hover') { ?>
        <a itemprop="url" class="preview" title="<?php esc_html_e('Go to Project', 'bridge-core');?> " href="<?php echo esc_url($portfolio_link );?>" data-type="portfolio_list" target="<?php esc_attr_e( $target  );?>" ></a>
    <?php } else { ?>
        <a itemprop='url' class='preview qbutton small white' href='<?php echo esc_url($portfolio_link); ?>' target='<?php echo esc_attr($target); ?>'><?php esc_html_e('view', 'bridge-core'); ?></i></a>
    <?php }

}