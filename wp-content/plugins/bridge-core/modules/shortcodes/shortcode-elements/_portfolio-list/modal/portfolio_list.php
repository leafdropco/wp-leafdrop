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
                <option value=""></option>
                <option value="standard"><?php esc_html_e( 'Standard', 'bridge-core' ); ?></option>
                <option value="standard_no_space"><?php esc_html_e( 'Standard No Space', 'bridge-core' ); ?></option>
                <option value="hover_text"><?php esc_html_e( 'Hover Text', 'bridge-core' ); ?></option>
                <option value="hover_text_no_space"><?php esc_html_e( 'Hover Text No Space', 'bridge-core' ); ?></option>
                <option value="masonry"><?php esc_html_e( 'Masonry', 'bridge-core' ); ?></option>
                <option value="justified_gallery"><?php esc_html_e( 'Justified Gallery', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Filter', 'bridge-core' ); ?></label>
            <select name="filter" id="filter">
                <option value=""></option>
                <option value="yes"><?php esc_html_e( 'yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'no', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Lightbox', 'bridge-core' ); ?></label>
            <select name="lightbox" id="lightbox">
                <option value=""></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Columns', 'bridge-core' ); ?></label>
            <select name="columns" id="columns">
                <option value=""></option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <div class="input">
            <label><?php esc_html_e( 'Image Size', 'bridge-core' ); ?></label>
            <select name="image_size" id="image_size">
                <option value=""><?php esc_html_e( 'Original Size', 'bridge-core' ); ?></option>
                <option value="square"><?php esc_html_e( 'Square', 'bridge-core' ); ?></option>
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
            <label><?php esc_html_e( 'Show Load More', 'bridge-core' ); ?></label>
            <select name="show_load_more" id="show_load_more">
                <option value=""></option>
                <option value="yes"><?php esc_html_e( 'Yes', 'bridge-core' ); ?></option>
                <option value="no"><?php esc_html_e( 'No', 'bridge-core' ); ?></option>
            </select>
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
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>

    </form>
</div>