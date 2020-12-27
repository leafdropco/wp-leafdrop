<?php

if(!function_exists('bridge_core_button_dynamic_styles')) {
    /**
     * Typography styles for all button types
     */
    function bridge_core_button_dynamic_styles() {
    	global $bridge_qode_options;
    	?>

		<?php if (!empty($bridge_qode_options['button_title_color']) ||
			!empty($bridge_qode_options['button_title_fontsize']) ||
			!empty($bridge_qode_options['button_title_lineheight']) ||
			(isset($bridge_qode_options['button_title_letter_spacing']) && $bridge_qode_options['button_title_letter_spacing'] !== '') ||
			(isset($bridge_qode_options['button_title_text_transform']) && $bridge_qode_options['button_title_text_transform'] !== '') ||
			!empty($bridge_qode_options['button_title_fontstyle']) ||
			!empty($bridge_qode_options['button_title_fontweight']) || $bridge_qode_options['button_title_google_fonts'] != "-1" ||
			!empty($bridge_qode_options['button_border_color']) ||
			(isset($bridge_qode_options['button_border_radius']) && $bridge_qode_options['button_border_radius'] !== '') ||
			!empty($bridge_qode_options['button_backgroundcolor']) ||
			(isset($bridge_qode_options['button_border_width']) && $bridge_qode_options['button_border_width'] !== '')) { ?>
			.qbutton,
			.qbutton.medium,
			#submit_comment,
			.load_more a,
			.blog_load_more_button a,
			.post-password-form input[type='submit'],
			input.wpcf7-form-control.wpcf7-submit,
			input.wpcf7-form-control.wpcf7-submit:not([disabled]),
			.woocommerce table.cart td.actions input[type="submit"],
			.woocommerce input#place_order,
			.woocommerce-page input[type="submit"],
			.woocommerce .button
			{
			<?php if (!empty($bridge_qode_options['button_title_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['button_title_color']);  ?>; <?php } ?>
			<?php if($bridge_qode_options['button_title_google_fonts'] != "-1"){ ?>
				font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['button_title_google_fonts']); ?>', sans-serif;
			<?php } ?>

			<?php if (!empty($bridge_qode_options['button_border_color'])) { ?>	border-color: <?php echo esc_attr($bridge_qode_options['button_border_color']);  ?>; <?php } ?>

			<?php if (!empty($bridge_qode_options['button_title_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['button_title_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['button_title_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_lineheight'])) { ?>	height: <?php echo intval($bridge_qode_options['button_title_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_fontstyle'])) { ?>	font-style: <?php echo esc_attr($bridge_qode_options['button_title_fontstyle']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['button_title_fontweight']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_backgroundcolor'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['button_backgroundcolor']);  ?>; <?php } ?>
			<?php if (isset($bridge_qode_options['button_border_radius']) && $bridge_qode_options['button_border_radius'] !== '') { ?>	border-radius: <?php echo intval($bridge_qode_options['button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['button_border_radius']) && $bridge_qode_options['button_border_radius'] !== '') { ?>	-moz-border-radius: <?php echo intval($bridge_qode_options['button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['button_border_radius']) && $bridge_qode_options['button_border_radius'] !== '') { ?>	-webkit-border-radius: <?php echo intval($bridge_qode_options['button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['button_title_letter_spacing']) && $bridge_qode_options['button_title_letter_spacing'] !== '') { ?>	letter-spacing: <?php echo esc_attr($bridge_qode_options['button_title_letter_spacing']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['button_title_text_transform']) && $bridge_qode_options['button_title_text_transform'] !== '') { ?>	text-transform: <?php echo esc_attr($bridge_qode_options['button_title_text_transform']);  ?>; <?php } ?>
			<?php if(isset($bridge_qode_options['button_border_width']) && $bridge_qode_options['button_border_width'] !== '') { ?> border-width: <?php echo intval($bridge_qode_options['button_border_width']); ?>px;<?php } ?>
			<?php if (isset($bridge_qode_options['button_padding_leftright']) && $bridge_qode_options['button_padding_leftright'] !== '') { ?>	padding-left: <?php echo intval($bridge_qode_options['button_padding_leftright']);  ?>px; padding-right: <?php echo intval($bridge_qode_options['button_padding_leftright']);?>px; <?php } ?>
			}

			.qode-qbutton-main-color {
			<?php if($bridge_qode_options['button_title_google_fonts'] != "-1"){ ?>
				font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['button_title_google_fonts']); ?>', sans-serif;
			<?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['button_title_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['button_title_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_lineheight'])) { ?>	height: <?php echo intval($bridge_qode_options['button_title_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_fontstyle'])) { ?>	font-style: <?php echo esc_attr($bridge_qode_options['button_title_fontstyle']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_title_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['button_title_fontweight']);  ?>; <?php } ?>
			<?php if (isset($bridge_qode_options['button_title_letter_spacing']) && $bridge_qode_options['button_title_letter_spacing'] !== '') { ?>	letter-spacing: <?php echo esc_attr($bridge_qode_options['button_title_letter_spacing']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['button_title_text_transform']) && $bridge_qode_options['button_title_text_transform'] !== '') { ?>	text-transform: <?php echo esc_attr($bridge_qode_options['button_title_text_transform']);  ?>; <?php } ?>
			}

		<?php } ?>

		<?php if (!empty($bridge_qode_options['button_title_hovercolor']) ||
			(isset($bridge_qode_options['button_backgroundhovercolor']) && !empty($bridge_qode_options['button_backgroundhovercolor']))
			|| (isset($bridge_qode_options['button_border_hover_color']) && $bridge_qode_options['button_border_hover_color'])) { ?>
			.qbutton:hover,
			.qbutton.medium:hover,
			#submit_comment:hover,
			.load_more a:hover,
			.blog_load_more_button a:hover,
			.post-password-form input[type='submit']:hover,
			input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover,
			.woocommerce table.cart td.actions input[type="submit"]:hover,
			.woocommerce input#place_order:hover,
			.woocommerce-page input[type="submit"]:hover,
			.woocommerce .button:hover
			{
			<?php if (!empty($bridge_qode_options['button_title_hovercolor'])) { ?> color: <?php echo esc_attr($bridge_qode_options['button_title_hovercolor']);?>; <?php } ?>

			<?php if(isset($bridge_qode_options['button_border_hover_color']) && $bridge_qode_options['button_border_hover_color']) { ?> border-color: <?php echo esc_attr($bridge_qode_options['button_border_hover_color']); } ?>
			}
		<?php } ?>

		<?php if (!empty($bridge_qode_options['button_backgroundcolor_hover'])) { ?>
			.qbutton:hover,
			#submit_comment:hover,
			.load_more a:hover,
			.blog_load_more_button a:hover,
			.post-password-form input[type='submit']:hover,
			input.wpcf7-form-control.wpcf7-submit:not([disabled]):hover,
			.woocommerce table.cart td.actions input[type="submit"]:hover,
			.woocommerce input#place_order:hover,
			.woocommerce-page input[type="submit"]:hover,
			.woocommerce .button:hover
			{
			<?php if (!empty($bridge_qode_options['button_backgroundcolor_hover'])) { ?> background-color: <?php echo esc_attr($bridge_qode_options['button_backgroundcolor_hover']);?>; <?php } ?>
			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['small_button_fontsize']) || !empty($bridge_qode_options['small_button_lineheight']) || !empty($bridge_qode_options['small_button_fontweight']) || !empty($bridge_qode_options['small_button_padding']) || (isset($bridge_qode_options['small_button_border_radius']) && $bridge_qode_options['small_button_border_radius'] !== '')) { ?>
			.qbutton.small{

			<?php if (!empty($bridge_qode_options['small_button_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['small_button_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['small_button_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['small_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['small_button_lineheight'])) { ?>	height: <?php echo intval($bridge_qode_options['small_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['small_button_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['small_button_fontweight']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['small_button_padding'])) { ?>	padding-left: <?php echo intval($bridge_qode_options['small_button_padding']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['small_button_padding'])) { ?>	padding-right: <?php echo intval($bridge_qode_options['small_button_padding']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['small_button_border_radius']) && $bridge_qode_options['small_button_border_radius'] !== '') { ?>	border-radius: <?php echo intval($bridge_qode_options['small_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['small_button_border_radius']) && $bridge_qode_options['small_button_border_radius'] !== '') { ?>	-moz-border-radius: <?php echo intval($bridge_qode_options['small_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['small_button_border_radius']) && $bridge_qode_options['small_button_border_radius'] !== '') { ?>	-webkit-border-radius: <?php echo intval($bridge_qode_options['small_button_border_radius']);  ?>px; <?php } ?>

			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['large_button_fontsize']) || !empty($bridge_qode_options['large_button_lineheight']) || !empty($bridge_qode_options['large_button_fontweight']) || !empty($bridge_qode_options['large_button_padding']) || (isset($bridge_qode_options['large_button_border_radius']) && $bridge_qode_options['large_button_border_radius'] !== '')) { ?>
			.qbutton.large{

			<?php if (!empty($bridge_qode_options['large_button_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['large_button_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['large_button_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['large_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['large_button_lineheight'])) { ?>	height: <?php echo intval($bridge_qode_options['large_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['large_button_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['large_button_fontweight']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['large_button_padding'])) { ?>	padding-left: <?php echo intval($bridge_qode_options['large_button_padding']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['large_button_padding'])) { ?>	padding-right: <?php echo intval($bridge_qode_options['large_button_padding']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['large_button_border_radius']) && $bridge_qode_options['large_button_border_radius'] !== '') { ?>	border-radius: <?php echo intval($bridge_qode_options['large_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['large_button_border_radius']) && $bridge_qode_options['large_button_border_radius'] !== '') { ?>	-moz-border-radius: <?php echo intval($bridge_qode_options['large_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['large_button_border_radius']) && $bridge_qode_options['large_button_border_radius'] !== '') { ?>	-webkit-border-radius: <?php echo intval($bridge_qode_options['large_button_border_radius']);  ?>px; <?php } ?>

			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['big_large_button_fontsize']) || !empty($bridge_qode_options['big_large_button_lineheight']) || !empty($bridge_qode_options['big_large_button_fontweight']) || !empty($bridge_qode_options['big_large_button_padding']) || $bridge_qode_options['big_large_button_border_radius'] !== '') { ?>
			.qbutton.big_large,
			.qbutton.big_large_full_width {

			<?php if (!empty($bridge_qode_options['big_large_button_fontsize'])) { ?>	font-size: <?php echo intval($bridge_qode_options['big_large_button_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['big_large_button_lineheight'])) { ?>	line-height: <?php echo intval($bridge_qode_options['big_large_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['big_large_button_lineheight'])) { ?>	height: <?php echo intval($bridge_qode_options['big_large_button_lineheight']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['big_large_button_fontweight'])) { ?>	font-weight: <?php echo esc_attr($bridge_qode_options['big_large_button_fontweight']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['big_large_button_padding'])) { ?>	padding-left: <?php echo intval($bridge_qode_options['big_large_button_padding']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['big_large_button_padding'])) { ?>	padding-right: <?php echo intval($bridge_qode_options['big_large_button_padding']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['big_large_button_border_radius']) && $bridge_qode_options['big_large_button_border_radius'] !== '') { ?>	border-radius: <?php echo intval($bridge_qode_options['big_large_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['big_large_button_border_radius']) && $bridge_qode_options['big_large_button_border_radius'] !== '') { ?>	-moz-border-radius: <?php echo intval($bridge_qode_options['big_large_button_border_radius']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['big_large_button_border_radius']) && $bridge_qode_options['big_large_button_border_radius'] !== '') { ?>	-webkit-border-radius: <?php echo intval($bridge_qode_options['big_large_button_border_radius']);  ?>px; <?php } ?>

			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['button_white_border_color']) || !empty($bridge_qode_options['button_white_text_color'])  || !empty($bridge_qode_options['button_white_background_color'])) { ?>
			.qbutton.white{

			<?php if (!empty($bridge_qode_options['button_white_border_color'])) { ?>	border-color: <?php echo esc_attr($bridge_qode_options['button_white_border_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_white_text_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['button_white_text_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_white_background_color'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['button_white_background_color']);  ?>; <?php } ?>
			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['button_white_border_color_hover']) || !empty($bridge_qode_options['button_white_text_color_hover']) || !empty($bridge_qode_options['button_white_background_color_hover'])) { ?>
			.qbutton.white:hover,
			.portfolio_slides .hover_feature_holder_inner .qbutton:hover {

			<?php if (!empty($bridge_qode_options['button_white_border_color_hover'])) { ?>	border-color: <?php echo esc_attr($bridge_qode_options['button_white_border_color_hover']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_white_text_color_hover'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['button_white_text_color_hover']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_white_background_color_hover'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['button_white_background_color_hover']);  ?>; <?php } ?>
			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['button_green_border_color']) || !empty($bridge_qode_options['button_green_text_color'])  || !empty($bridge_qode_options['button_green_background_color'])) { ?>
			.qbutton.green{

			<?php if (!empty($bridge_qode_options['button_green_border_color'])) { ?>	border-color: <?php echo esc_attr($bridge_qode_options['button_green_border_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_green_text_color'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['button_green_text_color']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_green_background_color'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['button_green_background_color']);  ?>; <?php } ?>
			}
		<?php } ?>
		<?php if (!empty($bridge_qode_options['button_green_border_color_hover']) || !empty($bridge_qode_options['button_green_text_color_hover']) || !empty($bridge_qode_options['button_green_background_color_hover'])) { ?>
			.qbutton.green:hover {

			<?php if (!empty($bridge_qode_options['button_green_border_color_hover'])) { ?>	border-color: <?php echo esc_attr($bridge_qode_options['button_green_border_color_hover']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_green_text_color_hover'])) { ?>	color: <?php echo esc_attr($bridge_qode_options['button_green_text_color_hover']);  ?>; <?php } ?>
			<?php if (!empty($bridge_qode_options['button_green_background_color_hover'])) { ?>	background-color: <?php echo esc_attr($bridge_qode_options['button_green_background_color_hover']);  ?>; <?php } ?>
			}
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_button_dynamic_styles');
}