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
                <option value="zero"><?php esc_html_e( 'Zero Counter', 'bridge-core' ); ?></option>
                <option value="random"><?php esc_html_e( 'Random Counter', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Box', 'bridge-core' ); ?></label>
            <select name="box" id="box">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Box Border Color', 'bridge-core' ); ?></label>
            <input name="box_border_color" id="box_border_color" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Position', 'bridge-core' ); ?></label>
            <select name="position" id="position">
                <option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
                <option value="right"><?php esc_html_e( 'Right', 'bridge-core' ); ?></option>
                <option value="center"><?php esc_html_e( 'Center', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Digit', 'bridge-core' ); ?></label>
            <input name="digit" id="digit" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Font size (px)', 'bridge-core' ); ?></label>
            <input name="font_size" id="font_size" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Font color', 'bridge-core' ); ?></label>
            <input name="font_color" id="font_color" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <input name="text" id="text" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Size (px)', 'bridge-core' ); ?></label>
            <input name="text_size" id="text_size" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text color', 'bridge-core' ); ?></label>
            <input name="text_color" id="text_color" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Separator', 'bridge-core' ); ?></label>
            <select name="position" id="position">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Separator color', 'bridge-core' ); ?></label>
            <input name="separator_color" id="separator_color" value="" maxlength="12" size="12"/>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit"/>
        </div>
    </form>
</div>