<?php

class BridgeCoreElementorHorizontalMarquee extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_horizontal_marquee';
    }

    public function get_title() {
        return esc_html__( 'Qode Horizontal Marquee', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-horizontal-marquee';
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
            'height',
            [
                'label' => esc_html__( 'Height (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $this->add_control(
            'spacing',
            [
                'label' => esc_html__( 'Spacing (px)', 'bridge-core'),
                "description" => esc_html__( 'Distance between marquee items.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $this->add_control(
            'behavior',
            [
                'label' => esc_html__( 'Behavior', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'draggable' => esc_html__('Draggable', 'bridge-core'),
                    'loop' => esc_html__('Loop', 'bridge-core'),
                ],
                'default' => 'draggable'
            ]
        );

        $this->add_control(
            'appear_fx',
            [
                'label' => esc_html__( 'Enable Appear Effect', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no',
                'condition' => [
                    'behavior' => 'loop'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'width',
            [
                'label' => esc_html__( 'Width (px)', 'bridge-core'),
                'description' => esc_html__( 'Enter the desired width for this item. It might be lower on smaller screens.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $repeater->add_control(
            'align',
            [
                'label' => esc_html__( 'Vertical Alignment', 'bridge-core'),
                'description' => esc_html__( 'How to align the content of this item relative to the marquee height.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'top' => esc_html__('Top', 'bridge-core'),
                    'middle' => esc_html__('Middle', 'bridge-core'),
                    'bottom' => esc_html__('Bottom', 'bridge-core'),
                ],
                'default' => 'top'
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'marquee_items',
            [
                'label' => esc_html__( 'Horizontal Marquee Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Horizontal Marquee Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holder_classes'] = $this->getHolderClasses( $params );
        $params['holder_data'] = $this->getHolderData( $params ); ?>

        <div class="<?php echo esc_attr( $params['holder_classes'] );?>" <?php echo bridge_qode_get_inline_attrs( $params['holder_data'] ); ?>>
            <div class="qode-horizontal-marquee-inner clearfix">
                <?php
                foreach ( $params['marquee_items'] as $marquee_item ) {
                    $marquee_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $marquee_item['template_id'] );
                    echo bridge_core_get_shortcode_template_part('templates/horizontal-marquee-item', '_horizontal-marquee-e', '', $marquee_item);
                } ?>
            </div>
        </div>
        <?php
    }

    protected function getHolderClasses( $params ){
        $classes = array(
            'qode-horizontal-marquee'
        );

        if( $params['behavior'] !== '' ){
            $classes[] = 'qode-' . $params['behavior'];
        }

        if( $params['appear_fx'] !== '' && $params['appear_fx'] == 'yes'){
            $classes[] = 'qode-appear-fx';
        }

        return implode(' ', $classes);
    }

    protected function getHolderData( $params ){
        $data = array();

        if( $params['height'] !== '' ){
            $data['data-height'] = $params['height'];
        }

        if( $params['spacing'] !== '' ){
            $data['data-spacing'] = $params['spacing'];
        }

        return $data;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorHorizontalMarquee() );