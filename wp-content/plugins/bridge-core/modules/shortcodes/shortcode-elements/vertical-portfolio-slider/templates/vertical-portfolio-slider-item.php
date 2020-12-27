<?php
$background_image = get_post_meta( get_the_ID(), "qode_vertical_portfolio_slider_image_meta", true );
$item_style = '';
if ( !empty($background_image) ) {
    $item_style = 'background-image: url("' . $background_image . '");';
}
?>

<article class="qode-vps-item swiper-slide">
	<div class="qode-vps-outer" style="<?php echo esc_attr($item_style); ?>">

        <?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/title-one', 'vertical-portfolio-slider', '', $params ); ?>

        <div class="qode-vps-inner">
            <?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/image', 'vertical-portfolio-slider', '', $params ); ?>
        </div>

        <div class="qode-vps-bottom">
            <?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/read-more', 'vertical-portfolio-slider', '', $params ); ?>
            <?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/title-two', 'vertical-portfolio-slider', '', $params ); ?>
        </div>

	</div>
</article>