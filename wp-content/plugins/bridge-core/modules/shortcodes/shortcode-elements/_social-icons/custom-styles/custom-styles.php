<?php

if(!function_exists('bridge_core_social_icons_dynamic_styles')) {

    function bridge_core_social_icons_dynamic_styles() {
    	global $bridge_qode_options;
    	?>

		<?php if(!empty($bridge_qode_options['social_icon_color'])) { ?>
		    .q_social_icon_holder .fa-stack i {
		    color: <?php echo esc_attr($bridge_qode_options['social_icon_color']); ?>
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['social_icon_background_color']) || !empty($bridge_qode_options['social_icon_background_color'])) { ?>
		    .q_social_icon_holder .fa-stack {
			<?php if(!empty($bridge_qode_options['social_icon_background_color']) && !empty($bridge_qode_options['social_icon_background_color'])) { ?>
			    background-color: <?php echo esc_attr($bridge_qode_options['social_icon_background_color']);  ?>;
			<?php } ?>

			<?php if(!empty($bridge_qode_options['social_icon_border_color'])) { ?>

			    border: 1px solid <?php echo esc_attr($bridge_qode_options['social_icon_border_color']); ?>

			<?php } ?>
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_social_icons_dynamic_styles');
}