<?php

class BridgeCoreElementorMasonryGallery extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_masonry_gallery';
    }

    public function get_title() {
        return esc_html__( "Masonry Gallery", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-masonry-gallery';
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
            'category',
            [
                'label' => esc_html__( "Category", 'bridge-core' ),
                "description" => esc_html__( "Category Slug (leave empty for all)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => esc_html__( "Number", 'bridge-core' ),
                "description" => esc_html__( "Number of Masonry Gallery Items", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__( "Order", 'bridge-core' ),
                "description" => esc_html__( "Number of Masonry Gallery Items", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'DESC' => esc_html__('DESC', 'bridge-core'),
                    'ASC' => esc_html__('ASC', 'bridge-core'),
                ],
                'default' => 'ASC'
            ]
        );

        $this->add_control(
            'parallax_item_speed',
            [
                'label' => esc_html__( "Parallax Item Speed", 'bridge-core' ),
                "description" => esc_html__( 'This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0.3', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0.3'
            ]
        );

        $this->add_control(
            'parallax_item_offset',
            [
                'label' => esc_html__( "Parallax Item Offset", 'bridge-core' ),
                "description" => esc_html__('This option only takes effect on portfolio items on which "Set Masonry Item in Parallax" is set to "Yes", default value is 0', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/masonry-gallery', '_masonry-gallery', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorMasonryGallery() );