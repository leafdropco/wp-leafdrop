<?php
global $qodeIconCollections;

$html =  "<div class='q_progress_bars_icons_holder'><div class='q_progress_bars_icons'><div class='q_progress_bars_icons_inner $type ";
if($custom_size != ""){
	$html .= "custom_size";
} else {
	$html .= "$size";
}
$html .= " clearfix' data-number='".$active_number."'";
if($custom_size != ""){
	$html .= " data-size='".$custom_size."'";
}
if($element_appearance != "") {
	$html .= " data-element-appearance='".$element_appearance."'";
}

$html .= ">";
$i = 0;

$icon_pack = $icon_pack == '' ? 'font_awesome' : $icon_pack;

$add_active_icon = '';
$add_inactive_icon = '';
if($qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) && ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)} != ""){
	$icon_inactive_style = "";
//			if($custom_size != ""){
//				$icon_inactive_style .= 'font-size: '.$custom_size.'px;';
//			}
	if($icon_color != ""){
		$icon_inactive_style .= 'color: '.$icon_color.';';
	}

	if($background_color != "") {
		$icon_inactive_style .= "background-color: {$background_color};";
	}

	$icon_active_style = "";
//			if($custom_size != ""){
//				$icon_active_style .= 'font-size: '.$custom_size.'px;';
//			}
	if($icon_active_color != ""){
		$icon_active_style .= 'color: '.$icon_active_color.';';
	}

	if($background_active_color != "") {
		$icon_active_style .= "background-color: {$background_active_color};";
	}

    if( $qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) ) {
        $add_active_icon .= $qodeIconCollections->getIconHTML(
            ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
            $icon_pack,
            array('icon_attributes' => array('style' => $icon_active_style)));
    }

    if( $qodeIconCollections->getIconCollectionParamNameByKey($icon_pack) ) {
        $add_inactive_icon .= $qodeIconCollections->getIconHTML(
            ${$qodeIconCollections->getIconCollectionParamNameByKey($icon_pack)},
            $icon_pack,
            array('icon_attributes' => array('style' => $icon_inactive_style)));
    }
}

while ($i < $icons_number) {
	$html .= "<div class='bar'><span class='bar_noactive fa-stack ";
	if($size != ""){
		if($size == "tiny"){
			$html .= "fa-lg";
		} else if($size == "small"){
			$html .= "fa-2x";
		} else if($size == "medium"){
			$html .= "fa-3x";
		} else if($size == "large"){
			$html .= "fa-4x";
		} else if($size == "very_large"){
			$html .= "fa-5x";
		}
	}
	$html .= "'";
	if($type == "circle" || $type == "square"){
		if($background_active_color != "" || $border_active_color != ""){
			$html .= " style='";
			if($background_active_color != ""){
				$html .= "background-color: ".$background_active_color.";";
			}
			if($border_active_color != ""){
				$html .= " border-color: ".$border_active_color.";";
			}
			$html .= "'";
		}
	}
	$html .= ">";

	$html .= $add_active_icon;

	$html .= "</span><span class='bar_active fa-stack ";
	if($size != ""){
		if($size == "tiny"){
			$html .= "fa-lg";
		} else if($size == "small"){
			$html .= "fa-2x";
		} else if($size == "medium"){
			$html .= "fa-3x";
		} else if($size == "large"){
			$html .= "fa-4x";
		} else if($size == "very_large"){
			$html .= "fa-5x";
		}
	}
	$html .= "'";
	if($type == "circle" || $type == "square"){
		if($background_color != "" || $border_color != ""){
			$html .= " style='";
			if($background_color != ""){
				$html .= "background-color: ".$background_color.";";
			}
			if($border_color != ""){
				$html .= " border-color: ".$border_color.";";
			}
			$html .= "'";
		}
	}
	$html .= ">";

	$html .= $add_inactive_icon;

	$html .= "</span></div>";
	$i++;
}
$html .= "</div></div></div>";

echo bridge_qode_get_module_part( $html );