<?php

if(!function_exists('bridge_core_highlights_dynamic_styles')) {

    function bridge_core_highlights_dynamic_styles() {
    	global $bridge_qode_options;
    	?>
		<?php if (!empty($bridge_qode_options['highlight_color'])) { ?>
		    span.highlight {
		    background-color: <?php echo esc_attr($bridge_qode_options['highlight_color']);  ?>;
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_highlights_dynamic_styles');
}