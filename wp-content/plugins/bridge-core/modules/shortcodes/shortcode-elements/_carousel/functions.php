<?php
if (!function_exists('bridge_core_get_carousel_slider_array')){
	function bridge_core_get_carousel_slider_array() {
		$carousel_output = array("" => "");
		$terms = get_terms('carousels_category');
		$count = count($terms);
		if ( $count > 0 ):
			foreach ( $terms as $term ):
				$carousel_output[$term->name] = $term->slug;
			endforeach;
		endif;

		return $carousel_output;
	}
}