<?php
$list_item_classes = "";

if($style != "") {
	$list_item_classes .= "{$style}";
}

if($number_type != "") {
	$list_item_classes .= " {$number_type}";
}

if($font_weight != "") {
	$list_item_classes .= " {$font_weight}";
}

$html =  "<div class='q_list $list_item_classes";
if($animate == "yes"){
	$html .= " animate_list'>" . $content . "</div>";
} else {
	$html .= "'>" . $content . "</div>";
}

echo bridge_qode_get_module_part( $html );