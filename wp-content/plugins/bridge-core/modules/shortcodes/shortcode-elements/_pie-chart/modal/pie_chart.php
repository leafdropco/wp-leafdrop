<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Percentage', 'bridge-core' ); ?></label>
            <input name="percentage" id="percentage" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percentage Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="percentage_color" id="percentage_color" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Active Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="active_color" id="active_color" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Inactive Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="noactive_color" id="noactive_color" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Pie Chart Line Width (px)', 'bridge-core' ); ?></label>
            <input name="line_width" id="line_width" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Title', 'bridge-core' ); ?></label>
            <input name="title" id="title" value="" size="25" />
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
            <label><?php esc_html_e( 'Title Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="title_color" id="title_color" value="" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <input name="text" id="text" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="text_color" id="text_color" value="" size="10" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>