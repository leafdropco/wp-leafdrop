<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
  <div class="input">
    <label><?php esc_html_e( 'Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="color" id="color" value="" maxlength="12" size="12" />
  </div>
	<div class="input">
    <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="background_color" id="background_color" value="" maxlength="12" size="12" />
  </div>
  <div class="input">
      <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
  </div>
</form>
</div>
<script type="text/javascript">
	//colorPicker();
</script>