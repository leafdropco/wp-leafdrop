<div <?php echo bridge_qode_get_class_attribute($holder_classes); ?> <?php echo bridge_qode_get_inline_attrs($data_attrs); ?>>
        <?php echo wp_get_attachment_image($image_before, 'full');?>
        <?php echo wp_get_attachment_image($image_after, 'full'); ?>
    <?php if($enable_frame == 'yes'){
        $frame1_path = get_template_directory_uri() . "/img/coparison_slider_tv_frame1.png";
    ?>
        <div class="qode-comparison-slider-frame-holder">
            <img itemprop='image' src='<?php echo esc_url($frame1_path); ?>'/>
        </div>
    <?php } ?>
</div>