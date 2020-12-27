<?php $title_one = get_post_meta( get_the_ID(), "qode_vertical_portfolio_slider_title_one", true ); ?>

<?php if (!empty($title_one)) : ?>
    <h2 class="qode-vps-title-one" data-text="<?php echo esc_html($title_one)?>"><span class="qode-vps-to-first"><?php echo esc_html($title_one)?></span><span class="qode-vps-to-second"><?php echo esc_html($title_one)?></span></h2>
<?php endif; ?>