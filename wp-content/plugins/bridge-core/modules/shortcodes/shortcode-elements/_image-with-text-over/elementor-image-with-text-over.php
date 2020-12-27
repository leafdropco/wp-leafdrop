<?php

class BridgeCoreElementorImageWithTextOver extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_image_with_text_over';
    }

    public function get_title() {
        return esc_html__( "Image With Text Over", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-image-with-text-over';
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
            'layout_width',
            [
                'label' => esc_html__( "Width", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'one_half' => '1/2',
                    'one_third' => '1/3',
                    'one_fourth' => '1/4',
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__( "Image", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'image_shader_color',
            [
                'label' => esc_html__( "Image Shader Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'image_shader_hover_color',
            [
                'label' => esc_html__( "Image Shader Hover Color", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        bridge_qode_icon_collections()->getElementorParamsArray($this, '', '', true);

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__( "Icon Size", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__('Tiny', 'bridge-core'),
                    'fa-2x' => esc_html__('Small', 'bridge-core'),
                    'fa-3x' => esc_html__('Medium', 'bridge-core'),
                    'fa-4x' => esc_html__('Large', 'bridge-core'),
                    'fa-5x' => esc_html__('Very Large', 'bridge-core'),
                ],
                'default' => 'fa-lg'
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
                'label' => esc_html__( "Title Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => esc_html__( "Content", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => "<p>".esc_html__( 'I am test text for Image with text shortcode.', 'bridge-core' )."</p>",
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty($params['image']) ){
            $params['image'] = $params['image']['id'];
        }

        $params['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $params );

        echo bridge_core_get_shortcode_template_part('templates/image-with-text-over', '_image-with-text-over', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorImageWithTextOver() );