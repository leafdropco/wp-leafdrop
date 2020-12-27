<?php

class BridgeCoreElementorNumberedProcess extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_numbered_process';
    }

    public function get_title() {
        return esc_html__( 'Numbered Process', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-numbered-process';
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
            'number_of_items',
            [
                'label' => esc_html__('Number of Process Items', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "three" => esc_html__("Three", 'bridge-core'),
                    "four" => esc_html__("Four", 'bridge-core'),
                    "five" => esc_html__("Five", 'bridge-core'),
                ],
                'default' => 'three'
            ]
        );

        $this->add_control(
            'padding_between',
            [
                'label' => esc_html__('Space Between Process Items', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core'),
                    "small" => esc_html__("Small", 'bridge-core'),
                    "medium" => esc_html__("Medium", 'bridge-core'),
                    "large" => esc_html__("Large", 'bridge-core'),
                ],
                'default' => ''
            ]
        );

        $this->add_control(
            'line_style',
            [
                'label' => esc_html__('Line Between Process Items', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "solid" => esc_html__("Default", 'bridge-core'),
                    "dashed" => esc_html__("Small", 'bridge-core'),
                    "none" => esc_html__("Medium", 'bridge-core'),
                ],
                'default' => 'solid'
            ]
        );

        $this->add_control(
            'line_skin',
            [
                'label' => esc_html__('Line Skin', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => esc_html__("Default", 'bridge-core'),
                    "light" => esc_html__("Light", 'bridge-core'),
                    "dark" => esc_html__("Dark", 'bridge-core'),
                ],
                'default' => '',
                'condition' => [
                    'line_style' => array('solid','dashed')
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'number',
            [
                'label' => esc_html__('Number', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'p'	 => 'p',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h4',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'number_background_color',
            [
                'label' => esc_html__('Number Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_position',
            [
                'label' => esc_html__('Title Position', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'on-image'   => esc_html__('On Image', 'bridge-core'),
                    'under-image'	 => esc_html__('Under Image', 'bridge-core'),
                ],
                'default' => 'on-image',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'border_width',
            [
                'label' => esc_html__('Border Width (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );


        $this->add_control(
            'numbered_process_items',
            [
                'label' => esc_html__( 'Numbered Process Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['holder_classes'] = $this->getHolderClasses($params);

        ?>

        <div <?php bridge_qode_class_attribute($params['holder_classes']); ?>>
            <div class="qode-numbered-process-inner">
                <?php
                    foreach ( $params['numbered_process_items'] as $numbered_process_item ){
                        $numbered_process_item['image_src'] = $this->getImageSrc($numbered_process_item);
                        $numbered_process_item['number_style'] = $this->getNumberStyle($numbered_process_item);
                        $numbered_process_item['title_style'] = $this->getTitleStyle($numbered_process_item);
                        $numbered_process_item['border_style'] = $this->getBorderStyle($numbered_process_item);

                        echo bridge_core_get_shortcode_template_part('templates/numbered-process-item-template', 'numbered-process', '', $numbered_process_item);
                    }
                ?>
            </div>
        </div>

        <?php

    }

    private function getHolderClasses($params){
        $holder_classes = array();
        $holder_classes[] = 'qode-numbered-process-holder';

        if ($params['number_of_items'] !== ''){
            $holder_classes[] = 'qode-numbered-process-holder-items-'.$params['number_of_items'];
        }

        if ($params['padding_between'] !== ''){
            $holder_classes[] = 'qodef-np-padding-'.$params['padding_between'];
        }
        else{
            switch ($params['number_of_items']) {
                case 'five':
                    $holder_classes[] = 'qodef-np-padding-small';
                    break;
                default:
                    $holder_classes[] = 'qodef-np-padding-medium';
                    break;
            }
        }

        if ($params['line_style'] !== 'none'){
            $holder_classes[] = 'qode-np-line-'.$params['line_style'];

            if ($params['line_skin'] !== ''){
                $holder_classes[] = 'qode-np-line-skin-'.$params['line_skin'];
            }
        }

        return implode(' ', $holder_classes);
    }

    private function getNumberStyle($params){
        $number_style = array();

        if ($params['number_color'] !== ''){
            $number_style[] = 'color: '.$params['number_color'];
        }

        if ($params['number_background_color'] !== ''){
            $number_style[] = 'background-color: '.$params['number_background_color'];
        }

        return implode('; ', $number_style);
    }

    private function getTitleStyle($params){
        $title_style = array();

        if ($params['title_color'] !== ''){
            $title_style[] = 'color: '.$params['title_color'];
        }

        return implode('; ', $title_style);
    }

    private function getBorderStyle($params){
        $border_style = array();

        if ($params['border_color'] !== ''){
            $border_style[] = 'border-color: '.$params['border_color'];
        }

        if ($params['border_width'] !== ''){
            $border_style[] = 'border-width: '.bridge_qode_filter_px($params['border_width']).'px';
        }

        return implode('; ', $border_style);
    }

    private function getImageSrc($params) {
        $image_src = '';

        if( ! empty( $params['image'] ) ){
            $image_src = $params['image']['url'];
        }

        return $image_src;

    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorNumberedProcess() );