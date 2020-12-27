<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e('Text', 'bridge-core'); ?></label>
            <textarea name="text" cols="50" id="text"><?php esc_html_e( 'Blockquote text', 'bridge-core' ); ?></textarea>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="text_color" id="text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Width (%)', 'bridge-core' ); ?></label>
            <input name="blockquote_width" id="blockquote_width" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Line Height (px)', 'bridge-core' ); ?></label>
            <input name="line_height" id="line_height" value="" maxlength="12" size="12" />
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
            <label><?php esc_html_e( 'Show Quote Icon', 'bridge-core' ); ?></label>
            <select name="show_quote_icon" id="show_quote_icon">
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Quote Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="quote_icon_color" id="quote_icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>