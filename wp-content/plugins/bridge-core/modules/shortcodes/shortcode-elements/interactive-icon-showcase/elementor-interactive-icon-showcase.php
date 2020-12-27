<?php

class BridgeCoreElementorInteractiveIconShowcase extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_interactive_icon_showcase';
    }

    public function get_title() {
        return esc_html__('Interactive Icon Showcase', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-interactive-icon-showcase';
    }

    public function get_categories() {
        return [ 'qode' ];
    }

    protected function _register_controls(){
        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'yes' => esc_html__( 'Yes', 'bridge-core' ),
                    'no' => esc_html__( 'No', 'bridge-core' )
                ],
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'autoplay_interval',
            [
                'label' => esc_html__( 'Autoplay Interval (ms)', 'bridge-core' ),
                'description'	=> 'Default value is 3000.',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '3000',
                'condition' => [
                    'autoplay' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border width', 'bridge-core'),
                'description' => esc_html__('Set width of the border in px, omit px', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'border_style',
            [
                'label' => esc_html__('Border style', 'bridge-core'),
                'description'	=> esc_html__('Set style of the border', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''	=> '',
                    'solid' => esc_html__('Solid', 'bridge-core'),
                    'dotted' => esc_html__('Dotted', 'bridge-core'),
                    'dashed' => esc_html__('Dashed', 'bridge-core')
                ]
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border color', 'bridge-core'),
                'description' => esc_html__('Set color of the border', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater = new \Elementor\Repeater();

        bridge_qode_icon_collections()->getElementorParamsArray($repeater, '', '', true);

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h3',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'inactive_background_color',
            [
                'label' => esc_html__( 'Inactive Background Color', 'bridge-core' ),
                'description' => esc_html__( 'Set background color of inactive Interactive Icon', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'interactive_items',
            [
                'label' => esc_html__( 'Interactive Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $icon_showcase_classes = array();
        $icon_showcase_classes[] = 'qode-int-icon-showcase';
        if ($params['autoplay'] == 'yes') {
            $icon_showcase_classes[] = 'qode-autoplay';
        }
        $icon_showcase_class = implode(' ', $icon_showcase_classes);

        $data_attr = $this->getDataAttr($params);
        $holder_style = $this->getHolderStyle($params);

        ?>

        <div <?php echo bridge_qode_get_class_attribute($icon_showcase_class); ?> <?php echo bridge_qode_get_inline_attrs($data_attr); ?>" >
            <div class="qode-int-icon-showcase-inner">
                <?php

                    foreach ( $params['interactive_items'] as $interactive_item ){
                        $interactive_item['style'] = $this->getStyles($interactive_item);
                        $interactive_item['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $interactive_item );

                        echo bridge_core_get_shortcode_template_part('templates/interactive-icon-showcase-item-template', 'interactive-icon-showcase', '', $interactive_item);
                    }

                ?>
            </div>
            <div class="qode-int-icon-circle" <?php echo bridge_qode_get_inline_style($holder_style); ?>></div>
        </div>

        <?php
    }

    private function getDataAttr($params) {
        $data_attr = array();

        if(!empty($params['autoplay_interval'])) {
            $data_attr['data-interval'] = $params['autoplay_interval'];
        }

        return $data_attr;
    }

    private function getHolderStyle($params){
        $style = array();

        if(!empty($params['border_width'])){
            $style[] = 'border-width: '.$params['border_width'].'px';
        }

        if(!empty($params['border_style'])){
            $style[] = 'border-style: '.$params['border_style'];
        }

        if(!empty($params['border_color'])){
            $style[] = 'border-color: '.$params['border_color'];
        }

        return $style;
    }

    private function getStyles($params){
        $style = array();

        if(!empty($params['inactive_background_color'])){
            $style[] = 'background-color: ' . $params['inactive_background_color'];
        }

        return $style;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInteractiveIconShowcase() );