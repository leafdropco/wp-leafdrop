<?php
	$full_path = __FILE__;
	$path = explode('wp-content', $full_path);
	require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">
        <div class="input">
            <label><?php esc_html_e( 'Lightbox', 'bridge-core' ); ?></label>
            <select name="lightbox" id="lightbox">
                <option value=""></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
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
            <label><?php esc_html_e( 'Number of portolios on page (-1 is all)', 'bridge-core' ); ?></label>
            <input name="number" id="number" value="" size="5" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Category Slug (leave empty for all)', 'bridge-core' ); ?></label>
            <input name="category" id="category" value="" size="5" />
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Selected Projects (leave empty for all, delimit by comma)', 'bridge-core' ); ?></label>
            <input name="selected_projects" id="selected_projects" value="" size="40" />
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
            <label><?php esc_html_e( 'Image size', 'bridge-core' ); ?></label>
            <select name="image_size" id="image_size">
                <option value=""><?php esc_html_e( 'Original Size', 'bridge-core' ); ?></option>
                <option value="square"><?php esc_html_e( 'Square', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>

    </form>
</div>