<?php
$masonry_image_size = get_post_meta(get_the_ID(), 'qode_product_featured_image_size', true);
if(empty($masonry_image_size)) {
	$masonry_image_size = '';
}

$text_wrapper_class = '';
if($display_price == 'no' && $display_rating == 'no'){
    $text_wrapper_class .= 'qode-no-rating-price';
}

$product = bridge_qode_return_woocommerce_global_variable();
?>
<div <?php wc_product_class( 'qode-pli ' . $masonry_image_size, $product ); ?>>
	<div class="qode-pli-inner">
		<div class="qode-pli-image">
			<?php bridge_qode_get_module_template_part('templates/parts/image', 'woocommerce', '', $params); ?>
		</div>
		<div class="qode-pli-text">
			<div class="qode-pli-text-outer">
				<div class="qode-pli-text-inner">
					<?php do_action('bridge_qode_action_woocommerce_info_below_image_hover'); ?>
				</div>
			</div>
		</div>
		<a class="qode-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="qode-pli-text-wrapper <?php echo esc_html($text_wrapper_class); ?>" <?php echo bridge_qode_get_inline_style($text_wrapper_styles); ?>>
		<?php bridge_qode_get_module_template_part('templates/parts/title', 'woocommerce', '', $params); ?>
		
		<?php bridge_qode_get_module_template_part('templates/parts/category', 'woocommerce', '', $params); ?>
		
		<?php bridge_qode_get_module_template_part('templates/parts/excerpt', 'woocommerce', '', $params); ?>
		
		<?php bridge_qode_get_module_template_part('templates/parts/rating', 'woocommerce', '', $params); ?>
		
		<?php bridge_qode_get_module_template_part('templates/parts/price', 'woocommerce', '', $params); ?>

		<?php bridge_qode_get_module_template_part('templates/parts/add-to-cart', 'woocommerce', '', $params); ?>
	</div>
</div>