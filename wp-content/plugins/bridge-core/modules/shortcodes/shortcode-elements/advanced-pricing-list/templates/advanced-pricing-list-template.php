<div class="qode-advanced-pricing-list">
	<div class="qode-apl-header">
		<div class="qode-apl-title-holder">
			<<?php echo esc_attr($list_title_tag); ?> class="qode-apl-title" <?php bridge_qode_inline_style($list_title_style); ?>>
				<?php echo esc_attr($list_title); ?>
			</<?php echo esc_attr($list_title_tag); ?>>
		</div>
	</div>
	<div class="qode-apl-items">
		<?php foreach($pricing_items as $pricing_item):?>
			<div class="qode-apl-item">
				<div class="qode-apl-item-top">
					<<?php echo esc_attr($item_title_tag); ?> class="qode-apl-item-title" <?php bridge_qode_inline_style($item_title_style) ?>>
						<?php echo esc_attr($pricing_item['item_title']); ?>
					</<?php echo esc_attr($item_title_tag); ?>>
					<div class="qode-apl-line" <?php bridge_qode_inline_style($line_style) ?>></div>
					<<?php echo esc_attr($item_title_tag); ?> class="qode-apl-item-price" <?php bridge_qode_inline_style($item_title_style) ?>>
						<?php echo esc_attr($pricing_item['item_price']); ?>
					</<?php echo esc_attr($item_title_tag); ?>>
				</div>
				<?php if($pricing_item['item_description'] != '') { ?>
					<div class="qode-apl-item-bottom">
						<div class="qode-apl-item-description" <?php bridge_qode_inline_style($item_description_style) ?>>
							<?php echo esc_attr($pricing_item['item_description']); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>