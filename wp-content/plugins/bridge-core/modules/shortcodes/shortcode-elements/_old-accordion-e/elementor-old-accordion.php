<?php

class BridgeCoreElementorOldAccordion extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_old_accordion';
    }

    public function get_title() {
        return esc_html__( 'Old Accordion', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-old-accordion';
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
            'active_tab',
            [
                'label' => esc_html__( "Active Section", 'bridge-core' ),
                'description' => esc_html__('Enter section number to be active on load or enter "false" to collapse all sections.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1'
            ]
        );

        $this->add_control(
            'collapsible',
            [
                'label' => esc_html__( "Allow collapse all sections?", 'bridge-core' ),
                'description' => esc_html__( "If checked, it is allowed to collapse all sections.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER
            ]
        );

        $this->add_control(
            'extra_class',
            [
                'label' => esc_html__( "Extra class name", 'bridge-core' ),
                'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => esc_html__( "Style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'accordion' => esc_html__( "Accordion", 'bridge-core' ),
                    'toggle' => esc_html__( "Toggle", 'bridge-core' ),
                    'boxed_accordion' => esc_html__( "Accordion Boxed", 'bridge-core' ),
                    'boxed_toggle' => esc_html__( "Toggle Boxed", 'bridge-core' ),
                ],
                'default' => 'accordion'
            ]
        );

        $this->add_control(
            'mark_border_radius',
            [
                'label' => esc_html__( "Accordion Mark Border Radius", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => array('accordion', 'toggle')
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core'),
                'description' => esc_html__('Enter accordion section title.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Section', 'bridge-core')
            ]
        );

        $repeater->add_control(
            'el_id',
            [
                'label' => esc_html__( 'Section ID', 'bridge-core'),
                'description' => esc_html__('Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: link (Must not have spaces)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(false),
                'default' => 'h5'
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater, array('content' => '') );

        $this->add_control(
            'accordion_items',
            [
                'label' => esc_html__( 'Old Accordion Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Old Accordion Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holderClasses'] = $this->getHolderClasses( $params );
        $params['holderData'] = $this->getHolderData( $params ); ?>

        <div class="<?php echo esc_attr( $params['holderClasses'] ); ?>" <?php echo bridge_qode_get_inline_attrs( $params['holderData'] ); ?>>

            <?php foreach ( $params['accordion_items'] as $accordion_item ) {
                if( empty( $accordion_item['content'] ) ){
                    $accordion_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $accordion_item['template_id'] );
                };
                echo bridge_core_get_shortcode_template_part('templates/old-accordion-item', '_old-accordion-e', '', $accordion_item);
            } ?>

        </div>

        <?php
    }

    protected function getHolderClasses( $params ){
        $classes = array(
            'q_accordion_holder',
            'wpb_content_element',
            'not-column-inherit',
            'clearfix',
        );

        switch($params['type']) {
            case "toggle":
                $classes[] = "toggle without_icon";
                break;
            case "accordion_with_icon":
                $classes[] = "accordion with_icon";
                break;
            case "toggle_with_icon":
                $classes[] = "toggle with_icon";
                break;
            case "boxed_accordion":
                $classes[] = "accordion boxed";
                break;
            case "boxed_toggle":
                $classes[] = "toggle boxed";
                break;
            default:
                $classes[] = "accordion without_icon";
        }

        return implode(' ', $classes);
    }

    protected function getHolderData( $params ){
        $data = array();

        if ( ! empty( $params['active_tab'] ) ) {
            $data['data-active-tab'] = $params['active_tab'];
        }

        if ( ! empty( $params['collapsible'] ) ) {
            $data['data-collapsible'] = $params['collapsible'];
        }

        if ( ! empty( $params['mark_border_radius'] ) ) {
            $data['data-border-radius'] = $params['mark_border_radius'];
        }

        return $data;
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorOldAccordion() );