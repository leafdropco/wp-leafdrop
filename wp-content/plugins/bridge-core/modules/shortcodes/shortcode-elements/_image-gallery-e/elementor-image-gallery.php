<?php

class BridgeCoreElementorImageGallery extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_image_gallery';
    }

    public function get_title() {
        return esc_html__( "Image Gallery", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-image-gallery';
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
            'type',
            [
                'label' => esc_html__( "Gallery Type", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'flexslider_fade' => esc_html__( 'Flex slider fade', 'bridge-core' ),
                    'flexslider_slide' => esc_html__( 'Flex slider slide', 'bridge-core' ),
                    'image_grid' => esc_html__( 'Image grid', 'bridge-core' )
                ],
                'default' => 'flexslider_fade'
            ]
        );

        $this->add_control(
            'interval',
            [
                'label' => esc_html__( "Auto rotate", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '3' => '3',
                    '5' => '5',
                    '10' => '10',
                    '15' => '15',
                    '0' => esc_html__('Disable','bridge-core'),
                ],
                'default' => '3',
                'condition' => [
                    'type' => array('flexslider_fade', 'flexslider_slide')
                ]
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => esc_html__( "Images", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::GALLERY
            ]
        );

        $this->add_control(
            'img_size',
            [
                'label' => esc_html__( "Image Size", 'bridge-core' ),
                'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'thumbnail'
            ]
        );

        $this->add_control(
            'onclick',
            [
                'label' => esc_html__( "On click action", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('None', 'bridge-core'),
                    'img_link_large' => esc_html__('Link to large image', 'bridge-core'),
                    'link_image' => esc_html__('Open prettyPhoto', 'bridge-core'),
                    'custom_link' => esc_html__('Open custom link', 'bridge-core'),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'custom_links',
            [
                'label' => esc_html__( "Custom links", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter links for each slide (Note: divide links with comma (",")).', 'bridge-core'),
                'condition' => [
                    'onclick' => 'custom_link'
                ]
            ]
        );

        $this->add_control(
            'custom_links_target',
            [
                'label' => esc_html__( "Custom links Target", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'default' => '_blank',
                'condition' => [
                    'onclick' => 'custom_link'
                ]
            ]
        );

        $this->add_control(
            'column_number',
            [
                'label' => esc_html__( 'Column Number', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '0' => esc_html__('Disable','bridge-core'),
                ],
                'default' => '3',
                'condition' => [
                    'type' => 'image_grid'
                ]
            ]
        );

        $this->add_control(
            'grayscale',
            [
                'label' => esc_html__( 'Grayscale Images', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no',
                'condition' => [
                    'type' => 'image_grid'
                ]
            ]
        );

        $this->add_control(
            'enable_drag',
            [
                'label' => esc_html__( "Enable drag", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes',
                'condition' => [
                    'onclick' => ''
                ]
            ]
        );

        $this->add_control(
            'direction_nav',
            [
                'label' => esc_html__( "Show direction navigation", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes',
                'condition' => [
                    'type' => array('flexslider_slide', 'flexslider_fade')
                ]
            ]
        );

        $this->add_control(
            'control_nav',
            [
                'label' => esc_html__( "Show control navigation", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => '',
                'condition' => [
                    'type' => array('flexslider_slide', 'flexslider_fade')
                ]
            ]
        );

        $this->add_control(
            'show_image_description',
            [
                'label' => esc_html__('Show image description at bottom', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => '',
                'condition' => [
                    'type' => array('flexslider_slide', 'flexslider_fade')
                ]
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => esc_html__( "Pause on hover", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => '',
                'condition' => [
                    'type' => array('flexslider_slide', 'flexslider_fade')
                ]
            ]
        );

        $this->add_control(
            'frame',
            [
                'label' => esc_html__( "Frame", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'use_frame' => esc_html__('Yes', 'bridge-core'),
                    'no' => esc_html__('No', 'bridge-core')
                ],
                'default' => '',
                'condition' => [
                    'type' => 'flexslider_slide'
                ]
            ]
        );

        $this->add_control(
            'choose_frame',
            [
                'label' => esc_html__( "Choose Frame", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'default' => esc_html__('Default', 'bridge-core'),
                    'frame1' => esc_html__('Frame 1', 'bridge-core'),
                    'frame2' => esc_html__('Frame 2', 'bridge-core'),
                    'frame3' => esc_html__('Frame 3', 'bridge-core'),
                    'frame4' => esc_html__('Frame 4', 'bridge-core'),
                ],
                'default' => 'default',
                'condition' => [
                    'frame' => 'use_frame'
                ]
            ]
        );

        $this->add_control(
            'images_space',
            [
                'label' => esc_html__( "Spaces between images", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'gallery_without_space' => esc_html__('No', 'bridge-core'),
                    'gallery_with_space' => esc_html__('Yes', 'bridge-core'),
                ],
                'default' => '',
                'condition' => [
                    'type' => 'image_grid'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/image-gallery', '_image-gallery-e', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorImageGallery() );