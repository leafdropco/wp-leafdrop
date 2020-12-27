<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Image', 'bridge-core' ); ?></label>
            <input id="image" type="text" name="image" class="popup_image" id="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Hover Image', 'bridge-core' ); ?></label>
            <input id="hover_image" type="text" name="hover_image" class="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link', 'bridge-core' ); ?></label>
            <input name="link" id="link" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Target', 'bridge-core' ); ?></label>
            <select name="target">
                <option value=""></option>
                <option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
                <option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Animation', 'bridge-core' ); ?></label>
            <select name="animation">
                <option value=""></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Transition delay (in miliseconds)', 'bridge-core' ); ?></label>
            <input name="transition_delay" id="transition_delay" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>