<?php
$full_path = __FILE__;
$path = explode( 'wp-content', $full_path );
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
    <div class="input">
        <label><?php esc_html_e( 'Number of Icons', 'bridge-core' ); ?></label>
        <input name="icons_number" id="icons_number" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Number of Active Icons', 'bridge-core' ); ?></label>
        <input name="active_number" id="active_number" value="" maxlength="12" size="12" />
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
        <label><?php esc_html_e( 'Size', 'bridge-core' ); ?></label>
        <select name="size" id="size">
            <option value="tiny"><?php esc_html_e( 'Tiny', 'bridge-core' ); ?></option>
            <option value="small"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
            <option value="medium"><?php esc_html_e( 'Medium', 'bridge-core' ); ?></option>
            <option value="large"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
            <option value="very_large"><?php esc_html_e( 'Very Large', 'bridge-core' ); ?></option>
        </select>
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Custom Size (px)', 'bridge-core' ); ?></label>
        <input name="custom_size" id="custom_size" value="" maxlength="10" size="10" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Active Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input type="text" name="icon_active_color" id="icon_active_color" value="" size="12" maxlength="12" />
    </div>
     <div class="input">
        <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Background Active Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input type="text" name="background_active_color" id="background_active_color" value="" size="12" maxlength="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Border Color (Only for Square and Circle type)', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input type="text" name="border_color" id="border_color" value="" size="12" maxlength="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Border Active Color (Only for Square and Circle type)', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input type="text" name="border_active_color" id="border_active_color" value="" size="12" maxlength="12" />
    </div>
    <div class="input">
        <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
    </div>
</form>
</div>