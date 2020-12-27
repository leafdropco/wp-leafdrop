<?php
$full_path = __FILE__;
$path = explode('wp-content', $full_path);
require_once( $path[0] . '/wp-load.php' );
?>
<div id="qode_shortcode_form_wrapper">
    <form id="qode_shortcode_form" name="qode_shortcode_form" method="post" action="">

        <div class="input">
            <label><?php esc_html_e( 'Carousel Slider', 'bridge-core' ); ?></label>
            <select name="carousel" id="carousel">
                <option value=""></option>
                <?php
                    $carousel_locations = get_terms('carousels_category');

                    foreach ($carousel_locations as $location) {
                    ?>    
                        <option value="<?php echo esc_attr($location->slug); ?>"><?php echo esc_attr($location->name); ?></option>
                    <?php
                    }
                ?>
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
            <label><?php esc_html_e( 'Control Pagination Style', 'bridge-core' ); ?></label>
            <select name="control_style" id="control_style">
                <option value="light"><?php esc_html_e( 'Light', 'bridge-core' ); ?></option>
                <option value="gray"><?php esc_html_e( 'Gray', 'bridge-core' ); ?></option>
            </select>
        </div>
        <div class="input">
            <input type="submit" name="Insert" id="qode_insert_shortcode_button" value="Submit" />
        </div>
    </form>
</div>