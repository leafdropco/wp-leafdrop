<div class="qode-showcase-item-holder">
	<div class="qode-showcase-icon">
		<span class="qode-icon-holder qode-icon-circle" <?php bridge_qode_inline_style($style); ?>>
			<?php bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-icon-element'))); ?>
		</span>
	</div>
	<div class="qode-showcase-content">
		<div class="qode-showcase-content-table">
			<div class="qode-showcase-content-cell">
				<?php if ($title !== '') { ?>
					<<?php echo esc_attr($title_tag);?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag);?>>
				<?php } ?>
				<?php if ($text !== '') { ?>
					<div class="qode-showcase-content-inner">
						<?php echo esc_attr($text); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>