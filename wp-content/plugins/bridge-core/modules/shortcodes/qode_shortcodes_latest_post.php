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
                <option value="image_in_box"><?php esc_html_e( 'Image in left box', 'bridge-core' ); ?></option>
                <option value="minimal"><?php esc_html_e( 'Minimal', 'bridge-core' ); ?></option>
                <option value="boxes"><?php esc_html_e( 'Boxes', 'bridge-core' ); ?></option>
            </select>
        </div>
		<div class="input">
            <label><?php esc_html_e('Number of Posts(for \'With date in left box\', \'Image in left box\', \'Minimal\' types', 'bridge-core'); ?></label>
            <input name="number_of_posts" id="number_of_posts" value="" size="15" />
        </div>
		<div class="input">
            <label><?php esc_html_e( 'Number of Columns(only for Boxes type)', 'bridge-core' ); ?></label>
            <select name="number_of_colums" id="number_of_colums">
                <option value="2"><?php esc_html_e( 'Two', 'bridge-core' ); ?></option>
                <option value="3"><?php esc_html_e( 'Three', 'bridge-core' ); ?></option>
                <option value="4"><?php esc_html_e( 'Four', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Order By', 'bridge-core' ); ?></label>
            <select name="order_by" id="order_by">
                <option value="menu_order"><?php esc_html_e( 'Order', 'bridge-core' ); ?></option>
                <option value="title"><?php esc_html_e( 'Title', 'bridge-core' ); ?></option>
                <option value="date"><?php esc_html_e( 'Date', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Order', 'bridge-core' ); ?></label>
            <select name="order" id="order">
                <option value="ASC"><?php esc_html_e( 'ASC', 'bridge-core' ); ?></option>
                <option value="DESC"><?php esc_html_e( 'DESC', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Category Slug (leave empty for all or use comma for list)', 'bridge-core' ); ?></label>
            <input name="category" id="category" value="" size="15" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Text length (number of caracters)', 'bridge-core' ); ?></label>
            <input name="text_length" id="text_length" value="" maxlength="10" size="10" />
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
            <label><?php esc_html_e( 'Display category', 'bridge-core' ); ?></label>
            <select name="display_category" id="display_category">
                <option value="1"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label>Display date(time for 'With date in left box' type)</label>
            <select name="display_time" id="display_time">
                <option value="1"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label><?php esc_html_e( 'Display comments', 'bridge-core' ); ?></label>
            <select name="display_comments" id="display_comments">
                <option value="1"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
		 <div class="input">
            <label><?php esc_html_e( 'Display like', 'bridge-core' ); ?></label>
            <select name="display_like" id="display_like">
				<option value="1"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
		<div class="input">
            <label><?php esc_html_e( 'Display share', 'bridge-core' ); ?></label>
            <select name="display_share" id="display_share">
				<option value="1"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="0"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>