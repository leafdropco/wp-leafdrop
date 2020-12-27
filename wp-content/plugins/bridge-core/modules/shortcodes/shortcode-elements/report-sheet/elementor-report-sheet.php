<?php

class BridgeCoreElementorReportSheet extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_report_sheet';
    }

    public function get_title() {
        return esc_html__( 'Report Sheet', 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-report-sheet';
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
                'label' => esc_html__('Number of columns', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'one-column' => esc_html__('One', 'bridge-core'),
                    'two-columns' => esc_html__('Two', 'bridge-core'),
                    'three-columns' => esc_html__('Three', 'bridge-core'),
                    'four-columns' => esc_html__('Four', 'bridge-core'),
                    'five-columns' => esc_html__('Five', 'bridge-core'),
                ],
                'default' => 'one-column'
            ]
        );

        $this->add_control(
            'report_sheet_title',
            [
                'label' => esc_html__('Report Sheet Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
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
            'column_one_title',
            [
                'label' => esc_html__('Column One Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('one-column', 'two-columns', 'three-columns', 'four-columns', 'five-columns')
                ]
            ]
        );

        $this->add_control(
            'column_two_title',
            [
                'label' => esc_html__('Column Two Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('two-columns', 'three-columns', 'four-columns', 'five-columns')
                ]
            ]
        );

        $this->add_control(
            'column_three_title',
            [
                'label' => esc_html__('Column Three Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('three-columns', 'four-columns', 'five-columns')
                ]
            ]
        );

        $this->add_control(
            'column_four_title',
            [
                'label' => esc_html__('Column Four Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => array('four-columns', 'five-columns')
                ]
            ]
        );

        $this->add_control(
            'column_five_title',
            [
                'label' => esc_html__('Column Five Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'columns' => 'five-columns'
                ]
            ]
        );

        $this->add_control(
            'column_title_tag',
            [
                'label' => esc_html__('Columns Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h6'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'column_one_text',
            [
                'label' => esc_html__( 'Column One Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_one_sub_text',
            [
                'label' => esc_html__( 'Column One Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_two_text',
            [
                'label' => esc_html__( 'Column Two Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_two_sub_text',
            [
                'label' => esc_html__( 'Column Two Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_three_text',
            [
                'label' => esc_html__( 'Column Three Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_three_sub_text',
            [
                'label' => esc_html__( 'Column Three Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_four_text',
            [
                'label' => esc_html__( 'Column Four Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_four_sub_text',
            [
                'label' => esc_html__( 'Column Four Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_five_text',
            [
                'label' => esc_html__( 'Column Five Title', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'column_five_sub_text',
            [
                'label' => esc_html__( 'Column Five Subtitle', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'rows',
            [
                'label' => esc_html__( 'Report Sheet Rows', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls()
            ]
        );

        $this->add_control(
            'row_title_tag',
            [
                'label' => esc_html__("Row's title tag", 'bridge-core'),
                'description'	=> esc_html__("Define title tag for each Report Sheet row's title", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h4'
            ]
        );

        $this->add_control(
            'row_subtitle_tag',
            [
                'label' => esc_html__("Row's subtitle tag", 'bridge-core'),
                'description'	=> esc_html__("Define title tag for each Report Sheet row's subtitle", 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                    'p'  => 'p'
                ],
                'default' => 'p'
            ]
        );

        $this->add_control(
            'enable_button',
            [
                'label' => esc_html__( 'Enable Button', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no'   => esc_html__('No', 'bridge-core'),
                    'yes'   => esc_html__('Yes', 'bridge-core')
                ],
                'default' => 'no'
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__( 'Button Link', 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'enable_button' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/report-sheet-template', 'report-sheet', '', $params);
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorReportSheet() );