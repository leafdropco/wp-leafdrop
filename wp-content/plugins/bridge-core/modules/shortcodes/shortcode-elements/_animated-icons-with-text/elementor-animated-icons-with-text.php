<?php

class BridgeCoreElementorAnimatedIconsWithText extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_animated_icons_with_text';
    }

    public function get_title() {
        return esc_html__( 'Animated icons with text', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-animated-icons-with-text';
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
            'columns',
            [
                'label' => esc_html__( 'Columns', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'two_columns' => esc_html__('Two', 'bridge-core'),
                    'three_columns' => esc_html__('Three', 'bridge-core'),
                    'four_columns' => esc_html__('Four', 'bridge-core'),
                    'five_columns' => esc_html__('Five', 'bridge-core'),
                ],
                'default' => 'three_columns'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( "Title", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( "Title Tag", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'default' => 'h5'
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( "Text", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );

        $qodeIconCollections = bridge_qode_return_icon_collections();
        $collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( "Icon", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $icons
            ]
        );

        $repeater->add_control(
            'size',
            [
                'label' => esc_html__( "Icon size", 'bridge-core'),
                "description" => esc_html__( "Put number in px, ex.25", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__( "Icon Color", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'icon_background_color',
            [
                'label' => esc_html__( "Icon background Color", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'border_color',
            [
                'label' => esc_html__( "Border Color", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__( "Icon Color on hover", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'icon_background_color_hover',
            [
                'label' => esc_html__( "Icon background Color On Hover", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'border_color_hover',
            [
                'label' => esc_html__( "Border Color On Hover", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'enable_link',
            [
                'label' => esc_html__('Enable link','bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_yes_no_select_array(false, false),
                'default' => 'no'
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link','bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_link' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'target',
            [
                'label' => esc_html__('Target','bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(false),
                'default' => '_blank',
                'condition' => [
                    'enable_link' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'animated_icons',
            [
                'label' => esc_html__( 'Animated Icons With Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Animated Icon With Text'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

        <div class="animated_icons_with_text clearfix <?php echo esc_attr( $params['columns'] ); ?>">

            <?php

            foreach ($params['animated_icons'] as $animated_icon){
                echo bridge_core_get_shortcode_template_part('templates/animated-icon-with-text', '_animated-icons-with-text', '', $animated_icon);
            }

            ?>

        </div>

        <?php

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorAnimatedIconsWithText() );