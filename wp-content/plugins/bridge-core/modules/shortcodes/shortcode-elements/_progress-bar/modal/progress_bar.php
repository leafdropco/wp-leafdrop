<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Title', 'bridge-core' ); ?></label>
            <input name="title" id="title" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Title Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="title_color" id="title_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Title Tag', 'bridge-core' ); ?></label>
            <select name="title_tag" id="title_tag">
                <option value=""></option>
                <option value="h2"><?php esc_html_e( 'h2', 'bridge-core' ); ?></option>
                <option value="h3"><?php esc_html_e( 'h3', 'bridge-core' ); ?></option>
                <option value="h4"><?php esc_html_e( 'h4', 'bridge-core' ); ?></option>
                <option value="h5"><?php esc_html_e( 'h5', 'bridge-core' ); ?></option>
                <option value="h6"><?php esc_html_e( 'h6', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percent', 'bridge-core' ); ?></label>
            <input name="percent" id="percent" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percent Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="percent_color" id="percent_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Active Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="active_background_color" id="active_background_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Active Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="active_border_color" id="active_border_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Inactive Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="noactive_background_color" id="noactive_background_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Progress Bar Height (px)', 'bridge-core' ); ?></label>
            <input name="height" id="height" value="" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>

    </form>
</div>