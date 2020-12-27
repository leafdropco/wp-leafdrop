<?php $icon_start_html = ($icon_pack) ? '<span '.bridge_qode_get_class_attribute($button_icon_holder_classes). ' '. bridge_qode_get_inline_style($button_icon_holder_styles) . ' '. bridge_qode_get_inline_attrs($button_icon_holder_data) .'>' : ''; ?>
<?php $icon_end_html = ($icon_pack) ? '</span>' : ''; ?>

<?php if ($hover_effect == '3d_rotate')  { ?>
	<div class="qode-3d-button-holder">
<?php } ?>

	<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php bridge_qode_inline_style($button_styles); ?> <?php bridge_qode_class_attribute($button_classes); ?> <?php echo bridge_qode_get_inline_attrs($button_data); ?> <?php echo bridge_qode_get_inline_attrs($button_custom_attrs); ?>>
	    <span class="qode-btn-text"><?php echo esc_html($text); ?></span><?php print bridge_qode_get_module_part($icon_start_html); echo bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-button-v2-icon-holder-inner'))); print bridge_qode_get_module_part($icon_end_html);  ?>
	</a>

<?php if ($hover_effect == '3d_rotate')  { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php bridge_qode_inline_style($button_styles); ?> <?php bridge_qode_class_attribute($button_classes); ?> <?php echo bridge_qode_get_inline_attrs($button_data); ?> <?php echo bridge_qode_get_inline_attrs($button_custom_attrs); ?>>
		    <span class="qode-btn-text"><?php echo esc_html($text); ?></span><?php print bridge_qode_get_module_part($icon_start_html); echo bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack, array('icon_attributes' => array('class' => 'qode-button-v2-icon-holder-inner'))); print bridge_qode_get_module_part($icon_end_html);  ?>
		</a>
	</div>
<?php } ?>