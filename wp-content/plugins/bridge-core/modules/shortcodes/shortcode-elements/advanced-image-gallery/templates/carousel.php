<?php
$i    = 0;
$rand = rand(0,1000);
?>
<div class="qode-advanced-image-gallery <?php echo esc_attr($holder_classes); ?>">
	<div class="qode-aig-slider qode-owl-slider" <?php echo bridge_qode_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) { ?>
			<div class="qode-aig-image">
				<?php if ($image_behavior === 'lightbox') { ?>
					<a itemprop="image" class="qode-aig-lightbox qode-block-drag-link" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[image_gallery_pretty_photo-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['title']); ?>">
				<?php } else if ($image_behavior === 'custom-link' && !empty($custom_links)) { ?>
					<a itemprop="url" class="qode-aig-custom-link qode-block-drag-link" href="<?php echo esc_url($custom_links[$i++]); ?>" target="<?php echo esc_attr($custom_link_target); ?>" title="<?php echo esc_attr($image['title']); ?>">
				<?php } ?>
					<?php if(is_array($image_size) && count($image_size)) :
						echo bridge_qode_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]);
					else:
						echo wp_get_attachment_image($image['image_id'], $image_size);
					endif; ?>
					<span class="aig-gallery-hover">
						<?php if($enable_icon == 'yes'){ ?>
							<span class="icon-arrows-plus"></span> 
						<?php } ?>
					</span>
				<?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>