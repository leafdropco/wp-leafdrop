<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	<div class="input">
		<label><?php esc_html_e( 'Interval', 'bridge-core' ); ?></label>
		<select name="interval" id="interval">
			<option value="0"><?php esc_html_e( 'Disable', 'bridge-core' ); ?></option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="10"><?php esc_html_e( '10', 'bridge-core' ); ?></option>
			<option value="15"><?php esc_html_e( '15', 'bridge-core' ); ?></option>
		</select>
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Style', 'bridge-core' ); ?></label>
		<select name="style" id="style">
			<option value="horizontal"><?php esc_html_e( 'Horizontal Center', 'bridge-core' ); ?></option>
			<option value="boxed"><?php esc_html_e( 'Boxed', 'bridge-core' ); ?></option>
			<option value="vertical"><?php esc_html_e( 'Vertical Left', 'bridge-core' ); ?></option>
			<option value="vertical_right"><?php esc_html_e( 'Vertical Right', 'bridge-core' ); ?></option>
		</select>
	</div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>