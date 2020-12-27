<?php

class BridgeCoreElementorSocialIcons extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_social_icons';
    }

    public function get_title() {
        return esc_html__( 'Social Icons', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-social-icons';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls() {

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
				    'circle_social'	=> esc_html__( 'Circle', 'bridge-core' ),
				    'square_social'	=> esc_html__( 'Square', 'bridge-core' ),
				    'normal_social'	=> esc_html__( 'Normal', 'bridge-core' )
			    ),
				'default' => 'circle_social'
		    ]
	    );

		bridge_qode_icon_collections()->getSocialElementorParamsArray($this, array(),'',false,array('linea_icons','dripicons', 'kiko'));

	    $this->add_control(
		    'use_custom_size',
		    [
			    'label' => esc_html__( 'Use Custom Size', 'bridge-core' ),
			    'type' => \Elementor\Controls_Manager::SELECT,
			    'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => 'no'
		    ]
	    );

		$this->add_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'fa-lg'	=> esc_html__( 'Small', 'bridge-core' ),
					'fa-2x'	=> esc_html__( 'Normal', 'bridge-core' ),
					'fa-3x'	=> esc_html__( 'Large', 'bridge-core' ),
					'fa-4x'	=> esc_html__( 'Very Large', 'bridge-core' )
				),
				'default' => 'fa-lg',
				'condition' => [
					'use_custom_size' => 'no'
				]
			]
		);

		$this->add_control(
			'custom_size',
			[
				'label' => esc_html__( 'Custom Size(px)', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'use_custom_size' => 'yes'
				]
			]
		);

		$this->add_control(
			'custom_shape_size',
			[
				'label' => esc_html__( 'Custom Shape Size(px)', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'use_custom_size' => 'yes',
					'type'			=> array('circle_social', 'square_social')
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'target',
			[
				'label' => esc_html__( 'Target', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_link_target_array(),
				'default' => '_self'
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type' => 'square_social'
				],
				'description' => esc_html__( 'Add border radius in pixels. Ommit unit, add just number', 'bridge-core' )
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Hover Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				]
			]
		);

		$this->add_control(
			'background_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				]
			]
		);

		$this->add_control(
			'background_color_transparency',
			[
				'label' => esc_html__( 'Background Color Transparency', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				],
				'description'	=> esc_html__('Value should be between 0 and 1. Applied only if you have selected background color and circle / square icon type', 'bridge-core')
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => esc_html__( 'Border Width', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				]
			]
		);

		$this->add_control(
			'border_hover_color',
			[
				'label' => esc_html__( 'Border Hover Color', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type'			=> array('circle_social', 'square_social')
				]
			]
		);

		$this->add_control(
			'icon_margin',
			[
				'label'			=> esc_html__( 'Icon Margin', 'bridge-core' ),
				'type'			=> \Elementor\Controls_Manager::TEXT,
				'description'	=> esc_html__( 'Margin should be set in a top right bottom left format', 'bridge-core' )
			]
		);

		$this->end_controls_section();

        // Add predefined developer tab content for each shortcode element
        $this->start_controls_section(
            'developer_tools',
            [
                'label' => esc_html__( 'Developer Tools', 'bridge-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'shortcode_snippet',
            [
                'label'   => esc_html__( 'Show Shortcode Snippet', 'bridge-core' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'no',
                'options' => array(
                    'no'  => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

		bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/social-icons', '_social-icons', '', $params);
        }
    }

    private function get_shortcode_snippet( $params ) {
        $atts = array();

        if ( empty( $this ) || ! is_object( $this ) ) {
            return '';
        }

        if ( ! empty( $params ) ) {
            foreach ( $params as $key => $value ) {
                if ( is_array( $value ) || $key === 'shortcode_snippet' ) {
                    continue;
                }

                if( empty( $value ) || $value == '' ){
                    continue;
                }

                $atts[] = $key . '="' . esc_attr( $value ) . '"';
            }
        }

        return sprintf( '<textarea class="qode-shortcode-snipper-holder" rows="3" readonly>[%s %s]</textarea>',
            'social_icons',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSocialIcons() );