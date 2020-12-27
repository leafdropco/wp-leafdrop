<?php
namespace Bridge\Shortcodes\AdvancedPricingTable;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class AdvancedPricingTable implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_advanced_pricing_table';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Advanced Pricing Table', 'bridge-core'),
                'base' => $this->base,
                'icon' => 'extended-custom-icon-qode icon-wpb-advanced-pricing-table',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Table Title', 'bridge-core'),
						'param_name'	=> 'table_title'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Column Title', 'bridge-core'),
						'param_name'	=> 'column_title'
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag', 'bridge-core'),
						'param_name' => 'title_tag',
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
						'type' => 'param_group',
						'heading' => esc_html__( 'Pricing Items', 'bridge-core' ),
						'param_name' => 'pricing_items',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Item Title', 'bridge-core' ),
								'param_name' => 'item_title',
								'admin_label' => true,
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Item Price', 'bridge-core' ),
								'param_name' => 'item_price',
								'admin_label' => true
							)
						)
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Currency', 'bridge-core'),
						'param_name'	=> 'currency'
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
            'columns'					=> '',
            'table_title'				=> '',
			'column_title'				=> '',
            'title_tag'					=> 'h5',
            'pricing_items'				=> '',
            'currency'					=> '$',
            'table_footer_image'		=> '',
            'table_footer_text'			=> ''
        );

        $params = shortcode_atts($args, $atts);

		extract($params);

		$params['content'] = $content;
		$params['pricing_items'] = json_decode(urldecode($params['pricing_items']), true);

        $html = bridge_core_get_shortcode_template_part('templates/advanced-pricing-table-template', 'advanced-pricing-table', '', $params);

        return $html;
    }


}