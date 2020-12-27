<?php

$title = get_the_title();
$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size

if(get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true) != ""){
    $large_image = get_post_meta(get_the_ID(), 'qode_portfolio-lightbox-link', true);
} else {
    $large_image = $featured_image_array[0];
}

if ($lightbox == "yes") {
    if($additional_hover_type == 'additional-hover' || $additional_hover_type == 'slow-hover') { ?>
        <a itemprop="image" class="portfolio_lightbox" title="<?php esc_attr_e( $title  );?> " href='<?php echo esc_url($large_image ); ?>' data-rel="prettyPhoto[<?php esc_attr_e( $slug_list_  ); ?>]" rel="prettyPhoto[<?php esc_attr_e( $slug_list_ ); ?>]"></a>
    <?php } else{ ?>
        <a itemprop='image' class='lightbox qbutton small white' title='<?php esc_attr_e( $title ); ?>' href='<?php echo esc_url($large_image ); ?>' data-rel='prettyPhoto[<?php esc_attr_e( $slug_list_ ); ?>]'><?php esc_html_e('zoom', 'bridge-core'); ?></a>
    <?php }
}