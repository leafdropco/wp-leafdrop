<?php

class BridgeCoreElementorMultiDeviceShowcase extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_multi_device_showcase';
    }

    public function get_title() {
        return esc_html__( 'Multi-device Showcase', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-multi-device-showcase';
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
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'button_usage',
            [
                'label' => esc_html__('Button Usage', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('None', 'bridge-core'),
                    'custom_link' => esc_html__('Custom Link', 'bridge-core'),
                    'scroll_below' => esc_html__('Scroll Below', 'bridge-core'),
                ]
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'button_usage' => array('custom_link', 'scroll_below')
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'button_usage' => 'custom_link'
                ]
            ]
        );

        $this->add_control(
            'button_link_target',
            [
                'label' => esc_html__( 'Link target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(),
                'condition' => [
                    'button_usage' => array('custom_link', 'scroll_below')
                ]
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'laptop_slider',
            [
                'label' => esc_html__('Laptop Slider', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_image',
            [
                'label' => esc_html__( 'Slide Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'slide_link',
            [
                'label' => esc_html__( 'Slide Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'laptop_slides',
            [
                'label' => esc_html__( 'Laptop Slides', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'tablet_slider',
            [
                'label' => esc_html__('Tablet Slider', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_image',
            [
                'label' => esc_html__( 'Slide Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'slide_link',
            [
                'label' => esc_html__( 'Slide Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'tablet_slides',
            [
                'label' => esc_html__( 'Tablet Slides', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'phone_slider',
            [
                'label' => esc_html__('Phone Slider', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_image',
            [
                'label' => esc_html__( 'Slide Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'slide_link',
            [
                'label' => esc_html__( 'Slide Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'phone_slides',
            [
                'label' => esc_html__( 'Phone Slides', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'additional_images',
            [
                'label' => esc_html__('Additional Images', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'additional_laptop_image',
            [
                'label' => esc_html__( 'Additional Laptop Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'additional_image',
            [
                'label' => esc_html__( 'Additional Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'additional_tablet_portrait_images',
            [
                'label' => esc_html__( 'Additional Tablet Portrait Images', 'bridge-core' ),
                'description' => esc_html__( 'Up to 3 additional tablet portrait oriented images supported.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'additional_image',
            [
                'label' => esc_html__( 'Additional Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'additional_tablet_landscape_images',
            [
                'label' => esc_html__( 'Additional Tablet Landscape Images', 'bridge-core' ),
                'description' => esc_html__( 'Up to 2 additional tablet portrait oriented images supported.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'additional_phone_portrait_image',
            [
                'label' => esc_html__( 'Additional Phone Portrait Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'layout_and_behaviour',
            [
                'label' => esc_html__('Layout and Behavior', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'layout_and_behavior',
            [
                'label' => esc_html__('Layout and Behavior', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'one_scroll_to_content',
            [
                'label' => esc_html__('One Scroll To Content', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'hide_content_overflow',
            [
                'label' => esc_html__('Hide Content Overflow', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array( false, true ),
                'default' => 'yes'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        foreach ($params['laptop_slides'] as $laptop_slide){
            $params['laptop_slides']['slide_image'] = $laptop_slide['slide_image']['id'];
        }

        $params['laptop_slides'] = json_decode(urldecode($params['laptop_slides']), true);
        $params['tablet_slides'] = json_decode(urldecode($params['tablet_slides']), true);
        $params['phone_slides'] = json_decode(urldecode($params['phone_slides']), true);
        $params['additional_tablet_portrait_images'] = json_decode(urldecode($params['additional_tablet_portrait_images']), true);
        $params['additional_tablet_landscape_images'] = json_decode(urldecode($params['additional_tablet_landscape_images']), true);
        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['global_slider_data'] = $this->getGlobalSliderData($params);
        $params['button_parameters'] = $this->getButtonParameters($params);

        echo bridge_core_get_shortcode_template_part('templates/multi-device-showcase-template', 'multi-device-showcase', '', $params);
    }

    /**
     * Returns classes for holder
     */
    private function getHolderClasses($params) {
        $params_array = array();

        if ($params['animate_on_appear'] == 'yes') {
            $params_array[] = 'qode-mds-appear-effect';
        }

        if ($params['one_scroll_to_content'] == 'yes') {
            $params_array[] = 'qode-mds-one-scroll-to-content';
        }

        if ($params['hide_content_overflow'] == 'yes') {
            $params_array[] = 'qode-mds-overflow-hidden';
        }

        if ($params['button_usage'] == 'scroll_below') {
            $params_array[] = 'qode-mds-btn-scroll-below';
        }

        return implode(' ',$params_array);
    }


    /**
     * Returns data for slider
     */
    private function getGlobalSliderData( $params ) {
        $slider_data = array();

        $slider_data['data-start-delay'] = 2500;
        $slider_data['data-slide-interval'] = 1500;

        return $slider_data;
    }

    /**
     * Returns parameters for button shortcode
     */
    private function getButtonParameters($params) {
        $params_array = array();

        $params_array['text'] = $params['button_text'];
        $params_array['link'] = $params['button_usage'] == 'custom_link' ? $params['button_link'] : '';
        $params_array['target'] = $params['button_usage'] == 'custom_link' ? $params['button_link_target'] : '';

        return $params_array;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorMultiDeviceShowcase() );