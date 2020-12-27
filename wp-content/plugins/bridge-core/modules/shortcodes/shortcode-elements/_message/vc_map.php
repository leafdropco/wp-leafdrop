<?php
if (!function_exists('bridge_core_message_vc_map')) {

	function bridge_core_message_vc_map(){

		global $qodeIconCollections;
		$collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

		vc_map( array(
			"name" => esc_html__( "Message", 'bridge-core' ),
			"base" => "message",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-message",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"value" => array(
						esc_html__( 'Normal', 'bridge-core' ) => "normal",
						esc_html__( 'With Icon', 'bridge-core' ) => "with_icon"
					),
					'save_always' => true,
					'admin_label' => true
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
						esc_html__( 'Small', 'bridge-core' ) => "fa-lg",
						esc_html__( 'Medium', 'bridge-core' ) => "fa-2x",
						esc_html__( 'Large', 'bridge-core' ) => "fa-3x"
					),
					'save_always' => true,
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Icon Color", 'bridge-core' ),
					"param_name" => "icon_color",
					"dependency" => Array('element' => "type", 'value' => array('with_icon'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Icon Background Color", 'bridge-core' ),
					"param_name" => "icon_background_color",
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
					"type" => "dropdown",
					"heading" => esc_html__( "Border", 'bridge-core' ),
					"param_name" => "border",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' )	=> "",
						esc_html__( 'No', 'bridge-core' )		=> "no",
						esc_html__( 'Yes', 'bridge-core' )		=> "yes"
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Border Width (px)", 'bridge-core' ),
					"param_name" => "border_width",
					"dependency" => Array('element' => "border", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Border Color", 'bridge-core' ),
					"param_name" => "border_color",
					"dependency" => Array('element' => "border", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Close Button Color", 'bridge-core' ),
					"param_name" => "close_button_color"
				),
				array(
					"type" => "textarea_html",
					"heading" => esc_html__( "Content", 'bridge-core' ),
					"param_name" => "content",
					"value" => "<p>".esc_html__( 'I am test text for Message shortcode.', 'bridge-core' )."</p>"
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_message_vc_map');
}