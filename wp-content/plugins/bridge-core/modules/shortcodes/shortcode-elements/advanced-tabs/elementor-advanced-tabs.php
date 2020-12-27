<?php

class BridgeCoreElementorTabs extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_tabs';
    }

    public function get_title() {
        return esc_html__( 'Qode Advanced Tabs', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-tabs';
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
            'title_layout',
            [
                'label' => esc_html__('Title Layout', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'without_icon' => esc_html__('Without Icon', 'bridge-core'),
                    'with_icon' => esc_html__('With Icon', 'bridge-core'),
                    'only_icon' => esc_html__('Only Icon', 'bridge-core'),
                ],
                'default' => 'without_icon'
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(false, false),
                'default' => 'h6'
            ]
        );

        $repeater = new \Elementor\Repeater();

        bridge_qode_icon_collections()->getElementorParamsArray( $repeater, '', '', false );

        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
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

        bridge_core_generate_elementor_templates_control( $repeater , array('content' => '') );

        $this->add_control(
            'tab_items',
            [
                'label' => esc_html__( 'Tab Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Tab Item'),
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['tabs_titles'] = $this->getTabTitles($params);
        $params['tab_class'] = $this->getTabClass($params);
        $params['tab_class'] .= ' qode-advanced-tabs-column-' . count($params['tabs_titles']);
        $params['icons_in_title'] = $this->iconsInTitle($params);

        $params['is_elementor'] = true;

        echo bridge_core_get_shortcode_template_part('templates/advanced-tabs-template', 'advanced-tabs', '', $params);

    }

    protected function getTabClass($params){

        $tabTitleLayout = $params['title_layout'];

        $tabClass = array('qode-advanced-tabs', 'qode-advanced-horizontal-tab', 'clearfix');

        switch ($tabTitleLayout) {
            case 'with_icon':
                $tabClass[] = 'qode-advanced-tab-with-icon';
                break;
            case 'only_icon':
                $tabClass[] = 'qode-advanced-tab-only-icon';
                break;
            default :
                $tabClass[] = 'qode-advanced-tab-without-icon';
                break;
        }

        return implode(' ', $tabClass);
    }

    protected function getTabTitles( $params ){
        $titles_array = array();

        foreach ( $params['tab_items'] as $tab_item ){
            $titles_array[] = $tab_item['tab_title'];
        }

        return $titles_array;
    }


    protected function iconsInTitle($params){

        $tabTitleLayout = $params['title_layout'];

        switch ($tabTitleLayout) {
            case 'with_icon':
                return true;
                break;
            case 'only_icon':
                return true;
                break;
            default :
                return false;
        }
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorTabs() );