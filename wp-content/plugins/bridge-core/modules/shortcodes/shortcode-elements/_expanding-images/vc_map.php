<?php
if (!function_exists('bridge_core_expanding_images_vc_map')) {

	function bridge_core_expanding_images_vc_map(){

		vc_map( array(
			'name' => esc_html__( 'Expanding Images', 'bridge-core' ),
			'base' => 'expanding_images',
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'icon' => 'extended-custom-icon-qode icon-wpb-expanding-images',
			"allowed_container_element" => 'vc_row',
			'params' => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Choose Frame', 'bridge-core'),
					'param_name' => 'frame',
					'value'      => array(
						esc_html__('Standard', 'bridge-core')	=> 'standard',
						esc_html__('Jungle', 'bridge-core')	=> 'jungle'
					)
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Hero Image', 'bridge-core' ),
					'param_name'	=> 'hero_image',
					'description' => esc_html__( 'This image will be set inside the laptop frame.', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Link', 'bridge-core' ),
					'param_name'	=> 'link',
					'description' => esc_html__( 'Enter an external URL to link to.', 'bridge-core' ),
					'admin_label'	=> true
				),
				array(
					'type'       => 'dropdown',
					'heading' => esc_html__( 'Target', 'bridge-core' ),
					'param_name' => 'target',
					'value'      => array(
						''      => '',
						esc_html__( 'Self', 'bridge-core' )  => '_self',
						esc_html__( 'Blank', 'bridge-core' ) => '_blank'
					),
					'dependency' => array('element' => 'link', 'not_empty' => true),
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Title', 'bridge-core' ),
					'param_name'	=> 'title',
					'description' => esc_html__( 'Hero Image title.', 'bridge-core' ),
					'dependency' => array('element' => 'link', 'not_empty' => true),
					'admin_label'	=> true
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 1', 'bridge-core' ),
					'param_name'	=> 'side_image_1',
					'description' => esc_html__( 'This image will be set next to the upper left corner of the laptop frame.', 'bridge-core' ),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 1 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_1_link',
					'dependency' => array('element' => 'side_image_1', 'not_empty' => true),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 2', 'bridge-core' ),
					'param_name'	=> 'side_image_2',
					'description' => esc_html__( 'This image will be set next to the lower left corner of the laptop frame.', 'bridge-core' ),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 2 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_2_link',
					'dependency' => array('element' => 'side_image_2', 'not_empty' => true),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 3', 'bridge-core' ),
					'param_name'	=> 'side_image_3',
					'description' => esc_html__( 'This image will be set next to the upper right corner of the laptop frame.', 'bridge-core' ),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 3 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_3_link',
					'dependency' => array('element' => 'side_image_3', 'not_empty' => true),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 4', 'bridge-core' ),
					'param_name'	=> 'side_image_4',
					'description' => esc_html__( 'This image will be set next to the lower right corner of the laptop frame.', 'bridge-core' ),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 4 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_4_link',
					'dependency' => array('element' => 'side_image_4', 'not_empty' => true),
					'group'			=> esc_html__( 'Inner Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 5', 'bridge-core' ),
					'param_name'	=> 'side_image_5',
					'description' => esc_html__( 'This image will be set in the upper left corner of the entire section.', 'bridge-core' ),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 5 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_5_link',
					'dependency' => array('element' => 'side_image_5', 'not_empty' => true),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 6', 'bridge-core' ),
					'param_name'	=> 'side_image_6',
					'description' => esc_html__( 'This image will be set in the lower left corner of the entire section.', 'bridge-core' ),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 6 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_6_link',
					'dependency' => array('element' => 'side_image_6', 'not_empty' => true),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 7', 'bridge-core' ),
					'param_name'	=> 'side_image_7',
					'description' => esc_html__( 'This image will be set in the upper right corner of the entire section.', 'bridge-core' ),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 7 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_7_link',
					'dependency' => array('element' => 'side_image_7', 'not_empty' => true),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Side Image 8', 'bridge-core' ),
					'param_name'	=> 'side_image_8',
					'description' => esc_html__( 'This image will be set in the lower right corner of the entire section.', 'bridge-core' ),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Side Image 8 Link', 'bridge-core' ),
					'param_name'	=> 'side_image_8_link',
					'dependency' => array('element' => 'side_image_8', 'not_empty' => true),
					'group'			=> esc_html__( 'Outer Side Images', 'bridge-core' )
				),
			)
		));
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_expanding_images_vc_map');
}