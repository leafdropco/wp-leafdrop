<?php
$i    = 0;
$rand = rand(0,1000);
?>
<div class="qode-advanced-image-gallery <?php echo esc_attr($holder_classes); ?>">
	<div class="qode-aig-inner qode-outer-space <?php echo esc_attr($inner_classes); ?>">
		<div class="qode-aig-grid-sizer"></div>
		<div class="qode-aig-grid-gutter"></div>
		<?php foreach ($images as $image) { ?>
			<?php
				$image_classes = array();

				$image_size_value    = get_post_meta( $image['image_id'], 'blog_image_size', true );

				switch ($image_size_value):
					case 'large_width_height':
						$image_classes[] = 'qode-aig-large-masonry-item';
						break;
					case 'large_height':
						$image_classes[] = 'qode-aig-large-height-masonry-item';
						break;
					case 'large_width':
						$image_classes[] = 'qode-aig-large-width-masonry-item';
						break;
					default:
						$image_classes[] = 'qode-aig-default-masonry-item';
						break;
				endswitch;

			?>
			<div class="qode-aig-image qode-item-space <?php echo esc_attr(implode(' ', $image_classes)); ?>">
				<div class="qode-aig-image-inner">
					<?php if ($image_behavior === 'lightbox') { ?>
						<a itemprop="image" class="qode-aig-lightbox" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[image_gallery_pretty_photo-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['title']); ?>">
					<?php } else if ($image_behavior === 'custom-link' && !empty($custom_links)) { ?>
						<a itemprop="url" class="qode-aig-custom-link" href="<?php echo esc_url($custom_links[$i++]); ?>" target="<?php echo esc_attr($custom_link_target); ?>" title="<?php echo esc_attr($image['title']); ?>">
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
			</div>
		<?php } ?>
	</div>
</div>