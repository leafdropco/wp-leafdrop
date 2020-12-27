<?php
namespace Bridge\Shortcodes\NumberedProcessItem;

use Bridge\Shortcodes\Lib\ShortcodeInterface;

class NumberedProcessItem implements ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'qode_numbered_process_item';
		add_action('bridge_qode_action_vc_map', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Numbered Process Item', 'bridge-core'),
                'base' => $this->base,
				'as_child' => array('only' => 'qode_numbered_process'),
                'icon' => 'icon-wpb-numbered-process-item extended-custom-icon-qode',
                'category' => esc_html__('by QODE', 'bridge-core'),
                'params' => array(
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__('Image', 'bridge-core'),
						'param_name'	=> 'image'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Number', 'bridge-core'),
						'param_name'	=> 'number'
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Title', 'bridge-core'),
						'param_name'	=> 'title'
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Title Tag', 'bridge-core'),
						'param_name'	=> 'title_tag',
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
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Number Color', 'bridge-core'),
						'param_name'	=> 'number_color',
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
					array(
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Number Background Color', 'bridge-core'),
						'param_name'	=> 'number_background_color',
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Title Position', 'bridge-core'),
						'param_name'	=> 'title_position',
						'value' => array(
							esc_html__('On Image', 'bridge-core') => 'on-image',
							esc_html__('Under Image', 'bridge-core') => 'under-image'
						),
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
					array(
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Title Color', 'bridge-core'),
						'param_name'	=> 'title_color',
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
					array(
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Border Color', 'bridge-core'),
						'param_name'	=> 'border_color',
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Border Width (px)', 'bridge-core'),
						'param_name'	=> 'border_width',
						'group'			=> esc_html__('Design Group', 'bridge-core')
					),
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'image'					=> '',
            'number'				=> '',
			'title'					=> '',
            'title_tag'				=> 'h4',
            'number_color'			=> '',
            'number_background_color'=> '',
            'title_position'		=> 'on-image',
            'title_color'			=> '',
            'border_color'			=> '',
            'border_width'			=> ''
        );

        $params = shortcode_atts($args, $atts);

        $params['image_src'] = $this->getImageSrc($params);
        $params['number_style'] = $this->getNumberStyle($params);
        $params['title_style'] = $this->getTitleStyle($params);
        $params['border_style'] = $this->getBorderStyle($params);

        $html = bridge_core_get_shortcode_template_part('templates/numbered-process-item-template', 'numbered-process', '', $params);

        return $html;
    }

	private function getNumberStyle($params){
		$number_style = array();

		if ($params['number_color'] !== ''){
			$number_style[] = 'color: '.$params['number_color'];
		}

		if ($params['number_background_color'] !== ''){
			$number_style[] = 'background-color: '.$params['number_background_color'];
		}

		return implode('; ', $number_style);
	}

	private function getTitleStyle($params){
		$title_style = array();

		if ($params['title_color'] !== ''){
			$title_style[] = 'color: '.$params['title_color'];
		}

		return implode('; ', $title_style);
	}

	private function getBorderStyle($params){
		$border_style = array();

		if ($params['border_color'] !== ''){
			$border_style[] = 'border-color: '.$params['border_color'];
		}

		if ($params['border_width'] !== ''){
			$border_style[] = 'border-width: '.bridge_qode_filter_px($params['border_width']).'px';
		}

		return implode('; ', $border_style);
	}

    private function getImageSrc($params) {

        if (is_numeric($params['image'])) {
            $image_src = wp_get_attachment_url($params['image']);
        } else {
            $image_src = $params['image'];
        }

        return $image_src;

    }
}