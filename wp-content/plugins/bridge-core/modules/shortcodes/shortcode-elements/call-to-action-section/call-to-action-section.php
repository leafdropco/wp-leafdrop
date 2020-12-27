<?php
namespace Bridge\Shortcodes\CallToActionSection;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CallToActionSection
 */
class CallToActionSection implements ShortcodeInterface {
    /**
     * @var string
     */
	private $base; 
	
    /**
     * CallToActionSection constructor.
     */
	function __construct() {
		$this->base = 'qode_call_to_action_section';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}
	
	/**
		* Returns base for shortcode
		* @return string
	 */
	public function getBase() {
		return $this->base;
	}	
    
	public function vcMap() {
						
		vc_map( array(
			'name' => esc_html__( 'Call To Action Section', 'bridge-core' ),
			'base' => $this->base,
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'icon' => 'icon-wpb-call-to-action-section extended-custom-icon-qode',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Section Image', 'bridge-core' ),
                    'param_name' => 'section_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'bridge-core' ),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Description', 'bridge-core' ),
                    'param_name' => 'description',
                ),
                array(
                    'type'        => 'textfield',
                    'heading' => esc_html__( 'Link', 'bridge-core' ),
                    'param_name'  => 'link',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'textfield',
                    'heading' => esc_html__( 'Link Text', 'bridge-core' ),
                    'param_name'  => 'link_text',
                    'admin_label' => true,
                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Link target', 'bridge-core' ),
                    'param_name'  => 'link_target',
                    'value'       => array(
                        esc_html__( 'New Window', 'bridge-core' ) => '_blank',
                        esc_html__( 'Same Window', 'bridge-core' )  => '_self'
                    ),
                    'save_always' => true,
                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading' => esc_html__( 'Background Color', 'bridge-core' ),
                    'param_name'  => 'background_color',
                    'group'       => esc_html__( 'Design Options', 'bridge-core' )
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Appear animation effect', 'bridge-core' ),
                    'param_name'  => 'appear_animation',
                    'value'       => array(
                        esc_html__( 'Yes', 'bridge-core' ) => 'yes',
                        esc_html__( 'No', 'bridge-core' )  => 'no'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'group'       => esc_html__( 'Advanced Options', 'bridge-core' )
                ),
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'section_image'         => '',
            'title'                 => '',
            'description' => esc_html__( '', 'bridge-core' ),
            'link'                  => '',
            'link_text'             => '',
            'link_target'           => '_blank',
            'background_color'      => '',
            'appear_animation'      => 'yes'
        );

        $params = shortcode_atts($args, $atts);

        if($params['background_color'] !== ''){
            $params['background_color'] = 'background-color:'.$params['background_color'];
        }

        extract($params);


        $params['separator_parameters'] = $this->getSeparatorParameters($params);
        $params['button_parameters'] = $this->getButtonParameters($params);
        $params['holder_classes'] = $this->getHolderClasses($params);

        return bridge_core_get_shortcode_template_part('templates/call-to-action-section-template', 'call-to-action-section', '', $params);
    }

    /**
     * Returns parameters for separator shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getSeparatorParameters($params) {
        $params_array = array();

        $params_array['type'] = 'small';
        $params_array['position'] = 'center';
        $params_array['gradient_color'] = 'yes';
        $params_array['thickness'] = '2';
        $params_array['width'] = '150';
        $params_array['up'] = '27';
        $params_array['down'] = '31';

        return $params_array;
    }

    /**
     * Returns parameters for button shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonParameters($params) {
        $params_array = array();

        $params_array['icon_pack'] = 'font_elegant';
        $params_array['fe_icon'] = 'arrow_carrot-right';
        $params_array['target'] = $params['link_target'];
        $params_array['enable_shadow'] = 'yes';
        $params_array['enable_icon_gradient'] = 'yes';
        $params_array['text'] = $params['link_text'];
        $params_array['link'] = $params['link'];
        $params_array['hover_effect'] = 'shadow_enhance';

        return $params_array;
    }

    /**
     * Returns classes for holder
     *
     * @param $params
     *
     * @return array
     */
    private function getHolderClasses($params) {
        $params_array = array();

        $params_array[] = 'qode-cta-section';
        if ($params['appear_animation'] == 'yes') {
            $params_array[] = 'qode-cta-appear-effect';
        }

        return implode(' ',$params_array);
    }

}