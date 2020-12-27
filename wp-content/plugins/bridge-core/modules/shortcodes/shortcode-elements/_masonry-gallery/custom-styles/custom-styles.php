<?php

if(!function_exists('bridge_core_masonry_gallery_dynamic_styles')) {

    function bridge_core_masonry_gallery_dynamic_styles() {
    	global $bridge_qode_options;
    	?>

		<?php
//Masonry Gallery Styles

//General Options

		if(isset($bridge_qode_options['masonry_gallery_space']) && ($bridge_qode_options['masonry_gallery_space'] != '')){ ?>
		    .masonry_gallery_item .masonry_gallery_item_outer,
		    .masonry_gallery_holder .masonry_gallery_item{
		    padding: <?php echo esc_attr($bridge_qode_options['masonry_gallery_space']);  ?>px;
		    }

		    .masonry_gallery_holder{
		    margin: 0 -<?php echo esc_attr($bridge_qode_options['masonry_gallery_space']);  ?>px;
		    }
		<?php }

//Square Big Item
		$masonry_gallery_square_big_title_style = '';
		$masonry_gallery_square_big_text_style = '';
		$masonry_gallery_square_big_button_style = '';
		$masonry_gallery_square_big_hover_button_style = '';
		$masonry_gallery_square_big_icon_style = '';
		$masonry_gallery_square_big_hover_icon_style = '';

		if(isset($bridge_qode_options['masonry_gallery_square_big_title_color']) && $bridge_qode_options['masonry_gallery_square_big_title_color'] !== '') {
			$masonry_gallery_square_big_title_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_title_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_font_size']) && $bridge_qode_options['masonry_gallery_square_big_title_font_size'] !== '') {
			$masonry_gallery_square_big_title_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_big_title_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_line_height']) && $bridge_qode_options['masonry_gallery_square_big_title_line_height'] !== '') {
			$masonry_gallery_square_big_title_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_big_title_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_text_transform']) && $bridge_qode_options['masonry_gallery_square_big_title_text_transform'] !== '') {
			$masonry_gallery_square_big_title_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_big_title_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_font_family']) && $bridge_qode_options['masonry_gallery_square_big_title_font_family'] !== '-1') {
			$masonry_gallery_square_big_title_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_big_title_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_font_style']) && $bridge_qode_options['masonry_gallery_square_big_title_font_style'] !== '') {
			$masonry_gallery_square_big_title_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_big_title_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_font_weight']) && $bridge_qode_options['masonry_gallery_square_big_title_font_weight'] !== '') {
			$masonry_gallery_square_big_title_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_big_title_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_big_title_letter_spacing'] !== '') {
			$masonry_gallery_square_big_title_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_big_title_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_title_margin_bottom']) && $bridge_qode_options['masonry_gallery_square_big_title_margin_bottom'] !== '') {
			$masonry_gallery_square_big_title_style .= 'padding-bottom: '.$bridge_qode_options['masonry_gallery_square_big_title_margin_bottom'].'px;';
		}
		if ($masonry_gallery_square_big_title_style !== '') { ?>

		    .masonry_gallery_item.square_big h3 {
			<?php echo esc_attr($masonry_gallery_square_big_title_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_big_text_color']) && $bridge_qode_options['masonry_gallery_square_big_text_color'] !== '') {
			$masonry_gallery_square_big_text_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_font_size']) && $bridge_qode_options['masonry_gallery_square_big_text_font_size'] !== '') {
			$masonry_gallery_square_big_text_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_big_text_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_line_height']) && $bridge_qode_options['masonry_gallery_square_big_text_line_height'] !== '') {
			$masonry_gallery_square_big_text_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_big_text_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_text_transform']) && $bridge_qode_options['masonry_gallery_square_big_text_text_transform'] !== '') {
			$masonry_gallery_square_big_text_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_big_text_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_font_family']) && $bridge_qode_options['masonry_gallery_square_big_text_font_family'] !== '-1') {
			$masonry_gallery_square_big_text_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_big_text_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_font_style']) && $bridge_qode_options['masonry_gallery_square_big_text_font_style'] !== '') {
			$masonry_gallery_square_big_text_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_big_text_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_font_weight']) && $bridge_qode_options['masonry_gallery_square_big_text_font_weight'] !== '') {
			$masonry_gallery_square_big_text_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_big_text_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_text_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_big_text_letter_spacing'] !== '') {
			$masonry_gallery_square_big_text_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_big_text_letter_spacing'].'px;';
		}

		if ($masonry_gallery_square_big_text_style !== '') { ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_text {
			<?php echo esc_attr($masonry_gallery_square_big_text_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_big_button_font_family']) && $bridge_qode_options['masonry_gallery_square_big_button_font_family'] !== '-1') {
			$masonry_gallery_square_big_button_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_big_button_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_font_style']) && $bridge_qode_options['masonry_gallery_square_big_button_font_style'] !== '') {
			$masonry_gallery_square_big_button_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_big_button_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_font_weight']) && $bridge_qode_options['masonry_gallery_square_big_button_font_weight'] !== '') {
			$masonry_gallery_square_big_button_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_big_button_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_text_transform']) && $bridge_qode_options['masonry_gallery_square_big_button_text_transform'] !== '') {
			$masonry_gallery_square_big_button_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_big_button_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_font_size']) && $bridge_qode_options['masonry_gallery_square_big_button_font_size'] !== '') {
			$masonry_gallery_square_big_button_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_big_button_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_line_height']) && $bridge_qode_options['masonry_gallery_square_big_button_line_height'] !== '') {
			$masonry_gallery_square_big_button_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_big_button_line_height'].'px;';
			$masonry_gallery_square_big_button_style .= 'height: '.$bridge_qode_options['masonry_gallery_square_big_button_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_big_button_letter_spacing'] !== '') {
			$masonry_gallery_square_big_button_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_big_button_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_text_color']) && $bridge_qode_options['masonry_gallery_square_big_button_text_color'] !== '') {
			$masonry_gallery_square_big_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_button_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_background_color']) && $bridge_qode_options['masonry_gallery_square_big_button_background_color'] !== '') {
			$masonry_gallery_square_big_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_square_big_button_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_border_color']) && $bridge_qode_options['masonry_gallery_square_big_button_border_color'] !== '') {
			$masonry_gallery_square_big_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_square_big_button_border_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_border_width']) && $bridge_qode_options['masonry_gallery_square_big_button_border_width'] !== '') {
			$masonry_gallery_square_big_button_style .= 'border-width: '.$bridge_qode_options['masonry_gallery_square_big_button_border_width'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_border_radius']) && $bridge_qode_options['masonry_gallery_square_big_button_border_radius'] !== '') {
			$masonry_gallery_square_big_button_style .= 'border-radius: '.$bridge_qode_options['masonry_gallery_square_big_button_border_radius'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_padding_left']) && $bridge_qode_options['masonry_gallery_square_big_button_padding_left'] !== '') {
			$masonry_gallery_square_big_button_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_square_big_button_padding_left'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_padding_right']) && $bridge_qode_options['masonry_gallery_square_big_button_padding_right'] !== '') {
			$masonry_gallery_square_big_button_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_square_big_button_padding_right'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_margin_top']) && $bridge_qode_options['masonry_gallery_square_big_button_margin_top'] !== '') {
			$masonry_gallery_square_big_button_style .= 'margin-top: '.$bridge_qode_options['masonry_gallery_square_big_button_margin_top'].'px;';
		}
		if ($masonry_gallery_square_big_button_style !== '') { ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_button {
			<?php echo esc_attr($masonry_gallery_square_big_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_big_button_hover_text_color']) && $bridge_qode_options['masonry_gallery_square_big_button_hover_text_color'] !== '') {
			$masonry_gallery_square_big_hover_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_button_hover_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_hover_background_color']) && $bridge_qode_options['masonry_gallery_square_big_button_hover_background_color'] !== '') {
			$masonry_gallery_square_big_hover_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_square_big_button_hover_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_button_hover_border_color']) && $bridge_qode_options['masonry_gallery_square_big_button_hover_border_color'] !== '') {
			$masonry_gallery_square_big_hover_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_square_big_button_hover_border_color'].';';
		}
		if ($masonry_gallery_square_big_hover_button_style !== '') { ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_button:hover {
			<?php echo esc_attr($masonry_gallery_square_big_hover_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_big_icon_color']) && $bridge_qode_options['masonry_gallery_square_big_icon_color'] !== '') {
			$masonry_gallery_square_big_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_icon_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_icon_size']) && $bridge_qode_options['masonry_gallery_square_big_icon_size'] !== '') {
			$masonry_gallery_square_big_icon_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_big_icon_size'].'px;';
		}

		if(isset($bridge_qode_options['masonry_gallery_square_big_icon_margin_bottom']) && $bridge_qode_options['masonry_gallery_square_big_icon_margin_bottom'] !== '') {
			$masonry_gallery_square_big_icon_style .= 'margin-bottom: '.$bridge_qode_options['masonry_gallery_square_big_icon_margin_bottom'].'px;';
		}

		if ($masonry_gallery_square_big_icon_style !== '') { ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_icon {
			<?php echo esc_attr($masonry_gallery_square_big_icon_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_big_icon_hover_color']) && $bridge_qode_options['masonry_gallery_square_big_icon_hover_color'] !== '') {
			$masonry_gallery_square_big_hover_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_big_icon_hover_color'].';';
		}
		if ($masonry_gallery_square_big_hover_icon_style !== '') { ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_icon:hover {
			<?php echo esc_attr($masonry_gallery_square_big_hover_icon_style); ?>
		    }

		<?php }

		$masonry_gallery_square_big_overlay_color = '';
		$masonry_gallery_square_big_overlay_transparency = 1;

		if(isset($bridge_qode_options['masonry_gallery_square_big_overlay_color']) && $bridge_qode_options['masonry_gallery_square_big_overlay_color'] !== ''){
			$masonry_gallery_square_big_overlay_color = bridge_qode_hex2rgb($bridge_qode_options['masonry_gallery_square_big_overlay_color']);
			if(isset($bridge_qode_options['masonry_gallery_square_big_overlay_transparency']) && $bridge_qode_options['masonry_gallery_square_big_overlay_transparency'] !== '') {
				$masonry_gallery_square_big_overlay_transparency = $bridge_qode_options['masonry_gallery_square_big_overlay_transparency'];
			} ?>

		    .masonry_gallery_item.square_big .masonry_gallery_item_inner {
		    background-color: rgba(<?php echo esc_attr($masonry_gallery_square_big_overlay_color[0]); ?>,<?php echo esc_attr($masonry_gallery_square_big_overlay_color[1]); ?>,<?php echo esc_attr($masonry_gallery_square_big_overlay_color[2]); ?>,<?php echo esc_attr($masonry_gallery_square_big_overlay_transparency);?>);
		    }
		<?php } ?>

		<?php

		$masonry_gallery_square_big_content_style = "";

		if(isset($bridge_qode_options['masonry_gallery_square_big_text_align'])&& $bridge_qode_options['masonry_gallery_square_big_text_align'] !=''){
			$masonry_gallery_square_big_content_style .= 'text-align: '.$bridge_qode_options['masonry_gallery_square_big_text_align'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_padding_left'])&& $bridge_qode_options['masonry_gallery_square_big_padding_left'] !=''){
			$masonry_gallery_square_big_content_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_square_big_padding_left'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_big_padding_right'])&& $bridge_qode_options['masonry_gallery_square_big_padding_right'] !=''){
			$masonry_gallery_square_big_content_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_square_big_padding_right'].';';
		}

		if($masonry_gallery_square_big_content_style !== '') { ?>
		    .masonry_gallery_item.square_big .masonry_gallery_item_inner .masonry_gallery_item_content{
			<?php echo esc_attr($masonry_gallery_square_big_content_style); ?>
		    }
		<?php } ?>

		<?php
//Square Small Item
		$masonry_gallery_square_small_title_style = '';
		$masonry_gallery_square_small_text_style = '';
		$masonry_gallery_square_small_button_style = '';
		$masonry_gallery_square_small_hover_button_style = '';
		$masonry_gallery_square_small_icon_style = '';
		$masonry_gallery_square_small_hover_icon_style = '';

		if(isset($bridge_qode_options['masonry_gallery_square_small_title_color']) && $bridge_qode_options['masonry_gallery_square_small_title_color'] !== '') {
			$masonry_gallery_square_small_title_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_title_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_font_size']) && $bridge_qode_options['masonry_gallery_square_small_title_font_size'] !== '') {
			$masonry_gallery_square_small_title_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_small_title_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_line_height']) && $bridge_qode_options['masonry_gallery_square_small_title_line_height'] !== '') {
			$masonry_gallery_square_small_title_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_small_title_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_text_transform']) && $bridge_qode_options['masonry_gallery_square_small_title_text_transform'] !== '') {
			$masonry_gallery_square_small_title_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_small_title_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_font_family']) && $bridge_qode_options['masonry_gallery_square_small_title_font_family'] !== '-1') {
			$masonry_gallery_square_small_title_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_small_title_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_font_style']) && $bridge_qode_options['masonry_gallery_square_small_title_font_style'] !== '') {
			$masonry_gallery_square_small_title_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_small_title_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_font_weight']) && $bridge_qode_options['masonry_gallery_square_small_title_font_weight'] !== '') {
			$masonry_gallery_square_small_title_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_small_title_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_small_title_letter_spacing'] !== '') {
			$masonry_gallery_square_small_title_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_small_title_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_title_margin_bottom']) && $bridge_qode_options['masonry_gallery_square_small_title_margin_bottom'] !== '') {
			$masonry_gallery_square_small_title_style .= 'padding-bottom: '.$bridge_qode_options['masonry_gallery_square_small_title_margin_bottom'].'px;';
		}
		if ($masonry_gallery_square_small_title_style !== '') { ?>

		    .masonry_gallery_item.square_small h3 {
			<?php echo esc_attr($masonry_gallery_square_small_title_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_small_text_color']) && $bridge_qode_options['masonry_gallery_square_small_text_color'] !== '') {
			$masonry_gallery_square_small_text_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_font_size']) && $bridge_qode_options['masonry_gallery_square_small_text_font_size'] !== '') {
			$masonry_gallery_square_small_text_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_small_text_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_line_height']) && $bridge_qode_options['masonry_gallery_square_small_text_line_height'] !== '') {
			$masonry_gallery_square_small_text_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_small_text_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_text_transform']) && $bridge_qode_options['masonry_gallery_square_small_text_text_transform'] !== '') {
			$masonry_gallery_square_small_text_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_small_text_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_font_family']) && $bridge_qode_options['masonry_gallery_square_small_text_font_family'] !== '-1') {
			$masonry_gallery_square_small_text_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_small_text_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_font_style']) && $bridge_qode_options['masonry_gallery_square_small_text_font_style'] !== '') {
			$masonry_gallery_square_small_text_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_small_text_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_font_weight']) && $bridge_qode_options['masonry_gallery_square_small_text_font_weight'] !== '') {
			$masonry_gallery_square_small_text_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_small_text_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_text_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_small_text_letter_spacing'] !== '') {
			$masonry_gallery_square_small_text_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_small_text_letter_spacing'].'px;';
		}

		if ($masonry_gallery_square_small_text_style !== '') { ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_text {
			<?php echo esc_attr($masonry_gallery_square_small_text_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_small_button_font_family']) && $bridge_qode_options['masonry_gallery_square_small_button_font_family'] !== '-1') {
			$masonry_gallery_square_small_button_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_square_small_button_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_font_style']) && $bridge_qode_options['masonry_gallery_square_small_button_font_style'] !== '') {
			$masonry_gallery_square_small_button_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_square_small_button_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_font_weight']) && $bridge_qode_options['masonry_gallery_square_small_button_font_weight'] !== '') {
			$masonry_gallery_square_small_button_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_square_small_button_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_text_transform']) && $bridge_qode_options['masonry_gallery_square_small_button_text_transform'] !== '') {
			$masonry_gallery_square_small_button_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_square_small_button_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_font_size']) && $bridge_qode_options['masonry_gallery_square_small_button_font_size'] !== '') {
			$masonry_gallery_square_small_button_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_small_button_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_line_height']) && $bridge_qode_options['masonry_gallery_square_small_button_line_height'] !== '') {
			$masonry_gallery_square_small_button_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_square_small_button_line_height'].'px;';
			$masonry_gallery_square_small_button_style .= 'height: '.$bridge_qode_options['masonry_gallery_square_small_button_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_letter_spacing']) && $bridge_qode_options['masonry_gallery_square_small_button_letter_spacing'] !== '') {
			$masonry_gallery_square_small_button_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_square_small_button_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_text_color']) && $bridge_qode_options['masonry_gallery_square_small_button_text_color'] !== '') {
			$masonry_gallery_square_small_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_button_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_background_color']) && $bridge_qode_options['masonry_gallery_square_small_button_background_color'] !== '') {
			$masonry_gallery_square_small_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_square_small_button_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_border_color']) && $bridge_qode_options['masonry_gallery_square_small_button_border_color'] !== '') {
			$masonry_gallery_square_small_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_square_small_button_border_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_border_width']) && $bridge_qode_options['masonry_gallery_square_small_button_border_width'] !== '') {
			$masonry_gallery_square_small_button_style .= 'border-width: '.$bridge_qode_options['masonry_gallery_square_small_button_border_width'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_border_radius']) && $bridge_qode_options['masonry_gallery_square_small_button_border_radius'] !== '') {
			$masonry_gallery_square_small_button_style .= 'border-radius: '.$bridge_qode_options['masonry_gallery_square_small_button_border_radius'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_padding_left']) && $bridge_qode_options['masonry_gallery_square_small_button_padding_left'] !== '') {
			$masonry_gallery_square_small_button_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_square_small_button_padding_left'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_padding_right']) && $bridge_qode_options['masonry_gallery_square_small_button_padding_right'] !== '') {
			$masonry_gallery_square_small_button_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_square_small_button_padding_right'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_margin_top']) && $bridge_qode_options['masonry_gallery_square_small_button_margin_top'] !== '') {
			$masonry_gallery_square_small_button_style .= 'margin-top: '.$bridge_qode_options['masonry_gallery_square_small_button_margin_top'].'px;';
		}
		if ($masonry_gallery_square_small_button_style !== '') { ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_button {
			<?php echo esc_attr($masonry_gallery_square_small_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_small_button_hover_text_color']) && $bridge_qode_options['masonry_gallery_square_small_button_hover_text_color'] !== '') {
			$masonry_gallery_square_small_hover_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_button_hover_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_hover_background_color']) && $bridge_qode_options['masonry_gallery_square_small_button_hover_background_color'] !== '') {
			$masonry_gallery_square_small_hover_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_square_small_button_hover_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_button_hover_border_color']) && $bridge_qode_options['masonry_gallery_square_small_button_hover_border_color'] !== '') {
			$masonry_gallery_square_small_hover_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_square_small_button_hover_border_color'].';';
		}
		if ($masonry_gallery_square_small_hover_button_style !== '') { ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_button:hover {
			<?php echo esc_attr($masonry_gallery_square_small_hover_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_small_icon_color']) && $bridge_qode_options['masonry_gallery_square_small_icon_color'] !== '') {
			$masonry_gallery_square_small_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_icon_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_icon_size']) && $bridge_qode_options['masonry_gallery_square_small_icon_size'] !== '') {
			$masonry_gallery_square_small_icon_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_square_small_icon_size'].'px;';
		}

		if(isset($bridge_qode_options['masonry_gallery_square_small_icon_margin_bottom']) && $bridge_qode_options['masonry_gallery_square_small_icon_margin_bottom'] !== '') {
			$masonry_gallery_square_small_icon_style .= 'margin-bottom: '.$bridge_qode_options['masonry_gallery_square_small_icon_margin_bottom'].'px;';
		}

		if ($masonry_gallery_square_small_icon_style !== '') { ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_icon {
			<?php echo esc_attr($masonry_gallery_square_small_icon_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_square_small_icon_hover_color']) && $bridge_qode_options['masonry_gallery_square_small_icon_hover_color'] !== '') {
			$masonry_gallery_square_small_hover_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_square_small_icon_hover_color'].';';
		}
		if ($masonry_gallery_square_small_hover_icon_style !== '') { ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_icon:hover {
			<?php echo esc_attr($masonry_gallery_square_small_hover_icon_style); ?>
		    }

		<?php }

		$masonry_gallery_square_small_overlay_color = '';
		$masonry_gallery_square_small_overlay_transparency = 1;

		if(isset($bridge_qode_options['masonry_gallery_square_small_overlay_color']) && $bridge_qode_options['masonry_gallery_square_small_overlay_color'] !== ''){
			$masonry_gallery_square_small_overlay_color = bridge_qode_hex2rgb($bridge_qode_options['masonry_gallery_square_small_overlay_color']);
			if(isset($bridge_qode_options['masonry_gallery_square_small_overlay_transparency']) && $bridge_qode_options['masonry_gallery_square_small_overlay_transparency'] !== '') {
				$masonry_gallery_square_small_overlay_transparency = $bridge_qode_options['masonry_gallery_square_small_overlay_transparency'];
			} ?>

		    .masonry_gallery_item.square_small .masonry_gallery_item_inner {
		    background-color: rgba(<?php echo esc_attr($masonry_gallery_square_small_overlay_color[0]); ?>,<?php echo esc_attr($masonry_gallery_square_small_overlay_color[1]); ?>,<?php echo esc_attr($masonry_gallery_square_small_overlay_color[2]); ?>,<?php echo esc_attr($masonry_gallery_square_small_overlay_transparency);?>);
		    }
		<?php } ?>

		<?php

		$masonry_gallery_square_small_content_style = "";

		if(isset($bridge_qode_options['masonry_gallery_square_small_text_align'])&& $bridge_qode_options['masonry_gallery_square_small_text_align'] !=''){
			$masonry_gallery_square_small_content_style .= 'text-align: '.$bridge_qode_options['masonry_gallery_square_small_text_align'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_padding_left'])&& $bridge_qode_options['masonry_gallery_square_small_padding_left'] !=''){
			$masonry_gallery_square_small_content_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_square_small_padding_left'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_square_small_padding_right'])&& $bridge_qode_options['masonry_gallery_square_small_padding_right'] !=''){
			$masonry_gallery_square_small_content_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_square_small_padding_right'].';';
		}

		if($masonry_gallery_square_small_content_style !== '') { ?>
		    .masonry_gallery_item.square_small .masonry_gallery_item_inner .masonry_gallery_item_content{
			<?php echo esc_attr($masonry_gallery_square_small_content_style); ?>
		    }
		<?php } ?>

		<?php
//Rectangle Portrait Item
		$masonry_gallery_rectangle_portrait_title_style = '';
		$masonry_gallery_rectangle_portrait_text_style = '';
		$masonry_gallery_rectangle_portrait_button_style = '';
		$masonry_gallery_rectangle_portrait_hover_button_style = '';
		$masonry_gallery_rectangle_portrait_icon_style = '';
		$masonry_gallery_rectangle_portrait_hover_icon_style = '';

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_color'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_size'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_line_height'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_text_transform'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_family'] !== '-1') {
			$masonry_gallery_rectangle_portrait_title_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_style'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_weight'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_title_margin_bottom']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_title_margin_bottom'] !== '') {
			$masonry_gallery_rectangle_portrait_title_style .= 'padding-bottom: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_title_margin_bottom'].'px;';
		}
		if ($masonry_gallery_rectangle_portrait_title_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait h3 {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_title_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_color'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_size'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_line_height'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_text_transform'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_family'] !== '-1') {
			$masonry_gallery_rectangle_portrait_text_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_style'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_weight'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_text_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_portrait_text_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_letter_spacing'].'px;';
		}

		if ($masonry_gallery_rectangle_portrait_text_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_text {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_text_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_family'] !== '-1') {
			$masonry_gallery_rectangle_portrait_button_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_style'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_weight'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_transform'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_size'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_line_height'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_line_height'].'px;';
			$masonry_gallery_rectangle_portrait_button_style .= 'height: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_color'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_background_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_background_color'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_color'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_width']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_width'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'border-width: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_width'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_radius']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_radius'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'border-radius: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_border_radius'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_left']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_left'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_left'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_right']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_right'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_padding_right'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_margin_top']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_margin_top'] !== '') {
			$masonry_gallery_rectangle_portrait_button_style .= 'margin-top: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_margin_top'].'px;';
		}
		if ($masonry_gallery_rectangle_portrait_button_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_button {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_text_color'] !== '') {
			$masonry_gallery_rectangle_portrait_hover_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_background_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_background_color'] !== '') {
			$masonry_gallery_rectangle_portrait_hover_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_border_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_border_color'] !== '') {
			$masonry_gallery_rectangle_portrait_hover_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_button_hover_border_color'].';';
		}
		if ($masonry_gallery_rectangle_portrait_hover_button_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_button:hover {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_hover_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_icon_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_icon_color'] !== '') {
			$masonry_gallery_rectangle_portrait_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_icon_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_icon_size']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_icon_size'] !== '') {
			$masonry_gallery_rectangle_portrait_icon_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_icon_size'].'px;';
		}

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_icon_margin_bottom']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_icon_margin_bottom'] !== '') {
			$masonry_gallery_rectangle_portrait_icon_style .= 'margin-bottom: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_icon_margin_bottom'].'px;';
		}

		if ($masonry_gallery_rectangle_portrait_icon_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_icon {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_icon_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_icon_hover_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_icon_hover_color'] !== '') {
			$masonry_gallery_rectangle_portrait_hover_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_icon_hover_color'].';';
		}
		if ($masonry_gallery_rectangle_portrait_hover_icon_style !== '') { ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_icon:hover {
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_hover_icon_style); ?>
		    }

		<?php }

		$masonry_gallery_rectangle_portrait_overlay_color = '';
		$masonry_gallery_rectangle_portrait_overlay_transparency = 1;

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_color']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_color'] !== ''){
			$masonry_gallery_rectangle_portrait_overlay_color = bridge_qode_hex2rgb($bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_color']);
			if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_transparency']) && $bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_transparency'] !== '') {
				$masonry_gallery_rectangle_portrait_overlay_transparency = $bridge_qode_options['masonry_gallery_rectangle_portrait_overlay_transparency'];
			} ?>

		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_inner {
		    background-color: rgba(<?php echo esc_attr($masonry_gallery_rectangle_portrait_overlay_color[0]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_portrait_overlay_color[1]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_portrait_overlay_color[2]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_portrait_overlay_transparency);?>);
		    }
		<?php } ?>

		<?php

		$masonry_gallery_rectangle_portrait_content_style = "";

		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_text_align'])&& $bridge_qode_options['masonry_gallery_rectangle_portrait_text_align'] !=''){
			$masonry_gallery_rectangle_portrait_content_style .= 'text-align: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_text_align'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_padding_left'])&& $bridge_qode_options['masonry_gallery_rectangle_portrait_padding_left'] !=''){
			$masonry_gallery_rectangle_portrait_content_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_padding_left'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_portrait_padding_right'])&& $bridge_qode_options['masonry_gallery_rectangle_portrait_padding_right'] !=''){
			$masonry_gallery_rectangle_portrait_content_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_rectangle_portrait_padding_right'].';';
		}

		if($masonry_gallery_rectangle_portrait_content_style !== '') { ?>
		    .masonry_gallery_item.rectangle_portrait .masonry_gallery_item_inner .masonry_gallery_item_content{
			<?php echo esc_attr($masonry_gallery_rectangle_portrait_content_style); ?>
		    }
		<?php } ?>

		<?php
//Rectangle Landscape Item
		$masonry_gallery_rectangle_landscape_title_style = '';
		$masonry_gallery_rectangle_landscape_text_style = '';
		$masonry_gallery_rectangle_landscape_button_style = '';
		$masonry_gallery_rectangle_landscape_hover_button_style = '';
		$masonry_gallery_rectangle_landscape_icon_style = '';
		$masonry_gallery_rectangle_landscape_hover_icon_style = '';

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_color'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_size'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_line_height'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_text_transform'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_family'] !== '-1') {
			$masonry_gallery_rectangle_landscape_title_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_style'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_weight'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_title_margin_bottom']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_title_margin_bottom'] !== '') {
			$masonry_gallery_rectangle_landscape_title_style .= 'padding-bottom: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_title_margin_bottom'].'px;';
		}
		if ($masonry_gallery_rectangle_landscape_title_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape h3 {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_title_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_color'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_size'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_line_height'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_text_transform'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_family'] !== '-1') {
			$masonry_gallery_rectangle_landscape_text_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_style'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_weight'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_text_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_landscape_text_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_letter_spacing'].'px;';
		}

		if ($masonry_gallery_rectangle_landscape_text_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_text {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_text_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_family']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_family'] !== '-1') {
			$masonry_gallery_rectangle_landscape_button_style .= 'font-family: '. str_replace('+', ' ', $bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_family']) .';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_style']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_style'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'font-style: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_style'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_weight']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_weight'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'font-weight: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_weight'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_transform']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_transform'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'text-transform: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_transform'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_size']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_size'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_font_size'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_line_height']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_line_height'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'line-height: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_line_height'].'px;';
			$masonry_gallery_rectangle_landscape_button_style .= 'height: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_line_height'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_letter_spacing']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_letter_spacing'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'letter-spacing: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_letter_spacing'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_color'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_background_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_background_color'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_color'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_width']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_width'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'border-width: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_width'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_radius']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_radius'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'border-radius: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_border_radius'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_left']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_left'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_left'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_right']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_right'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_padding_right'].'px;';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_margin_top']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_margin_top'] !== '') {
			$masonry_gallery_rectangle_landscape_button_style .= 'margin-top: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_margin_top'].'px;';
		}
		if ($masonry_gallery_rectangle_landscape_button_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_button {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_text_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_text_color'] !== '') {
			$masonry_gallery_rectangle_landscape_hover_button_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_text_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_background_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_background_color'] !== '') {
			$masonry_gallery_rectangle_landscape_hover_button_style .= 'background-color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_background_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_border_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_border_color'] !== '') {
			$masonry_gallery_rectangle_landscape_hover_button_style .= 'border-color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_button_hover_border_color'].';';
		}
		if ($masonry_gallery_rectangle_landscape_hover_button_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_button:hover {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_hover_button_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_icon_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_icon_color'] !== '') {
			$masonry_gallery_rectangle_landscape_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_icon_color'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_icon_size']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_icon_size'] !== '') {
			$masonry_gallery_rectangle_landscape_icon_style .= 'font-size: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_icon_size'].'px;';
		}

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_icon_margin_bottom']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_icon_margin_bottom'] !== '') {
			$masonry_gallery_rectangle_landscape_icon_style .= 'margin-bottom: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_icon_margin_bottom'].'px;';
		}

		if ($masonry_gallery_rectangle_landscape_icon_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_icon {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_icon_style); ?>
		    }

		<?php }

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_icon_hover_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_icon_hover_color'] !== '') {
			$masonry_gallery_rectangle_landscape_hover_icon_style .= 'color: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_icon_hover_color'].';';
		}
		if ($masonry_gallery_rectangle_landscape_hover_icon_style !== '') { ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_icon:hover {
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_hover_icon_style); ?>
		    }

		<?php }

		$masonry_gallery_rectangle_landscape_overlay_color = '';
		$masonry_gallery_rectangle_landscape_overlay_transparency = 1;

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_color']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_color'] !== ''){
			$masonry_gallery_rectangle_landscape_overlay_color = bridge_qode_hex2rgb($bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_color']);
			if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_transparency']) && $bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_transparency'] !== '') {
				$masonry_gallery_rectangle_landscape_overlay_transparency = $bridge_qode_options['masonry_gallery_rectangle_landscape_overlay_transparency'];
			} ?>

		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_inner {
		    background-color: rgba(<?php echo esc_attr($masonry_gallery_rectangle_landscape_overlay_color[0]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_landscape_overlay_color[1]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_landscape_overlay_color[2]); ?>,<?php echo esc_attr($masonry_gallery_rectangle_landscape_overlay_transparency);?>);
		    }
		<?php } ?>

		<?php

		$masonry_gallery_rectangle_landscape_content_style = "";

		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_text_align'])&& $bridge_qode_options['masonry_gallery_rectangle_landscape_text_align'] !=''){
			$masonry_gallery_rectangle_landscape_content_style .= 'text-align: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_text_align'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_padding_left'])&& $bridge_qode_options['masonry_gallery_rectangle_landscape_padding_left'] !=''){
			$masonry_gallery_rectangle_landscape_content_style .= 'padding-left: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_padding_left'].';';
		}
		if(isset($bridge_qode_options['masonry_gallery_rectangle_landscape_padding_right'])&& $bridge_qode_options['masonry_gallery_rectangle_landscape_padding_right'] !=''){
			$masonry_gallery_rectangle_landscape_content_style .= 'padding-right: '.$bridge_qode_options['masonry_gallery_rectangle_landscape_padding_right'].';';
		}

		if($masonry_gallery_rectangle_landscape_content_style !== '') { ?>
		    .masonry_gallery_item.rectangle_landscape .masonry_gallery_item_inner .masonry_gallery_item_content{
			<?php echo esc_attr($masonry_gallery_rectangle_landscape_content_style); ?>
		    }
		<?php } ?>


	<?php }

    add_action('bridge_qode_action_style_dynamic', 'bridge_core_masonry_gallery_dynamic_styles');
}