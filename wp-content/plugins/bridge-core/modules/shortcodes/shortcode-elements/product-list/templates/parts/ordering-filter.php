<?php if($show_ordering_filter == 'yes'){ ?>
<div class="qode-pl-ordering-outer">
    <h6><?php esc_html_e('Filter','bridge-core'); ?></h6>
    <div class="qode-pl-ordering">
        <div>
            <h5><?php esc_html_e('Sort By','bridge-core'); ?></h5>
            <ul class="qode-pl-categories-nonce-holder" data-nonce="<?php echo wp_create_nonce('bridge_qode_load_cat_nonce'); ?>">
                <?php print bridge_qode_get_module_part( $ordering_filter_list ); ?>
            </ul>
        </div>
        <div>
            <h5><?php esc_html_e('Price Range','bridge-core'); ?></h5>
            <ul class="qode-pl-ordering-price qode-pl-categories-nonce-holder" data-nonce="<?php echo wp_create_nonce('bridge_qode_load_cat_nonce'); ?>">
                <?php print bridge_qode_get_module_part( $pricing_filter_list ); ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>