<?php

class BridgeCoreElementorCrossfadeImages extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_crossfade_images';
    }

    public function get_title() {
        return esc_html__( 'Qode Crossfade Images', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-crossfade-images';
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
            'initial_image',
            [
                'label' => esc_html__( 'Initial Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'hover_image',
            [
                'label' => esc_html__( 'Hover Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'link_target',
            [
                'label' => esc_html__( 'Link target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_blank' => esc_html__('New Window', 'bridge-core' ),
                    '_self' => esc_html__('Same Window', 'bridge-core' )
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'design',
            [
                'label' => esc_html__( 'Design Options', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['initial_image'] ) ){
            $params['initial_image'] = $params['initial_image']['id'];
        }

        if( ! empty( $params['hover_image'] ) ){
            $params['hover_image'] = $params['hover_image']['id'];
        }

        $params['initial_image_params'] = $this->getInitialImageParams($params);
        $params['hover_image_params'] = $this->getHoverImageParams($params);

        echo bridge_core_get_shortcode_template_part('templates/crossfade-images-template', 'crossfade-images', '', $params);
    }

    private function getInitialImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['initial_image'];
        $image_original = wp_get_attachment_image_src($params['initial_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['initial_image']);
        $image_dimensions = bridge_qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }

    /**
     * Return Initial Image Params for Lazy Load
     *
     * @param $params
     *
     * @return array
     */
    private function getHoverImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['hover_image'];
        $image_original = wp_get_attachment_image_src($params['hover_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['hover_image']);
        $image_dimensions = bridge_qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCrossfadeImages() );