<?php
/* Custom font shortcode */
if (!function_exists('bridge_core_custom_font')) {
    function bridge_core_custom_font($atts, $content = null) {
        $args = array(
            "font_family"       => "",
            "font_size"         => "",
            "line_height"       => "",
            "font_style"        => "",
            "font_weight"       => "",
            "color"             => "",
            "text_decoration"   => "",
            "text_shadow"       => "",
            "letter_spacing"    => "",
            "background_color"  => "",
            "padding"           => "",
            "margin"            => "",
            "border_color"		=> "",
            "border_width"		=> "",
            "text_align"        => "left",
			'type_out_effect'		=> 'no',
			'type_out_position'		=> '',
			'typed_color'			=> '',
			'typed_endings'			=> ''
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['args'] = $args;
        $params['typed_endings'] = json_decode(urldecode($params['typed_endings']), true);

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/custom-font', '_custom-font', '', $params);

    }
    add_shortcode('custom_font', 'bridge_core_custom_font');
}

function bridge_core_get_custom_font_modified_title($params, $content ) {
	$type_out_effect   = $params['type_out_effect'];
	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	$type_out_position = str_replace( ' ', '', $params['type_out_position'] );

	if ( ! empty( $content ) && ( $type_out_effect === 'yes' ) ) {
		$split_title = explode( ' ', $content );


		$first_regex = '/<[a-zA-Z]+\d*>/';
		$first_str = $split_title[0];

		preg_match_all($first_regex, $first_str, $matches, PREG_SET_ORDER, 0);

		if(!empty($matches[0][0])) {
			$opened_tag = $matches[0][0];
		} else {
			$opened_tag = '';
		}

		$last_regex = '/<\/[a-zA-Z]+\d*>/';
		$last_str = $split_title[count($split_title) - 1];

		preg_match_all($last_regex, $last_str, $second_matches, PREG_SET_ORDER, 0);
		if(!empty($second_matches[0][0])) {
			$closed_tag = $second_matches[0][0];
		} else {
			$closed_tag = '';
		}
		$split_title[0] = str_replace($opened_tag , '', $split_title[0]);
		$split_title[count($split_title) - 1] = str_replace($closed_tag , '', $split_title[count($split_title) - 1]);

		if ( $type_out_effect === 'yes' && ! empty( $type_out_position ) ) {
			$typed_styles   = bridge_core_get_custom_font_typed_styles( $params );
			$typed_endings = $params['typed_endings'];

			$typed_html = '<span class="qode-cf-typed-wrap" ' . bridge_qode_get_inline_style( $typed_styles ) . '><span class="qode-cf-typed">';
			if ( is_array($typed_endings) && count($typed_endings) > 0 ) {
				foreach ($typed_endings as $typed_ending){
					$typed_html .= '<span class="qode-cf-typed">' . esc_html( $typed_ending['typed_ending'] ) . '</span>';
				}
			}

			$typed_html .= '</span></span>';

			if ( ! empty( $split_title[ $type_out_position - 1 ] ) ) {
				$split_title[ $type_out_position - 1 ] = $split_title[ $type_out_position - 1 ] . ' ' . $typed_html;
			}
		}

		$title = implode( ' ', $split_title );
		$title = $opened_tag . $title . $closed_tag;
	} else {
		$title = $content;
	}

	return $title;
}

function bridge_core_get_custom_font_typed_styles( $params ) {
	$styles = array();

	if ( ! empty( $params['typed_color'] ) ) {
		$styles[] = 'color: ' . $params['typed_color'];
	}

	return implode( ';', $styles );
}