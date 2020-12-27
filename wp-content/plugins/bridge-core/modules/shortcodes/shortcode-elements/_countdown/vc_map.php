<?php
if (!function_exists('bridge_core_countdown_vc_map')) {

	function bridge_core_countdown_vc_map(){

		vc_map( array(
			"name" => esc_html__( "Countdown", 'bridge-core' ),
			"base" => "countdown",
			"category" => esc_html__( 'by QODE', 'bridge-core' ),
			'admin_enqueue_css' => array(get_template_directory_uri().'/css/admin/vc-extend.css'),
			"icon" => "extended-custom-icon-qode icon-wpb-countdown",
			"allowed_container_element" => 'vc_row',
			"params" => array(
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Year", 'bridge-core' ),
					"param_name" => "year",
					"value" => array(
                        "" => "",
                        "2014" => "2014",
                        "2015" => "2015",
                        "2016" => "2016",
                        "2017" => "2017",
                        "2018" => "2018",
                        "2019" => "2019",
                        "2020" => "2020",
                        "2021" => "2021",
                        "2022" => "2022",
                        "2023" => "2023",
                        "2024" => "2024"
					),
					"save_always" => true,
					"admin_label" => true
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Month", 'bridge-core' ),
					"param_name" => "month",
					"value" => array(
						"" => "",
						esc_html__( 'January', 'bridge-core' ) => "1",
						esc_html__( 'February', 'bridge-core' ) => "2",
						esc_html__( 'March', 'bridge-core' ) => "3",
						esc_html__( 'April', 'bridge-core' ) => "4",
						esc_html__( 'May', 'bridge-core' ) => "5",
						esc_html__( 'June', 'bridge-core' ) => "6",
						esc_html__( 'July', 'bridge-core' ) => "7",
						esc_html__( 'August', 'bridge-core' ) => "8",
						esc_html__( 'September', 'bridge-core' ) => "9",
						esc_html__( 'October', 'bridge-core' ) => "10",
						esc_html__( 'November', 'bridge-core' ) => "11",
						esc_html__( 'December', 'bridge-core' ) => "12"
					),
					"save_always" => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Day", 'bridge-core' ),
					"param_name" => "day",
					"value" => array(
						"" => "",
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10",
						"11" => "11",
						"12" => "12",
						"13" => "13",
						"14" => "14",
						"15" => "15",
						"16" => "16",
						"17" => "17",
						"18" => "18",
						"19" => "19",
						"20" => "20",
						"21" => "21",
						"22" => "22",
						"23" => "23",
						"24" => "24",
						"25" => "25",
						"26" => "26",
						"27" => "27",
						"28" => "28",
						"29" => "29",
						"30" => "30",
						"31" => "31",
					),
					"save_always" => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Hour", 'bridge-core' ),
					"param_name" => "hour",
					"value" => array(
						"" => "",
						"0" => "0",
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10",
						"11" => "11",
						"12" => "12",
						"13" => "13",
						"14" => "14",
						"15" => "15",
						"16" => "16",
						"17" => "17",
						"18" => "18",
						"19" => "19",
						"20" => "20",
						"21" => "21",
						"22" => "22",
						"23" => "23",
						"24" => "24"
					),
					"save_always" => true,
					"admin_label" => true
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Minute", 'bridge-core' ),
					"param_name" => "minute",
					"value" => array(
						"" => "",
						"0" => "0",
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10",
						"11" => "11",
						"12" => "12",
						"13" => "13",
						"14" => "14",
						"15" => "15",
						"16" => "16",
						"17" => "17",
						"18" => "18",
						"19" => "19",
						"20" => "20",
						"21" => "21",
						"22" => "22",
						"23" => "23",
						"24" => "24",
						"25" => "25",
						"26" => "26",
						"27" => "27",
						"28" => "28",
						"29" => "29",
						"30" => "30",
						"31" => "31",
						"32" => "32",
						"33" => "33",
						"34" => "34",
						"35" => "35",
						"36" => "36",
						"37" => "37",
						"38" => "38",
						"39" => "39",
						"40" => "40",
						"41" => "41",
						"42" => "42",
						"43" => "43",
						"44" => "44",
						"45" => "45",
						"46" => "46",
						"47" => "47",
						"48" => "48",
						"49" => "49",
						"50" => "50",
						"51" => "51",
						"52" => "52",
						"53" => "53",
						"54" => "54",
						"55" => "55",
						"56" => "56",
						"57" => "57",
						"58" => "58",
						"59" => "59",
						"60" => "60",
					),
					"save_always" => true,
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Month Label", 'bridge-core' ),
					"param_name" => "month_label",
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Day Label", 'bridge-core' ),
					"param_name" => "day_label",
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Hour Label", 'bridge-core' ),
					"param_name" => "hour_label",
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Minute Label", 'bridge-core' ),
					"param_name" => "minute_label",
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Second Label", 'bridge-core' ),
					"param_name" => "second_label",
					"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Month Singular Label", 'bridge-core' ),
					"param_name" => "month_singular_label"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Day Singular Label", 'bridge-core' ),
					"param_name" => "day_singular_label"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Hour Singular Label", 'bridge-core' ),
					"param_name" => "hour_singular_label"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Minute Singular Label", 'bridge-core' ),
					"param_name" => "minute_singular_label"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Second Singular Label", 'bridge-core' ),
					"param_name" => "second_singular_label"
				),
				array(
					"type" => "colorpicker",
					"heading" => esc_html__( "Color", 'bridge-core' ),
					"param_name" => "color",
					"description" => esc_html__( "For digits, labels and separators", 'bridge-core' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Digit Font Size (px)", 'bridge-core' ),
					"param_name" => "digit_font_size"
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__( "Label Font Size (px)", 'bridge-core' ),
					"param_name" => "label_font_size"
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Font Weight", 'bridge-core' ),
					"param_name" => "font_weight",
					"description" => esc_html__( "For both digits and labels", 'bridge-core' ),
					"value" => array(
						esc_html__( 'Default', 'bridge-core' ) => "",
						esc_html__( 'Thin 100', 'bridge-core' ) => "100",
						esc_html__( 'Extra-Light 200', 'bridge-core' ) => "200",
						esc_html__( 'Light 300', 'bridge-core' ) => "300",
						esc_html__( 'Regular 400', 'bridge-core' ) => "400",
						esc_html__( 'Medium 500', 'bridge-core' ) => "500",
						esc_html__( 'Semi-Bold 600', 'bridge-core' ) => "600",
						esc_html__( 'Bold 700', 'bridge-core' ) => "700",
						esc_html__( 'Extra-Bold 800', 'bridge-core' ) => "800",
						esc_html__( 'Ultra-Bold 900', 'bridge-core' ) => "900"
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( "Show separator", 'bridge-core' ),
					"param_name" => "show_separator",
					"value" => array(
						esc_html__( 'No', 'bridge-core' ) => "hide_separator",
						esc_html__( 'Yes', 'bridge-core' ) => "show_separator"
					),
					'save_always' => true
				),
			)
		) );
	}

	add_action('bridge_qode_action_vc_map', 'bridge_core_countdown_vc_map');
}