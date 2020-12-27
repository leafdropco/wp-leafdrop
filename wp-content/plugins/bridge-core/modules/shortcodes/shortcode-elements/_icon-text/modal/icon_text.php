<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>

<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Box type', 'bridge-core' ); ?></label>
            <select name="box_type" id="box_type">
                <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                <option value="icon_in_a_box'"><?php esc_html_e( 'Icon in a box', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Box Border Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="box_border_color" id="box_border_color" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Box Backround Color (only for icon in a box type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="box_background_color" id="box_background_color" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
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
                <label><?php esc_html_e( 'Icon Type', 'bridge-core' ); ?></label>
                <select name="icon_type" id="icon_type">
                    <option value="normal"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
                    <option value="circle"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
                    <option value="square"><?php esc_html_e( 'Square', 'bridge-core' ); ?></option>
                </select>
            </div>
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
            <label><?php esc_html_e( 'Use Custom Icon Size', 'bridge-core' ); ?></label>
            <input name="use_custom_icon_size" id="use_custom_icon_size" value="" maxlength="10" size="10" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Custom Icon Size (px)', 'bridge-core' ); ?></label>
            <input name="custom_icon_size" id="custom_icon_size" value="" maxlength="10" size="10" />
        </div>
		<div class="input">
			<label><?php esc_html_e( 'Custom Icon Size inside a circle or square (px)', 'bridge-core' ); ?></label>
			<input name="custom_icon_size_inner" id="custom_icon_size_inner" value="" maxlength="10" size="10" />
		</div>
        <div class="input">
            <label><?php esc_html_e( 'Custom Icon Margin (px)', 'bridge-core' ); ?></label>
            <input name="custom_icon_margin" id="custom_icon_margin" value="" maxlength="10" size="10" />
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
            <label><?php esc_html_e( 'Image', 'bridge-core' ); ?></label>
            <input id="image" type="text" name="image" class="popup_image" id="image" value="" size="55" />
            <input class="upload_button" type="button" value="Upload file" id="popup_image_button">
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Position (only for normal box type)', 'bridge-core' ); ?></label>
            <select name="icon_position" id="icon_position">
                <option value="top"><?php esc_html_e( 'Top', 'bridge-core' ); ?></option>
                <option value="left"><?php esc_html_e( 'Left', 'bridge-core' ); ?></option>
                <option value="left_from_title"><?php esc_html_e( 'Left From Title', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon margin (top right bottom left)', 'bridge-core' ); ?></label>
            <input type="text" name="icon_margin" id="icon_margin" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Border Color (Only for Square and Circle type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input type="text" name="icon_border_color" id="icon_border_color" value="" size="12" maxlength="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Icon Background Color (only for square and circle icon type)', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="icon_background_color" id="icon_background_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Title', 'bridge-core' ); ?></label>
            <input name="title" id="title" value="" maxlength="100" size="12" />
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
            <input name="title_color" id="title_color" value="" maxlength="100" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text', 'bridge-core' ); ?></label>
            <input name="text" id="text" value="" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="text_color" id="text_color" value="" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link', 'bridge-core' ); ?></label>
            <input name="link" id="link" value="" maxlength="100" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link Text', 'bridge-core' ); ?></label>
            <input name="link_text" id="link_text" value="" maxlength="100" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Target', 'bridge-core' ); ?></label>
            <select name="target" id="target">
                <option value=""></option>
                <option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
                <option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Link Color', 'bridge-core' ); ?></label>
            <div class="colorSelector"><div style=""></div></div>
            <input name="link_color" id="link_color" value="" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>

</div>