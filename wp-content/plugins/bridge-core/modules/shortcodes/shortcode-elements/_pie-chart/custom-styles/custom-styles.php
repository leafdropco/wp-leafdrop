<?php

if(!function_exists('bridge_core_pie_chart_dynamic_styles')) {

    function bridge_core_pie_chart_dynamic_styles() {
    	global $bridge_qode_options;
    	?>
		<?php if (!empty($bridge_qode_options['pie_charts_fontsize']) || !empty($bridge_qode_options['pie_charts_fontweight'])) { ?>
		    .q_percentage{
			<?php if (!empty($bridge_qode_options['pie_charts_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['pie_charts_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['pie_charts_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['pie_charts_fontweight']);  ?>; <?php } ?>
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_pie_chart_dynamic_styles');
}