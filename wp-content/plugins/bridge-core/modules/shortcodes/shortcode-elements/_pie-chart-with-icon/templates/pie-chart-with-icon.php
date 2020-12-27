<?php

$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

$html = '';
$html .= '<div class="q_pie_chart_with_icon_holder"><div class="q_percentage_with_icon" data-percent="' . $percent . '" data-linewidth="' . $line_width . '" data-active="' . $active_color . '" data-noactive="' . $noactive_color . '">';
$html .= '<i class="fa '.$icon.' '.$icon_size.'"';
if ($icon_color != "") {
    $html .= ' style="color: ' . $icon_color . ';"';
}
$html .= '></i>';
$html .= '</div><div class="pie_chart_text">';
if ($title != "") {
    $html .= '<'.$title_tag.' class="pie_title"';
    if ($title_color != "") {
        $html .= ' style="color: ' . $title_color . ';"';
    }
    $html .= '>' . $title . '</'.$title_tag.'>';
}
if ($text != "") {
    $html .= '<p ';
    if ($text_color != "") {
        $html .= ' style="color: ' . $text_color . ';"';
    }
    $html .= '>' . $text . '</p>';
}
$html .= "</div></div>";
echo bridge_qode_get_module_part( $html );