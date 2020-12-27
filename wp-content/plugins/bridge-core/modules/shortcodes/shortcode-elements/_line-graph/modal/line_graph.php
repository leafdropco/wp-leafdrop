<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	<div class="input">
		<label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
		<select name="type" id="type">
			<option value=""></option>
			<option value="rounded"><?php esc_html_e( 'Rounded edges', 'bridge-core' ); ?></option>
			<option value="sharp"><?php esc_html_e( 'Sharp edges', 'bridge-core' ); ?></option>
		</select>
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Width', 'bridge-core' ); ?></label>
		<input name="width" id="width" value="" size="5" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Height', 'bridge-core' ); ?></label>
		<input name="height" id="height" value="" size="5" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Color', 'bridge-core' ); ?></label>
                <div class="colorSelector"><div style=""></div></div>
		<input name="custom_color" id="custom_color" value="" size="10" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Scale steps', 'bridge-core' ); ?></label>
		<input name="scaleSteps" id="scaleSteps" value="" size="5" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Scale step width', 'bridge-core' ); ?></label>
		<input name="scaleStepWidth" id="scaleStepWidth" value="" size="5" />
	</div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>