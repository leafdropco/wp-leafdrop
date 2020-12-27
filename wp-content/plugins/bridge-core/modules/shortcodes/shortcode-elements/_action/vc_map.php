<?php
if (!function_exists('bridge_core_action_vc_map')) {

	function bridge_core_action_vc_map(){

		global $qodeIconCollections;
		$collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

		vc_map( array(
			"name" => esc_html__( "Call to Action", 'bridge-core' ),
			"base" => "action",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-action",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type"          => "dropdown",
					"heading"		=> esc_html__( "Full Width", 'bridge-core' ),
					"param_name"    => "full_width",
					"value"         => array_flip(bridge_qode_get_yes_no_select_array(false, true)),
					'save_always'	=> true
				),
				array(
					"type"          => "dropdown",
					"heading" => esc_html__( "Content in grid", 'bridge-core' ),
					"param_name"    => "content_in_grid",
					"value"         => array_flip(bridge_qode_get_yes_no_select_array(false, true)),
					'save_always' => true,
					"dependency"    => array("element" => "full_width", "value" => "yes")
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						esc_html__( 'Normal', 'bridge-core' ) => "normal",
						esc_html__( 'Simple', 'bridge-core' ) => "simple",
						esc_html__( 'With Icon', 'bridge-core' ) => "with_icon"
					),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Icon", 'bridge-core' ),
					"param_name" => "icon",
					"value" => $icons,
					'save_always' => true,
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Icon Size", 'bridge-core' ),
					"param_name" => "icon_size",
					"value" => array(
						"" => "",
						esc_html__( 'Small', 'bridge-core' ) => "fa-lg",
						esc_html__( 'Medium', 'bridge-core' ) => "fa-2x",
						esc_html__( 'Large', 'bridge-core' ) => "fa-3x"
					),
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Icon Color", 'bridge-core' ),
					"param_name" => "icon_color",
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Custom Icon", 'bridge-core' ),
					"param_name" => "custom_icon",
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Background Image", 'bridge-core' ),
					"param_name" => "background_image"
				),
				array(
					"type" => "checkbox",
					"value" => array(esc_html__( 'Use background image as pattern?', 'bridge-core' ) => "yes" ),
					"param_name" => "use_background_as_pattern",
					"dependency" => Array('element' => "background_image", 'not_empty' => true)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Border Color", 'bridge-core' ),
					"param_name" => "border_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Padding Top (px)", 'bridge-core' ),
					"param_name" => "padding_top"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Padding Bottom (px)", 'bridge-core' ),
					"param_name" => "padding_bottom"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Default Text Font Size", 'bridge-core' ),
					"param_name" => "text_size",
					"description" => esc_html__( "Font size for p tag", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Text Font Weight", 'bridge-core' ),
					"param_name" => "text_font_weight",
					"value" => array_flip(bridge_qode_get_font_weight_array(true)),
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text Letter Spacing", 'bridge-core' ),
					"param_name" => "text_letter_spacing",
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Button", 'bridge-core' ),
					"param_name" => "show_button",
					"value" => array_flip(bridge_qode_get_yes_no_select_array(false, true)),
					'save_always' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Button Size", 'bridge-core' ),
					"param_name" => "button_size",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Small', 'bridge-core' ) => "small",
						esc_html__( 'Medium', 'bridge-core' ) => "medium",
						esc_html__( 'Large', 'bridge-core' ) => "large",
						esc_html__( 'Big Large', 'bridge-core' ) => "big_large"
					),
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Text", 'bridge-core' ),
					"param_name" => "button_text",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Button Link", 'bridge-core' ),
					"param_name" => "button_link",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Button Target", 'bridge-core' ),
					"param_name" => "button_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					),
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button text color", 'bridge-core' ),
					"param_name" => "button_text_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button hover text color", 'bridge-core' ),
					"param_name" => "button_hover_text_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button Background Color", 'bridge-core' ),
					"param_name" => "button_background_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button Hover Background Color", 'bridge-core' ),
					"param_name" => "button_hover_background_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button Border Color", 'bridge-core' ),
					"param_name" => "button_border_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Button Hover Border Color", 'bridge-core' ),
					"param_name" => "button_hover_border_color",
					"dependency" => array('element' => 'show_button', 'value' => array('yes'))
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => "<p>".esc_html__( 'I am test text for Call to action.', 'bridge-core' )."</p>"
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_action_vc_map');
}