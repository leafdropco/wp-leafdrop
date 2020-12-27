<?php

class BridgeCoreElementorSocialShare extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_social_share';
    }

    public function get_title() {
        return esc_html__( 'Social Share', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-social-share';
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
			'show_share_icon',
			[
				'label' => esc_html__( 'Show share icon', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(false),
				'default' => 'no'
			]
		);

		$icon_packs = array_flip(bridge_qode_icon_collections()->getIconCollectionsVC());
		$icon_packs_keys = array_keys($icon_packs);
		$this->add_control(
			'social_share_icon_pack',
			[
				'label' => esc_html__( 'Show share icon', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(bridge_qode_icon_collections()->getIconCollectionsVC()),
				'default' => $icon_packs_keys[0],
				'condition' => [
					'show_share_icon' => 'yes'
				]
			]
		);

		$this->add_control(
			'show_share_text',
			[
				'label' => esc_html__( 'Show share text', 'bridge-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => bridge_qode_get_yes_no_select_array(),
				'default' => ''
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

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/social-share', '_social-share', '', $params);
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
            'social_share',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSocialShare() );