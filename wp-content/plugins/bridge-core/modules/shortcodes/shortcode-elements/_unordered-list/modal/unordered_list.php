<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Style', 'bridge-core' ); ?></label>
            <select name="style" id="style">
                <option value="circle"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
                <option value="number"><?php esc_html_e( 'Number', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Number Type', 'bridge-core' ); ?></label>
            <select name="number_type" id="number_type">
                <option value="circle_number"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
                <option value="transparent_number"><?php esc_html_e( 'Transparent', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Animate List', 'bridge-core' ); ?></label>
            <select name="animate" id="animate">
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Font Weight', 'bridge-core' ); ?></label>
            <select name="font_weight" id="font_weight">                
                <option value=""><?php esc_html_e( 'Default', 'bridge-core' ); ?></option>
                <option value="light"><?php esc_html_e( 'Light', 'bridge-core' ); ?></option>
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="bold"><?php esc_html_e( 'Bold', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>