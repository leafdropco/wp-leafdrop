<div class="qode-np-item">
	<div class="qode-np-item-image-holder">
		<?php if ($image_src !== '') { ?>
			<div class="qode-np-item-image-inner" <?php bridge_qode_inline_style($border_style);?>>
				<div class="qode-np-item-image-table">
					<div class="qode-np-item-image-table-cell">
						<img src="<?php echo esc_url($image_src); ?>" alt="<?php esc_html_e('qode-np-item', 'bridge-core'); ?>"/>
					</div>
				</div>
				<?php if ($number !== '') { ?>
					<span class="qode-np-item-number" <?php bridge_qode_inline_style($number_style);?>><?php echo esc_html($number);?></span>
				<?php } ?>
			</div>
		<?php } ?>
		<?php if ($title_position == 'on-image') { ?>
			<<?php echo esc_attr($title_tag);?> class="qode-np-title" <?php bridge_qode_inline_style($title_style)?>>
				<?php echo esc_html($title);?>
			</<?php echo esc_attr($title_tag);?>>
		<?php } ?>
		<span class="qode-np-line"></span>
	</div>
	<?php if ($title_position == 'under-image') { ?>
		<<?php echo esc_attr($title_tag);?> class="qode-np-title" <?php bridge_qode_inline_style($title_style)?>>
			<?php echo esc_html($title);?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
</div>