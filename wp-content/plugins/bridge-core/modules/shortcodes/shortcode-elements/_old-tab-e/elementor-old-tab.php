<?php

class BridgeCoreElementorOldTab extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_old_tab';
    }

    public function get_title() {
        return esc_html__( 'Old Tabs', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-old-tab';
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
            'extra_class',
            [
                'label' => esc_html__( "Extra class name", 'bridge-core' ),
                'description' => esc_html__( "Style particular content element differently - add a class name and refer to it in custom CSS.", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'style',
            [
                'label' => esc_html__( "Style", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'horizontal' => esc_html__('Horizontal Center', 'bridge-core'),
                    'horizontal_left' => esc_html__('Horizontal Left', 'bridge-core'),
                    'horizontal_right' => esc_html__('Horizontal Right', 'bridge-core'),
                    'boxed' => esc_html__('Boxed', 'bridge-core'),
                    'vertical_left' => esc_html__('Vertical Left', 'bridge-core'),
                    'vertical_right' => esc_html__('Vertical RIght', 'bridge-core'),
                ],
                'default' => 'horizontal'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core'),
                'description' => esc_html__('Enter title of tab.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Tab', 'bridge-core')
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__( 'Content', 'bridge-core'),
                'description' => esc_html__('Enter content of tab.', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::WYSIWYG
            ]
        );

        bridge_core_generate_elementor_templates_control( $repeater, array('content' => '') );

        $this->add_control(
            'tab_items',
            [
                'label' => esc_html__( 'Old Tab Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Old Tab Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();
        $params['holderClasses'] = $this->getHolderClasses( $params );

        foreach ( $params['tab_items'] as $key => $value ){
            $params['tab_items'][$key]['tab_id'] = 'tab-' . rand();
        }

        ?>

        <div class="<?php echo esc_attr( $params['holderClasses'] ); ?>">
            <ul class="tabs-nav">
                <?php foreach ( $params['tab_items'] as $tab_items ) {
                    if( empty( $tab_items['content'] ) ){
                        $tab_items['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tab_items['template_id'] );
                    };
                    echo bridge_core_get_shortcode_template_part('templates/old-tab-nav-item', '_old-tab-e', '', $tab_items);
                } ?>
            </ul>
            <div class="tabs-container">
                <?php foreach ( $params['tab_items'] as $tab_items ) {
                    if( empty( $tab_items['content'] ) ){
                        $tab_items['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tab_items['template_id'] );
                    };
                    echo bridge_core_get_shortcode_template_part('templates/old-tab-content-item', '_old-tab-e', '', $tab_items);
                } ?>
            </div>
        </div>

        <?php
    }

    protected function getHolderClasses( $params ){
        $classes = array(
            'q_tabs'
        );

        if( ! empty( $params['extra_class'] ) ){
            $classes[] = $params['extra_class'];
        }

        switch( $params['style'] ) {
            case 'boxed':
                $classes[] = 'boxed';
                break;
            case 'vertical_left':
                $classes[] = 'vertical left';
                break;
            case 'vertical_right':
                $classes[] = 'vertical right';
                break;
            case 'horizontal':
                $classes[] = 'horizontal center';
                break;
            case 'horizontal_left':
                $classes[] = 'horizontal left';
                break;
            case 'horizontal_right':
                $classes[] = 'horizontal right';
                break;
        }

        return implode(' ', $classes);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorOldTab() );