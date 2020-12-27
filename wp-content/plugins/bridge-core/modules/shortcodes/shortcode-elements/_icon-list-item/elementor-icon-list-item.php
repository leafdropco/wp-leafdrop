<?php

class BridgeCoreElementorIconListItem extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_icon_list_item';
    }

    public function get_title() {
        return esc_html__( "Icon List Item", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-icon-list-item';
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

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'icon_type',
            [
                'label' => esc_html__( "Icon Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'circle' => esc_html__( 'Circle', 'bridge-core' ),
                    'transparent' => esc_html__( 'Transparent', 'bridge-core' ),
                ],
                'default' => 'circle'
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'icon_background_color',
            [
                'label' => esc_html__( "Icon Background Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => 'circle'
                ]
            ]
        );

        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__( "Icon Border Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'icon_type' => 'circle'
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( "Title", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( "Title Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'title_size',
            [
                'label' => esc_html__( "Title size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_font_weight',
            [
                'label' => esc_html__( "Title Font Weight", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'margin_bottom',
            [
                'label' => esc_html__( "Margin Bottom (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
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

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        if( ! empty( $params['shortcode_snippet'] ) && $params['shortcode_snippet'] == 'yes' ){
            echo $this->get_shortcode_snippet( $params );
        } else{
            echo bridge_core_get_shortcode_template_part('templates/icon-list-item', '_icon-list-item', '', $params);
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
            'icon_list_item',
            implode( ' ', $atts )
        );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorIconListItem() );