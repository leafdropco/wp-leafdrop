<div class="<?php echo esc_attr($holder_classes); ?>">
	<a itemprop="image" class="qode_video_image" href="<?php echo esc_url($video_link) ?>" data-rel="prettyPhoto">
		<?php if(!empty($img_src)){ ?>	
			<img src="<?php echo esc_url($img_src);?>" />
			<span class="qode_video_box_button_holder">
				<span class="qode_video_box_button">
					<span class="qode_video_box_button_arrow">
					</span>
				</span>
			</span>
		<?php } ?>
	</a>
</div>