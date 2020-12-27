<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Columns', 'bridge-core' ); ?></label>
            <select name="columns" id="columns">
                <option value="three_columns"><?php esc_html_e( 'Three', 'bridge-core' ); ?></option>
                <option value="four_columns"><?php esc_html_e( 'Four', 'bridge-core' ); ?></option>
                <option value="five_columns"><?php esc_html_e( 'Five', 'bridge-core' ); ?></option>
            </select>
        </div>
		<div class="input">
            <label><?php esc_html_e( 'Columns', 'bridge-core' ); ?></label>
            <select name="circle_line" id="circle_line">
                <option value="no_line"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
                <option value="with_line"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>