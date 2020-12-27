<?php
namespace Bridge\Shortcodes\CrossfadeImages;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CrossfadeImages
 */
class CrossfadeImages implements ShortcodeInterface {
    /**
     * @var string
     */
	private $base; 
	
    /**
     * CrossfadeImages constructor.
     */
	function __construct() {
		$this->base = 'qode_crossfade_images';

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
			'name' => esc_html__( 'Qode Crossfade Images', 'bridge-core' ),
			'base' => $this->base,
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'icon' => 'icon-wpb-crossfade-images extended-custom-icon-qode',
			'params' =>	array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Initial Image', 'bridge-core' ),
                    'param_name' => 'initial_image'
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Hover Image', 'bridge-core' ),
                    'param_name' => 'hover_image'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'bridge-core' ),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'textfield',
                    'heading' => esc_html__( 'Link', 'bridge-core' ),
                    'param_name'  => 'link',
                    'admin_label' => true
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Link target', 'bridge-core' ),
                    'param_name'  => 'link_target',
                    'description' => esc_html__( '', 'bridge-core' ),
                    'value'       => array(
						esc_html__('New Window', 'bridge-core' ) => '_blank',
						esc_html__('Same Window', 'bridge-core' )  => '_self'
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
            )
		) );

	}

	public function render($atts, $content = null) {
		
		$args = array(
            'initial_image' => '',
            'hover_image'   => '',
            'title'         => '',
            'link'          => '',
            'link_target'   => '',
            'background_color'   => '',
        );

        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['initial_image_params'] = $this->getInitialImageParams($params);
        $params['hover_image_params'] = $this->getHoverImageParams($params);

        return bridge_core_get_shortcode_template_part('templates/crossfade-images-template', 'crossfade-images', '', $params);
    }


    /**
     * Return Initial Image Params for Lazy Load
     *
     * @param $params
     *
     * @return array
     */
    private function getInitialImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['initial_image'];
        $image_original = wp_get_attachment_image_src($params['initial_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['initial_image']);
        $image_dimensions = bridge_qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }

    /**
     * Return Initial Image Params for Lazy Load
     *
     * @param $params
     *
     * @return array
     */
    private function getHoverImageParams($params) {
        $image_params = array();

        $image_params['image_id'] = $params['hover_image'];
        $image_original = wp_get_attachment_image_src($params['hover_image'], 'full');
        $image_params['url'] = $image_original[0];
        $image_params['title'] = get_the_title($params['hover_image']);
        $image_dimensions = bridge_qode_get_image_dimensions($image_params['url']);

        if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {
            if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                $image_params['height'] = $image_dimensions['height'];
                $image_params['width']  = $image_dimensions['width'];
            }
        }

        return $image_params;
    }
}