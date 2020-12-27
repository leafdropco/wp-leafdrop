<?php

class BridgeCoreElementorPricingList extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_pricing_list';
    }

    public function get_title() {
        return esc_html__( 'Qode Pricing List', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-pricing-list';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core'),
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
            'title_font_size',
            [
                'label' => esc_html__( 'Title Font Size (px)', 'bridge-core'),
                "description" => esc_html__( 'Enter just number. Omit unit, it is added automatically', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'default' => 'h4',
                'condition' => [
                    'title!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'text_font_size',
            [
                'label' => esc_html__( 'Text Font Size (px)', 'bridge-core'),
                "description" => esc_html__( 'Enter just number. Omit unit, it is added automatically', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'bridge-core'),
                "description" => esc_html__( 'You can append any unit that you want', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0'
            ]
        );

        $repeater->add_control(
            'price_color',
            [
                'label' => esc_html__( 'Price Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'price_font_size',
            [
                'label' => esc_html__( 'Price Font Size (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                "description" => esc_html__( 'Enter just number. Omit unit, it is added automatically', 'bridge-core')
            ]
        );

        $this->add_control(
            'pricing_list_items',
            [
                'label' => esc_html__( 'Pricing List Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Pricing List Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        ?>

        <div class="qode_pricing_list">
            <ul class="qode_pricing_list_holder">
                <?php

                    foreach( $params['pricing_list_items'] as $pricing_list_item ){
                        echo bridge_core_get_shortcode_template_part('templates/pricing-list-item', '_pricing-list', '', $pricing_list_item);
                    }

                ?>
            </ul> <!-- close ul.qode_pricing_list_holder -->
        </div> <!-- close div.qode_pricing_list -->

        <?php

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorPricingList() );