<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
            <select name="type" id="type">
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="square"><?php esc_html_e( 'Square', 'bridge-core' ); ?></option>
                <option value="circle"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Letter', 'bridge-core' ); ?></label>
            <input type="text" name="letter" id="letter" value="" size="5"/>
        </div>
		<div class="input">
            <label><?php esc_html_e( 'Font Size (px)', 'bridge-core' ); ?></label>
            <input type="text" name="font_size" id="font_size" value="" size="5"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Letter Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="color" id="color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Background Color (Only for Square and Circle type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Border Color (Only for Square and Circle type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>