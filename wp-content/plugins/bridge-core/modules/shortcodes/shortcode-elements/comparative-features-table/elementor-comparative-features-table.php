<?php

class BridgeCoreElementorComarativeFeaturesTable extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_comarative_features_table';
    }

    public function get_title() {
        return esc_html__('Comparative Features Table', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-comparative-features-table';
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
            'columns',
            [
                'label' => esc_html__('Columns', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one-column' => esc_html__('One', 'bridge-core'),
                    'two-columns' => esc_html__('Two', 'bridge-core'),
                    'three-columns' => esc_html__('Three', 'bridge-core')
                ],
                'default' => 'one-column'
            ]
        );

        $this->add_control(
            'table_title',
            [
                'label' => esc_html__('Table Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h5'
            ]
        );

        $this->add_control(
            'feature_title_tag',
            [
                'label' => esc_html__('Feature Title Tag', 'bridge-core'),
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
                'default' => 'h6'
            ]
        );

        $this->add_control(
            'column_one_title',
            [
                'label' => esc_html__('Column One Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('one-column', 'two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_two_title',
            [
                'label' => esc_html__('Column Two Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_three_title',
            [
                'label' => esc_html__('Column Three Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('three-columns')
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'feature_title',
            [
                'label' => esc_html__( 'Feature Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_one_active',
            [
                'label' => esc_html__( 'Column One Active', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_two_active',
            [
                'label' => esc_html__( 'Column Two Active', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_three_active',
            [
                'label' => esc_html__( 'Column Three Active', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__( 'No', 'bridge-core' ),
                    'yes' => esc_html__( 'Yes', 'bridge-core' )
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => esc_html__( 'Features', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_control(
            'column_one_link',
            [
                'label' => esc_html__('Column One Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('one-column', 'two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_one_link_target',
            [
                'label' => esc_html__('Column One Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' => esc_html__('Blank', 'bridge-core'),
                ],
                'condition' => [
                    'columns' => array('one-column', 'two-columns', 'three-columns')
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'column_one_link_text',
            [
                'label' => esc_html__('Column One Link Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('one-column', 'two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_two_link',
            [
                'label' => esc_html__('Column Two Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_two_link_target',
            [
                'label' => esc_html__('Column Two Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' => esc_html__('Blank', 'bridge-core'),
                ],
                'condition' => [
                    'columns' => array('two-columns', 'three-columns')
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'column_two_link_text',
            [
                'label' => esc_html__('Column Two Link Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('two-columns', 'three-columns')
                ]
            ]
        );

        $this->add_control(
            'column_three_link',
            [
                'label' => esc_html__('Column Three Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => 'three-columns'
                ]
            ]
        );

        $this->add_control(
            'column_three_link_target',
            [
                'label' => esc_html__('Column Three Link Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '_self' => esc_html__('Self', 'bridge-core'),
                    '_blank' => esc_html__('Blank', 'bridge-core'),
                ],
                'condition' => [
                    'columns' => 'three-columns'
                ],
                'default' => '_self'
            ]
        );

        $this->add_control(
            'column_three_link_text',
            [
                'label' => esc_html__('Column Three Link Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => 'three-columns'
                ]
            ]
        );

        $this->add_control(
            'table_footer_image',
            [
                'label' => esc_html__('Table Footer Image', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'table_footer_text',
            [
                'label' => esc_html__('Table Footer Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        if( ! empty( $params['table_footer_image'] ) ){
            $params['table_footer_image'] = $params['table_footer_image']['id'];
        }

        echo bridge_core_get_shortcode_template_part('templates/comparative-features-table-template', 'comparative-features-table', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorComarativeFeaturesTable() );