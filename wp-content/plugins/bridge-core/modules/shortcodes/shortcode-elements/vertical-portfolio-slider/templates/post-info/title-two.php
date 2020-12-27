<?php $title_two = get_post_meta( get_the_ID(), "qode_vertical_portfolio_slider_title_two", true ); ?>

<?php if (!empty($title_two)) : ?>
    <h2 class="qode-vps-title-two" data-text="<?php echo esc_html($title_two)?>"><span class="qode-vps-tt-one"><?php echo esc_html($title_two)?></span><span class="qode-vps-tt-two"><?php echo esc_html($title_two)?></span><span class="qode-vps-tt-three"><?php echo esc_html($title_two)?></span></h2>
<?php endif; ?>
