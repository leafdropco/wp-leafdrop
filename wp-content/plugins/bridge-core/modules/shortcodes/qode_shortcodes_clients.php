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
                <option value="two_columns"><?php esc_html_e( 'Two', 'bridge-core' ); ?></option>
                <option value="three_columns"><?php esc_html_e( 'Three', 'bridge-core' ); ?></option>
                <option value="four_columns"><?php esc_html_e( 'Four', 'bridge-core' ); ?></option>
                <option value="five_columns"><?php esc_html_e( 'Five', 'bridge-core' ); ?></option>
                <option value="six_columns"><?php esc_html_e( 'Six', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>