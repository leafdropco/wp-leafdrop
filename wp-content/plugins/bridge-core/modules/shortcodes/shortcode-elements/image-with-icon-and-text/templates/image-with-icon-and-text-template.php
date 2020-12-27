<?php $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true); ?>
<div class="qode-image-with-icon-and-text">
    <div class="qode-iwiat-image-icon-holder" <?php echo bridge_qode_get_inline_style($image_style); ?>>
		<?php if($image != '') : ?>
			<div class="qode-iwiat-image">
				<img src="<?php echo wp_get_attachment_url($image) ?>" alt="<?php echo esc_attr($image_alt); ?>"/>
			</div>
		<?php endif; ?>
		<div class="qode-iwiat-icon-holder">
            <?php if(!empty($custom_icon)) { ?>
                <span class="qodef-iwiat-custom-icon">
					<?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
				</span>
            <?php } else { ?>
                <span <?php bridge_qode_class_attribute($holder_classes); ?>  <?php echo bridge_qode_get_inline_style($icon_style); ?>>
                    <?php bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-icon-element'))); ?>
                </span>
            <?php } ?>
		</div>
	</div>
	<?php if($title != '') : ?>
		<<?php echo esc_attr($title_tag); ?> class="qode-iwiat-title">
			<?php echo esc_attr($title); ?>
		</<?php echo esc_attr($title_tag); ?>>
	<?php endif; ?>
	<?php if($text != '') : ?>
		<p class="qode-iwiat-text">
			<?php echo esc_attr($text); ?>
		</p>
	<?php endif; ?>
</div>