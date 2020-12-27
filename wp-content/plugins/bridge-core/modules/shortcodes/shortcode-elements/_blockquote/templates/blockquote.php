<?php

//init variables
$html               = "";
$blockquote_styles  = "";
$blockquote_classes = "";
$heading_styles     = "";
$quote_icon_styles  = "";

if($show_quote_icon == 'yes') {
    $blockquote_classes .= ' with_quote_icon';
}

if($width != "") {
    $blockquote_styles .= "width: ".$width."%;";
}

if($border_color != "") {
    $blockquote_styles .= "border-left-color: ".$border_color.";";
}

if($background_color != "") {
    $blockquote_styles .= "background-color: ".$background_color.";";
}

if($text_color != "") {
    $heading_styles .= "color: ".$text_color.";";
}

if($line_height != "") {
    $heading_styles .= " line-height: ".$line_height."px;";
}

if($quote_icon_color != "") {
    $quote_icon_styles .= "color: ".$quote_icon_color.";";
}

$html .= "<blockquote class='".$blockquote_classes."' style='".$blockquote_styles."'>"; //open blockquote
if($show_quote_icon == 'yes') {
    $html .= "<i class='fa fa-quote-right' style='".$quote_icon_styles."'></i>";
}

$html .= "<h5 class='blockquote-text' style='".$heading_styles."'>".$text."</h5>";
$html .= "</blockquote>"; //close blockquote

echo bridge_qode_get_module_part( $html );