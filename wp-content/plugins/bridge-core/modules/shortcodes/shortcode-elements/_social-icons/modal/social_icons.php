<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
<form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
	<div class="input">
		<label><?php esc_html_e( 'Type', 'bridge-core' ); ?></label>
		<select name="type" id="type">
			<option value="circle_social"><?php esc_html_e( 'Circle', 'bridge-core' ); ?></option>
			<option value="normal_social"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
		</select>
    </div>
	<div class="input">
		<label><?php esc_html_e( 'Social Icon', 'bridge-core' ); ?></label>
		<select name="icon" id="icon">
			<option value="fa-adn"><?php esc_html_e( 'ADN', 'bridge-core' ); ?></option>
			<option value="fa-android"><?php esc_html_e( 'Android', 'bridge-core' ); ?></option>
			<option value="fa-apple"><?php esc_html_e( 'Apple', 'bridge-core' ); ?></option>
			<option value="fa-bitbucket"><?php esc_html_e( 'Bitbucket', 'bridge-core' ); ?></option>
			<option value="fa-bitbucket-sign"><?php esc_html_e( 'Bitbucket-Sign', 'bridge-core' ); ?></option>
			<option value="fa-bitcoin"><?php esc_html_e( 'Bitcoin', 'bridge-core' ); ?></option>
			<option value="fa-btc"><?php esc_html_e( 'BTC', 'bridge-core' ); ?></option>
			<option value="fa-css3"><?php esc_html_e( 'CSS3', 'bridge-core' ); ?></option>
			<option value="fa-dribbble"><?php esc_html_e( 'Dribbble', 'bridge-core' ); ?></option>
			<option value="fa-dropbox"><?php esc_html_e( 'Dropbox', 'bridge-core' ); ?></option>
			<option value="fa-facebook"><?php esc_html_e( 'Facebook', 'bridge-core' ); ?></option>
			<option value="fa-facebook-sign"><?php esc_html_e( 'Facebook-Sign', 'bridge-core' ); ?></option>
			<option value="fa-flickr"><?php esc_html_e( 'Flickr', 'bridge-core' ); ?></option>
			<option value="fa-foursquare"><?php esc_html_e( 'Foursquare', 'bridge-core' ); ?></option>
			<option value="fa-github"><?php esc_html_e( 'GitHub', 'bridge-core' ); ?></option>
			<option value="fa-github-alt"><?php esc_html_e( 'GitHub-Alt', 'bridge-core' ); ?></option>
			<option value="fa-github-sign"><?php esc_html_e( 'GitHub-Sign', 'bridge-core' ); ?></option>
			<option value="fa-gittip"><?php esc_html_e( 'Gittip', 'bridge-core' ); ?></option>
			<option value="fa-google-plus"><?php esc_html_e( 'Google Plus', 'bridge-core' ); ?></option>
			<option value="fa-google-plus-sign"><?php esc_html_e( 'Google Plus-Sign', 'bridge-core' ); ?></option>
			<option value="fa-html5"><?php esc_html_e( 'HTML5', 'bridge-core' ); ?></option>
			<option value="fa-instagram"><?php esc_html_e( 'Instagram', 'bridge-core' ); ?></option>
			<option value="fa-linkedin"><?php esc_html_e( 'LinkedIn', 'bridge-core' ); ?></option>
			<option value="fa-linkedin-sign"><?php esc_html_e( 'LinkedIn-Sign', 'bridge-core' ); ?></option>
			<option value="fa-linux"><?php esc_html_e( 'Linux', 'bridge-core' ); ?></option>
			<option value="fa-maxcdn"><?php esc_html_e( 'MaxCDN', 'bridge-core' ); ?></option>
			<option value="fa-pinterest"><?php esc_html_e( 'Pinterest', 'bridge-core' ); ?></option>
			<option value="fa-pinterest-sign"><?php esc_html_e( 'Pinterest-Sign', 'bridge-core' ); ?></option>
			<option value="fa-renren"><?php esc_html_e( 'Renren', 'bridge-core' ); ?></option>
			<option value="fa-skype"><?php esc_html_e( 'Skype', 'bridge-core' ); ?></option>
			<option value="fa-stackexchange"><?php esc_html_e( 'StackExchange', 'bridge-core' ); ?></option>
			<option value="fa-trello"><?php esc_html_e( 'Trello', 'bridge-core' ); ?></option>
			<option value="fa-tumblr"><?php esc_html_e( 'Tumblr', 'bridge-core' ); ?></option>
			<option value="fa-tumblr-sign"><?php esc_html_e( 'Tumblr-Sign', 'bridge-core' ); ?></option>
			<option value="fa-twitter"><?php esc_html_e( 'Twitter', 'bridge-core' ); ?></option>
			<option value="fa-twitter-sign"><?php esc_html_e( 'Twitter-Sign', 'bridge-core' ); ?></option>
			<option value="fa-vk"><?php esc_html_e( 'VK', 'bridge-core' ); ?></option>
			<option value="fa-weibo"><?php esc_html_e( 'Weibo', 'bridge-core' ); ?></option>
			<option value="fa-windows"><?php esc_html_e( 'Windows', 'bridge-core' ); ?></option>
			<option value="fa-xing"><?php esc_html_e( 'Xing', 'bridge-core' ); ?></option>
			<option value="fa-xing-sign"><?php esc_html_e( 'Xing-Sign', 'bridge-core' ); ?></option>
			<option value="fa-youtube"><?php esc_html_e( 'YouTube', 'bridge-core' ); ?></option>
			<option value="fa-youtube-play"><?php esc_html_e( 'YouTube Play', 'bridge-core' ); ?></option>
			<option value="fa-youtube-sign"><?php esc_html_e( 'YouTube-Sign', 'bridge-core' ); ?></option>
		</select>
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Use Custom Size', 'bridge-core' ); ?></label>
        <select name="use_custom_size" id="use_custom_size">
            <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
            <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
        </select>
    </div>
	<div class="input">
		<label><?php esc_html_e( 'Size', 'bridge-core' ); ?></label>
		<select name="size" id="size">
			<option value="fa-lg"><?php esc_html_e( 'Small', 'bridge-core' ); ?></option>
			<option value="fa-2x"><?php esc_html_e( 'Normal', 'bridge-core' ); ?></option>
			<option value="fa-3x"><?php esc_html_e( 'Large', 'bridge-core' ); ?></option>
			<option value="fa-4x"><?php esc_html_e( 'Very Large', 'bridge-core' ); ?></option>
		</select>
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Custom Size(px)', 'bridge-core' ); ?></label>
        <input name="custom_size" id="custom_size" value="" maxlength="80" size="20" />
    </div>
	<div class="input">
	    <label><?php esc_html_e( 'Link', 'bridge-core' ); ?></label>
	    <input name="link" id="link" value="" maxlength="80" size="20" />
	</div>
	<div class="input">
		<label><?php esc_html_e( 'Target', 'bridge-core' ); ?></label>
		<select name="target" id="target">
			<option value="_self"><?php esc_html_e( 'Self', 'bridge-core' ); ?></option>
			<option value="_blank"><?php esc_html_e( 'Blank', 'bridge-core' ); ?></option>
		</select>
    </div>
	<div class="input">
	    <label><?php esc_html_e( 'Icon Color', 'bridge-core' ); ?></label>
	    <div class="colorSelector"><div style=""></div></div>
	    <input name="icon_color" id="icon_color" value="" maxlength="12" size="12" />
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Hover Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="icon_hover_color" id="icon_hover_color" value="" maxlength="12" size="12" />
    </div>
	<div class="input">
	    <label><?php esc_html_e( 'Background Color', 'bridge-core' ); ?></label>
	    <div class="colorSelector"><div style=""></div></div>
	    <input name="background_color" id="background_color" value="" maxlength="12" size="12" />
	</div>
    <div class="input">
        <label><?php esc_html_e( 'Background Hover Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="background_hover_color" id="background_hover_color" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Background Color Transparency', 'bridge-core' ); ?></label>
        <input name="background_color_transparency" id="background_color_transparency" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Border Width', 'bridge-core' ); ?></label>
        <input name="border_width" id="border_width" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Border Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="border_color" id="border_color" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Border Hover Color', 'bridge-core' ); ?></label>
        <div class="colorSelector"><div style=""></div></div>
        <input name="border_hover_color" id="border_hover_color" value="" maxlength="12" size="12" />
    </div>
    <div class="input">
        <label><?php esc_html_e( 'Icon Margin', 'bridge-core' ); ?></label>
        <input name="icon_margin" id="icon_margin" value="" maxlength="12" size="12" />
    </div>
	<div class="input">
		<input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
	</div>
</form>
</div>