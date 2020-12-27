<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
            <select name="full_width" id="full_width">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Content in grid', 'bridge-core' ); ?></label>
            <select name="content_in_grid" id="content_in_grid">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
         <div class="input">
            <label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
            <select name="type" id="type">
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="simple"><?php esc_html_e( 'Simple', 'bridge-core' ); ?></option>
                <option value="with_icon"><?php esc_html_e( 'With Icon', 'bridge-core' ); ?></option>
            </select>
        </div>
		<div class="input">
            <label>Icon (Only for 'With Icon' type)</label>
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
            <label><?php esc_html_e( 'Icon Size', 'bridge-core' ); ?></label>
            <select name="icon_size" id="icon_size">
                <option value=""></option>
                <option value="fa-lg"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
                <option value="fa-2x"><?php esc_html_e( 'Medium', 'bridge-core' ); ?></option>
                <option value="fa-3x"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
		<div class="input">
            <label><?php esc_html_e( 'Custom Image', 'bridge-core' ); ?></label>
            <input id="custom_icon" type="text" name="custom_icon" class="popup_image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
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
            <label><?php esc_html_e( 'Show button', 'bridge-core' ); ?></label>
            <select name="show_button" id="show_button">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Text', 'bridge-core' ); ?></label>
            <input name="button_text" id="button_text" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Link', 'bridge-core' ); ?></label>
            <input name="button_link" id="button_link" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Target', 'bridge-core' ); ?></label>
            <select name="button_target" id="button_target">
                <option value=""></option>
                <option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
                <option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Text Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_text_color" id="button_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button hover text color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_text_color" id="button_hover_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_background_color" id="button_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Hover Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_background_color" id="button_hover_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_border_color" id="button_border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Button Hover Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="button_hover_border_color" id="button_hover_border_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="<?php esc_html_e('Submit', 'bridge-core'); ?>" />
        </div>
    </form>
</div>