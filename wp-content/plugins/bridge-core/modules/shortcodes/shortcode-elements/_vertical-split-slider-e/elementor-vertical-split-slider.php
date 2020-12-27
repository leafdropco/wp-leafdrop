<?php

class BridgeCoreElementorVerticalSplitSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_vertical_split_slider';
    }

    public function get_title() {
        return esc_html__( 'Qode Vertical Split Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-vertical-split-slider';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    public static function get_templates() {
        return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'left_panel',
            [
                'label' => esc_html__( 'Left Sliding Panel', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'background_image',
            [
                'label' => esc_html__( 'Background Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'item_padding',
            [
                'label' => esc_html__( 'Padding left/right', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'aligment',
            [
                'label' => esc_html__( "Content Aligment", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__('Left', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core'),
                    'center' => esc_html__('Center', 'bridge-core'),
                ],
                'default' => 'left'
            ]
        );

        $repeater->add_control(
            'header_style',
            [
                'label' => esc_html__( 'Header/Bullets Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'light' => esc_html__('Light', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core')
                ],
                'default' => 'left'
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'left_sliding_items',
            [
                'label' => esc_html__( 'Left Sliding Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Left Sliding Item'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'right_panel',
            [
                'label' => esc_html__( 'Right Sliding Panel', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'background_image',
            [
                'label' => esc_html__( 'Background Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'item_padding',
            [
                'label' => esc_html__( 'Padding left/right', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'aligment',
            [
                'label' => esc_html__( "Content Alignment", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'left' => esc_html__('Left', 'bridge-core'),
                    'right' => esc_html__('Right', 'bridge-core'),
                    'center' => esc_html__('Center', 'bridge-core'),
                ],
                'default' => 'left'
            ]
        );

        $repeater->add_control(
            'header_style',
            [
                'label' => esc_html__( 'Header/Bullets Style', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => '',
                    'light' => esc_html__('Light', 'bridge-core'),
                    'dark' => esc_html__('Dark', 'bridge-core')
                ],
                'default' => ''
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'right_sliding_items',
            [
                'label' => esc_html__( 'Right Sliding Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Right Sliding Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

        <div class="vertical_split_slider" data-disable-header-skin-change="no">
            <div class="ms-left">
                <?php if( is_array( $params['left_sliding_items'] ) && count( $params['left_sliding_items'] ) > 0 ) {
                    foreach ($params['left_sliding_items'] as $left_sliding_item) {
                        $left_sliding_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($left_sliding_item['template_id']);
                        $left_sliding_item['background_image'] = $left_sliding_item['background_image']['id'];
                        echo bridge_core_get_shortcode_template_part('templates/vertical-split-slider-item', '_vertical-split-slider-e', '', $left_sliding_item);
                    }
                } else{
                    //render even empty section so Vertical Split Slider is proprely initialized
                    echo bridge_core_get_shortcode_template_part('templates/vertical-split-slider-item', '_vertical-split-slider-e', '', array());
                } ?>
            </div>
            <div class="ms-right">
                <?php if( is_array( $params['right_sliding_items'] ) && count( $params['right_sliding_items'] ) > 0 ) {
                    foreach ($params['right_sliding_items'] as $right_sliding_item) {
                        $right_sliding_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($right_sliding_item['template_id']);
                        $right_sliding_item['background_image'] = $right_sliding_item['background_image']['id'];
                        echo bridge_core_get_shortcode_template_part('templates/vertical-split-slider-item', '_vertical-split-slider-e', '', $right_sliding_item);
                    }
                } else{
                    //render even empty section so Vertical Split Slider is proprely initialized
                    echo bridge_core_get_shortcode_template_part('templates/vertical-split-slider-item', '_vertical-split-slider-e', '', array());
                } ?>
            </div>
        </div>

        <?php
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorVerticalSplitSlider() );