<?php

class BridgeCoreElementorNumberedCarousel extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_numbered_carousel';
    }

    public function get_title() {
        return esc_html__( 'Numbered Carousel', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-numbered-carousel';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'media_type',
            [
                'label' => esc_html__( 'Media Type', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__( 'Image', 'bridge-core' ),
                    'video' => esc_html__( 'Video', 'bridge-core' ),
                ],
                'default' => 'image'
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'media_type' => 'image'
                ]
            ]
        );

        $repeater->add_control(
            'video_url',
            [
                'label' => esc_html__('Video Url', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'media_type' => 'video'
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'link_text',
            [
                'label' => esc_html__( 'Link Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'link!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'target',
            [
                'label' => esc_html__( 'Link target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(),
                'default' => '_blank',
                'condition' => [
                    'link!' => ''
                ]
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__( 'Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
            ]
        );

        $this->add_control(
            'change_slides_on_scroll',
            [
                'label' => esc_html__( 'Change Slides On Scroll', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['holder_classes'] = $this->getHolderClasses( $params );

        foreach ($params['items'] as $key => $value) {
            $params['items'][$key]['image'] = $params['items'][$key]['image']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/numbered-carousel-template', 'numbered-carousel', '', $params);
    }

    private function getHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = $params['change_slides_on_scroll'] === 'yes' ? 'qode-change-on-scroll' : '';

        return implode( ' ', $holderClasses );
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorNumberedCarousel() );