<?php

class BridgeCoreElementorInteractiveLinks extends \Elementor\Widget_Base{
    public function get_name() {
        return 'qode_interactive_links';
    }

    public function get_title() {
        return esc_html__( "Interactive Links", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-interactive-links';
    }

    public function get_categories() {
        return [ 'select' ];
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
                'label' => esc_html__( 'Layout', 'bridge-core' ),
                'description' => esc_html__( 'Choose desired layout', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'links-below' => esc_html__('Links below', 'bridge-core'),
                    'links-aside' => esc_html__('Links aside', 'bridge-core'),
                ],
                'default' => 'links-below'
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core' ),
                'description' => esc_html__( 'Choose title tag for titles', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'default' => 'h3'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__( 'Item Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__( 'Item Image', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'item_link',
            [
                'label' => esc_html__( 'Item Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'item_link_target',
            [
                'label' => esc_html__( 'Item Link Target', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'default' => '_blank'
            ]
        );

        $this->add_control(
            'interactive_links',
            [
                'label' => esc_html__( 'Interactive Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( is_array( $params['interactive_links'] ) && count( $params['interactive_links'] ) ){
            foreach ( $params['interactive_links'] as $key => $value ){
                $params['interactive_links'][$key]['item_image'] = $params['interactive_links'][$key]['item_image']['id'];
            }
        }

        $params['holder_classes'] = $this->getHolderClasses($params);

        echo bridge_core_get_shortcode_template_part('templates/interactive-links-' . $params['type'], 'interactive-links', '', $params);
    }

    private function getHolderClasses($params) {
        $classes = array(
            'qode-interactive-links'
        );

        if (!empty($params['type'])) {
            $classes[] = 'qode-il-' . $params['type'];
        }

        return implode(' ', $classes);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInteractiveLinks() );