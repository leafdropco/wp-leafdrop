<li class="qode-hti-content" data-date="<?php echo esc_attr($timeline_date) ?>">
	<div class="qode-hti-content-inner <?php echo esc_attr($holder_classes); ?>">
		<div class='qode-hti-content-inner-shadow'>
			<?php if( !empty($content_image) ): ?>
				<div class='qode-hti-content-image'>
					<?php echo wp_get_attachment_image($content_image, 'full'); ?>
				</div>
			<?php endif; ?>
			<div class='qode-hti-content-value'>
				<?php echo do_shortcode($content); ?>
			</div>
		</div>
	</div>
</li>