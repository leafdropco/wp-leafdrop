<?php

class BridgeCoreElementorTeam extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_team';
    }

    public function get_title() {
        return esc_html__( 'Team', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-team';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

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

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

	    $this->add_control(
		    'type',
		    [
			    'label' => esc_html__( 'Type', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => array(
				    'info_below_image'				=> esc_html__( 'Main Info Below Image', 'bridge-core' ),
				    'info_on_hover'                 => esc_html__( 'Main Info on Hover', 'bridge-core' ),
				    'info_description_below_image'  => esc_html__( 'Main Info and Description Below Image', 'bridge-core' )
			    ),
				'default' => 'info_below_image'
		    ]
	    );

	    $this->add_control(
		    'team_image',
		    [
			    'label' => esc_html__( 'Image', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::MEDIA
		    ]
	    );

		$this->add_control(
			'disable_hover',
			[
				'label' => esc_html__( 'Disable image hover zoom animation', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no'				=> esc_html__( 'No/Default', 'bridge-core' ),
					'yes'               => esc_html__( 'Yes', 'bridge-core' )
				),
				'default' => 'no',
				'condition' => [
					'type' => 'info_description_below_image'
				]
			]
		);

		$this->add_control(
		    'team_name',
		    [
			    'label' => esc_html__( 'Name', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

	    $this->add_control(
		    'title_tag',
		    [
			    'label'		=> esc_html__( 'Title Tag', 'bridge-core' ),
			    'type'		=> \Elementor\Controls_Manager::SELECT,
			    'options'	=> bridge_qode_get_title_tag(false),
				'default'	=> 'h3',
				'description'	=> esc_html__('Title tag will refer to Name of team member', 'bridge-core')
		    ]
	    );

	    $this->add_control(
		    'name_color',
		    [
			    'label' => esc_html__( 'Name Color', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::COLOR
		    ]
	    );

	    $this->add_control(
		    'team_position',
		    [
			    'label' => esc_html__( 'Position', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::TEXT
		    ]
	    );

		$this->add_control(
			'position_color',
			[
				'label' => esc_html__( 'Position Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'team_description',
			[
				'label' => esc_html__( 'Description', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type' => 'info_on_hover'
				]
			]
		);

		$this->add_control(
			'box_border',
			[
				'label'		=> esc_html__( 'Box Border', 'bridge-core' ),
				'type'		=> \Elementor\Controls_Manager::SELECT,
				'options'	=> bridge_qode_get_yes_no_select_array(true),
				'default'	=> ''
			]
		);

		$this->add_control(
			'box_border_width',
			[
				'label' => esc_html__( 'Box Border Width', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'box_border' => 'yes'
				]
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label' => esc_html__( 'Box Border Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'box_border' => 'yes'
				]
			]
		);

		$this->add_control(
			'show_separator',
			[
				'label'		=> esc_html__( 'Show Separator', 'bridge-core' ),
				'type'		=> \Elementor\Controls_Manager::SELECT,
				'options'	=> bridge_qode_get_yes_no_select_array(true),
				'default'	=> ''
			]
		);

		$this->add_control(
			'separator_color',
			[
				'label' => esc_html__( 'Separator Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'show_separator' => 'yes'
				]
			]
		);

		$this->add_control(
			'icons_color',
			[
				'label' => esc_html__( 'Social Icons Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		for($i = 1 ; $i<= 5; $i++) {

			$this->add_control(
				'team_social_icon_' . $i,
				[
					'label' => esc_html__('Social Icons', 'bridge-core') . ' ' . $i,
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => array_flip($social_icons_array),
					'default' => ''
				]
			);

			$this->add_control(
				'team_social_icon_'. $i . '_link',
				[
					'label' => esc_html__('Social Icon', 'bridge-core') . ' ' . $i . ' ' . esc_html__('Link', 'bridge-core'),
					'type' => \Elementor\Controls_Manager::TEXT
				]
			);

			$this->add_control(
				'team_social_icon_'. $i . '_target',
				[
					'label' => esc_html__('Social Icon', 'bridge-core') . ' ' . $i. ' ' . esc_html__('Target', 'bridge-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => bridge_qode_get_link_target_array(true),
					'default' => ''
				]
			);
		}
        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

		if( ! empty( $params['team_image'] ) ){
			$params['team_image'] = $params['team_image']['id'];
		}

        echo bridge_core_get_shortcode_template_part('templates/team', '_team', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorTeam() );