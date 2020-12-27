<?php
/* Button shortcode */
if (!function_exists('bridge_core_button')) {
    function bridge_core_button($atts, $content = null) {
		global $qodeIconCollections;

		$default_atts = array(
            "size"                      => "",
            "style"                      => "",
            "text"                      => "",
//            "icon"                      => "",
            "icon_color"                => "",
            "link"                      => "",
            "target"                    => "_self",
            "button_id"                 => "",
            "hover_type"                 => "default",
            "color"                     => "",
            "hover_color"               => "",
            "background_color"			=> "",
            "hover_background_color"    => "",
            "border_color"              => "",
            "hover_border_color"        => "",
            'font_family'               => '',
            'font_size'                 => '',
            'letter_spacing'            => '',
            'text_transform'            => '',
            "font_style"                => "",
            "font_weight"               => "",
            "text_align"                => "",
            "margin"					=> "",
            "border_radius"				=> "",
            "html_type"                 => "",
            "custom_class"              => "",
            "button_shadow"             => "",
            "gradient"                  => "no"
        );

		$default_atts = array_merge($default_atts, $qodeIconCollections->getShortcodeParams());

		$params = shortcode_atts($default_atts, $atts);
        $params['content'] = $content;
        $params['default_atts'] = $default_atts;

        extract($params);

        return bridge_core_get_shortcode_template_part('templates/button', '_button', '', $params);
    }
    add_shortcode('button', 'bridge_core_button');
}

if ( ! function_exists('bridge_core_get_button_html') ) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function bridge_core_get_button_html($params ) {
		$button_html = bridge_qode_execute_shortcode( 'button', $params );
		$button_html = str_replace( "\n", '', $button_html );

		return $button_html;
	}
}