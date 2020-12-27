<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
  <div class="input">
    <label><?php esc_html_e( 'Text Align', 'bridge-core' ); ?></label>
    <select name="text_align" id="text_align">
			<option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
			<option value="center"><?php esc_html_e( 'Center', 'bridge-core' ); ?></option>
			<option value="right"><?php esc_html_e( 'Right', 'bridge-core' ); ?></option>
    </select>
  </div>
	<div class="input">
    <label><?php esc_html_e( 'Css Animation', 'bridge-core' ); ?></label>
    <select name="css_animation" id="css_animation">
			<option value=""><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
			<option value="element_from_right"><?php esc_html_e( 'Elements Shows From Left Side', 'bridge-core' ); ?></option>
			<option value="element_from_top"><?php esc_html_e( 'Elements Shows From Right Side', 'bridge-core' ); ?></option>
			<option value="element_from_top"><?php esc_html_e( 'Elements Shows From Top Side', 'bridge-core' ); ?></option>
			<option value="element_from_bottom"><?php esc_html_e( 'Elements Shows From Bottom Side', 'bridge-core' ); ?></option>
			<option value="element_from_fade"><?php esc_html_e( 'Elements Shows From Fade', 'bridge-core' ); ?></option>
    </select>
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
</form>
</div>