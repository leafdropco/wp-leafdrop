<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Title', 'bridge-core' ); ?></label>
            <input name="title" id="title" value="" size="12" />
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
            <label><?php esc_html_e( 'Title Size', 'bridge-core' ); ?></label>
            <input name="title_size" id="title_size" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="bar_color" id="bar_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="bar_border_color" id="bar_border_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Background Bottom Gradient Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_bottom_gradient_color" id="background_bottom_gradient_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percent', 'bridge-core' ); ?></label>
            <input name="percent" id="percent" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percentage Text Size', 'bridge-core' ); ?></label>
            <input name="percentage_text_size" id="percentage_text_size" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Percentage Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="percentage_color" id="percentage_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <textarea name="text" id="text" value="" size="12"></textarea>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>