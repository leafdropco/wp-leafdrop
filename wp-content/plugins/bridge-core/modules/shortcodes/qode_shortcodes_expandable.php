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
    <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
    <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label><?php esc_html_e( 'Border Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
    <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
    <label><?php esc_html_e( 'More Button Label', 'bridge-core' ); ?></label>
    <input name="more_button_label" id="more_button_label" value="" size="11" />
  </div>
	<div class="input">
    <label><?php esc_html_e( 'Less Button Label', 'bridge-core' ); ?></label>
    <input name="less_button_label" id="less_button_label" value="" size="11" />
  </div>
	<div class="input">
    <label><?php esc_html_e( 'Button Position', 'bridge-core' ); ?></label>
    <select name="button_position" id="button_position">
			<option value=""></option>
			<option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
			<option value="right"><?php esc_html_e( 'Right', 'bridge-core' ); ?></option>
			<option value="center"><?php esc_html_e( 'Center', 'bridge-core' ); ?></option>
    </select>
  </div>
	<div class="input">
    <label><?php esc_html_e( 'Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
    <input name="color" id="color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
 
</form>
</div>