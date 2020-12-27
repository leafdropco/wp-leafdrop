<?php
if (!function_exists('bridge_core_team_vc_map')) {

	function bridge_core_team_vc_map(){


		$social_icons_array = array(
			"" => "",
			"ADN" => "fa-adn",
			"Android" => "fa-android",
			"Apple" => "fa-apple",
			"Bitbucket" => "fa-bitbucket",
			"Bitbucket-Sign" => "fa-bitbucket-sign",
			"Bitcoin" => "fa-bitcoin",
			"BTC" => "fa-btc",
			"CSS3" => "fa-css3",
			"Dribbble" => "fa-dribbble",
			"Dropbox" => "fa-dropbox",
			"E-mail" => "fa-envelope",
			"Facebook" => "fa-facebook",
			"Facebook-Sign" => "fa-facebook-sign",
			"Flickr" => "fa-flickr",
			"Foursquare" => "fa-foursquare",
			"GitHub" => "fa-github",
			"GitHub-Alt" => "fa-github-alt",
			"GitHub-Sign" => "fa-github-sign",
			"Gittip" => "fa-gittip",
			"Google Plus" => "fa-google-plus",
			"Google Plus-Sign" => "fa-google-plus-sign",
			"HTML5" => "fa-html5",
			"Instagram" => "fa-instagram",
			"LinkedIn" => "fa-linkedin",
			"LinkedIn-Sign" => "fa-linkedin-sign",
			"Linux" => "fa-linux",
			"Mail" => "fa-envelope",
			"Mail Alt" => "fa-envelope-o",
			"Mail Square" => "fa-envelope-square",
			"MaxCDN" => "fa-maxcdn",
			"Pinterest" => "fa-pinterest",
			"Pinterest-Sign" => "fa-pinterest-sign",
			"Renren" => "fa-renren",
			"Skype" => "fa-skype",
			"StackExchange" => "fa-stackexchange",
			"Trello" => "fa-trello",
			"Tumblr" => "fa-tumblr",
			"Tumblr-Sign" => "fa-tumblr-sign",
			"Twitch" => "fa-twitch",
			"Twitter" => "fa-twitter",
			"Twitter-Sign" => "fa-twitter-sign",
			"Vimeo-Square" => "fa-vimeo-square",
			"VK" => "fa-vk",
			"Weibo" => "fa-weibo",
			"Windows" => "fa-windows",
			"Xing" => "fa-xing",
			"Xing-Sign" => "fa-xing-sign",
			"YouTube" => "fa-youtube",
			"YouTube Play" => "fa-youtube-play",
			"YouTube-Sign" => "fa-youtube-sign"
		);

		vc_map( array(
			"name" => esc_html__( "Team", 'bridge-core' ),
			"base" => "q_team",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"icon" => "extended-custom-icon-qode icon-wpb-q_team",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'bridge-core' ),
					"param_name" => "type",
					"admin_label" => true,
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Main Info Below Image', 'bridge-core' ) => "info_below_image",
						esc_html__( 'Main Info on Hover', 'bridge-core' ) => "info_on_hover",
						esc_html__('Main Info and Description Below Image','bridge-core') => 'info_description_below_image'
					),
					"description" => esc_html__( "Default type is Main Info Below Image", 'bridge-core' )
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__( "Image", 'bridge-core' ),
					"param_name" => "team_image"
				),
				array(
					"type"	=> "dropdown",
					"heading"	=> esc_html__('Disable image hover zoom animation','bridge-core'),
					"value"	=> array(
						esc_html__("No/Default", "bridge-core")	=> 'no',
						esc_html__( 'Yes', 'bridge-core' )			=> 'yes',
					),
					"param_name"	=> "disable_hover",
					"dependency"	=> array("element" => "type" , "value"	=> "info_description_below_image"),
				),
				array(
					"type"			=> "textfield",
					"heading" => esc_html__( "Name", 'bridge-core' ),
					"param_name"	=> "team_name",
					"admin_label"	=> true
				),
				array(
					"type"			=> "dropdown",
					"heading" => esc_html__( "Title Tag", 'bridge-core' ),
					"param_name"	=> "title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"description" => esc_html__( "Title tag will refer to Name of team member", 'bridge-core' )
				),
				array(
					"type"		 => "colorpicker",
					"heading" => esc_html__( "Name Color", 'bridge-core' ),
					"param_name" => "name_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Position", 'bridge-core' ),
					"param_name" => "team_position",
					"admin_label" => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Position Color", 'bridge-core' ),
					"param_name" => "position_color"
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__( "Description", 'bridge-core' ),
					"admin_label" => true,
					"param_name" => "team_description"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Background Color", 'bridge-core' ),
					"param_name" => "background_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Overlay Color", 'bridge-core' ),
					"param_name" => "overlay_color",
					"dependency" => array('element' => 'type', 'value' => array('info_on_hover'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Box Border", 'bridge-core' ),
					"param_name" => "box_border",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'No', 'bridge-core' ) => "no",
						esc_html__( 'Yes', 'bridge-core' ) => "yes"
					)
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Box Border Width", 'bridge-core' ),
					"param_name" => "box_border_width",
					"dependency" => array('element' => "box_border", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Box Border Color", 'bridge-core' ),
					"param_name" => "box_border_color",
					"dependency" => array('element' => "box_border", 'value' => array('yes'))
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show Separator", 'bridge-core' ),
					"param_name" => "show_separator",
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Yes', 'bridge-core' ) => "yes",
						esc_html__( 'No', 'bridge-core' ) => "no"
					)
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Separator Color", 'bridge-core' ),
					"param_name" => "separator_color",
					"value" => "",
					"dependency" => array('element' => "show_separator", 'value' => array('yes',''))
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Social Icons Color", 'bridge-core' ),
					"param_name" => "icons_color",
					"value" => ""
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 1", 'bridge-core' ),
					"param_name" => "team_social_icon_1",
					"value" =>$social_icons_array,
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Social Icon 1 Link", 'bridge-core' ),
					"param_name" => "team_social_icon_1_link"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 1 Target", 'bridge-core' ),
					"param_name" => "team_social_icon_1_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 2", 'bridge-core' ),
					"param_name" => "team_social_icon_2",
					"value" =>$social_icons_array,
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Social Icon 2 Link", 'bridge-core' ),
					"param_name" => "team_social_icon_2_link"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 2 Target", 'bridge-core' ),
					"param_name" => "team_social_icon_2_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 3", 'bridge-core' ),
					"param_name" => "team_social_icon_3",
					"value" =>$social_icons_array,
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Social Icon 3 Link", 'bridge-core' ),
					"param_name" => "team_social_icon_3_link"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 3 Target", 'bridge-core' ),
					"param_name" => "team_social_icon_3_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 4", 'bridge-core' ),
					"param_name" => "team_social_icon_4",
					"value" =>$social_icons_array,
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Social Icon 4 Link", 'bridge-core' ),
					"param_name" => "team_social_icon_4_link"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 4 Target", 'bridge-core' ),
					"param_name" => "team_social_icon_4_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 5", 'bridge-core' ),
					"param_name" => "team_social_icon_5",
					"value" =>$social_icons_array,
					'save_always' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Social Icon 5 Link", 'bridge-core' ),
					"param_name" => "team_social_icon_5_link"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Social Icon 5 Target", 'bridge-core' ),
					"param_name" => "team_social_icon_5_target",
					"value" => array(
						"" => "",
						esc_html__( 'Self', 'bridge-core' ) => "_self",
						esc_html__( 'Blank', 'bridge-core' ) => "_blank",
						esc_html__( 'Parent', 'bridge-core' ) => "_parent"
					)
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_team_vc_map');
}