<?php

$html = '';
$image_src = '';
$image_alt = '';
$hover_image_src = '';
$hover_image_alt = '';

if (is_numeric($image)) {
    $image_src = wp_get_attachment_url($image);
    $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
}

if (is_numeric($hover_image)) {
    $hover_image_src = wp_get_attachment_url($hover_image);
    $hover_image_alt = get_post_meta($hover_image, '_wp_attachment_image_alt', true);
}

if($image_src != "") {

    $link = ($link != "") ? $link : "javascript: void(0)";

    $html .= '<div class="qode_client_holder">';
    $html .= '<div class="qode_client_holder_inner">';
    $html .= '<div class="qode_client_image_holder">';
    $html .= '<a itemprop="url" href="'.$link.'" target="'.$link_target.'">';
    $html .= '<img itemprop="image" class="qode_client_main_image" src="'.$image_src.'" alt="'.$image_alt.'" />';

    if($hover_image_src != ''){
        $html .= '<img itemprop="image" class="qode_client_hover_image" src="'.$hover_image_src.'" alt="'.$hover_image_alt.'" />';
    }

    $html .= '</a>';
    $html .= '</div>';
    $html .= '<div class="qode_client_image_hover">';

    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
}

echo bridge_qode_get_module_part( $html );