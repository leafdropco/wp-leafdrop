<?php

class BridgeCoreElementorContentMenu extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_content_menu';
    }

    public function get_title() {
        return esc_html__( 'Qode Content Menu', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-content-menu';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );

        $repeater = new \Elementor\Repeater();

        bridge_qode_icon_collections()->getElementorParamsArray( $repeater, '', '', true );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Content Menu Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'anchor_id',
            [
                'label' => esc_html__( 'Anchor ID', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater , array('content' => '') );

        $this->add_control(
            'content_menu_items',
            [
                'label' => esc_html__( 'Content Menu Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        foreach( $params['content_menu_items'] as $key => $value ){
            $params['content_menu_items'][$key]['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $value );
            if( empty( $params['content_menu_items'][$key]['content'] ) ){
                $params['content_menu_items'][$key]['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $params['content_menu_items'][$key]['template_id'] );
            };
        }

        echo bridge_core_get_shortcode_template_part('templates/content-menu', 'content-menu-e', '', $params);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorContentMenu() );