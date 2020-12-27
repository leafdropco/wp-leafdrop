<?php if($show_category_filter == 'yes'){ ?>
<div class="qode-pl-categories">
    <h6 class="qode-pl-categories-label"><?php esc_html_e('Categories','bridge-core'); ?></h6>
	<ul class="qode-pl-categories-nonce-holder" data-nonce="<?php echo wp_create_nonce('bridge_qode_load_cat_nonce'); ?>">
        <?php print bridge_qode_get_module_part( $categories_filter_list ); ?>
    </ul>
</div>
<?php } ?>