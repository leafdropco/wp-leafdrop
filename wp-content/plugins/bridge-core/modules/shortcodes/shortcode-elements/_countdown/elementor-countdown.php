<?php

class BridgeCoreElementorCountdown extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_countdown';
    }

    public function get_title() {
        return esc_html__( "Countdown", 'bridge-core' );
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-countdown';
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
            'year',
            [
                'label' => esc_html__( "Year", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "2014" => "2014",
                    "2015" => "2015",
                    "2016" => "2016",
                    "2017" => "2017",
                    "2018" => "2018",
                    "2019" => "2019",
                    "2020" => "2020",
                    "2021" => "2021",
                    "2022" => "2022",
                    "2023" => "2023",
                    "2024" => "2024"
                ]
            ]
        );

        $this->add_control(
            'month',
            [
                'label' => esc_html__( "Month", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "1" => esc_html__( 'January', 'bridge-core' ),
                    "2" => esc_html__( 'February', 'bridge-core' ),
                    "3" => esc_html__( 'March', 'bridge-core' ),
                    "4" => esc_html__( 'April', 'bridge-core' ),
                    "5" => esc_html__( 'May', 'bridge-core' ),
                    "6" => esc_html__( 'June', 'bridge-core' ),
                    "7" => esc_html__( 'July', 'bridge-core' ),
                    "8" => esc_html__( 'August', 'bridge-core' ),
                    "9" => esc_html__( 'September', 'bridge-core' ),
                    "10" => esc_html__( 'October', 'bridge-core' ),
                    "11" => esc_html__( 'November', 'bridge-core' ),
                    "12" => esc_html__( 'December', 'bridge-core' )
                ]
            ]
        );

        $this->add_control(
            'day',
            [
                'label' => esc_html__( "Day", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12",
                    "13" => "13",
                    "14" => "14",
                    "15" => "15",
                    "16" => "16",
                    "17" => "17",
                    "18" => "18",
                    "19" => "19",
                    "20" => "20",
                    "21" => "21",
                    "22" => "22",
                    "23" => "23",
                    "24" => "24",
                    "25" => "25",
                    "26" => "26",
                    "27" => "27",
                    "28" => "28",
                    "29" => "29",
                    "30" => "30",
                    "31" => "31",
                ]
            ]
        );

        $this->add_control(
            'hour',
            [
                'label' => esc_html__( "Hour", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "0" => "0",
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12",
                    "13" => "13",
                    "14" => "14",
                    "15" => "15",
                    "16" => "16",
                    "17" => "17",
                    "18" => "18",
                    "19" => "19",
                    "20" => "20",
                    "21" => "21",
                    "22" => "22",
                    "23" => "23",
                    "24" => "24"
                ]
            ]
        );

        $this->add_control(
            'minute',
            [
                'label' => esc_html__( "Minute", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    "" => "",
                    "0" => "0",
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12",
                    "13" => "13",
                    "14" => "14",
                    "15" => "15",
                    "16" => "16",
                    "17" => "17",
                    "18" => "18",
                    "19" => "19",
                    "20" => "20",
                    "21" => "21",
                    "22" => "22",
                    "23" => "23",
                    "24" => "24",
                    "25" => "25",
                    "26" => "26",
                    "27" => "27",
                    "28" => "28",
                    "29" => "29",
                    "30" => "30",
                    "31" => "31",
                    "32" => "32",
                    "33" => "33",
                    "34" => "34",
                    "35" => "35",
                    "36" => "36",
                    "37" => "37",
                    "38" => "38",
                    "39" => "39",
                    "40" => "40",
                    "41" => "41",
                    "42" => "42",
                    "43" => "43",
                    "44" => "44",
                    "45" => "45",
                    "46" => "46",
                    "47" => "47",
                    "48" => "48",
                    "49" => "49",
                    "50" => "50",
                    "51" => "51",
                    "52" => "52",
                    "53" => "53",
                    "54" => "54",
                    "55" => "55",
                    "56" => "56",
                    "57" => "57",
                    "58" => "58",
                    "59" => "59",
                    "60" => "60",
                ]
            ]
        );

        $this->add_control(
            'month_label',
            [
                'label' => esc_html__( "Month Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'day_label',
            [
                'label' => esc_html__( "Day Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'hour_label',
            [
                'label' => esc_html__( "Hour Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'minute_label',
            [
                'label' => esc_html__( "Minute Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'second_label',
            [
                'label' => esc_html__( "Second Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'month_singular_label',
            [
                'label' => esc_html__( "Month Singular Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'day_singular_label',
            [
                'label' => esc_html__( "Day Singular Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'hour_singular_label',
            [
                'label' => esc_html__( "Hour Singular Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'minute_singular_label',
            [
                'label' => esc_html__( "Minute Singular Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'second_singular_label',
            [
                'label' => esc_html__( "Second Singular Label", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'color',
            [
                'label' => esc_html__( "Color", 'bridge-core' ),
                "description" => esc_html__( "For digits, labels and separators", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'digit_font_size',
            [
                'label' => esc_html__( "Digit Font Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'label_font_size',
            [
                'label' => esc_html__( "Label Font Size (px)", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'font_weight',
            [
                'label' => esc_html__( "Font Weight", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                "description" => esc_html__( "For both digits and labels", 'bridge-core' ),
                'options' => bridge_qode_get_font_weight_array(true)
            ]
        );

        $this->add_control(
            'show_separator',
            [
                'label' => esc_html__( "Show separator", 'bridge-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                "description" => esc_html__( "For both digits and labels", 'bridge-core' ),
                'options' => [
                    'hide_separator' => esc_html__( 'No', 'bridge-core' ),
                    'show_separator' => esc_html__( 'Yes', 'bridge-core' ),
                ],
                'default' => 'hide_separator'
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        echo bridge_core_get_shortcode_template_part('templates/countdown', '_countdown', '', $params);
    }

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorCountdown() );