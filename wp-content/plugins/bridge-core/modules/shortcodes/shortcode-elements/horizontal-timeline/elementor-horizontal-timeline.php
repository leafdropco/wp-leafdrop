<?php

class BridgeCoreElementorHorizontalTimeline extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_horizontal_timeline';
    }

    public function get_title() {
        return esc_html__( 'Horizontal Timeline', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-horizontal-timeline';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    public static function get_templates() {
        return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
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
            'position',
            [
                'label' => esc_html__( 'Timeline Position', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'top' => esc_html__( 'Top', 'bridge-core' ),
                    'bottom' => esc_html__( 'Bottom', 'bridge-core' ),
                ],
                'default' => 'top'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'timeline_label',
            [
                'label' => esc_html__( 'Timeline Label', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '2017'
            ]
        );

        $repeater->add_control(
            'timeline_date',
            [
                'label' => esc_html__( 'Timeline Date', 'bridge-core' ),
                'description' => esc_html__( 'Enter date in format dd/mm/yyyy.', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '23/02/2017'
            ]
        );

        $repeater->add_control(
            'content_image',
            [
                'label' => esc_html__( 'Content Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater );

        $this->add_control(
            'timeline_items',
            [
                'label' => esc_html__( 'Horizontal Timeline Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Horizontal Timeline Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['timeline_params'] = $this->getTimelineParams( $params );
        $params['holder_classes']  = $this->getHolderClasses( $params );
        $params['is_elementor'] = true;
        $params['thisObject'] = $this;

        echo bridge_core_get_shortcode_template_part('templates/horizontal-timeline-'.$params['position'].'-template', 'horizontal-timeline', '', $params);
    }

    protected function getHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = ! empty( $params['position'] ) ? 'qode-timeline-' . $params['position'] : 'qode-timeline-top';

        return implode( ' ', $holderClasses );
    }

    protected function getTimelineParams( $params ) {
        // Extract timeline labels
        $timeline_labels_array = array();
        $timeline_dates_array = array();

        foreach ($params['timeline_items'] as $timeline_item){
            $timeline_labels_array[] = $timeline_item['timeline_label'];
            $timeline_dates_array[] = $timeline_item['timeline_date'];
        }

        $timeline_params = array_combine($timeline_dates_array, $timeline_labels_array);
        return $timeline_params;
    }

    public function getItemHolderClasses( $params ) {
        $holderClasses = array();

        $holderClasses[] = ! empty($params['content_image']) ? 'qode-timeline-has-image' : 'qode-timeline-no-image';

        return implode( ' ', $holderClasses );
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorHorizontalTimeline() );