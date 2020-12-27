<?php

$qodeIconCollections = bridge_qode_return_icon_collections();

//init variables
$html                   = "";
$icon_html              = "";
$message_classes        = "";
$message_styles         = "";
$icon_styles            = "";
$close_button_styles    = "";

if($type == "with_icon"){
    $message_classes .= " with_icon";
}

if($background_color != "") {
    $message_styles .= "background-color: ".$background_color.";";
}
if($border == "yes"){

    $message_styles .= "border-style:solid;";
    if($border_width!= ""){
        $message_styles .= "border-width: ".$border_width."px;";
    }
    if($border_color != ""){
        $message_styles .= "border-color: ".$border_color.";";
    }

}
if($icon_color != "") {
    $icon_styles .= "color: ".$icon_color.";";
}

if($icon_background_color != "") {
    $icon_styles .= " background-color: ".$icon_background_color.";";
}

if($close_button_color != "") {
    $close_button_styles .= "color: ".$close_button_color.";";
}

$html .= "<div class='q_message ".$message_classes."' style='".$message_styles."'>";
$html .= "<div class='q_message_inner'>";
if($type == "with_icon"){
    $icon_html .= '<div class="q_message_icon_holder"><div class="q_message_icon"><div class="q_message_icon_inner">';
    if($custom_icon != "") {
        if(is_numeric($custom_icon)) {
            $custom_icon_src = wp_get_attachment_url( $custom_icon );
        } else {
            $custom_icon_src = $custom_icon;
        }

        $icon_html .= '<img itemprop="image" src="' . $custom_icon_src . '" alt="">';
    } else {
	    if( empty( $is_elementor ) || ! $is_elementor ){
	        $icon_pack = 'font_awesome';
        }

        if( $qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) ) {
            $icon_html .= $qodeIconCollections->getIconHTML(
                ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
                $icon_pack,
                array('icon_attributes' => array('style' => $icon_styles, 'class' => $icon_size)));
            //$icon_html .= "<i class='fa ".$icon." ". $icon_size . "' style='".$icon_styles."'></i>";
        }
    }
    $icon_html .= '</div></div></div>';
}

$html .= $icon_html;

$html .= "<a href='#' class='close'>";
$html .= "<i class='fa fa-times' style='".$close_button_styles."'></i>";
$html .= "</a>"; //close a.close
$html .= "<div class='message_text_holder'><div class='message_text'><div class='message_text_inner'>".do_shortcode($content)."</div></div></div>";

$html .= "</div></div>"; //close message text div
echo bridge_qode_get_module_part( $html );