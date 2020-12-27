<div class="qode-animation-holder <?php echo esc_attr($animation_type); ?>">
    <div class="qode-animation-holder-inner"  style="<?php echo wp_kses_post($params['animation_delay']); ?>">
        <?php echo bridge_qode_get_module_part( $content ); ?>
    </div>
</div>