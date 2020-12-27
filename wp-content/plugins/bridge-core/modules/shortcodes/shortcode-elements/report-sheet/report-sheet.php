<?php
namespace Bridge\Shortcodes\ReportSheet;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class ReportSheet implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_report_sheet';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Report Sheet', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-report-sheet extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Number of columns', 'bridge-core'),
						'param_name' => 'columns',
						'value' => array(
							esc_html__('One', 'bridge-core')   => 'one-column',
							esc_html__('Two', 'bridge-core')	=> 'two-columns',
							esc_html__('Three', 'bridge-core') => 'three-columns',
							esc_html__('Four', 'bridge-core')  => 'four-columns',
							esc_html__('Five', 'bridge-core')  => 'five-columns'
						)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Report Sheet Title', 'bridge-core'),
						'param_name'	=> 'report_sheet_title'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag', 'bridge-core'),
						'param_name' => 'title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column One Title', 'bridge-core'),
						'param_name'	=> 'column_one_title',
						'dependency' 	=> array('element' => 'columns', 'value' => array('one-column', 'two-columns', 'three-columns', 'four-columns', 'five-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Two Title', 'bridge-core'),
						'param_name'	=> 'column_two_title',
						'dependency' 	=> array('element' => 'columns', 'value' => array('two-columns', 'three-columns', 'four-columns', 'five-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Three Title', 'bridge-core'),
						'param_name'	=> 'column_three_title',
						'dependency' 	=> array('element' => 'columns', 'value' => array('three-columns', 'four-columns', 'five-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Four Title', 'bridge-core'),
						'param_name'	=> 'column_four_title',
						'dependency' 	=> array('element' => 'columns', 'value' => array('four-columns', 'five-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Five Title', 'bridge-core'),
						'param_name'	=> 'column_five_title',
						'dependency' 	=> array('element' => 'columns', 'value' => 'five-columns')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Columns Title Tag', 'bridge-core'),
						'param_name' => 'column_title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						)
					),
					array(
						'type' 			=> 'param_group',
						'heading' 		=> esc_html__( 'Report Sheet Rows', 'bridge-core' ),
						'param_name' 	=> 'rows',
						'value' 		=> '',
						'params' 		=> array(
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column One Title', 'bridge-core' ),
								'param_name' 	=> 'column_one_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('one-column'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column One Subtitle', 'bridge-core' ),
								'param_name' 	=> 'column_one_sub_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('one-column'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Two Title', 'bridge-core' ),
								'param_name' 	=> 'column_two_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('two-columns', 'three-columns', 'four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Two Subtitle', 'bridge-core' ),
								'param_name' 	=> 'column_two_sub_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('two-columns', 'three-columns', 'four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Three Title', 'bridge-core' ),
								'param_name' 	=> 'column_three_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('three-columns', 'four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Three Subtitle', 'bridge-core' ),
								'param_name' 	=> 'column_three_sub_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('three-columns', 'four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Four Title', 'bridge-core' ),
								'param_name' 	=> 'column_four_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Four Subtitle', 'bridge-core' ),
								'param_name' 	=> 'column_four_sub_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('four-columns', 'five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Five Title', 'bridge-core' ),
								'param_name' 	=> 'column_five_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('five-columns'))
							),
							array(
								'type' 			=> 'textfield',
								'heading' 		=> esc_html__( 'Column Five Subtitle', 'bridge-core' ),
								'param_name' 	=> 'column_five_sub_text',
								'dependency' 	=> array('element' => 'columns', 'value' => array('five-columns'))
							),
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__("Row's title tag", 'bridge-core'),
						'description'	=> esc_html__("Define title tag for each Report Sheet row's title", 'bridge-core'),
						'param_name' => 'row_title_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__("Row's subtitle tag", 'bridge-core'),
						'description'	=> esc_html__("Define title tag for each Report Sheet row's subtitle", 'bridge-core'),
						'param_name' => 'row_subtitle_tag',
						'value' => array(
							''   => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6',
							'p'  => 'p'
						)
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Enable Button', 'bridge-core' ),
						'param_name' => 'enable_button',
						'value' => array(
							esc_html__('No', 'bridge-core')	=> 'no',
							esc_html__('Yes', 'bridge-core')	=> 'yes'
						)
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Button Text', 'bridge-core' ),
						'param_name' => 'button_text',
						'dependency' => array('element' => 'enable_button', 'value' => 'yes')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Button Link', 'bridge-core' ),
						'param_name' => 'button_link',
						'dependency' => array('element' => 'enable_button', 'value' => 'yes')
					)
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'columns'					=> 'one-column',
            'report_sheet_title'		=> '',
            'title_tag'					=> 'h5',
            'column_one_title'			=> '',
            'column_two_title'			=> '',
            'column_three_title'		=> '',
            'column_four_title'			=> '',
            'column_five_title'			=> '',
            'column_title_tag'			=> 'h6',
            'rows'						=> '',
            'column_one_text'			=> '',
            'column_one_sub_text'		=> '',
			'column_two_text'			=> '',
			'column_two_sub_text'		=> '',
			'column_three_text'			=> '',
            'column_three_sub_text'		=> '',
            'column_four_text'			=> '',
            'column_four_sub_text'		=> '',
            'column_five_text'			=> '',
            'column_five_sub_text'		=> '',
            'row_title_tag'				=> '',
            'row_subtitle_tag'			=> '',
            'enable_button'				=> 'no',
            'button_text'				=> '',
            'button_link'				=> ''
        );

        $params = shortcode_atts($args, $atts);

		extract($params);

		$params['content'] = $content;
		$params['rows'] = json_decode(urldecode($params['rows']), true);

        $html = bridge_core_get_shortcode_template_part('templates/report-sheet-template', 'report-sheet', '', $params);

        return $html;
    }


}