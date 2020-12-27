<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
		<div class="input">
            <label><?php esc_html_e( 'Category (slug)', 'bridge-core' ); ?></label>
            <input name="category" id="category" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Number', 'bridge-core' ); ?></label>
            <input name="number" id="number" value="" maxlength="12" size="12" />
        </div>
		<div class="input">
			<label><?php esc_html_e( 'Order By', 'bridge-core' ); ?></label>
			<select name="order_by" id="order_by">
				<option value=""></option>
				<option value="date"><?php esc_html_e( 'Date', 'bridge-core' ); ?></option>
				<option value="title"><?php esc_html_e( 'Title', 'bridge-core' ); ?></option>
				<option value="rand"><?php esc_html_e( 'Random', 'bridge-core' ); ?></option>
			</select>
		</div>
		<div class="input">
			<label><?php esc_html_e( 'Order Type', 'bridge-core' ); ?></label>
			<select name="order" id="order">
				<option value=""></option>
				<option value="DESC"><?php esc_html_e( 'Descending', 'bridge-core' ); ?></option>
				<option value="ASC"><?php esc_html_e( 'Ascending', 'bridge-core' ); ?></option>
			</select>
		</div>
        <div class="input">
            <label><?php esc_html_e( 'Text color', 'bridge-core' ); ?></label>
			<div class="colorSelector"><div style=""></div></div>
            <input name="text_color" id="text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Author Text color', 'bridge-core' ); ?></label>
			<div class="colorSelector"><div style=""></div></div>
            <input name="author_text_color" id="author_text_color" value="" maxlength="12" size="12" />
        </div>
		<div class="input">
			<label><?php esc_html_e( 'Author Text Font Size', 'bridge-core' ); ?></label>
			<select name="author_text_font_weight" id="author_text_font_weight">
				<option value=""><?php esc_html_e( 'Default', 'bridge-core' ); ?></option>
				<option value="100"><?php esc_html_e( 'Thin 100', 'bridge-core' ); ?></option>
				<option value="200"><?php esc_html_e( 'Extra-Light 200', 'bridge-core' ); ?></option>
				<option value="300"><?php esc_html_e( 'Light 300', 'bridge-core' ); ?></option>
				<option value="400"><?php esc_html_e( 'Regular 400', 'bridge-core' ); ?></option>
				<option value="500"><?php esc_html_e( 'Medium 500', 'bridge-core' ); ?></option>
				<option value="600"><?php esc_html_e( 'Semi-Bold 600', 'bridge-core' ); ?></option>
				<option value="700"><?php esc_html_e( 'Bold 700', 'bridge-core' ); ?></option>
				<option value="800"><?php esc_html_e( 'Extra-Bold 800', 'bridge-core' ); ?></option>
				<option value="900"><?php esc_html_e( 'Ultra-Bold 900', 'bridge-core' ); ?></option>
			</select>
		</div>
		<div class="input">
			<label><?php esc_html_e( 'Author Text Font Size', 'bridge-core' ); ?></label>
			<input name="author_text_font_size" id="author_text_font_size" value="" maxlength="12" size="12" />
		</div>
        <div class="input">
            <label><?php esc_html_e( 'Show navigation', 'bridge-core' ); ?></label>
            <select name="show_navigation" id="show_navigation">
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
            <input name="author_text_color" id="author_text_color" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Navigation Style', 'bridge-core' ); ?></label>
            <select name="navigation_style" id="navigation_style">
                <option value="dark"><?php esc_html_e( 'Dark', 'bridge-core' ); ?></option>
                <option value="light"><?php esc_html_e( 'Light', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Auto rotate slides', 'bridge-core' ); ?></label>
            <select name="auto_rotate_slides" id="auto_rotate_slides">
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10"><?php esc_html_e( '10', 'bridge-core' ); ?></option>
                <option value="15"><?php esc_html_e( '15', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'Disable', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Animation Type', 'bridge-core' ); ?></label>
            <select name="animation_type" id="animation_type">
                <option value="fade"><?php esc_html_e( 'Fade', 'bridge-core' ); ?></option>
                <option value="slide"><?php esc_html_e( 'Slide', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Animation speed', 'bridge-core' ); ?></label>
            <input name="animation_speed" id="animation_speed" value="" maxlength="12" size="12" />
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>