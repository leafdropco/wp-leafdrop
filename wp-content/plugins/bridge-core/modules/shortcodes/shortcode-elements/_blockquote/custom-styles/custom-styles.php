<?php

if(!function_exists('bridge_core_blockquote_dynamic_styles')) {

    function bridge_core_blockquote_dynamic_styles() {
    	global $bridge_qode_options;
    	?>
		<?php if(!empty($bridge_qode_options['quote_link_blockqoute_fontsize']) ||
			!empty($bridge_qode_options['quote_link_blockqoute_lineheight']) ||
			(isset($bridge_qode_options['quote_link_blockqoute_fontstyle']) && $bridge_qode_options['quote_link_blockqoute_fontstyle'] !== "") ||
			(isset($bridge_qode_options['quote_link_blockqoute_fontweight']) && $bridge_qode_options['quote_link_blockqoute_fontweight'] !== "") ||
			(isset($bridge_qode_options['quote_link_blockqoute_fontfamily']) && $bridge_qode_options['quote_link_blockqoute_fontfamily'] !== "-1") ||
			(isset($bridge_qode_options['quote_link_blockqoute_letterspacing']) && $bridge_qode_options['quote_link_blockqoute_letterspacing'] !== "") ||
			(isset($bridge_qode_options['quote_link_blockqoute_texttransform']) && $bridge_qode_options['quote_link_blockqoute_texttransform'] !== "")){ ?>
		    .blog_holder article.format-quote .post_text .post_title p,
		    .blog_holder article.format-link .post_text .post_title p,
		    .blog_holder article.format-quote .post_text .quote_author,
		    blockquote h5
		    {
			<?php if (!empty($bridge_qode_options['quote_link_blockqoute_fontsize'])) { ?>font-size: <?php echo intval($bridge_qode_options['quote_link_blockqoute_fontsize']);  ?>px; <?php } ?>
			<?php if (!empty($bridge_qode_options['quote_link_blockqoute_lineheight'])) { ?>line-height: <?php echo intval($bridge_qode_options['quote_link_blockqoute_lineheight']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['quote_link_blockqoute_letterspacing']) && $bridge_qode_options['quote_link_blockqoute_letterspacing'] !== "") { ?>letter-spacing: <?php echo intval($bridge_qode_options['quote_link_blockqoute_letterspacing']);  ?>px; <?php } ?>
			<?php if (isset($bridge_qode_options['quote_link_blockqoute_texttransform']) && $bridge_qode_options['quote_link_blockqoute_texttransform'] !== "") { ?>text-transform: <?php echo esc_attr($bridge_qode_options['quote_link_blockqoute_texttransform']);  ?>; <?php } ?>
			<?php if (isset($bridge_qode_options['quote_link_blockqoute_fontstyle']) && $bridge_qode_options['quote_link_blockqoute_fontstyle'] !== "") { ?>font-style: <?php echo esc_attr($bridge_qode_options['quote_link_blockqoute_fontstyle']);  ?>; <?php } ?>
			<?php if (isset($bridge_qode_options['quote_link_blockqoute_fontweight']) && $bridge_qode_options['quote_link_blockqoute_fontweight'] !== "") { ?>font-weight: <?php echo esc_attr($bridge_qode_options['quote_link_blockqoute_fontweight']);  ?>; <?php } ?>
			<?php if(isset($bridge_qode_options['quote_link_blockqoute_fontfamily']) && $bridge_qode_options['quote_link_blockqoute_fontfamily'] != "-1"){ ?>
			    font-family: '<?php echo str_replace('+', ' ', $bridge_qode_options['quote_link_blockqoute_fontfamily']); ?>', sans-serif;
			<?php } ?>
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['blockquote_font_color'])) { ?>
		    blockquote h5{
		    color: <?php echo esc_attr($bridge_qode_options['blockquote_font_color']);  ?>;
		    }
		<?php } ?>
		<?php if (!empty($bridge_qode_options['blockquote_background_color']) && !empty($bridge_qode_options['blockquote_border_color'])) { ?>
		    blockquote{
		    border-color: <?php echo esc_attr($bridge_qode_options['blockquote_border_color']);  ?>;
		    background-color: <?php echo esc_attr($bridge_qode_options['blockquote_background_color']);  ?>;
		    }
		<?php } ?>
		<?php if(!empty($bridge_qode_options['blockquote_quote_icon_color'])) { ?>
		    blockquote i.pull-left {
		    color: <?php echo esc_attr($bridge_qode_options['blockquote_quote_icon_color']); ?>;
		    }
		<?php } ?>

<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_blockquote_dynamic_styles');
}