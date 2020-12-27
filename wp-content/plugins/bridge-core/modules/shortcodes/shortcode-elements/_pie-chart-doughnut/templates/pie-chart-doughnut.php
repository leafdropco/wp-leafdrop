<?php

$pattern = "/\\d+(,?#?\\w*\\s?;?)*/";

preg_match_all($pattern, $content, $matches);

if (!empty($matches)) {
    if(!empty($matches[0])) {
        $match = $matches[0][0];
    } else {
        return $html = '<p>' . esc_html__ ('Insert valid Pie Chart data', 'bridge-core' ) . '</p>';
    }
}
$id = mt_rand(1000, 9999);
$html = "<div class='q_pie_graf_holder'><div class='q_pie_graf'><canvas id='pie".$id."' height='".$height."' width='".$width."'></canvas></div><div class='q_pie_graf_legend'><ul>";
$pie_chart_array = explode(";", $match);
for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    $pie_chart_el = explode(",", $pie_chart_array[$i]);
    $html .= "<li><div class='color_holder' style='background-color: ".trim($pie_chart_el[1]).";'></div><p style='color: ".$color.";'>".trim($pie_chart_el[2])."</p></li>";
}
$html .= "</ul></div></div><script>var pie".$id." = [";
$pie_chart_array = explode(";", $match);
for ($i = 0 ; $i < count($pie_chart_array) ; $i = $i + 1){
    $pie_chart_el = explode(",", $pie_chart_array[$i]);
    if ($i > 0) $html .= ",";
    $html .= "{value: ".trim($pie_chart_el[0]).",color:'".trim($pie_chart_el[1])."'}";
}
$html .= "];
		var \$j = jQuery.noConflict();
		\$j(document).ready(function() {
			if(\$j('.touch .no_delay').length){
				new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
			}else{
				\$j('#pie".$id."').appear(function() {
					new Chart(document.getElementById('pie".$id."').getContext('2d')).Doughnut(pie".$id.",{segmentStrokeColor : 'transparent',});
				},{accX: 0, accY: -200});
			}
		});
	</script>";
echo bridge_qode_get_module_part( $html );