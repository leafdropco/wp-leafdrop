<?php

namespace Bridge\Shortcodes\CardsGallery;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CardsGallery
 */
class CardsGallery implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * CardsGallery constructor.
	 */
	public function __construct() {
		$this->base = 'qode_cards_gallery';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 *
	 */
	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__( 'Cards Gallery', 'bridge-core' ),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by QODE', 'bridge-core' ),
			'icon'                      => 'icon-wpb-cards-gallery extended-custom-icon-qode',
            'allowed_container_element' => 'vc_row',
			'params'                    => array(
                array(
                    'type'        => 'attach_images',
                    'heading'     => esc_html__( 'Images', 'bridge-core' ),
                    'param_name'  => 'images',
                    'description' => esc_html__('Select images from media library', 'bridge-core')
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Expanding Side', 'bridge-core' ),
                    'param_name'  => 'expanding_side',
                    'description' => esc_html__( 'Choose on which side images will be expanded', 'bridge-core' ),
                    'value'       => array(
                        esc_html__( 'Left', 'bridge-core' ) => 'left',
                        esc_html__( 'Right', 'bridge-core' ) => 'right',
                        esc_html__( 'Top', 'bridge-core' ) => 'top',
                        esc_html__( 'Bottom', 'bridge-core' ) => 'bottom'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__( 'Cards Background Color', 'bridge-core' ),
                    'param_name'  => 'background_color'
                )
            )
		));
	}

	/**
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render($atts, $content = null) {
        $args = array(
            'images' => '',
            'expanding_side' => '',
            'background_color' => ''
        );

        $params = shortcode_atts($args, $atts);
        $params['images'] = $this->getGalleryImages($params);
        if($params['background_color'] !== ''){
            $params['background_color'] = 'background-color:'.$params['background_color'];
        }

        $params['data_side'] = '';
        if($params['expanding_side'] !== ''){
            $params['data_side'] = 'data-side='.$params['expanding_side'];
        }

		return bridge_core_get_shortcode_template_part('templates/cards-gallery', 'cards-gallery', '', $params);
	}

    /**
     * Return images for slider
     *
     * @param $params
     *
     * @return array
     */
    private function getGalleryImages($params) {
        $image_ids = array();
        $images    = array();
        $i         = 0;

        if($params['images'] !== '') {
            $image_ids = explode(',', $params['images']);
        }

        foreach($image_ids as $id) {

            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src($id, 'full');
            $image['url']      = $image_original[0];
            $image['title']    = get_the_title($id);
            $image['image_link'] = get_post_meta($id, 'attachment_image_custom_link', true);
            $image['image_target'] = get_post_meta($id, 'attachment_image_link_target', true);

            $image_dimensions = bridge_qode_get_image_dimensions($image['url']);
            if(is_array($image_dimensions) && array_key_exists('height', $image_dimensions)) {

                if(!empty($image_dimensions['height']) && $image_dimensions['width']) {
                    $image['height'] = $image_dimensions['height'];
                    $image['width']  = $image_dimensions['width'];
                }
            }

            $images[$i] = $image;
            $i++;
        }

        return $images;

    }
}