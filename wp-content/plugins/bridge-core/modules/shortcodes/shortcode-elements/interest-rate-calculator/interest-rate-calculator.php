<?php
namespace Bridge\Shortcodes\InterestRateCalculator;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class InterestRateCalculator implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_interest_rate_calculator';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Interest Rate Calculator', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-interest-rate-calculator extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Interest Rate Title', 'bridge-core'),
						'param_name'	=> 'irt_title'
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Interest Rate Title Tag', 'bridge-core'),
						'param_name'	=> 'irt_title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						),
						'dependency' => array('element' => 'irt_title', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Interest Rate', 'bridge-core'),
						'description'	=> esc_html__('Insert interest rate in percents', 'bridge-core'),
						'param_name'	=> 'irt_rate'
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Loan Minimum Value', 'bridge-core'),
						'param_name'	=> 'irt_loan_min_value',
						'description'	=> esc_html__('Please insert minimum value for the loan slider', 'bridge-core')
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Loan Maximum Value', 'bridge-core'),
						'param_name'	=> 'irt_loan_max_value',
						'description'	=> esc_html__('Please insert maximum value for the loan slider', 'bridge-core')
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Loan Slider Step', 'bridge-core'),
						'param_name'	=> 'irt_loan_step'
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Minimum Loan Period', 'bridge-core'),
						'param_name'	=> 'irt_loan_min_period',
						'description'	=> esc_html__('Please insert minimum value for the period slider, other than 0', 'bridge-core')
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Maximum Loan Period', 'bridge-core'),
						'param_name'	=> 'irt_loan_max_period',
						'description'	=> esc_html__('Please insert maximum value for the period slider', 'bridge-core')
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Period Slider Step', 'bridge-core'),
						'param_name'	=> 'irt_period_step'
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Currency', 'bridge-core'),
						'param_name'	=> 'irt_currency'
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Period label', 'bridge-core'),
						'param_name'	=> 'irt_period_label'
					),
					array(
						'type'	=> 'dropdown',
						'heading' => esc_html__('Enable Button', 'bridge-core'),
						'param_name'	=> 'irt_button',
						'value'	=> array(
							esc_html__('No', 'bridge-core')	=> 'no',
							esc_html__('Yes', 'bridge-core')	=> 'yes'
						)
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Button Text', 'bridge-core'),
						'param_name'	=> 'irt_button_text',
						'dependency' => array('element' => 'irt_button', 'value' => 'yes')
					),
					array(
						'type'	=> 'textfield',
						'heading' => esc_html__('Button Link', 'bridge-core'),
						'param_name'	=> 'irt_button_link',
						'dependency' => array('element' => 'irt_button', 'value' => 'yes')
					),
					array(
						'type'	=> 'dropdown',
						'heading' => esc_html__('Button Target', 'bridge-core'),
						'param_name'	=> 'irt_button_target',
						'value'	=> array(
							''		=> '',
							esc_html__( 'Blank', 'bridge-core' )	=> '_blank',
							esc_html__( 'Self', 'bridge-core' )	=> '_self'
						),
						'dependency' => array('element' => 'irt_button', 'value' => 'yes')
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Background Color', 'bridge-core'),
						'param_name'	=> 'irt_background_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Active Color', 'bridge-core'),
						'param_name'	=> 'irt_active_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' ),
						'description'	=> esc_html__('Choose color of the current value, current period and sliders', 'bridge-core')
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Loan and Period Values Color', 'bridge-core'),
						'param_name'	=> 'irt_values_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Loan and Period Values Font Size', 'bridge-core'),
						'param_name'	=> 'irt_values_font',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Labels Color', 'bridge-core'),
						'param_name'	=> 'irt_labels_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Labels Font Size', 'bridge-core'),
						'param_name'	=> 'irt_labels_font',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Labels Separator Color', 'bridge-core'),
						'param_name'	=> 'irt_labels_border_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'colorpicker',
						'heading'	=> esc_html__('Results Color', 'bridge-core'),
						'param_name'	=> 'irt_results_color',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
					array(
						'type'	=> 'textfield',
						'heading'	=> esc_html__('Results Font Size', 'bridge-core'),
						'param_name'	=> 'irt_results_font',
						'group'	=> esc_html__( 'Style', 'bridge-core' )
					),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'irt_title'	=> '',
            'irt_title_tag'	=> 'h3',
            'irt_rate'	=> '',
            'irt_loan_min_value'	=> '1',
            'irt_loan_max_value'	=> '1000',
            'irt_loan_step'			=> '1',
            'irt_loan_min_period'	=> '1',
            'irt_loan_max_period'	=> '12',
            'irt_period_step'		=> '1',
            'irt_currency'			=> '',
            'irt_period_label'		=> '',
            'irt_button'			=> '',
            'irt_button_text'		=> '',
            'irt_button_link'		=> '',
            'irt_button_target'		=> '',
            'irt_background_color'	=> '',
            'irt_active_color'		=> '',
            'irt_values_color'		=> '',
            'irt_values_font'		=> '',
            'irt_labels_color'		=> '',
            'irt_labels_font'		=> '',
            'irt_labels_border_color'	=> '',
            'irt_results_color'		=> '',
            'irt_results_font'		=> ''
        );

        $params = shortcode_atts($args, $atts);

        $params['irc_data'] = $this->getIrcDataAttr($params);
        $params['irc_active_color'] = $this->getIrcActiveColor($params);
        $params['irc_active_slider'] = $this->getIrcActiveSlider($params);
        $params['irt_background_color'] = $this->getIrcBackgroundStyle($params);
        $params['irc_values_style'] = $this->getIrcValuesStyle($params);
        $params['irc_labels_style'] = $this->getIrcLabelsStyle($params);
        $params['irc_labels_border_style'] = $this->getIrcLabelsBorderStyle($params);
        $params['irc_results_style'] = $this->getIrcResultsStyle($params);

		extract($params);

        $html = bridge_core_get_shortcode_template_part('templates/interest-rate-calculator-template', 'interest-rate-calculator', '', $params);

        return $html;
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