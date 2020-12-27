<?php

class BridgeCoreElementorSlidingImageHolder extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_sliding_image_holder';
    }

    public function get_title() {
        return esc_html__( 'Sliding Image Holder', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-sliding-image-holder';
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
            'image',
            [
                'label' => esc_html__('Image', 'bridge-core'),
                'description' => esc_html__('Recommended width of image is 1920px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        bridge_core_generate_elementor_templates_control( $this );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($params['template_id']);
        if( ! empty( $params['image'] ) ){
            $params['image'] = $params['image']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/sliding-image-holder-template', 'sliding-image-holder', '', $params);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorSlidingImageHolder() );