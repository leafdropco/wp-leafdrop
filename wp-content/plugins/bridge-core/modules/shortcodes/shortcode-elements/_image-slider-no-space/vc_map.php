<?php
if (!function_exists('bridge_core_image_slider_no_space_vc_map')) {

	function bridge_core_image_slider_no_space_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Qode Image Slider", 'bridge-core' ),
			"base" => "image_slider_no_space",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-images-stack",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "attach_images",
					"heading" => esc_html__( "Images", 'bridge-core' ),
					"param_name" => "images"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "On click", 'bridge-core' ),
					"param_name" => "on_click",
					"value" => array(
						esc_html__( 'Do nothing', 'bridge-core' )       			 	=> "",
						esc_html__( 'Open image in prettyphoto', 'bridge-core' )     => "prettyphoto",
						esc_html__( 'Open image in new tab', 'bridge-core' )			=> "new_tab",
						esc_html__( 'Use custom links', 'bridge-core' )				=> "use_custom_links"
					)
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__( "Custom Links", 'bridge-core' ),
					"param_name" => "custom_links",
					"value" => "",
					"dependency" => array('element' => 'on_click', 'value' => 'use_custom_links'),
					"description" => esc_html__( "Enter links for each image here. Divide links with comma.", 'bridge-core' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Custom links target", 'bridge-core' ),
					"param_name" => "custom_links_target",
					"value" => array(
						"" => "",
						esc_html__( 'Same window', 'bridge-core' ) => "_self",
						esc_html__( 'New window', 'bridge-core' ) => "_blank"
					),
					"dependency" => array('element' => 'on_click', 'value' => 'use_custom_links')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Slider height (px)", 'bridge-core' ),
					"param_name" => "height",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Navigation style", 'bridge-core' ),
					"param_name" => "navigation_style",
					"value" => array(
						"" => "",
						esc_html__( 'Light', 'bridge-core' ) => "light",
						esc_html__( 'Dark', 'bridge-core' ) => "dark"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Highlight active image", 'bridge-core' ),
					"param_name" => "highlight_active_image",
					"value" => array(
						"" => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Highlight Inactive Color", 'bridge-core' ),
					"param_name" => "highlight_inactive_color",
					"dependency" => array('element' => "highlight_active_image", 'value' => 'yes')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Highlight Inactive Opacity (0-1)", 'bridge-core' ),
					"param_name" => "highlight_inactive_opacity",
					"value" => "",
					"dependency" => array('element' => "highlight_active_image", 'value' => 'yes')
				)
			)
		) );

	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_image_slider_no_space_vc_map');
}