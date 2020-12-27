<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );
 ?>

<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	<div class="input">
		<label><?php esc_html_e( 'Icon', 'bridge-core' ); ?></label>
		<select id="icon" name="icon">
			<option value=""></option>
			<?php
			$fa_icons = getFontAwesomeIconArray();
			foreach ($fa_icons as $key => $value) {
			?>
				<option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($key); ?></option>
			<?php
			}
			?>
		</select>
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Type', 'bridge-core' ); ?></label>
        <select id="icon_type" name="icon_type">
            <option value="circle"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
            <option value="transparent"><?php esc_html_e( 'Transparent', 'bridge-core' ); ?></option>
        </select>
    </div>
	<div class="input">
		<label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="icon_color" id="icon_color" value="" maxlength="10" size="10" />
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Top Gradient Background Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input type="text" name="icon_top_gradient_background_color" id="icon_top_gradient_background_color" value="" size="10" maxlength="10" />
    </div>
	<div class="input">
		<label><?php esc_html_e( 'Icon Bottom Gradient Background Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input type="text" name="icon_bottom_gradient_background_color" id="icon_bottom_gradient_background_color" value="" size="10" maxlength="10" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Icon Border Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input type="text" name="icon_border_color" id="icon_border_color" value="" size="10" maxlength="10" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Title', 'bridge-core' ); ?></label>
		<input name="title" id="title" value="" maxlength="100" size="55" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Title Color', 'bridge-core' ); ?></label>
		<div class="colorSelector"><div style=""></div></div>
		<input name="title_color" id="title_color" value="" maxlength="12" size="12" />
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Title Size (px)', 'bridge-core' ); ?></label>
        <input name="title_size" id="title_size" value="" maxlength="100" size="55" />
    </div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>