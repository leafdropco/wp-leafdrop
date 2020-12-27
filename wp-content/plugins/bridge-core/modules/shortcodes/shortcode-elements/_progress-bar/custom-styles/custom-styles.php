<?php

if(!function_exists('bridge_core_progress_bar_dynamic_styles')) {

    function bridge_core_progress_bar_dynamic_styles() {
    	global $bridge_qode_options;
    	?>
		<?php if (!empty($bridge_qode_options['progress_bar_horizontal_fontsize']) || !empty($bridge_qode_options['progress_bar_horizontal_fontweight'])) { ?>
		    .q_progress_bar .progress_number{
			<?php if (!empty($bridge_qode_options['progress_bar_horizontal_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['progress_bar_horizontal_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['progress_bar_horizontal_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['progress_bar_horizontal_fontweight']);  ?>; <?php } ?>
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_progress_bar_dynamic_styles');
}