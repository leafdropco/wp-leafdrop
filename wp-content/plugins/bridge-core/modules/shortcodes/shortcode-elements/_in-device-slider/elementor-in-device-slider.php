<?php

class BridgeCoreElementorInDeviceSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_in_device_slider';
    }

    public function get_title() {
        return esc_html__( 'Qode In-Device Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-in-device-slider';
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
            'device',
            [
                'label' => esc_html__( 'Device', 'bridge-core'),
                "description" => esc_html__( 'Choose the frame in which the slides will be shown.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'desktop' => esc_html__('Desktop', 'bridge-core'),
                    'tablet-portrait' => esc_html__('Tablet - Portrait', 'bridge-core'),
                    'tablet-landscape' => esc_html__('Tablet - Landscape', 'bridge-core'),
                    'phone-portrait' => esc_html__('Phone - Portrait', 'bridge-core'),
                    'phone-landscape' => esc_html__('Phone - Landscape', 'bridge-core'),
                ],
                'default' => 'desktop'
            ]
        );

        $this->add_control(
            'titles_on_hover',
            [
                'label' => esc_html__( 'Image Titles on Hover?', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => esc_html__( 'Show Navigation Arrows?', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $this->add_control(
            'auto_start',
            [
                'label' => esc_html__( 'Autostart Slideshow', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, true),
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'timeout',
            [
                'label' => esc_html__( 'Time Between Slides (ms)', 'bridge-core'),
                "description" => esc_html__( 'Default is 5000.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '5000',
                'condition' => [
                    'auto_start' => 'yes'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'target',
            [
                'label' => esc_html__( 'Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'default' => '_self'
            ]
        );

        $this->add_control(
            'in_device_slider_items',
            [
                'label' => esc_html__( 'Device Slider Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Device Slider Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

        <div class="qode-in-device-slider">
            <div class="qode-ids-slider-holder">
                <div class="qode-ids-slider qode-ids-framed-<?php echo esc_attr($params['device']); ?> <?php if ( $params['titles_on_hover'] == 'yes' ) { echo ' qode-ids-titles-on-hover'; } ?>'" data-navigation="<?php echo esc_attr($params['navigation']); ?>" data-auto-start="<?php echo esc_attr($params['auto_start']); ?>" <?php if( $params['auto_start'] == 'yes' ) { echo ' data-timeout="'.esc_attr($params['timeout']).'"'; } ?>>
                    <ul class="slides">
                        <?php foreach ( $params['in_device_slider_items'] as $slider_items ) {

                            if( ! empty( $slider_items['image'] ) ){
                                $slider_items['image'] = $slider_items['image']['id'];
                            }

                            echo bridge_core_get_shortcode_template_part('templates/in-device-slider-item', '_in-device-slider', '', $slider_items);

                        }?>
                    </ul>
                </div>
            <img itemprop="image" class="qode-ids-frame" src="<?php echo esc_url( get_template_directory_uri() . '/img/in-device-slider-' . esc_attr($params['device']) . '.png' ); ?>" alt="<?php echo esc_html__('Device Frame', 'bridge-core'); ?>">
            </div>
        </div>

        <?php

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInDeviceSlider() );