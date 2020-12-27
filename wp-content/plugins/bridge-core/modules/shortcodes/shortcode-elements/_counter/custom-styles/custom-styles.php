<?php

if(!function_exists('bridge_core_counter_dynamic_styles')) {

    function bridge_core_counter_dynamic_styles() {
    	global $bridge_qode_options;
    	?>

		<?php if (!empty($bridge_qode_options['counter_color']) ||
			!empty($bridge_qode_options['counters_fontweight']) ||
			(isset($bridge_qode_options['counters_font_size']) && $bridge_qode_options['counters_font_size'] !== '') ||
			(isset($bridge_qode_options['counters_font_family']) && $bridge_qode_options['counters_font_family'] !== '-1') ||
			(isset($bridge_qode_options['counters_letter_spacing']) && $bridge_qode_options['counters_letter_spacing'] !== '')) { ?>
		    .q_counter_holder span.counter{
			<?php if (!empty($bridge_qode_options['counter_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['counter_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['counters_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['counters_fontweight']);  ?>; <?php } ?>
			<?php if(isset($bridge_qode_options['counters_font_size']) && $bridge_qode_options['counters_font_size'] !== '') { ?> font-size: <?php echo intval($bridge_qode_options['counters_font_size']); ?>px; <?php } ?>
			<?php if(isset($bridge_qode_options['counters_font_family']) && $bridge_qode_options['counters_font_family'] !== '-1') { ?> font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['counters_font_family']); ?>'; <?php } ?>
			<?php if(isset($bridge_qode_options['counters_letter_spacing']) && $bridge_qode_options['counters_letter_spacing'] !== '') { ?> letter-spacing: <?php echo intval($bridge_qode_options['counters_letter_spacing']); ?>px; <?php } ?>
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['counter_text_color']) ||
			!empty($bridge_qode_options['counters_text_fontweight']) ||
			!empty($bridge_qode_options['counters_text_texttransform']) ||
			(isset($bridge_qode_options['counters_text_letterspacing']) && $bridge_qode_options['counters_text_letterspacing'] !== '') ||
			(isset($bridge_qode_options['counters_text_font_size']) && $bridge_qode_options['counters_text_font_size'] !== '') ||
			(isset($bridge_qode_options['counters_text_font_family']) && $bridge_qode_options['counters_text_font_family'] !== '-1') ||
			(isset($bridge_qode_options['counters_text_lineheight']) && $bridge_qode_options['counters_text_lineheight'] !== '')) { ?>
		    .q_counter_holder p.counter_text{
			<?php if (!empty($bridge_qode_options['counter_text_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['counter_text_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['counters_text_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['counters_text_fontweight']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['counters_text_texttransform'])) { ?>	text-transform: <?php echo esc_attr($bridge_qode_options['counters_text_texttransform']);  ?>; <?php } ?>
			<?php if ($bridge_qode_options['counters_text_letterspacing'] !== '') { ?>	letter-spacing: <?php echo intval($bridge_qode_options['counters_text_letterspacing']);  ?>px; <?php } ?>
			<?php if ($bridge_qode_options['counters_text_lineheight'] !== '') { ?>   line-height: <?php echo intval($bridge_qode_options['counters_text_lineheight']);  ?>px; <?php } ?>
			<?php if($bridge_qode_options['counters_text_font_size']) { ?> font-size: <?php echo intval($bridge_qode_options['counters_text_font_size']); ?>px; <?php } ?>
			<?php if($bridge_qode_options['counters_text_font_family']) { ?> font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['counters_text_font_family']); ?>'; <?php } ?>
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['counter_separator_color'])) { ?>
		    .wpb_column>.wpb_wrapper .q_counter_holder .separator.small
		    {
			<?php if (!empty($bridge_qode_options['counter_separator_color'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['counter_separator_color']);  ?>; <?php } ?>
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_counter_dynamic_styles');
}