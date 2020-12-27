<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
  <div class="input">
		<label><?php esc_html_e( 'Animation Type', 'bridge-core' ); ?></label>
      <select name="animation_type" id="animation_type">
          <option value="element_from_left"><?php esc_html_e( 'Elements Shows From Left Side', 'bridge-core' ); ?></option>
          <option value="element_from_right"><?php esc_html_e( 'Elements Shows From Right Side', 'bridge-core' ); ?></option>
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