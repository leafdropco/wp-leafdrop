<?php
if(!function_exists('bridge_core_demos_list')) {

	function bridge_core_demos_list() {

		$demos = array(
			'bridge' => array(
				'title' => esc_html__('Demo - Original', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export.zip'),
					'pairs' => array( 13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'woocommerce', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
            'bridgedb300' => array(
                'title' => esc_html__('New Demo 300 - Bridge Original (Elementor)', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(
                    'sliders' => array('LayerSlider_Export.zip'),
                    'pairs' => array( 13 => 1),
                    'slider_in_content' => false
                ),
                'required-plugins' => array('elementor', 'woocommerce', 'LayerSlider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                )
            ),
			'bridge3' => array(
				'title' => esc_html__('Demo 3 - Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge3.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge4' => array(
				'title' => esc_html__('Demo 4 - Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge5' => array(
				'title' => esc_html__('Demo 5 - Estate', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge5.zip'),
					'pairs' => array(15 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge6' => array(
				'title' => esc_html__('Demo 6 - Light', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge6.zip'),
					'pairs' => array(15 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge7' => array(
				'title' => esc_html__('Demo 7 - Urban', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge7.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge8' => array(
				'title' => esc_html__('Demo 8 - Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge8.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge9' => array(
				'title' => esc_html__('Demo 9 - Cafe', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge9.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge10' => array(
				'title' => esc_html__('Demo 10 - One Page', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge11' => array(
				'title' => esc_html__('Demo 11 - Modern', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge11.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge12' => array(
				'title' => esc_html__('Demo 12 - University', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge12.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge13' => array(
				'title' => esc_html__('Demo 13 - Winery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge13.zip'),
					'pairs' => array(16 => 1, 15 => 2, 13 => 3),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge14' => array(
				'title' => esc_html__('Demo 14 - Restaurant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge15' => array(
				'title' => esc_html__('Demo 15 - Advertising Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge16' => array(
				'title' => esc_html__('Demo 16 - Portfolio Masonry', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge17' => array(
				'title' => esc_html__('Demo 17 - Vintage', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge18' => array(
				'title' => esc_html__('Demo 18 - Creative Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge19' => array(
				'title' => esc_html__('Demo 19 - Catalog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge20' => array(
				'title' => esc_html__('Demo 20 - Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge21' => array(
				'title' => esc_html__('Demo 21 - Minimalist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge22' => array(
				'title' => esc_html__('Demo 22 - Dark Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge23' => array(
				'title' => esc_html__('Demo 23 - Air', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge24' => array(
				'title' => esc_html__('Demo 24 - Avenue', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge25' => array(
				'title' => esc_html__('Demo 25 - Portfolio Pinterest', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge26' => array(
				'title' => esc_html__('Demo 26 - Health', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge27' => array(
				'title' => esc_html__('Demo 27 - Flat', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge27.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge28' => array(
				'title' => esc_html__('Demo 28 - Wireframe', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge29' => array(
				'title' => esc_html__('Demo 29 - Denim', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge30' => array(
				'title' => esc_html__('Demo 30 - Mist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge31' => array(
				'title' => esc_html__('Demo 31 - Architecture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge32' => array(
				'title' => esc_html__('Demo 32 - Small Brand', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge32.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge33' => array(
				'title' => esc_html__('Demo 33 - Creative', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge33.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge34' => array(
				'title' => esc_html__('Demo 34 - Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge35' => array(
				'title' => esc_html__('Demo 35 - Minimal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge36' => array(
				'title' => esc_html__('Demo 36 - Simple Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')

				)
			),
			'bridge37' => array(
				'title' => esc_html__('Demo 37 - Pinterest Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge38' => array(
				'title' => esc_html__('Demo 38 - Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge38.zip'),
					'pairs' => array(15 => 1, 14 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge39' => array(
				'title' => esc_html__('Demo 39 - Contemporary Art', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge39.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge40' => array(
				'title' => esc_html__('Demo 40 - Chocolaterie', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge40.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge41' => array(
				'title' => esc_html__('Demo 41 - Branding', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge42' => array(
				'title' => esc_html__('Demo 42 - Collection', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge43' => array(
				'title' => esc_html__('Demo 43 - Creative Vintage', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge44' => array(
				'title' => esc_html__('Demo 44 - Coming Soon Simple', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge45' => array(
				'title' => esc_html__('Demo 45 - Coming Soon Creative', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge46' => array(
				'title' => esc_html__('Demo 46 - Lawyer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge47' => array(
				'title' => esc_html__('Demo 47 - Health Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge48' => array(
				'title' => esc_html__('Demo 48 - Photography Split Screen', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge49' => array(
				'title' => esc_html__('Demo 49 - Agency One Page', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge50' => array(
				'title' => esc_html__('Demo 50 - Fashion Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge50.zip'),
					'pairs' => array(15 => 1, 14 => 2, 13 => 3),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('shop', 'bridge-core')
				)
			),
			'bridge51' => array(
				'title' => esc_html__('Demo 51 - Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge52' => array(
				'title' => esc_html__('Demo 52 - Wellness', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge53' => array(
				'title' => esc_html__('Demo 53 - Case Study', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge54' => array(
				'title' => esc_html__('Demo 54 - Design Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge55' => array(
				'title' => esc_html__('Demo 55 - Digital Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge56' => array(
				'title' => esc_html__('Demo 56 - Organic', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge57' => array(
				'title' => esc_html__('Demo 57 - Jazz', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge58' => array(
				'title' => esc_html__('Demo 58 - Wedding', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'other'	=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge59' => array(
				'title' => esc_html__('Demo 59 - Jeans', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge60' => array(
				'title' => esc_html__('Demo 60 - Innovation', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge61' => array(
				'title' => esc_html__('Demo 61 - Travel Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge62' => array(
				'title' => esc_html__('Demo 62 - Passepartout', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge63' => array(
				'title' => esc_html__('Demo 63 - Graphic Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge64' => array(
				'title' => esc_html__('Demo 64 - Cupcake', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge65' => array(
				'title' => esc_html__('Demo 65 - Sunglasses Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge66' => array(
				'title' => esc_html__('Demo 66 - Kids', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge67' => array(
				'title' => esc_html__('Demo 67 - Animals', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge68' => array(
				'title' => esc_html__('Demo 68 - Photo Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge68.zip'),
					'pairs' => array(14 => 1, 13 => 2),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge69' => array(
				'title' => esc_html__('Demo 69 - Urban Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge70' => array(
				'title' => esc_html__('Demo 70 - Marine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge71' => array(
				'title' => esc_html__('Demo 71 - Interior Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge72' => array(
				'title' => esc_html__('Demo 72 - Bar &amp; Grill', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge72.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge73' => array(
				'title' => esc_html__('Demo 73 - Brewery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge73.zip'),
					'pairs' => array(13 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'      => esc_html__('Brewery', 'bridge-core')
				)
			),
			'bridge74' => array(
				'title' => esc_html__('Demo 74 - Corporate', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge75' => array(
				'title' => esc_html__('Demo 75 - Office', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge76' => array(
				'title' => esc_html__('Demo 76 - Paper', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge77' => array(
				'title' => esc_html__('Demo 77 - Simple Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge78' => array(
				'title' => esc_html__('Demo 78 - Furniture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge79' => array(
				'title' => esc_html__('Demo 79 - Skin Care', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge79.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridge80' => array(
				'title' => esc_html__('Demo 80 - Rustic', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridge81' => array(
				'title' => esc_html__('Demo 81 - Cargo', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge82' => array(
				'title' => esc_html__('Demo 82 - Creative Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'business'  => esc_html__('Business', 'bridge-core'),
				)
			),
			'bridge83' => array(
				'title' => esc_html__('Demo 83 - Construction', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridge84' => array(
				'title' => esc_html__('Demo 84 - Campaign', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge85' => array(
				'title' => esc_html__('Demo 85 - Dim Sum', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge85.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge86' => array(
				'title' => esc_html__('Demo 86 - Flat Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge87' => array(
				'title' => esc_html__('Demo 87 - Photography Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge88' => array(
				'title' => esc_html__('Demo 88 - Charity', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge89' => array(
				'title' => esc_html__('Demo 89 - Handmade', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge90' => array(
				'title' => esc_html__('Demo 90 - Telecom', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge91' => array(
				'title' => esc_html__('Demo 91 - Black-And-White', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
				)
			),
			'bridge92' => array(
				'title' => esc_html__('Demo 92 - Pets', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge92.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge93' => array(
				'title' => esc_html__('Demo 93 - Designer Personal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge93.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge94' => array(
				'title' => esc_html__('Demo 94 - Modern Business', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge95' => array(
				'title' => esc_html__('Demo 95 - Contemporary Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge95.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge96' => array(
				'title' => esc_html__('Demo 96 - Communication', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge96.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'LayerSlider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridge97' => array(
				'title' => esc_html__('Demo 97 - Blog Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge97.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridge98' => array(
				'title' => esc_html__('Demo 98 - Fashion Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge99' => array(
				'title' => esc_html__('Demo 99 - Urban Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge99.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge100' => array(
				'title' => esc_html__('Demo 100 - CV', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge101' => array(
				'title' => esc_html__('Concept 101 - Standard', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge102' => array(
				'title' => esc_html__('Concept 102 - Split Screen', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'other'	=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge103' => array(
				'title' => esc_html__('Concept 103 - Left Menu Initially Hidden', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge104' => array(
				'title' => esc_html__('Concept 104 - Left Menu With Image', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge105' => array(
				'title' => esc_html__('Concept 105 - Vertical Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge106' => array(
				'title' => esc_html__('Concept 106 - Blog with Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge107' => array(
				'title' => esc_html__('Concept 107 - Masonry Gallery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridge108' => array(
				'title' => esc_html__('Concept 108 - Short Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge109' => array(
				'title' => esc_html__('Concept 109 - Angled Sections', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge110' => array(
				'title' => esc_html__('Concept 110 - Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge110.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => true
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge111' => array(
				'title' => esc_html__('Concept 111 - Elegant Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge112' => array(
				'title' => esc_html__('Concept 112 - Full Screen Sections', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge113' => array(
				'title' => esc_html__('Concept 113 - Shop Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(
					'sliders' => array('LayerSlider_Export_Bridge113.zip'),
					'pairs' => array(14 => 1),
					'slider_in_content' => false
				),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge114' => array(
				'title' => esc_html__('Concept 114 - Shop Wide', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge115' => array(
				'title' => esc_html__('Concept 115 - One Page Site', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge116' => array(
				'title' => esc_html__('Concept 116 - Dark Border', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge117' => array(
				'title' => esc_html__('Concept 117 - Portfolio with Left Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge118' => array(
				'title' => esc_html__('Concept 118 - Portfolio Pinterest Style', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge119' => array(
				'title' => esc_html__('Concept 119 - Shop with Left Menu', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'other'		=> esc_html__('Other', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridge120' => array(
				'title' => esc_html__('Concept 120 - Photo Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge121' => array(
				'title' => esc_html__('Concept 121 - Blog in Grid', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge122' => array(
				'title' => esc_html__('Concept 122 - Blog Pinterest Style', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridge123' => array(
				'title' => esc_html__('Concept 123 - Video Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridge124' => array(
				'title' => esc_html__('Concept 124 - Blog Loop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb1' => array(
				'title' => esc_html__('New Demo 1 - App Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb2' => array(
				'title' => esc_html__('New Demo 2 - Creative Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb3' => array(
				'title' => esc_html__('New Demo 3 - Construction Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb4' => array(
				'title' => esc_html__('New Demo 4 - Modern Restaurant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb5' => array(
				'title' => esc_html__('New Demo 5 - Wedding Announcement', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb6' => array(
				'title' => esc_html__('New Demo 6 - Online Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb7' => array(
				'title' => esc_html__('New Demo 7 - Rock Band', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb8' => array(
				'title' => esc_html__('New Demo 8 - Craftsman', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb9' => array(
				'title' => esc_html__('New Demo 9 - Corporation', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb10' => array(
				'title' => esc_html__('New Demo 10 - Modern Photography', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb11' => array(
				'title' => esc_html__('New Demo 11 - Illustrator Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb12' => array(
				'title' => esc_html__('New Demo 12 - Urban Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb13' => array(
				'title' => esc_html__('New Demo 13 - Vibrant Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb14' => array(
				'title' => esc_html__('New Demo 14 - Photography Tiles', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb15' => array(
				'title' => esc_html__('New Demo 15 - Freelance Designer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb16' => array(
				'title' => esc_html__('New Demo 16 - Clothing Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb17' => array(
				'title' => esc_html__('New Demo 17 - Urban Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb18' => array(
				'title' => esc_html__('New Demo 18 - Masonry Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb19' => array(
				'title' => esc_html__('New Demo 19 - Fullscreen Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb20' => array(
				'title' => esc_html__('New Demo 20 - Photographer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb21' => array(
				'title' => esc_html__('New Demo 21 - Designer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb22' => array(
				'title' => esc_html__('New Demo 22 - Tech Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'  => esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb23' => array(
				'title' => esc_html__('New Demo 23 - Metro Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb24' => array(
				'title' => esc_html__('New Demo 24 - Nature Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb25' => array(
				'title' => esc_html__('New Demo 25 - Modern Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb26' => array(
				'title' => esc_html__('New Demo 26 - Creative Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb27' => array(
				'title' => esc_html__('New Demo 27 - Minimal Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb28' => array(
				'title' => esc_html__('New Demo 28 - Fashion Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb29' => array(
				'title' => esc_html__('New Demo 29 - Lifestyle Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb30' => array(
				'title' => esc_html__('New Demo 30 - Chequered Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb31' => array(
				'title' => esc_html__('New Demo 31 - Headlines Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb32' => array(
				'title' => esc_html__('New Demo 32 - Tech Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb33' => array(
				'title' => esc_html__('New Demo 33 - Photography Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb34' => array(
				'title' => esc_html__('New Demo 34 - Bauhaus', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb35' => array(
				'title' => esc_html__('New Demo 35 - Illustrator', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb36' => array(
				'title' => esc_html__('New Demo 36 - Maintenance Mode', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb37' => array(
				'title' => esc_html__('New Demo 37 - Agency Minimal', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb38' => array(
				'title' => esc_html__('New Demo 38 - Conference', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb39' => array(
				'title' => esc_html__('New Demo 39 - 3D Artist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb40' => array(
				'title' => esc_html__('New Demo 40 - Developer', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb41' => array(
				'title' => esc_html__('New Demo 41 - Web Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb42' => array(
				'title' => esc_html__('New Demo 42 - UX/UI Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb43' => array(
				'title' => esc_html__('New Demo 43 - Digital', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb44' => array(
				'title' => esc_html__('New Demo 44 - Product Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'woocommerce'),
				'categories' => array(
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb45' => array(
				'title' => esc_html__('New Demo 45 - Sportswear', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb46' => array(
				'title' => esc_html__('New Demo 46 - Interior Decoration', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb47' => array(
				'title' => esc_html__('New Demo 47 - Boutique', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb48' => array(
				'title' => esc_html__('New Demo 48 - Summer Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb49' => array(
				'title' => esc_html__('New Demo 49 - Furniture Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
				)
			),
			'bridgedb50' => array(
				'title' => esc_html__('New Demo 50 - Leather Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb51' => array(
				'title' => esc_html__('New Demo 51 - Minimal Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb52' => array(
				'title' => esc_html__('New Demo 52 - Tiled Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb53' => array(
				'title' => esc_html__('New Demo 53 - Digital Startup', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb54' => array(
				'title' => esc_html__('New Demo 54 - Skater', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb55' => array(
				'title' => esc_html__('New Demo 55 - Bicycle Brand', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb56' => array(
				'title' => esc_html__('New Demo 56 - Fashion Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb57' => array(
				'title' => esc_html__('New Demo 57 - Biker Club', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb58' => array(
				'title' => esc_html__('New Demo 58 - Artist Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
					'shop'	    => esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb59' => array(
				'title' => esc_html__('New Demo 59 - Hipster Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb60' => array(
				'title' => esc_html__('New Demo 60 - Barber', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb61' => array(
				'title' => esc_html__('New Demo 61 - Photo Gallery', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb62' => array(
				'title' => esc_html__('New Demo 62 - Skate Shop', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb63' => array(
				'title' => esc_html__('New Demo 63 - Outdoors', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb64' => array(
				'title' => esc_html__('New Demo 64 - Jazz Bar', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb65' => array(
				'title' => esc_html__('New Demo 65 - Hosting', 'bridge-core'),
				'rev-sliders' => array('home_slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb66' => array(
				'title' => esc_html__('New Demo 66 - Architect Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb67' => array(
				'title' => esc_html__('New Demo 67 - Child Care', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb68' => array(
				'title' => esc_html__('New Demo 68 - Startup', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb69' => array(
				'title' => esc_html__('New Demo 69 - Resume', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb70' => array(
				'title' => esc_html__('New Demo 70 - Law Firm', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb71' => array(
				'title' => esc_html__('New Demo 71 - Organic Market', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb72' => array(
				'title' => esc_html__('New Demo 72 - Watch Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb73' => array(
				'title' => esc_html__('New Demo 73 - Travel Agency', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb74' => array(
				'title' => esc_html__('New Demo 74 - Consulting', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb75' => array(
				'title' => esc_html__('New Demo 75 - Yoga Studio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb76' => array(
				'title' => esc_html__('New Demo 76 - Spa Center', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb77' => array(
				'title' => esc_html__('New Demo 77 - Modern Furniture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb78' => array(
				'title' => esc_html__('New Demo 78 - Church', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb79' => array(
				'title' => esc_html__('New Demo 79 - Life Coach', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7' . 'revslider', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb80' => array(
				'title' => esc_html__('New Demo 80 - Ultragym', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb81' => array(
				'title' => esc_html__('New Demo 81 - Mosque', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb82' => array(
				'title' => esc_html__('New Demo 82 - Pet Sanctuary', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb83' => array(
				'title' => esc_html__('New Demo 83 - Car Dealership', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb84' => array(
				'title' => esc_html__('New Demo 84 - Business Consultant', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb85' => array(
				'title' => esc_html__('New Demo 85 - University II', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb86' => array(
				'title' => esc_html__('New Demo 86 - Dentist', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb87' => array(
				'title' => esc_html__('New Demo 87 - Transport', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb88' => array(
				'title' => esc_html__('New Demo 88 - Football', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb89' => array(
				'title' => esc_html__('New Demo 89 - Vacation Rental', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb90' => array(
				'title' => esc_html__('New Demo 90 - UI Design Company', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb91' => array(
				'title' => esc_html__('New Demo 91 - City Listing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-membership', 'qode-listing', 'woocommerce', 'wp-job-manager', 'wp-job-manager-locations'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb92' => array(
				'title' => esc_html__('New Demo 92 - Music Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'qode-news'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb93' => array(
				'title' => esc_html__('New Demo 93 - Restaurant and Bar', 'bridge-core'),
				'rev-sliders' => array('main-slider-n.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
                    'special'   => esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb94' => array(
				'title' => esc_html__('New Demo 94 - Business Report', 'bridge-core'),
				'rev-sliders' => array('annual-home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb95' => array(
				'title' => esc_html__('New Demo 95 - Business Conference', 'bridge-core'),
				'rev-sliders' => array('main-home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb96' => array(
				'title' => esc_html__('New Demo 96 - Global Business', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb97' => array(
				'title' => esc_html__('New Demo 97 - Financial Business', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb98' => array(
				'title' => esc_html__('New Demo 98 - Construction Showcase', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb99' => array(
				'title' => esc_html__('New Demo 99 - Attorney', 'bridge-core'),
				'rev-sliders' => array('mainhome.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb100' => array(
				'title' => esc_html__('New Demo 100 - Clean Energy', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb101' => array(
				'title' => esc_html__('New Demo 101 - Startup Summit', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb102' => array(
				'title' => esc_html__('New Demo 102 - App Launch', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb103' => array(
				'title' => esc_html__('New Demo 103 - App Presentation', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb104' => array(
				'title' => esc_html__('New Demo 104 - Winter Sports', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb105' => array(
				'title' => esc_html__('New Demo 105 - Smoothie Bar', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb106' => array(
				'title' => esc_html__('New Demo 106 - Yoga Center', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb107' => array(
				'title' => esc_html__('New Demo 107 - Beer Showcase', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb108' => array(
				'title' => esc_html__('New Demo 108 - Plumber', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb109' => array(
				'title' => esc_html__('New Demo 109 - Hair Salon', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb110' => array(
				'title' => esc_html__('New Demo 110 - Freelancer', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb111' => array(
				'title' => esc_html__('New Demo 111 - Bakery', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb112' => array(
				'title' => esc_html__('New Demo 112 - Running Club', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb113' => array(
				'title' => esc_html__('New Demo 113 - Beauty Center', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb114' => array(
				'title' => esc_html__('New Demo 114 - SEO Company', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb115' => array(
				'title' => esc_html__('New Demo 115 - Babysitter', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb116' => array(
				'title' => esc_html__('New Demo 116 - Wedding Planner', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb117' => array(
				'title' => esc_html__('New Demo 117 - Florist', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb118' => array(
				'title' => esc_html__('New Demo 118 - Designer Expo', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb119' => array(
				'title' => esc_html__('New Demo 119 - Music Festival', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb120' => array(
				'title' => esc_html__('New Demo 120 - Moving Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb121' => array(
				'title' => esc_html__('New Demo 121 - Burger Place', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb122' => array(
				'title' => esc_html__('New Demo 122 - Urban Dance', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb123' => array(
				'title' => esc_html__('New Demo 123 - Vineyard', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb124' => array(
				'title' => esc_html__('New Demo 124 - Technology', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb125' => array(
				'title' => esc_html__('New Demo 125 - Pole Dance', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb126' => array(
				'title' => esc_html__('New Demo 126 - Nightclub', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb127' => array(
				'title' => esc_html__('New Demo 127 - Running', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb128' => array(
				'title' => esc_html__('New Demo 128 - Orchestra', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb129' => array(
				'title' => esc_html__('New Demo 129 - Factory', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb130' => array(
				'title' => esc_html__('New Demo 130 - Writer', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb131' => array(
				'title' => esc_html__('New Demo 131 - Museum', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'business'	=> esc_html__('Business', 'bridge-core'),
				)
			),
			'bridgedb132' => array(
				'title' => esc_html__('New Demo 132 - Art Gallery', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb133' => array(
				'title' => esc_html__('New Demo 133 - Medical', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb134' => array(
				'title' => esc_html__('New Demo 134 - Recording Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb135' => array(
				'title' => esc_html__('New Demo 135 - Mountain Biking', 'bridge-core'),
				'rev-sliders' => array('home-1.zip', 'home-content.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb136' => array(
				'title' => esc_html__('New Demo 136 - Agriculture', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb137' => array(
				'title' => esc_html__('New Demo 137 - Coworking Space', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb138' => array(
				'title' => esc_html__('New Demo 138 - Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb139' => array(
				'title' => esc_html__('New Demo 139 - Startup Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb140' => array(
				'title' => esc_html__('New Demo 140 - Frozen Yogurt', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb141' => array(
				'title' => esc_html__('New Demo 141 - Video Production', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb142' => array(
				'title' => esc_html__('New Demo 142 - Soap', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb143' => array(
				'title' => esc_html__('New Demo 143 - Movie', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb144' => array(
				'title' => esc_html__('New Demo 144 - Optician', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb145' => array(
				'title' => esc_html__('New Demo 145 - Italian Restaurant', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb146' => array(
				'title' => esc_html__('New Demo 146 - Temple', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb147' => array(
				'title' => esc_html__('New Demo 147 - Wedding Invitation', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-bottom.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb148' => array(
				'title' => esc_html__('New Demo 148 - Hi-Fi', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb149' => array(
				'title' => esc_html__('New Demo 149 - Tea', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-content.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb150' => array(
				'title' => esc_html__('New Demo 150 - Renewable Energy', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb151' => array(
				'title' => esc_html__('New Demo 151 - Laboratory', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb152' => array(
				'title' => esc_html__('New Demo 152 - Business Consulting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb153' => array(
				'title' => esc_html__('New Demo 153 - Fitness', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb154' => array(
				'title' => esc_html__('New Demo 154 - Interior Decor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb155' => array(
				'title' => esc_html__('New Demo 155 - Pottery', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb156' => array(
				'title' => esc_html__('New Demo 156 - Gardening', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb157' => array(
				'title' => esc_html__('New Demo 157 - Human Resources', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb158' => array(
				'title' => esc_html__('New Demo 158 - Wedding Invitation Card', 'bridge-core'),
				'rev-sliders' => array('invitation.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb159' => array(
				'title' => esc_html__('New Demo 159 - Candidate', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb160' => array(
				'title' => esc_html__('New Demo 160 - Wildlife', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb161' => array(
				'title' => esc_html__('New Demo 161 - NGO', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb162' => array(
				'title' => esc_html__('New Demo 162 - Explorer', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb163' => array(
				'title' => esc_html__('New Demo 163 - Psychotherapy', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb164' => array(
				'title' => esc_html__('New Demo 164 - Recipes', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb165' => array(
				'title' => esc_html__('New Demo 165 - Nutritionist', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb166' => array(
				'title' => esc_html__('New Demo 166 - Bike Rental', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb167' => array(
				'title' => esc_html__('New Demo 167 - Dental Clinic', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb168' => array(
				'title' => esc_html__('New Demo 168 - IT conference', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb169' => array(
				'title' => esc_html__('New Demo 169 - 3D Modeling', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb170' => array(
				'title' => esc_html__('New Demo 170 - Horse Riding', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb171' => array(
				'title' => esc_html__('New Demo 171 - Barber Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb172' => array(
				'title' => esc_html__('New Demo 172 - Loan Company', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb173' => array(
				'title' => esc_html__('New Demo 173 - Architectural Firm', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb174' => array(
				'title' => esc_html__('New Demo 174 - Web Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb175' => array(
				'title' => esc_html__('New Demo 175 - Law Office', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb176' => array(
				'title' => esc_html__('New Demo 176 - Software Development', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb177' => array(
				'title' => esc_html__('New Demo 177 - Gym', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb178' => array(
				'title' => esc_html__('New Demo 178 - Makeup Artist', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb179' => array(
				'title' => esc_html__('New Demo 179 - Gaming', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb180' => array(
				'title' => esc_html__('New Demo 180 - Photographer Portfolio', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb181' => array(
				'title' => esc_html__('New Demo 181 - Golf', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb182' => array(
				'title' => esc_html__('New Demo 182 - Laundry Service', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb183' => array(
				'title' => esc_html__('New Demo 183 - Tiles', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb184' => array(
				'title' => esc_html__('New Demo 184 - Handicraft', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'home-content'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb185' => array(
				'title' => esc_html__('New Demo 185 - Casino', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb186' => array(
				'title' => esc_html__('New Demo 186 - Airline', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb187' => array(
				'title' => esc_html__('New Demo 187 - Craft Beer Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb188' => array(
				'title' => esc_html__('New Demo 188 - Film Director', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb189' => array(
				'title' => esc_html__('New Demo 189 - Tech Support', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb190' => array(
				'title' => esc_html__('New Demo 190 - Kindergarten', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb191' => array(
				'title' => esc_html__('New Demo 191 - Tailor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb192' => array(
				'title' => esc_html__('New Demo 192 - Sushi Bar', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb193' => array(
				'title' => esc_html__('New Demo 193 - Jewelry Store', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb194' => array(
				'title' => esc_html__('New Demo 194 - Web Hosting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb195' => array(
				'title' => esc_html__('New Demo 195 - University III', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb196' => array(
				'title' => esc_html__('New Demo 196 - Tattoo Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb197' => array(
				'title' => esc_html__('New Demo 197 - vCard', 'bridge-core'),
				'rev-sliders' => array('resume.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb198' => array(
				'title' => esc_html__('New Demo 198 - Wristwatch Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb199' => array(
				'title' => esc_html__('New Demo 199 - Gift Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb200' => array(
				'title' => esc_html__('New Demo 200 - Language School', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb201' => array(
				'title' => esc_html__('New Demo 201 - Floristry', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb202' => array(
				'title' => esc_html__('New Demo 202 - Bicycle Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb203' => array(
				'title' => esc_html__('New Demo 203 - Asian Cuisine', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb204' => array(
				'title' => esc_html__('New Demo 204 - Jazz Club', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb205' => array(
				'title' => esc_html__('New Demo 205 - Animal Shelter', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb206' => array(
				'title' => esc_html__('New Demo 206 - Musician', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb207' => array(
				'title' => esc_html__('New Demo 207 - Ecology', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb208' => array(
				'title' => esc_html__('New Demo 208 - Interactive Agency', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb209' => array(
				'title' => esc_html__('New Demo 209 - Creative Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core')
				)
			),
			'bridgedb210' => array(
				'title' => esc_html__('New Demo 210 - Pizza Parlor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb211' => array(
				'title' => esc_html__('New Demo 211 - Freelancer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb212' => array(
				'title' => esc_html__('New Demo 212 - Environmental Organization', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb213' => array(
				'title' => esc_html__('New Demo 213 - Kids Fashion', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb214' => array(
				'title' => esc_html__('New Demo 214 - Fashion Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb215' => array(
				'title' => esc_html__('New Demo 215 - Boxing Gym', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'timetable'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb216' => array(
				'title' => esc_html__('New Demo 216 - Urban Wear', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'		=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb217' => array(
				'title' => esc_html__('New Demo 217 - Alternative Band', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-music', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb218' => array(
				'title' => esc_html__('New Demo 218 - Dron Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
			'bridgedb219' => array(
				'title' => esc_html__('New Demo 219 - Digital Studio', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb220' => array(
				'title' => esc_html__('New Demo 220 - Matcha', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb221' => array(
				'title' => esc_html__('New Demo 221 - New Album Release', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-music', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb222' => array(
				'title' => esc_html__('New Demo 222 - Fast Food', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb223' => array(
				'title' => esc_html__('New Demo 223 - Pet Shop', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb224' => array(
				'title' => esc_html__('New Demo 224 - Travel', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-tours', 'qode-instagram-widget', 'qode-membership', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb225' => array(
				'title' => esc_html__('New Demo 225 - Cryptocurrency', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb226' => array(
				'title' => esc_html__('New Demo 226 - Pop Music Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-news', 'qode-instagram-widget'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core'),
                    'creative'  => esc_html__('creative', 'bridge-core')
				)
			),
			'bridgedb227' => array(
				'title' => esc_html__('New Demo 227 - Smartphone Store', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb228' => array(
				'title' => esc_html__('New Demo 228 - Water Plant', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb229' => array(
				'title' => esc_html__('New Demo 229 - Spa & Wellness', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb230' => array(
				'title' => esc_html__('New Demo 230 - Nail Salon', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb231' => array(
				'title' => esc_html__('New Demo 231 - Educational Center', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'qode-lms', 'qode-woocommerce-checkout-integration'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb232' => array(
				'title' => esc_html__('New Demo 232 - Trendy Blog', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'	=> esc_html__('Blog', 'bridge-core')
				)
			),
			'bridgedb233' => array(
				'title' => esc_html__('New Demo 233 - Creative Office', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb234' => array(
				'title' => esc_html__('New Demo 234 - Backpacks', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb235' => array(
				'title' => esc_html__('New Demo 235 - Mountain Climbing', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb236' => array(
				'title' => esc_html__('New Demo 236 - Developer Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb237' => array(
				'title' => esc_html__('New Demo 237 - Jewelry', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb238' => array(
				'title' => esc_html__('New Demo 238 - Designer Presentation', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb239' => array(
				'title' => esc_html__('New Demo 239 - Beachwear Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb240' => array(
				'title' => esc_html__('New Demo 240 - Exotic Travels', 'bridge-core'),
				'rev-sliders' => array('home.zip', 'section1.zip', 'video.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb241' => array(
				'title' => esc_html__('New Demo 241 - TV Set Showcase', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb242' => array(
				'title' => esc_html__('New Demo 242 - Delivery', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb243' => array(
				'title' => esc_html__('New Demo 243 - Photo App', 'bridge-core'),
				'rev-sliders' => array('slider1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb244' => array(
				'title' => esc_html__('New Demo 244 - Climbing Club', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb245' => array(
				'title' => esc_html__('New Demo 245 - Organic Food Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb246' => array(
				'title' => esc_html__('New Demo 246 - Fitness Tracker', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb247' => array(
				'title' => esc_html__('New Demo 247 - Catering', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb248' => array(
				'title' => esc_html__('New Demo 248 - Chocolate', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb249' => array(
				'title' => esc_html__('New Demo 249 - Book Landing', 'bridge-core'),
				'rev-sliders' => array('home1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb250' => array(
				'title' => esc_html__('New Demo 250 - Nurse Home', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb251' => array(
				'title' => esc_html__('New Demo 251 - Virtual Reality', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb252' => array(
				'title' => esc_html__('New Demo 252 - Music Band', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
			'bridgedb254' => array(
				'title' => esc_html__('New Demo 254 - SEO Agency', 'bridge-core'),
				'rev-sliders' => array('content-slider-1.zip','content-slider-2.zip', 'home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb255' => array(
				'title' => esc_html__('New Demo 255 - Consulting Company', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb256' => array(
				'title' => esc_html__('New Demo 256 - Shared Workspace', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb257' => array(
				'title' => esc_html__('New Demo 257 - Architect', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb258' => array(
				'title' => esc_html__('New Demo 258 - Jewelry Showcase', 'bridge-core'),
				'rev-sliders' => array('contact-us.zip', 'slider-1.zip', 'slider-1-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb259' => array(
				'title' => esc_html__('New Demo 259 - Design Agency', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb260' => array(
				'title' => esc_html__('New Demo 260 - Fundraising', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb261' => array(
				'title' => esc_html__('New Demo 261 - Speech Therapist', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'other'		=> esc_html__('Other', 'bridge-core')
				)
			),
			'bridgedb262' => array(
				'title' => esc_html__('New Demo 262 - Catering Service', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb263' => array(
				'title' => esc_html__('New Demo 263 - Accounting', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb264' => array(
				'title' => esc_html__('New Demo 264 - Personal Resume', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb265' => array(
				'title' => esc_html__('New Demo 265 - Landscape Architecture', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb266' => array(
				'title' => esc_html__('New Demo 266 - Astrology', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'business'  => esc_html__('Business', 'bridge-core')
				)
			),
			'bridgedb267' => array(
				'title' => esc_html__('New Demo 267 - Décor Store', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb268' => array(
				'title' => esc_html__('New Demo 268 - Farmers’ Market', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb269' => array(
				'title' => esc_html__('New Demo 269 - Cocktail Bar', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-restaurant', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')

				)
			),
			'bridgedb270' => array(
				'title' => esc_html__('New Demo 270 - Cinema', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb271' => array(
				'title' => esc_html__('New Demo 271 - Wedding Photography', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb272' => array(
				'title' => esc_html__('New Demo 272 - Fine Dining Restaurant', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget', 'qode-restaurant'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb273' => array(
				'title' => esc_html__('New Demo 273 - Dairy Farm', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb274' => array(
				'title' => esc_html__('New Demo 274 - Split Screen Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb275' => array(
				'title' => esc_html__('New Demo 275 - Cosmetic Surgery', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip', 'slider-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb276' => array(
				'title' => esc_html__('New Demo 276 - Minimal Portfolio', 'bridge-core'),
				'rev-sliders' => array('services.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb277' => array(
				'title' => esc_html__('New Demo 277 - Travel Blogger', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb278' => array(
				'title' => esc_html__('New Demo 278 - Portfolio Compact', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
			'bridgedb279' => array(
				'title' => esc_html__('New Demo 279 - App Landing', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb280' => array(
				'title' => esc_html__('New Demo 280 - Property Showcase', 'bridge-core'),
				'rev-sliders' => array('content-slider-1.zip', 'home-slider-1.zip', 'single.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb281' => array(
				'title' => esc_html__('New Demo 281 - Ceramic Store', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb282' => array(
				'title' => esc_html__('New Demo 282 - Ridesharing Company', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'elementor', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'creative'  => esc_html__('Creative', 'bridge-core')
				)
			),
			'bridgedb283' => array(
				'title' => esc_html__('New Demo 283 - Personal Blog', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'blog'		=> esc_html__('Blog', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb284' => array(
				'title' => esc_html__('New Demo 284 - Hospital', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
			'bridgedb285' => array(
				'title' => esc_html__('New Demo 285 - Home Décor', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb286' => array(
				'title' => esc_html__('New Demo 286 - Medical Marijuana', 'bridge-core'),
				'rev-sliders' => array('home-slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'revslider', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'		=> esc_html__('Shop', 'bridge-core')
				)
			),
			'bridgedb287' => array(
				'title' => esc_html__('New Demo 287 - Esports', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb288' => array(
				'title' => esc_html__('New Demo 288 - Tattoo Parlor', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'qode-instagram-widget'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'	    => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb289' => array(
				'title' => esc_html__('New Demo 289 - Solar Panels', 'bridge-core'),
				'rev-sliders' => array('home-rev-3.zip', 'slider-1.zip', 'home-rev-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
            'bridgedb290' => array(
				'title' => esc_html__('New Demo 290 - Running Crew', 'bridge-core'),
				'rev-sliders' => array('home.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb291' => array(
				'title' => esc_html__('New Demo 291 - Coming Soon Landing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
				)
			),
            'bridgedb292' => array(
				'title' => esc_html__('New Demo 292 - Camping', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'creative'	=> esc_html__('Creative', 'bridge-core'),
				)
			),
            'bridgedb293' => array(
				'title' => esc_html__('New Demo 293 - Interactive Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
				)
			),
            'bridgedb294' => array(
				'title' => esc_html__('New Demo 294 - Gelateria', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
				)
			),
            'bridgedb295' => array(
				'title' => esc_html__('New Demo 295 - Photo Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb296' => array(
				'title' => esc_html__('New Demo 296 - Environmental NGO', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb297' => array(
				'title' => esc_html__('New Demo 297 - Theater', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb298' => array(
				'title' => esc_html__('New Demo 298 - Brutalist Portfolio', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb299' => array(
				'title' => esc_html__('New Demo 299 - Lingerie Shop', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'woocommerce', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
				)
			),
            'bridgedb301' => array(
				'title' => esc_html__('New Demo 301 - Web Design Studio', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb302' => array(
                'title' => esc_html__('New Demo 302 - Beauty Store', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'woocommerce', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb303' => array(
                'title' => esc_html__('New Demo 303 - Furniture Brand', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'woocommerce', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb304' => array(
                'title' => esc_html__('New Demo 304 - Creative Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb305' => array(
                'title' => esc_html__('New Demo 305 - Agency Showcase', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb306' => array(
                'title' => esc_html__('New Demo 306 - Festival', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb307' => array(
                'title' => esc_html__('New Demo 307 - Art Shop', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'about.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb308' => array(
                'title' => esc_html__('New Demo 308 - Art Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb309' => array(
                'title' => esc_html__('New Demo 309 - Blogger', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'home-2.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb310' => array(
                'title' => esc_html__('New Demo 310 - Political Candidate', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb311' => array(
                'title' => esc_html__('New Demo 311 - Artist Minimal', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb312' => array(
                'title' => esc_html__('New Demo 312 - Coffee Shop', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb313' => array(
                'title' => esc_html__('New Demo 313 - Tobacco Shop', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb314' => array(
                'title' => esc_html__('New Demo 314 - Music School', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb315' => array(
                'title' => esc_html__('New Demo 315 - Book Store', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb316' => array(
                'title' => esc_html__('New Demo 316 - Honey', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb317' => array(
                'title' => esc_html__('New Demo 317 - Transport Services', 'bridge-core'),
                'rev-sliders' => array('home.zip', 'slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb318' => array(
                'title' => esc_html__('New Demo 318 - Manicure', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb319' => array(
                'title' => esc_html__('New Demo 319 - Design Conference', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'timetable'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb320' => array(
                'title' => esc_html__('New Demo 320 - Moving Services', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb321' => array(
                'title' => esc_html__('New Demo 321 - Yoga and Pilates', 'bridge-core'),
                'rev-sliders' => array('1-slider.zip', '2-home-top.zip', '3-bottom-section.zip', '4-home-half-slider.zip', ),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb322' => array(
                'title' => esc_html__('New Demo 322 - Electric Scooter Rental', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb323' => array(
                'title' => esc_html__('New Demo 323 - Illustration Portfolio', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb324' => array(
                'title' => esc_html__('New Demo 324 - Liquor Showcase', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb325' => array(
                'title' => esc_html__('New Demo 325 - Music Artist', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-music', 'woocommerce'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core'),
                )
            ),
            'bridgedb326' => array(
                'title' => esc_html__('New Demo 326 - Pasta', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-restaurant'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb327' => array(
                'title' => esc_html__('New Demo 327 - Ballet', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb328' => array(
                'title' => esc_html__('New Demo 328 - Modeling Agency', 'bridge-core'),
                'rev-sliders' => array('home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb329' => array(
                'title' => esc_html__('New Demo 329 - Food Delivery', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb330' => array(
                'title' => esc_html__('New Demo 330 - Music Group', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip', 'home.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-music'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core'),
                )
            ),
            'bridgedb331' => array(
                'title' => esc_html__('New Demo 331 - Architecture Showcase', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                )
            ),
            'bridgedb332' => array(
                'title' => esc_html__('New Demo 332 - Wedding Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'blog'	    => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb333' => array(
                'title' => esc_html__('New Demo 333 - Cabin Rental', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'  => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb334' => array(
                'title' => esc_html__('New Demo 334 - Consumer Electronics Store', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'shop'	    => esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb335' => array(
                'title' => esc_html__('New Demo 335 - SaaS', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business' => esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                )
            ),
            'bridgedb336' => array(
                'title' => esc_html__('New Demo 336 - Author Blog', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'blog' => esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb337' => array(
                'title' => esc_html__('New Demo 337 - Fashion Retail', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb338' => array(
                'title' => esc_html__('New Demo 338 - App Demonstration', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('revslider'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                )
            ),
            'bridgedb339' => array(
                'title' => esc_html__('New Demo 339 - Construction Firm', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb340' => array(
                'title' => esc_html__('New Demo 340 - Agency Creative', 'bridge-core'),
                'rev-sliders' => array('1-home-slider.zip', '2-home-slider.zip', '3-home-slider.zip', '4-about-slider.zip', '5-portfolio-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative' => esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb341' => array(
                'title' => esc_html__('New Demo 341 - Food Truck', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'qode-instagram-widget', 'qode-twitter-feed', 'qode-restaurant'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb342' => array(
                'title' => esc_html__('New Demo 342 - Oil Industry', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb343' => array(
                'title' => esc_html__('New Demo 343 - Gaming Parallax', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb344' => array(
                'title' => esc_html__('New Demo 344 - Paintball', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb345' => array(
                'title' => esc_html__('New Demo 345 - Chiropractic', 'bridge-core'),
                'rev-sliders' => array('1-home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb346' => array(
                'title' => esc_html__('New Demo 346 - Skiing', 'bridge-core'),
                'rev-sliders' => array('1-home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb347' => array(
                'title' => esc_html__('New Demo 347 - Tea House', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce', 'qode-restaurant'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb348' => array(
                'title' => esc_html__('New Demo 348 - Team Building', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb349' => array(
                'title' => esc_html__('New Demo 349 - Antique Store', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                )
            ),
            'bridgedb350' => array(
                'title' => esc_html__('New Demo 350 - Creative Agency Dark', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb351' => array(
                'title' => esc_html__('New Demo 351 - Portfolio Animated', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb352' => array(
                'title' => esc_html__('New Demo 352 - Handcrafted', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                )
            ),
            'bridgedb353' => array(
                'title' => esc_html__('New Demo 353 - Artist', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb354' => array(
                'title' => esc_html__('New Demo 354 - Guitar Making', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core'),
                )
            ),
            'bridgedb355' => array(
                'title' => esc_html__('New Demo 355 - Portfolio Alternating', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                )
            ),
            'bridgedb356' => array(
                'title' => esc_html__('New Demo 356 - Art Museum', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb357' => array(
                'title' => esc_html__('New Demo 357 - Portfolio Gallery', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb358' => array(
                'title' => esc_html__('New Demo 358 - Wedding Invite', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
            ),
            'bridgedb359' => array(
                'title' => esc_html__('New Demo 359 - Blog Illustrated', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb360' => array(
                'title' => esc_html__('New Demo 360 - Cosmetics', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
                )
            ),
            'bridgedb361' => array(
                'title' => esc_html__('New Demo 361 - Ice Hockey', 'bridge-core'),
                'rev-sliders' => array('01-home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                )
            ),
            'bridgedb362' => array(
                'title' => esc_html__('New Demo 362 - Lookbook', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core')
                )
            ),
            'bridgedb363' => array(
                'title' => esc_html__('New Demo 363 - Gym Dark', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget', 'timetable'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'business'	=> esc_html__('Business', 'bridge-core')
                )
            ),
            'bridgedb364' => array(
                'title' => esc_html__('New Demo 364 - Urban Clothing Store', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core')
                )
            ),
            'bridgedb365' => array(
                'title' => esc_html__('New Demo 365 - Creative Magazine', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-news', 'qode-instagram-widget', 'qode-twitter-feed'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                    'special'	=> esc_html__('Special', 'bridge-core')
                )
            ),
            'bridgedb366' => array(
                'title' => esc_html__('New Demo 366 - Interior Design Blog', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'qode-instagram-widget'),
                'categories' => array(
                    'blog'	=> esc_html__('Blog', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb367' => array(
                'title' => esc_html__('New Demo 367 - Studio Creative', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb368' => array(
                'title' => esc_html__('New Demo 368 - Cake Shop', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Businness', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb369' => array(
                'title' => esc_html__('New Demo 369 - Education', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider', 'woocommerce', 'qode-lms', 'qode-woocommerce-checkout-integration'),
                'categories' => array(
                    'special'	=> esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb370' => array(
                'title' => esc_html__('New Demo 370 - Pianist', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb371' => array(
                'title' => esc_html__('New Demo 371 - Coming Soon Circular', 'bridge-core'),
                'rev-sliders' => array(),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor'),
                'categories' => array(
                    'creative'	=> esc_html__('Creative', 'bridge-core'),
                    'one-page'	=> esc_html__('One Page', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb372' => array(
                'title' => esc_html__('New Demo 372 - Shoe Store', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb373' => array(
                'title' => esc_html__('New Demo 373 - Pharmacy', 'bridge-core'),
                'rev-sliders' => array('home-slider.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'shop'	=> esc_html__('Shop', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb374' => array(
                'title' => esc_html__('New Demo 374 - Massage Parlor', 'bridge-core'),
                'rev-sliders' => array('slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
            'bridgedb375' => array(
                'title' => esc_html__('New Demo 375 - Green Energy', 'bridge-core'),
                'rev-sliders' => array('home-slider-1.zip'),
                'layer-sliders' => array(),
                'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'business'	=> esc_html__('Business', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core'),
                )
            ),
			'bridgedb376' => array(
				'title' => esc_html__('New Demo 376 - Travel Tours', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-tours', 'qode-instagram-widget', 'qode-twitter-feed'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
			'bridgedb377' => array(
				'title' => esc_html__('New Demo 377 - Consultant', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
			'bridgedb378' => array(
				'title' => esc_html__('New Demo 378 - Aromatherapy', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
			'bridgedb379' => array(
				'title' => esc_html__('New Demo 379 - Hairdresser', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'qode-instagram-widget'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
            'bridgedb380' => array(
				'title' => esc_html__('New Demo 380 - Artisan Bag Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
				)
			),
            'bridgedb381' => array(
				'title' => esc_html__('New Demo 381 - Curriculum Vitae', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb382' => array(
				'title' => esc_html__('New Demo 382 - Author', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb383' => array(
				'title' => esc_html__('New Demo 383 - Rattan Furniture', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
				'categories' => array(
					'shop'	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb384' => array(
				'title' => esc_html__('New Demo 384 - Listing', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-membership', 'qode-listing', 'woocommerce', 'wp-job-manager', 'wp-job-manager-locations'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'special'	=> esc_html__('Special', 'bridge-core')
				)
			),
            'bridgedb385' => array(
				'title' => esc_html__('New Demo 385 - Fashion Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb386' => array(
				'title' => esc_html__('New Demo 386 - Portfolio Illustration', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb387' => array(
				'title' => esc_html__('New Demo 387 - Package Design Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb388' => array(
				'title' => esc_html__('New Demo 388 - Singer-songwriter', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb389' => array(
				'title' => esc_html__('New Demo 389 - Hotel', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb390' => array(
				'title' => esc_html__('New Demo 390 - Coffeehouse', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'business'	=> esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb391' => array(
				'title' => esc_html__('New Demo 391 - Coming Soon Ceramics', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'one-page'	=> esc_html__('One Page', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb392' => array(
				'title' => esc_html__('New Demo 392 - Portfolio Dark', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'	=> esc_html__('Creative', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb393' => array(
				'title' => esc_html__('New Demo 393 - Lingerie Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider', 'woocommerce'),
				'categories' => array(
					'shop'  	=> esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb394' => array(
				'title' => esc_html__('New Demo 394 - Business Light', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'business'  => esc_html__('Business', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb395' => array(
				'title' => esc_html__('New Demo 395 - Jewelry Shop', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb396' => array(
				'title' => esc_html__('New Demo 396 - Bridal Shop', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb397' => array(
				'title' => esc_html__('New Demo 397 - Interactive Links Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core'),
					'portfolio'	=> esc_html__('Portfolio', 'bridge-core')
				)
			),
            'bridgedb398' => array(
				'title' => esc_html__('New Demo 398 - Perfume Store', 'bridge-core'),
				'rev-sliders' => array('home-slider.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'woocommerce', 'revslider'),
				'categories' => array(
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb399' => array(
				'title' => esc_html__('New Demo 399 - Fashion Showcase', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb400' => array(
				'title' => esc_html__('New Demo 400 - Agency Pink', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip', 'slider-2.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb401' => array(
				'title' => esc_html__('New Demo 401 - Music', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-music'),
				'categories' => array(
					'special'  => esc_html__('Special', 'bridge-core'),
					'shop'      => esc_html__('Shop', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb402' => array(
				'title' => esc_html__('New Demo 402 - Graphic Design Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
				'categories' => array(
					'creative'  => esc_html__('Creative', 'bridge-core'),
					'portfolio' => esc_html__('Portfolio', 'bridge-core'),
					'elementor'	=> esc_html__('Elementor', 'bridge-core')
				)
			),
            'bridgedb403' => array(
				'title' => esc_html__('New Demo 403 - Agency Parallax', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb404' => array(
				'title' => esc_html__('New Demo 404 - Print Design', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb405' => array(
				'title' => esc_html__('New Demo 405 - Food & Dining Magazine', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'qode-news'),
                'categories' => array(
                    'blog'  => esc_html__('Blog', 'bridge-core'),
                    'special' => esc_html__('Special', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb406' => array(
				'title' => esc_html__('New Demo 406 - Horizontal Portfolio', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb407' => array(
				'title' => esc_html__('New Demo 407 - Portfolio Spread', 'bridge-core'),
				'rev-sliders' => array('slider-1.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7', 'revslider'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
            'bridgedb408' => array(
				'title' => esc_html__('New Demo 408 - Portfolio Vertical Slider', 'bridge-core'),
				'rev-sliders' => array(),
				'layer-sliders' => array(),
				'required-plugins' => array('elementor', 'contact-form-7'),
                'categories' => array(
                    'creative'  => esc_html__('Creative', 'bridge-core'),
                    'portfolio' => esc_html__('Portfolio', 'bridge-core'),
                    'elementor'	=> esc_html__('Elementor', 'bridge-core')
                )
			),
			'bridgelanding' => array(
				'title' => esc_html__('Bridge Landing', 'bridge-core'),
				'rev-sliders' => array('elements-rev-slider.zip', 'equation-slider.zip', 'features.zip', 'features-design.zip', 'features-shop.zip', 'landing-342.zip', 'landing-test-sale.zip'),
				'layer-sliders' => array(),
				'required-plugins' => array('js_composer', 'revslider', 'contact-form-7', 'woocommerce', 'LayerSlider', 'qode-instagram-widget', 'qode-twitter-feed')
			)
		);

		return $demos;
	}
}