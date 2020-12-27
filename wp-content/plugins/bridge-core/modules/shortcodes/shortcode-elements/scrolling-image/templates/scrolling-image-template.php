<?php
/**
 * Scrolling Image shortcode template
 */
?>
<div <?php bridge_qode_class_attribute($holder_classes); ?>>
	<?php if (!empty($title)) { ?>
		<div class="qode-si-title-holder">
			<h2 class="qode-si-title" <?php bridge_qode_inline_style($title_styles); ?>><?php echo esc_attr($title); ?></h2>
		</div>
	<?php } ?>
	<div class="qode-si-content-holder">
		<?php if (!empty($link)) { ?>
			<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
		<?php } ?>
		<div class="qode-si-image-holder">
			<div class="qode-si-image-holder-inner">
				<img class="qode-si-image" src="<?php echo wp_get_attachment_url($scrolling_image); ?>" alt="<?php echo get_the_title($scrolling_image); ?>>" />
			</div>
			<img class="qode-si-frame" src="<?php echo QODE_ROOT ?>/css/img/scrolling-image-frame.png" alt="<?php esc_html_e('Scrolling Image Frame', 'bridge-core') ?>" />
		</div>
		<?php if (!empty($link)) { ?>
			<div class="qode-si-icon-holder">
				<a href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
				<div class="qode-si-icon-table">
					<div class="qode-si-icon-cell">
						<span aria-hidden="true" class="qode-si-icon arrow_carrot-right"></span>
					</div>
				</div>
				<div class="qode-si-icon-background" <?php bridge_qode_inline_style($icon_background_styles); ?> ></div>
			</div>
		<?php } ?>
	</div>
</div>