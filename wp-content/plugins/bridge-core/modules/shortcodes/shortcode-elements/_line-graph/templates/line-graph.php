<?php

$bridge_qode_options = bridge_qode_return_global_options();

$id = mt_rand(1000, 9999);
if($type == "rounded"){
    $bezierCurve = "true";
}else{
    $bezierCurve = "false";
}

$id = mt_rand(1000, 9999);
$html = "<div class='q_line_graf_holder'><div class='q_line_graf'><canvas id='lineGraph".$id."' height='".$height."' width='".$width."'></canvas></div><div class='q_line_graf_legend'><ul>";
$line_graph_array = explode(";", $content);
for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
    $line_graph_el = explode(",", $line_graph_array[$i]);
    $html .=  "<li><div class='color_holder' style='background-color: ".trim($line_graph_el[0]).";'></div><p style='color: ".$custom_color.";'>".trim($line_graph_el[1])."</p></li>";
}
$html .=  "</ul></div></div><script>var lineGraph".$id." = {labels : [";
$line_graph_labels_array = explode(",", $labels);
for ($i = 0 ; $i < count($line_graph_labels_array) ; $i = $i + 1){
    if ($i > 0) $html .= ",";
    $html .=  '"'.$line_graph_labels_array[$i].'"';
}
$html .= "],";
$html .= "datasets : [";
$line_graph_array = explode(";", $content);
for ($i = 0 ; $i < count($line_graph_array) ; $i = $i + 1){
    $line_graph_el = explode(",", $line_graph_array[$i]);
    if ($i > 0) $html .= ",";
    $values = "";
    for ($j = 2 ; $j < count($line_graph_el) ; $j = $j + 1){
        if ($j > 2) $values .= ",";
        $values .= $line_graph_el[$j];
    }
    $color = bridge_qode_hex2rgb(trim($line_graph_el[0]));
    $html .=  "{fillColor: 'rgba(".$color[0].",".$color[1].",".$color[2].",0.7)',data:[".$values."]}";
}
if(!empty($bridge_qode_options['text_fontsize'])){
    $text_fontsize = $bridge_qode_options['text_fontsize'];
}else{
    $text_fontsize = 15;
}
if(!empty($bridge_qode_options['text_color']) && $custom_color == ""){
    $text_color = $bridge_qode_options['text_color'];
} else if(empty($bridge_qode_options['text_color']) && $custom_color != ""){
    $text_color = $custom_color;
} else if(!empty($bridge_qode_options['text_color']) && $custom_color != ""){
    $text_color = $custom_color;
}else{
    $text_color = '#818181';
}
$html .= "]};
			var \$j = jQuery.noConflict();
			\$j(document).ready(function() {
				if(\$j('.touch .no_delay').length){
					new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
					scaleStepWidth : ".$scale_step_width.",
					scaleSteps : ".$scale_steps.",
					bezierCurve : ".$bezierCurve.",
					pointDot : false,
					scaleLineColor: '#505050',
					scaleFontColor : '".$text_color."',
					scaleFontSize : ".$text_fontsize.",
					scaleGridLineColor : '#e1e1e1',
					datasetStroke : false,
					datasetStrokeWidth : 0,
					animationSteps : 120,});
				}else{
					\$j('#lineGraph".$id."').appear(function() {
						new Chart(document.getElementById('lineGraph".$id."').getContext('2d')).Line(lineGraph".$id.",{scaleOverride : true,
						scaleStepWidth : ".$scale_step_width.",
						scaleSteps : ".$scale_steps.",
						bezierCurve : ".$bezierCurve.",
						pointDot : false,
						scaleLineColor: '#000000',
						scaleFontColor : '".$text_color."',
						scaleFontSize : ".$text_fontsize.",
						scaleGridLineColor : '#e1e1e1',
						datasetStroke : false,
						datasetStrokeWidth : 0,
						animationSteps : 120,});
					},{accX: 0, accY: -200});
				}
			});
		</script>";

echo bridge_qode_get_module_part( $html );