<?php

class BridgeCoreElementorContentSlider extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_content_slider';
    }

    public function get_title() {
        return esc_html__( 'Content Slider', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-content-slider';
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
            'auto_rotate',
            [
                'label' => esc_html__( 'Auto Rotate', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "3" => "3",
                    "5" => "5",
                    "10" => "10",
                    "0" => esc_html__('Disable', 'bridge-core')
                ],
                'default' => '3'
            ]
        );

        $this->add_control(
            'enable_drag',
            [
                'label' => esc_html__( 'Enable drag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
            ]
        );

        $this->add_control(
            'direction_nav',
            [
                'label' => esc_html__( 'Show direction navigation', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
            ]
        );

        $this->add_control(
            'control_nav',
            [
                'label' => esc_html__( 'Show control navigation', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => ''
            ]
        );

        $this->add_control(
            'control_nav_justify',
            [
                'label' => esc_html__( 'Justify control navigation', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => '',
                'condition' => [
                    'control_nav!' => ''
                ]
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label' => esc_html__( 'Pause on hover', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(true, true),
                'default' => '',
                'condition' => [
                    'control_nav!' => ''
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'content_slider_items',
            [
                'label' => esc_html__( 'Content Slider Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Content Slider Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holder_classes'] = $this->getHolderClasses( $params );
        $params['holder_data'] = $this->getHolderData( $params ); ?>

        <div class="<?php echo esc_attr( $params['holder_classes'] );?>" <?php echo bridge_qode_get_inline_attrs( $params['holder_data'] ); ?>>
            <div class="qode_content_slider_inner">
                <?php
                foreach ( $params['content_slider_items'] as $content_slider_item ) {
                    $content_slider_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $content_slider_item['template_id'] );
                    echo bridge_core_get_shortcode_template_part('templates/content-slider-item', '_content-slider-e', '', $content_slider_item);
                } ?>
            </div>
        </div>
        <?php
    }

    protected function getHolderClasses( $params ){
        $classes = array(
            'qode_content_slider'
        );

        if( $params['control_nav'] !== '' ){
            $classes[] = 'has_control_nav';
        }

        if( $params['control_nav_justify'] !== '' ){
            $classes[] = 'control_nav_justified';
        }

        if( $params['enable_drag'] !== '' ){
            $classes[] = 'drag_enabled';
        }

        return implode(' ', $classes);
    }

    protected function getHolderData( $params ){
        $data = array();

        if( $params['auto_rotate'] !== '' ){
            $data['data-interval'] = $params['auto_rotate'];
        }

        if( $params['control_nav'] !== '' ){
            $data['data-control'] = $params['control_nav'] == 'yes' ? 'true' : 'false';
        }

        if( $params['direction_nav'] !== '' ){
            $data['data-direction'] = $params['direction_nav'] == 'yes' ? 'true' : 'false';
        }

        if( $params['pause_on_hover'] !== '' ){
            $data['data-pause-on-hover'] = $params['pause_on_hover'] == 'yes' ? 'true' : 'false';
        }

        if( $params['enable_drag'] !== '' ){
            $data['data-drag'] = $params['enable_drag'] == 'yes' ? 'true' : 'false';
        }

        return $data;
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorContentSlider() );