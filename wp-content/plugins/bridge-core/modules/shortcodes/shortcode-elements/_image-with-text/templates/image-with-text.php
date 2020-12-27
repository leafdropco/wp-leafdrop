<?php

$headings_array = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');

//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

$html = '';
$html .= '<div class="image_with_text">';
if (is_numeric($image)) {
    $image_src = wp_get_attachment_url($image);
} else {
    $image_src = $image;
}
$html .= '<img itemprop="image" src="' . $image_src . '" alt="' . $title . '" />';
$html .= '<'.$title_tag.' ';
if ($title_color != "") {
    $html .= 'style="color:' . $title_color . ';"';
}
$html .= '>' . $title . '</'.$title_tag.'>';
$html .= '<span style="margin: 6px 0px;" class="separator transparent"></span>';
$html .= do_shortcode($content);
$html .= '</div>';

echo bridge_qode_get_module_part( $html );