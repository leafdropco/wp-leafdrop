<?php
namespace Bridge\Shortcodes\NumberedCarousel;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class NumberedCarousel implements ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qode_numbered_carousel';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Numbered Carousel', 'bridge-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by QODE', 'bridge-core' ),
					'icon'                      => 'icon-wpb-numbered-carousel extended-custom-icon-qode',
                    'allowed_container_element' => 'vc_row',
					'params'                    => array(
                        array(
                            'type' => 'param_group',
                            'heading' => esc_html__( 'Items', 'bridge-core' ),
                            'param_name' => 'items',
                            'params' => array(
                                array(
                                    'type'       => 'dropdown',
                                    'param_name' => 'media_type',
                                    'heading'    => esc_html__( 'Media Type', 'bridge-core' ),
                                    'value'      => array(
                                        esc_html__( 'Image', 'bridge-core' ) => 'image',
                                        esc_html__( 'Video', 'bridge-core' ) => 'video'
                                    ),
                                    'admin_label' => true,
                                    'save_always' => true,
                                ),
                            	array(
                            	    'type'        => 'attach_image',
                                    'param_name'  => 'image',
                            	    'heading'     => esc_html__( 'Image', 'bridge-core' ),
                                    'dependency' 	=> array( 'element' => 'media_type', 'value' => 'image' )
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'video_url',
                                    'heading'    => esc_html__('Video Url', 'bridge-core'),
                                    'dependency' 	=> array( 'element' => 'media_type', 'value' => 'video' )
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'title',
                                    'heading'     => esc_html__( 'Title', 'bridge-core' ),
                                    'admin_label' => true,
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'subtitle',
                                    'heading'     => esc_html__( 'Subtitle', 'bridge-core' ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'text',
                                    'heading'     => esc_html__( 'Text', 'bridge-core' ),
                                ),
                                array(
                                    'type'        => 'textfield',
                                    'param_name'  => 'link',
                                    'heading'     => esc_html__( 'Link', 'bridge-core' ),
                                    'admin_label' => true,
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'link_text',
                                    'heading'    => esc_html__( 'Link Text', 'bridge-core' ),
                                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                                ),
                                array(
                                    'type'       => 'dropdown',
                                    'param_name' => 'target',
                                    'heading'    => esc_html__( 'Link target', 'bridge-core' ),
                                    'value'      => array_flip( bridge_qode_get_link_target_array() ),
                                    'dependency' => array( 'element' => 'link', 'not_empty' => true )
                                ),
                            )
                        ),
                        array(
							'type'       => 'dropdown',
							'param_name' => 'change_slides_on_scroll',
							'heading'    => esc_html__( 'Change Slides On Scroll', 'bridge-core' ),
							'value'      => array_flip( bridge_qode_get_yes_no_select_array( false, true ) ),
						),
                    )
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
            'items'              => '',
            'change_slides_on_scroll'  => 'yes',
		);
		
		$params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['items'] = json_decode(urldecode($params['items']), true);
		$params['holder_classes'] = $this->getHolderClasses( $params );

		$html = bridge_core_get_shortcode_template_part('templates/numbered-carousel-template', 'numbered-carousel', '', $params);
		
		return $html;
    }

    private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['change_slides_on_scroll'] === 'yes' ? 'qode-change-on-scroll' : '';
		
		return implode( ' ', $holderClasses );
	}
}