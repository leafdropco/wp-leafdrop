<?php

if(!function_exists('bridge_core_remove_auto_ptag')) {
	function bridge_core_remove_auto_ptag($content, $autop = false) {
		if($autop) {
            $content = preg_replace('#^<\/p>|<p>$#', '', $content);
		}

		return do_shortcode($content);
	}
}

if(!function_exists('bridge_core_comparative_feature_table_mark')) {
	function bridge_core_comparative_feature_table_mark($value) {
		if($value == 'yes') {
			$content = '<span class="icon_check qode-cft-mark qode-cft-active"></span>';
		} else {
			$content = '<span class="icon_close qode-cft-mark qode-cft-inactive"></span>';
		}

		return do_shortcode($content);
	}
}

if(!function_exists('bridge_core_get_pricing_table_html')) {
	/**
	 * Calls pricing table shortcode with given parameters and returns it's output
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function bridge_core_get_pricing_table_html($params, $content) {
		$button_html = bridge_qode_execute_shortcode('qode_pricing_tables', $params, $content);
		$button_html = str_replace("\n", '', $button_html);
		return $button_html;
	}
}

if(!function_exists('bridge_core_get_pricing_table_item_html')) {
	/**
	 * Calls pricing table shortcode with given parameters and returns it's output
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function bridge_core_get_pricing_table_item_html($params, $content) {
	    if( isset( $params['is_elementor_listing_package'] ) && $params['is_elementor_listing_package']  ){
	        return bridge_core_get_shortcode_template_part('templates/pricing-table', '_pricing-tables', '', $params);
        } else{
            $button_html = bridge_qode_execute_shortcode('qode_pricing_table', $params, $content);
            $button_html = str_replace("\n", '', $button_html);
            return $button_html;
        }
	}
}