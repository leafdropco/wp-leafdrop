<?php

namespace Bridge\Shortcodes\CardsSlider;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class CardsSliderItem implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'qode_cards_slider_item';

		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name' => esc_html__( 'Cards Slider', 'bridge-core' ),
			'base'                      => $this->base,
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'icon'                      => 'icon-wpb-cards-slider-item extended-custom-icon-qode',
			'allowed_container_element' => 'vc_row',
			'as_child'                  => array('only' => 'qode_cards_slider'),
			'params'                    => array(
                array(
                    'type'        => 'attach_image',
                    'heading' => esc_html__( 'Card Header Image', 'bridge-core' ),
                    'param_name'  => 'header_image',
                    'description' => esc_html__( 'Choose image from media library', 'bridge-core' ),
                    'admin_label' => true
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading' => esc_html__( 'Card Background Color', 'bridge-core' ),
                    'param_name'  => 'background_color',
                    'description' => esc_html__( 'Choose background Color', 'bridge-core' ),
                    'admin_label' => true
                ),
				array(
					'type'        => 'attach_images',
					'heading' => esc_html__( 'Slider Images', 'bridge-core' ),
					'param_name'  => 'images',
					'description' => esc_html__( 'Choose image from media library', 'bridge-core' ),
					'admin_label' => true
				),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Set Middle Slide as Active on Load', 'bridge-core' ),
                    'param_name'  => 'active_middle_slide',
                    'description' => esc_html__( '', 'bridge-core' ),
                    'value'       => array(
						esc_html__( 'No', 'bridge-core' ) => 'false',
						esc_html__( 'Yes', 'bridge-core' )  => 'true'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Center Slide', 'bridge-core' ),
                    'param_name'  => 'center_slider',
                    'description' => esc_html__( 'Set every slide in center of content', 'bridge-core' ),
                    'value'       => array(
						esc_html__( 'No', 'bridge-core' )	=> 'no',
						esc_html__( 'Yes', 'bridge-core' ) => 'yes'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Border Radius', 'bridge-core' ),
                    'param_name'  => 'border_radius',
                    'description' => esc_html__( 'Show curved edges on every slide', 'bridge-core' ),
                    'value'       => array(
						esc_html__( 'No', 'bridge-core' )	=> 'no',
						esc_html__( 'Yes', 'bridge-core' ) => 'yes'
                    ),
                    'save_always' => true
                ),
				array(
					'type'        => 'dropdown',
					'heading' => esc_html__( 'Box Shadow', 'bridge-core' ),
					'param_name'  => 'box_shadow',
					'description' => esc_html__( 'Show shadow on every slide', 'bridge-core' ),
					'value'       => array(
						esc_html__( 'No', 'bridge-core' )	=> 'no',
						esc_html__( 'Yes', 'bridge-core' ) => 'yes'
					)
				),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Hover Animation', 'bridge-core' ),
                    'param_name'  => 'hover_animation',
                    'description' => esc_html__( 'Show hover animation on every slide', 'bridge-core' ),
                    'value'       => array(
						esc_html__( 'No', 'bridge-core' )	=> 'no',
						esc_html__( 'Yes', 'bridge-core' ) => 'yes'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type'        => 'dropdown',
                    'heading' => esc_html__( 'Show Navigation Bullets', 'bridge-core' ),
                    'param_name'  => 'show_bullets',
                    'description' => esc_html__( 'Show navigation bullets under the slider', 'bridge-core' ),
                    'value'       => array(
						esc_html__( 'Yes', 'bridge-core' ) => 'yes',
						esc_html__( 'No', 'bridge-core' )	=> 'no'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'header_image'        => '',
			'images'              => '',
			'background_color'    => '',
			'active_middle_slide' => '',
			'center_slider'       => '',
			'border_radius'       => 'no',
			'box_shadow'		  => 'no',
			'hover_animation'     => 'no',
			'show_bullets'        => '',
		);

		$params = shortcode_atts($default_atts, $atts);
        $params['images'] = $this->getSliderImages($params);
        $params['rand_number'] = rand(0, 1000);
        $params['additional_classes'] = $this->getClasses($params);
        $params['show_card'] = $params['background_color'] !== '' && $params['header_image'] !== '' ? true : false;
        if($params['background_color'] !== ''){
            $params['background_color'] = 'background-color:'.$params['background_color'];
        }
        if($params['header_image'] !== ''){
            $params['header_image'] = "background-image:url('".wp_get_attachment_url($params['header_image'])."')";
        }

		return bridge_core_get_shortcode_template_part('templates/cards-slider-item-template', 'cards-slider', '', $params);
	}

    /**
     * Return images for slider
     *
     * @param $params
     *
     * @return array
     */
    private function getSliderImages($params) {
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

    /**
     * Return additional classes
     *
     * @param $params
     *
     * @return array
     */
    private function getClasses($params) {
        $classes = '';

        if($params['show_bullets'] == 'no'){
            $classes .= ' navigation-bullets-disabled';
        }

        if($params['border_radius'] == 'yes'){
            $classes .= ' border-radius';
        }

		if($params['box_shadow'] == 'yes'){
            $classes .= ' qode-slide-shadow';
        }

        if($params['hover_animation'] == 'yes'){
            $classes .= ' hover-animation';
        }

        if($params['background_color'] == ''){
            $classes .= ' no-shadow';
        }

        return $classes;

    }
}