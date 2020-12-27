<<?php echo esc_attr($title_tag) ?> class="clearfix qode-title-holder">
<span class="qode-tab-title">
	<?php if ($icon !== '' && $icon_pack !== false) { ?>
		<span class="qode-tab-title-icon">
			<?php bridge_qode_icon_collections()->renderIconHTML($icon, $icon_pack); ?>
		</span>
	<?php } ?>
    <span class="qode-tab-title-inner">
        <?php echo esc_attr($title) ?>
    </span>
</span>
<span class="qode-accordion-mark">
    <span class="qode-accordion-mark-icon">
        <span class="icon_plus"></span>
        <span class="icon_minus-06"></span>
    </span>
</span>
</<?php echo esc_attr($title_tag) ?>>
<?php
$accordion_id = '';
if(isset($el_id) && !empty($el_id)){
    $accordion_id .= 'id = ' . $el_id;
}
?>
<div <?php echo esc_attr($accordion_id);?> class="qode-accordion-content <?php echo esc_attr($content_class);?>" <?php bridge_qode_inline_style($content_style);?>>
    <div class="qode-accordion-content-inner">
        <?php echo do_shortcode($content); ?>
    </div>
</div>