<?php

if(!function_exists('bridge_core_message_dynamic_styles')) {

    function bridge_core_message_dynamic_styles() {
    	global $bridge_qode_options;
    	?>

		<?php if (!empty($bridge_qode_options['message_backgroundcolor'])) { ?>
		    .q_message{
			<?php if (!empty($bridge_qode_options['message_backgroundcolor'])) { ?>background-color: <?php echo esc_attr($bridge_qode_options['message_backgroundcolor']);  ?><?php } ?>;
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['message_title_color']) || !empty($bridge_qode_options['message_title_fontsize']) || !empty($bridge_qode_options['message_title_lineheight']) || !empty($bridge_qode_options['message_title_fontstyle']) || !empty($bridge_qode_options['message_title_fontweight']) || $bridge_qode_options['message_title_google_fonts'] != "-1") { ?>
		    .q_message .message_text{
			<?php if (!empty($bridge_qode_options['message_title_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['message_title_color']);  ?>; <?php } ?>
			<?php if($bridge_qode_options['message_title_google_fonts'] != "-1"){ ?>
			    font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['message_title_google_fonts']); ?>', sans-serif;
			<?php } ?>
			<?php if (!empty($bridge_qode_options['message_title_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['message_title_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['message_title_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['message_title_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['message_title_fontstyle'])) { ?>	font-style: <?php echo esc_attr($bridge_qode_options['message_title_fontstyle']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['message_title_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['message_title_fontweight']);  ?>; <?php } ?>
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['message_icon_fontsize']) && !empty($bridge_qode_options['message_icon_color'])) { ?>
		    .q_message.with_icon .q_message_icon_inner > i {
			<?php if (!empty($bridge_qode_options['message_icon_color'])) { ?> color:  <?php echo esc_attr($bridge_qode_options['message_icon_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['message_icon_fontsize'])) { ?> font-size: <?php echo intval($bridge_qode_options['message_icon_fontsize']);  ?>px; <?php } ?>
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_message_dynamic_styles');
}