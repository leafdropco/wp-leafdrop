<?php

class BridgeCoreElementorParallaxLayers extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_parallax_layers';
    }

    public function get_title() {
        return esc_html__( "Parallax Layers", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-parallax-layers';
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
            'images',
            [
                'label' => esc_html__( "Layers", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY
            ]
        );

        $this->add_control(
            'full_screen',
            [
                'label' => esc_html__( "Full Screen Height", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( "Height (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'full_screen' => 'no'
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'description' => esc_html__( "This content will be displayed as final (top) layer over all other layers", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => '',
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['images'] = implode(',', $this->getGalleryImages( $params ) );

        echo bridge_core_get_shortcode_template_part('templates/parallax-layers', '_parallax-layers', '', $params);
    }

    private function getGalleryImages( $params ) {
        $images    = array();
        $i         = 0;

        foreach ( $params['images'] as $image ) {
            $images[ $i ] = $image['id'];
            $i ++;
        }

        return $images;
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorParallaxLayers() );