<?php

class BridgeCoreElementorCircles extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_circles';
    }

    public function get_title() {
        return esc_html__( 'Qode Process', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-circles';
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
                    'three_columns' => esc_html__('Three', 'bridge-core'),
                    'four_columns' => esc_html__('Four', 'bridge-core'),
                    'five_columns' => esc_html__('Five', 'bridge-core'),
                ],
                'default' => 'four_columns'
            ]
        );

        $this->add_control(
            'circle_line',
            [
                'label' => esc_html__( 'Line between Process', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no_line' => esc_html__('No', 'bridge-core'),
                    'with_line' => esc_html__('Yes', 'bridge-core')
                ],
                'default' => 'no_line'
            ]
        );

        $this->add_control(
            'line_color',
            [
                'label' => esc_html__( 'Line Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'circle_line' => 'with_line'
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'type',
            [
                'label' => esc_html__( 'Type', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'icon_type' => esc_html__('Icon in Process', 'bridge-core'),
                    'image_type' => esc_html__('Image', 'bridge-core'),
                    'text_type' => esc_html__('Text in Process', 'bridge-core'),
                ],
                'default' => 'icon_type'
            ]
        );

        $repeater->add_control(
            'background_color',
            [
                'label' => esc_html__( 'Background Process Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'background_transparency',
            [
                'label' => esc_html__( 'Background Process Transparency', 'bridge-core'),
                'description' => esc_html__( 'Insert value between 0 and 1', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Process Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $repeater->add_control(
            'border_width',
            [
                'label' => esc_html__( 'Border Process Width', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
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
                'options' => $icons,
                'condition' => [
                    'type' => 'icon_type'
                ]
            ]
        );

        $repeater->add_control(
            'size',
            [
                'label' => esc_html__( 'Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'fa-lg' => esc_html__('Tiny', 'bridge-core'),
                    'fa-2x' => esc_html__('Small', 'bridge-core'),
                    'fa-3x' => esc_html__('Normal', 'bridge-core'),
                    'fa-4x' => esc_html__('Large', 'bridge-core'),
                    'fa-5x' => esc_html__('Very Large', 'bridge-core'),
                ],
                'condition' => [
                    'type' => 'icon_type'
                ],
                'default' => 'fa-3x'
            ]
        );

        $repeater->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'type' => 'icon_type'
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__( 'Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'type' => 'image_type'
                ],
            ]
        );

        $repeater->add_control(
            'text_in_circle',
            [
                'label' => esc_html__( 'Text in Process', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'type' => 'text_type'
                ],
            ]
        );

        $repeater->add_control(
            'text_in_circle_tag',
            [
                'label' => esc_html__( 'Text in Process Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'condition' => [
                    'text_in_circle!' => ''
                ],
                'default' => 'h3'
            ]
        );

        $repeater->add_control(
            'font_size',
            [
                'label' => esc_html__( 'Text in Process Size (px)', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'text_in_circle!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'text_in_circle_color',
            [
                'label' => esc_html__( 'Text in Process Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'text_in_circle!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'text_in_circle_font_weight',
            [
                'label' => esc_html__( 'Text in Process Font Weight', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_font_weight_array(true),
                'condition' => [
                    'text_in_circle!' => ''
                ],
                'default' => '400'
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'link_target',
            [
                'label' => esc_html__( 'Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_link_target_array(true),
                'default' => '_self',
                'condition' => [
                    'link!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $repeater->add_control(
            'title_tag',
            [
                'label' => esc_html__( 'Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => bridge_qode_get_title_tag(true),
                'condition' => [
                    'title!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'title!' => ''
                ]
            ]
        );

        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA
            ]
        );

        $repeater->add_control(
            'text_color',
            [
                'label' => esc_html__( 'Text Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'text!' => ''
                ]
            ]
        );

        $this->add_control(
            'circles',
            [
                'label' => esc_html__( 'Process Items', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => esc_html__('Process Item'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $styles = array();

        if(!empty($params['line_color'])) {
            $styles[] = "border-color: ".$params['line_color'].";";
        }
        ?>

        <ul class="q_circles_holder <?php echo esc_attr( $params['columns'] ); ?> <?php echo esc_attr( $params['circle_line'] ) ?>" <?php echo bridge_qode_get_inline_style(implode(';',$styles)); ?>>

            <?php

            foreach ($params['circles'] as $circle){
                $args = array(
                    "type"                          => "",
                    "background_color"              => "",
                    "background_transparency"       => "",
                    "border_color"                  => "",
                    "border_width"                  => "",
                    "icon"                          => "",
                    "size"                          => "fa-3x",
                    "icon_color"                    => "",
                    "image"                         => "",
                    "text_in_circle"                => "",
                    "text_in_circle_tag"            => "h3",
                    "font_size"                     => "",
                    "text_in_circle_color"          => "",
                    "text_in_circle_font_weight"    => "",
                    "link"                          => "",
                    "link_target"                   => "_self",
                    "title"                         => "",
                    "title_tag"                     => "h3",
                    "title_color"                   => "",
                    "text"                          => "",
                    "text_color"                    => ""
                );
                $circle['args'] = $args;

                if( ! empty( $circle['image'] ) ){
                    $circle['image'] = $circle['image']['id'];
                }

                echo bridge_core_get_shortcode_template_part('templates/circle', '_circles', '', $circle);
            }

            ?>

        </ul>

        <?php

    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCircles() );