<?php
$portfolio_link = get_the_permalink();
$portfolio_link_target = '_self';
$portfolio_external_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
$portfolio_external_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);

if( ! empty( $portfolio_external_link ) ){
    $portfolio_link = $portfolio_external_link;
}

if( ! empty( $portfolio_external_link_target ) ){
    $portfolio_link_target = $portfolio_external_link_target;
}
?>

<a itemprop="url" class="qode-pps-image-link" href="<?php echo esc_url( $portfolio_link ); ?>" target="<?php echo esc_attr( $portfolio_link_target ); ?>">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
</a>
