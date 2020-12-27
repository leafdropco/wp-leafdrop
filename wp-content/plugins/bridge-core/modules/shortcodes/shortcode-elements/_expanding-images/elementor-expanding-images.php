<?php

class BridgeCoreElementorExpandingImages extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_expanding_images';
    }

    public function get_title() {
        return esc_html__( 'Expanding Images', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-expanding-images';
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
            'frame',
            [
                'label' => esc_html__('Choose Frame', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'standard' => esc_html__('Standard', 'bridge-core'),
                    'jungle' => esc_html__('Jungle', 'bridge-core')
                ],
                'default' => 'standard'
            ]
        );

        $this->add_control(
            'hero_image',
            [
                'label' => esc_html__('Hero Image', 'bridge-core'),
                'description' => esc_html__( 'This image will be set inside the laptop frame.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core' ),
                'description' => esc_html__( 'Enter an external URL to link to.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'target',
            [
                'label' => esc_html__( 'Target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    '_self' => esc_html__( 'Self', 'bridge-core' ),
                    '_blank' => esc_html__( 'Blank', 'bridge-core' ),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'description' => esc_html__( 'Hero Image title.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'inner_side_images',
            [
                'label' => esc_html__( 'Inner Side Images', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'side_image_1',
            [
                'label' => esc_html__( 'Side Image 1', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set next to the upper left corner of the laptop frame.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_1_link',
            [
                'label' => esc_html__( 'Side Image 1 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_2',
            [
                'label' => esc_html__( 'Side Image 2', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set next to the lower left corner of the laptop frame.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_2_link',
            [
                'label' => esc_html__( 'Side Image 2 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_3',
            [
                'label' => esc_html__( 'Side Image 3', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set next to the upper right corner of the laptop frame.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_3_link',
            [
                'label' => esc_html__( 'Side Image 3 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_4',
            [
                'label' => esc_html__( 'Side Image 4', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set next to the lower right corner of the laptop frame.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_4_link',
            [
                'label' => esc_html__( 'Side Image 4 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'outer_side_images',
            [
                'label' => esc_html__( 'Outer Side Images', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'side_image_5',
            [
                'label' => esc_html__( 'Side Image 5', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set in the upper left corner of the entire section.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_5_link',
            [
                'label' => esc_html__( 'Side Image 5 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_6',
            [
                'label' => esc_html__( 'Side Image 6', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set in the lower left corner of the entire section.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_6_link',
            [
                'label' => esc_html__( 'Side Image 6 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_7',
            [
                'label' => esc_html__( 'Side Image 7', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set in the upper right corner of the entire section.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_7_link',
            [
                'label' => esc_html__( 'Side Image 7 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'side_image_8',
            [
                'label' => esc_html__( 'Side Image 8', 'bridge-core' ),
                'description' => esc_html__( 'This image will be set in the lower right corner of the entire section.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $this->add_control(
            'side_image_8_link',
            [
                'label' => esc_html__( 'Side Image 8 Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['hero_image'] ) ){
            $params['hero_image'] = $params['hero_image']['id'];
        }

        for( $i = 1; $i <= 8; $i++ ){
            if( ! empty( $params['side_image_' . $i] ) ){
                $params['side_image_' . $i] = $params['side_image_' . $i]['id'];
            }
        }

        echo bridge_core_get_shortcode_template_part('templates/expanding-images', '_expanding-images', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorExpandingImages() );