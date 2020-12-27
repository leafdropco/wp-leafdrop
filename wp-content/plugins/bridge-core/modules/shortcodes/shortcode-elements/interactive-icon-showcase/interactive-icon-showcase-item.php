<?php
namespace Bridge\Shortcodes\InteractiveIconShowcaseItem;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class InteractiveIconShowcaseItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'qode_interactive_icon_showcase_item';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Interactive Icon Showcase Item', 'bridge-core'),
					'base' => $this->base,
					'as_child' => array('only' => 'qode_interactive_icon_showcase'),
					'category' => 'by QODE',
					'icon' => 'icon-wpb-interactive-icon-showcase-item extended-custom-icon-qode',
					'params' => array_merge(
						bridge_qode_icon_collections()->getVCParamsArray(array(), '', true),
						array(
							array(
								'type' => 'textfield',
								'heading' => 'Title',
								'param_name' => 'title'
							),
							array(
								'type'       => 'dropdown',
								'heading'    => 'Title Tag',
								'param_name' => 'title_tag',
								'value'      => array(
									''   => '',
									'h2' => 'h2',
									'h3' => 'h3',
									'h4' => 'h4',
									'h5' => 'h5',
									'h6' => 'h6',
								),
								'dependency' => array('element' => 'title', 'not_empty' => true)
							),
							array(
								'type' => 'textarea',
								'heading' => 'Text',
								'param_name' => 'text'
							),
							array(
								'type'	=> 'colorpicker',
								'heading'	=> 'Inactive Background Color',
								'param_name'	=> 'inactive_background_color',
								'description'	=> 'Set background color of inactive Interactive Icon'
							)
						)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'title'		=> '',
			'title_tag'	=> 'h3',
			'text'		=> '',
			'inactive_background_color' => ''
		);

        $args = array_merge($args, bridge_qode_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

		$params['content'] = $content;


		$iconPackName   = bridge_qode_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$params['icon'] = $params[$iconPackName];
		$params['style'] = $this->getStyles($params);

		$html = bridge_core_get_shortcode_template_part('templates/interactive-icon-showcase-item-template', 'interactive-icon-showcase', '', $params);

		return $html;
	}

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */

    private function getStyles($params){
    	$style = array();

    	if(!empty($params['inactive_background_color'])){
    		$style[] = 'background-color: ' . $params['inactive_background_color'];
    	}

    	return $style;
    }
	
}
