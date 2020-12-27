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
                <option value=""></option>
                <option value="fa-lg"><?php esc_html_e( 'Tiny', 'bridge-core' ); ?></option>
                <option value="fa-2x"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
                <option value="fa-3x"><?php esc_html_e( 'Medium', 'bridge-core' ); ?></option>
                <option value="fa-4x"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
                <option value="fa-5x"><?php esc_html_e( 'Very Large', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Custom Size (px)', 'bridge-core' ); ?></label>
            <input name="custom_size" id="custom_size" value="" maxlength="10" size="10" />
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
            <label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
            <select name="type" id="type">
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="circle"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
                <option value="square"><?php esc_html_e( 'Square', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Position', 'bridge-core' ); ?></label>
            <select name="position" id="position">
                <option value=""><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
                <option value="center"><?php esc_html_e( 'Center', 'bridge-core' ); ?></option>
                <option value="right"><?php esc_html_e( 'Right', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Border', 'bridge-core' ); ?></label>
            <select name="border" id="border">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Border Color (Only for Square type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="border_color" id="border_color" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Border Width (px) (Only for Square type)', 'bridge-core' ); ?></label>
            <input name="border_width" id="border_width" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Margin (top right bottom left):', 'bridge-core' ); ?></label>
            <input name="margin" id="margin" value="" maxlength="12" size="12" />
        </div>
        <div class="input">    
            <label><?php esc_html_e( 'Icon Animation', 'bridge-core' ); ?></label>
            <select name="icon_animation" id="icon_animation">
                <option value=""><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
                <option value="q_icon_animation"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">    
            <label><?php esc_html_e( 'Icon Animation Delay', 'bridge-core' ); ?></label>
            <input name="icon_animation_delay" id="icon_animation_delay" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link', 'bridge-core' ); ?></label>
            <input name="link" id="link" value="" maxlength="100" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Target', 'bridge-core' ); ?></label>
            <select name="target" id="target">
                <option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
                <option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>

</div>