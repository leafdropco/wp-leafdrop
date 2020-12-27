<?php

$count_total = $params['query_results']->post_count;
$count = $params['count'];
?>
<div class='qodef-portfolio-item-count'>
	<span class='qodef-item-count-current'><?php echo esc_html( $count ); ?></span>
	<span class='qodef-item-count-total'><?php echo esc_html( $count_total ); ?></span>
</div>