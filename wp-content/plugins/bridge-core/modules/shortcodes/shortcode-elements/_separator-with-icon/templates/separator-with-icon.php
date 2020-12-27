<?php
$separator_style = "";

if($color != "" || $opacity != '') {
	$separator_style .= "style='";

	if($color != "") {
		$separator_style .= "color:" . $color . ";";
	}

	if($opacity != "") {
		$separator_style .= "opacity:" . $opacity . ";";
	}

	$separator_style .= "'";
}

$html = '<span class="separator_with_icon" '.$separator_style.'><i class="fa '.$icon.'"></i></span>';

echo bridge_qode_get_module_part( $html );