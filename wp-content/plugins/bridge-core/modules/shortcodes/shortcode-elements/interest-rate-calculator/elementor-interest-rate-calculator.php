<?php

class BridgeCoreElementorInterestRateCalculator extends \Elementor\Widget_Base{
    public function get_name() {
        return 'bridge_interest_rate_calculator';
    }

    public function get_title() {
        return esc_html__('Interest Rate Calculator', 'bridge-core');
    }

    public function get_icon() {
        return 'bridge-elementor-custom-icon bridge-elementor-interest-rate-calculator';
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
            'irt_title',
            [
                'label' => esc_html__('Interest Rate Title', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'irt_title_tag',
            [
                'label' => esc_html__('Interest Rate Title Tag', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''   => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ],
                'default' => 'h3'
            ]
        );

        $this->add_control(
            'irt_rate',
            [
                'label' => esc_html__('Interest Rate', 'bridge-core'),
                'description'	=> esc_html__('Insert interest rate in percents', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'irt_loan_min_value',
            [
                'label' => esc_html__('Loan Minimum Value', 'bridge-core'),
                'description'	=> esc_html__('Please insert minimum value for the loan slider', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1'
            ]
        );

        $this->add_control(
            'irt_loan_max_value',
            [
                'label' => esc_html__('Loan Maximum Value', 'bridge-core'),
                'description'	=> esc_html__('Please insert maximum value for the loan slider', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1000'
            ]
        );

        $this->add_control(
            'irt_loan_step',
            [
                'label' => esc_html__('Loan Slider Step', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1'
            ]
        );

        $this->add_control(
            'irt_loan_min_period',
            [
                'label' => esc_html__('Minimum Loan Period', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description'	=> esc_html__('Please insert minimum value for the period slider, other than 0', 'bridge-core'),
                'default' => '1'
            ]
        );

        $this->add_control(
            'irt_loan_max_period',
            [
                'label' => esc_html__('Maximum Loan Period', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'description'	=> esc_html__('Please insert maximum value for the period slider', 'bridge-core'),
                'default' => '12'
            ]
        );

        $this->add_control(
            'irt_period_step',
            [
                'label' => esc_html__('Period Slider Step', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '1'
            ]
        );

        $this->add_control(
            'irt_currency',
            [
                'label' => esc_html__('Currency', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'irt_period_label',
            [
                'label' => esc_html__('Period label', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'irt_button',
            [
                'label' => esc_html__('Enable Button', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'no' => esc_html__('No', 'bridge-core'),
                    'yes' => esc_html__('Yes', 'bridge-core')
                ]
            ]
        );

        $this->add_control(
            'irt_button_text',
            [
                'label' => esc_html__('Button Text', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'irt_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'irt_button_link',
            [
                'label' => esc_html__('Button Link', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'irt_button' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'irt_button_target',
            [
                'label' => esc_html__('Button Target', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''		=> '',
                    '_blank' => esc_html__( 'Blank', 'bridge-core'),
                    '_self' => esc_html__( 'Self', 'bridge-core')
                ],
                'condition' => [
                    'irt_button' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__( 'Style', 'bridge-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'irt_background_color',
            [
                'label' => esc_html__('Background Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'irt_active_color',
            [
                'label' => esc_html__('Active Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description'	=> esc_html__('Choose color of the current value, current period and sliders', 'bridge-core')
            ]
        );

        $this->add_control(
            'irt_values_color',
            [
                'label' => esc_html__('Loan and Period Values Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'description'	=> esc_html__('Choose color of the current value, current period and sliders', 'bridge-core')
            ]
        );

        $this->add_control(
            'irt_values_font',
            [
                'label' => esc_html__('Loan and Period Values Font Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'irt_labels_color',
            [
                'label' => esc_html__('Labels Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'irt_labels_font',
            [
                'label' => esc_html__('Labels Font Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->add_control(
            'irt_labels_border_color',
            [
                'label' => esc_html__('Labels Separator Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'irt_results_color',
            [
                'label' => esc_html__('Results Color', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'irt_results_font',
            [
                'label' => esc_html__('Results Font Size', 'bridge-core'),
                'type' => \Elementor\Controls_Manager::TEXT
            ]
        );

        $this->end_controls_section();
    }

    protected function render(){
        $params = $this->get_settings_for_display();

        $params['irc_data'] = $this->getIrcDataAttr($params);
        $params['irc_active_color'] = $this->getIrcActiveColor($params);
        $params['irc_active_slider'] = $this->getIrcActiveSlider($params);
        $params['irt_background_color'] = $this->getIrcBackgroundStyle($params);
        $params['irc_values_style'] = $this->getIrcValuesStyle($params);
        $params['irc_labels_style'] = $this->getIrcLabelsStyle($params);
        $params['irc_labels_border_style'] = $this->getIrcLabelsBorderStyle($params);
        $params['irc_results_style'] = $this->getIrcResultsStyle($params);

        echo bridge_core_get_shortcode_template_part('templates/interest-rate-calculator-template', 'interest-rate-calculator', '', $params);
    }

    private function getIrcDataAttr($params){
        $data = array();

        if(!empty($params['irt_rate'])) {
            $data['data-rate'] = $params['irt_rate'];
        }

        if(!empty($params['irt_active_color'])){
            $data['data-active-color'] = $params['irt_active_color'];
        }

        return $data;
    }

    private function getIrcActiveColor($params){
        $styles = array();

        if(!empty($params['irt_active_color'])){
            $styles[] = 'color: '.$params['irt_active_color'];
        }

        return $styles;
    }

    private function getIrcActiveSlider($params){
        $styles = array();

        if(!empty($params['irt_active_color'])){
            $styles[] = 'background-color: '.$params['irt_active_color'];
        }

        return $styles;
    }

    private function getIrcBackgroundStyle($params){
        $styles = array();

        if(!empty($params['irt_background_color'])){
            $styles[] = 'background-color: '.$params['irt_background_color'];
        }

        return $styles;
    }

    private function getIrcValuesStyle($params){
        $styles = array();

        if(!empty($params['irt_values_color'])){
            $styles[] = 'color: '.$params['irt_values_color'];
        }

        if(!empty($params['irt_values_font'])){
            $styles[] = 'font-size: '.$params['irt_values_font'].'px';
        }

        return $styles;
    }

    private function getIrcLabelsStyle($params){
        $styles = array();

        if(!empty($params['irt_labels_color'])){
            $styles[] = 'color: '.$params['irt_labels_color'];
        }

        if(!empty($params['irt_labels_font'])){
            $styles[] = 'font-size: '.$params['irt_labels_font'].'px';
        }

        return $styles;
    }

    private function getIrcResultsStyle($params){
        $styles = array();

        if(!empty($params['irt_results_color'])){
            $styles[] = 'color: '.$params['irt_results_color'];
        }

        if(!empty($params['irt_results_font'])){
            $styles[] = 'font-size: '.$params['irt_results_font'].'px';
        }

        return $styles;
    }

    private function getIrcLabelsBorderStyle($params){
        $styles = array();

        if(!empty($params['irt_labels_border_color'])){
            $styles[] = 'border-bottom-color: '.$params['irt_labels_border_color'];
        }

        return $styles;
    }
}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BridgeCoreElementorInterestRateCalculator() );