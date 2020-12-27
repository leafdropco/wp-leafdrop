<?php
$offset = get_post_meta( get_the_ID(), "qode_portfolio_carousel_x_meta", true );
$stack_order = get_post_meta( get_the_ID(), "qode_portfolio_carousel_stack_order", true );

$item_style = '';
if( !empty($offset) ) {
    $item_style .= 'margin-left: ' . intval($offset) . 'px;';
}
if( !empty($stack_order) ) {
    $item_style .= 'z-index: ' . intval($stack_order) . ';';
}
?>

<article class="qode-portfolio-carousel-item swiper-slide" style="<?php echo $item_style; ?>">
	<div class="qode-pc-inner">
		
		<div class="qode-pc-image">
			<?php echo bridge_core_get_shortcode_template_part( 'templates/post-info/image', 'portfolio-carousel', '', $params ); ?>
		</div>
	
	</div>
</article>