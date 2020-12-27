<?php
namespace Bridge\Shortcodes\ComparativeFeaturesTable;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class ComparativeFeaturesTable implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_comparative_features_table';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Comparative Features Table', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-comparative-features-table extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Columns', 'bridge-core'),
						'param_name' => 'columns',
						'value' => array(
							esc_html__('One', 'bridge-core')   => 'one-column',
							esc_html__('Two', 'bridge-core')	=> 'two-columns',
							esc_html__('Three', 'bridge-core') => 'three-columns'
						)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Table Title', 'bridge-core'),
						'param_name'	=> 'table_title'
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
						'type' => 'dropdown',
						'heading' => esc_html__('Feature Title Tag', 'bridge-core'),
						'param_name' => 'feature_title_tag',
						'value' => array(
							''   => '',
							'p'	 => 'p',
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
						'dependency' => array('element' => 'columns', 'value' => array('one-column', 'two-columns', 'three-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Two Title', 'bridge-core'),
						'param_name'	=> 'column_two_title',
						'dependency' => array('element' => 'columns', 'value' => array('two-columns', 'three-columns'))
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Three Title', 'bridge-core'),
						'param_name'	=> 'column_three_title',
						'dependency' => array('element' => 'columns', 'value' => array('three-columns'))
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__( 'Feature', 'bridge-core' ),
						'param_name' => 'feature',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Feature Title', 'bridge-core' ),
								'param_name' => 'feature_title',
								'admin_label' => true,
							),array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Column One Active', 'bridge-core' ),
								'param_name' => 'column_one_active',
								'value' => array(
									esc_html__( 'No', 'bridge-core' )	=> 'no',
									esc_html__( 'Yes', 'bridge-core' ) => 'yes'
								),
								'dependency' => array('element' => 'columns', 'value' => array('one-column'))
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Column Two Active', 'bridge-core' ),
								'param_name' => 'column_two_active',
								'value' => array(
									esc_html__( 'No', 'bridge-core' )	=> 'no',
									esc_html__( 'Yes', 'bridge-core' ) => 'yes'
								),
								'dependency' => array('element' => 'columns', 'value' => array('two-columns', 'three-columns'))
							),
							array(
								'type' => 'dropdown',
								'heading' => esc_html__( 'Column Three Active', 'bridge-core' ),
								'param_name' => 'column_three_active',
								'value' => array(
									esc_html__( 'No', 'bridge-core' )	=> 'no',
									esc_html__( 'Yes', 'bridge-core' ) => 'yes'
								),
								'dependency' => array('element' => 'columns', 'value' => array('three-columns'))
							)
						)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column One Link', 'bridge-core'),
						'param_name'	=> 'column_one_link',
						'dependency' => array('element' => 'columns', 'value' => array('one-column', 'two-columns', 'three-columns'))
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Column One Link Target', 'bridge-core'),
						'param_name'	=> 'column_one_link_target',
						'value'			=> array(
							esc_html__('Self', 'bridge-core')	=> '_self',
							esc_html__('Blank', 'bridge-core')	=> '_blank',
						),
						'dependency' => array('element' => 'column_one_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column One Link Text', 'bridge-core'),
						'param_name'	=> 'column_one_link_text',
						'dependency' => array('element' => 'column_one_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Two Link', 'bridge-core'),
						'param_name'	=> 'column_two_link',
						'dependency' => array('element' => 'columns', 'value' => array('two-columns', 'three-columns'))
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Column Two Link Target', 'bridge-core'),
						'param_name'	=> 'column_one_two_target',
						'value'			=> array(
							esc_html__('Self', 'bridge-core')	=> '_self',
							esc_html__('Blank', 'bridge-core')	=> '_blank',
						),
						'dependency' => array('element' => 'column_two_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Two Link Text', 'bridge-core'),
						'param_name'	=> 'column_two_link_text',
						'dependency' => array('element' => 'column_two_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Three Link', 'bridge-core'),
						'param_name'	=> 'column_three_link',
						'dependency' => array('element' => 'columns', 'value' => array('three-columns'))
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Column Three Link Target', 'bridge-core'),
						'param_name'	=> 'column_three_link_target',
						'value'			=> array(
							esc_html__('Self', 'bridge-core')	=> '_self',
							esc_html__('Blank', 'bridge-core')	=> '_blank',
						),
						'dependency' => array('element' => 'column_three_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Three Link Text', 'bridge-core'),
						'param_name'	=> 'column_three_link_text',
						'dependency' => array('element' => 'column_three_link', 'not_empty' => true)
					),
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__('Table Footer Image', 'bridge-core'),
						'param_name'	=> 'table_footer_image'
					),
					array(
						'type'			=> 'textarea',
						'heading'		=> esc_html__('Table Footer Text', 'bridge-core'),
						'param_name'	=> 'table_footer_text'
					),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'columns'					=> 'one-column',
            'table_title'				=> '',
            'title_tag'					=> 'h5',
            'feature_title_tag'			=> 'h6',
            'column_one_title'			=> '',
            'column_two_title'			=> '',
            'column_three_title'		=> '',
            'feature'					=> '',
            'column_one_link'			=> '',
            'column_one_link_target'	=> '_self',
            'column_one_link_text'		=> '',
			'column_two_link'			=> '',
			'column_two_link_target'	=> '_self',
			'column_two_link_text'		=> '',
			'column_three_link'			=> '',
			'column_three_link_target'	=> '_self',
			'column_three_link_text'	=> '',
            'table_footer_image'		=> '',
            'table_footer_text'			=> ''
        );

        $params = shortcode_atts($args, $atts);

		extract($params);

		$params['content'] = $content;
		$params['features'] = json_decode(urldecode($params['feature']), true);

        $html = bridge_core_get_shortcode_template_part('templates/comparative-features-table-template', 'comparative-features-table', '', $params);

        return $html;
    }


}