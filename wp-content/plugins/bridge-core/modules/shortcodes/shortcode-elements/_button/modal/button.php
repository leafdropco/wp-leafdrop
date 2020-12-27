<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Size', 'bridge-core' ); ?></label>
            <select name="size" id="size">
                <option value=""><?php esc_html_e( 'Default', 'bridge-core' ); ?></option>
                <option value="small"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
                <option value="medium"><?php esc_html_e( 'Medium', 'bridge-core' ); ?></option>
                <option value="large"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
                <option value="big_large"><?php esc_html_e( 'Big Large', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label><?php esc_html_e( 'Style', 'bridge-core' ); ?></label>
            <select name="style" id="style">
                <option value=""><?php esc_html_e( 'Default', 'bridge-core' ); ?></option>
                <option value="white"><?php esc_html_e( 'White', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <input name="text" id="text" value="" />
        </div>
        <div class="input">
        <label><?php esc_html_e( 'Icon', 'bridge-core' ); ?></label>
            <select id="icon" name="icon">
                <option value=""></option>
                <?php
                $fa_icons = getFontAwesomeIconArray();
                foreach ($fa_icons as $key => $value) {
                ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($key); ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link', 'bridge-core' ); ?></label>
            <input name="link" id="link" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Target', 'bridge-core' ); ?></label>
            <select name="target" id="target">
                <option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
                <option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="color" id="color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Hover Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="hover_color" id="hover_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Hover Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="hover_background_color" id="hover_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Hover Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="hover_border_color" id="hover_border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Font Style', 'bridge-core' ); ?></label>
            <select name="font_style" id="font_style">
                <option value=""></option>
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="italic"><?php esc_html_e( 'Italic', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Font Weight', 'bridge-core' ); ?></label>
            <select name="font_weight" id="font_weight">
                <option value=""></option>
                <option value="100"><?php esc_html_e( '100', 'bridge-core' ); ?></option>
                <option value="200"><?php esc_html_e( '200', 'bridge-core' ); ?></option>
                <option value="300"><?php esc_html_e( '300', 'bridge-core' ); ?></option>
                <option value="400"><?php esc_html_e( '400', 'bridge-core' ); ?></option>
                <option value="500"><?php esc_html_e( '500', 'bridge-core' ); ?></option>
                <option value="600"><?php esc_html_e( '600', 'bridge-core' ); ?></option>
                <option value="700"><?php esc_html_e( '700', 'bridge-core' ); ?></option>
                <option value="800"><?php esc_html_e( '800', 'bridge-core' ); ?></option>
                <option value="900"><?php esc_html_e( '900', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Align', 'bridge-core' ); ?></label>
            <select name="text_align" id="text_align">
                <option value=""></option>
                <option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
                <option value="right"><?php esc_html_e( 'Right', 'bridge-core' ); ?></option>
                <option value="center"><?php esc_html_e( 'Center', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label><?php esc_html_e( 'Margin', 'bridge-core' ); ?></label>
            <input name="margin" id="margin" value="" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>
<script type="text/javascript">
    //colorPicker();
</script>