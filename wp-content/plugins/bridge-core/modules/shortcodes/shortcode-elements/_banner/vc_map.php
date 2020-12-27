<?php
if (!function_exists('bridge_core_banner_vc_map')) {

	function bridge_core_banner_vc_map(){

		vc_map( array(
			'name' => esc_html__( 'Banner', 'bridge-core' ),
			'base'		=> 'qode_banner',
			'category' => esc_html__( 'by QODE', 'bridge-core' ),
			'icon'		=> 'extended-custom-icon-qode icon-wpb-banner',
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type'			=> 'attach_image',
					'heading' => esc_html__( 'Image', 'bridge-core' ),
					'param_name'	=> 'image',
					'admin_label'	=> true
				),
				array(
					'type'			=> 'textfield',
					'heading' => esc_html__( 'Link', 'bridge-core' ),
					'param_name'	=> 'link'
				),
				array(
					'type'			=> 'dropdown',
					'heading' => esc_html__( 'Target', 'bridge-core' ),
					'param_name'	=> 'target',
					'value'			=> array(
						esc_html__( 'Self', 'bridge-core' )         => '_self',
						esc_html__( 'Blank', 'bridge-core' )        => '_blank',
						esc_html__( 'Parent', 'bridge-core' )       => '_parent'
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading' => esc_html__( 'Vertical Alignment', 'bridge-core' ),
					'param_name'	=> 'vertical_alignment',
					'value'			=> array(
						esc_html__( 'Center', 'bridge-core' )		=> 'center',
						esc_html__( 'Top', 'bridge-core' )			=> 'top',
						esc_html__( 'Bottom', 'bridge-core' )		=> 'bottom'
					)
				),
				array(
					'type'			=> 'textarea_html',
					'heading'		=> esc_html__( 'Content', 'bridge-core' ),
					'param_name'	=> 'content',
					'admin_label'	=> true
				),

			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_banner_vc_map');
}