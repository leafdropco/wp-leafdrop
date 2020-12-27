<?php
$html  = "";
$title_styles  = "";

//generate styles
if($title_color != "") {
	$title_styles .= "color: ".$title_color.";";
}

$html .= '<div class="qode-text-marquee">';
$html .= '<div class="qode-text-marquee-wrapper">';
$html .= '<span class="qode-text-marquee-title" style="'.$title_styles.'">'.$title.'</span>';
$html .= '</div>';
$html .= '</div>';

echo bridge_qode_get_module_part( $html );