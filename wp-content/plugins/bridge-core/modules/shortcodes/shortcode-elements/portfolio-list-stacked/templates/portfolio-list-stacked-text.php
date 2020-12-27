<div class="qode-pls-text-item" data-index="<?php echo esc_attr($additional_params); ?>">
    <div class="qode-pls-title-holder">
        <h4 class="qode-pls-title">
            <a itemprop="url" href="<?php echo esc_url($this_object->getItemLink()); ?>" target="<?php echo esc_attr($this_object->getItemLinkTarget()); ?>">
                <?php echo esc_attr(get_the_title()); ?>
            </a>
        </h4>
    </div>
    <?php echo bridge_core_get_shortcode_template_part('templates/parts/category', 'portfolio-list-stacked', '', $params); ?>
</div> 