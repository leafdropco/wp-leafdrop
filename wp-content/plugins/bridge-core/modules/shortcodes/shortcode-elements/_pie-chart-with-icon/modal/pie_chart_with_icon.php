<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Percentage', 'bridge-core' ); ?></label>
            <input name="percentage" id="percentage" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Active Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="active_color" id="active_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Bar Inactive Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="noactive_color" id="noactive_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Pie Chart Line Width (px)', 'bridge-core' ); ?></label>
            <input name="line_width" id="line_width" value="" size="12" />
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
            <label><?php esc_html_e( 'Icon Size', 'bridge-core' ); ?></label>
            <select name="icon_size" id="icon_size">
                <option value="fa-lg"><?php esc_html_e( 'Tiny', 'bridge-core' ); ?></option>
                <option value="fa-2x"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
                <option value="fa-3x"><?php esc_html_e( 'Medium', 'bridge-core' ); ?></option>
                <option value="fa-4x"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
                <option value="fa-5x"><?php esc_html_e( 'Very Large', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" size="12" />
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
            <input name="title_color" id="title_color" value="" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <input name="text" id="text" value="" size="55" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Color', 'bridge-core' ); ?></label>
            <input name="text_color" id="text_color" value="" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>