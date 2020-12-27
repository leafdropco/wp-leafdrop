<?php
if (!function_exists('bridge_core_pie_chart_with_icon_vc_map')) {

	function bridge_core_pie_chart_with_icon_vc_map(){

		global $qodeIconCollections;
		$collection = $qodeIconCollections->getIconCollection('font_awesome');
        if( $collection ){
            $icons = $collection->getIconsArray();
        } else {
            $icons = array();
        }

		vc_map( array(
			"name" => esc_html__( "Pie Chart With Icon", 'bridge-core' ),
			"base" => "pie_chart_with_icon",
			"icon" => "extended-custom-icon-qode icon-wpb-pie_chart_with_icon",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Percentage", 'bridge-core' ),
					"param_name" => "percent",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Bar Active Color", 'bridge-core' ),
					"param_name" => "active_color"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Bar Noactive Color", 'bridge-core' ),
					"param_name" => "noactive_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Pie Chart Line Width (px)", 'bridge-core' ),
					"param_name" => "line_width"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Title", 'bridge-core' ),
					"param_name" => "title",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Title Color", 'bridge-core' ),
					"param_name" => "title_color"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Title Tag", 'bridge-core' ),
					"param_name" => "title_tag",
					"value" => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Icon", 'bridge-core' ),
					"param_name" => "icon",
					"value" => $icons,
					'save_always' => true,
					'admin_label' => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Icon Size", 'bridge-core' ),
					"param_name" => "icon_size",
					"value" => array(
						esc_html__( 'Tiny', 'bridge-core' ) => "fa-lg",
						esc_html__( 'Small', 'bridge-core' ) => "fa-2x",
						esc_html__( 'Medium', 'bridge-core' ) => "fa-3x",
						esc_html__( 'Large', 'bridge-core' ) => "fa-4x",
						esc_html__( 'Very Large', 'bridge-core' ) => "fa-5x"
					),
					'save_always' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Icon Color", 'bridge-core' ),
					"param_name" => "icon_color"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Text", 'bridge-core' ),
					"param_name" => "text",
					'admin_label' => true
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Text Color", 'bridge-core' ),
					"param_name" => "text_color"
				)
			)
		) );
		
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_pie_chart_with_icon_vc_map');
}