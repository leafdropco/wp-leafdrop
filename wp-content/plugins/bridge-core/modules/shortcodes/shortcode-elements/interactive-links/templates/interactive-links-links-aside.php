<div <?php bridge_qode_class_attribute($holder_classes); ?>>
    <div class="qode-il-inner">
        <div class="qode-il-titles-holder">
            <div class="qode-il-links-holder">
                <?php if( is_array( $interactive_links ) && count( $interactive_links ) > 0 ){
                    $counter = 0;
                    foreach ( $interactive_links as $interactive_link ){ ?>
                        <a itemprop="link" class="qode-il-link" href="<?php echo esc_url($interactive_link['item_link'])?>" target="<?php echo esc_attr($interactive_link['item_link_target'])?>" data-index="<?php echo esc_attr($counter)?>">
                            <<?php echo esc_attr( $title_tag ); ?> class="qode-il-title-heading">
                                <span class="qode-il-title"><?php echo esc_html($interactive_link['item_title'])?></span>
                            </<?php echo esc_attr( $title_tag ); ?>>
                        </a>
                        <?php $counter++; }
                } ?>
            </div>
        </div>
        <div class="qode-il-images-holder">
            <div class="qode-il-images-holder-inner">
                <?php if( is_array( $interactive_links ) && count( $interactive_links ) > 0 ){
                    $counter = 0;
                    foreach ( $interactive_links as $interactive_link ){ ?>
                        <div class="qode-il-image" data-index="<?php echo esc_attr($counter)?>">
                            <a itemprop="link" class="qode-il-image-link" href="<?php echo esc_url($interactive_link['item_link'])?>" target="<?php echo esc_attr($interactive_link['item_link_target'])?>" data-index="<?php echo esc_attr($counter)?>">
                                <?php echo wp_get_attachment_image($interactive_link['item_image'], 'full'); ?>
                            </a>
                            <div class="qode-il-responsive-title-holder">
                                <<?php echo esc_attr( $title_tag ); ?> class="qode-il-links-holder">
                                    <a itemprop="link" class="qode-il-link qode-il-responsive-title" href="<?php echo esc_url($interactive_link['item_link'])?>" target="<?php echo esc_attr($interactive_link['item_link_target'])?>" data-index="<?php echo esc_attr($counter)?>">
                                        <span class="qode-il-title"><?php echo esc_html($interactive_link['item_title'])?></span>
                                    </a>
                                </<?php echo esc_attr( $title_tag ); ?>>
                            </div>
                        </div>
                        <?php $counter++; }
                } ?>
            </div>
        </div>
        <?php if (!empty($widget_area) && is_active_sidebar($widget_area)) : ?>
            <div class="qode-il-widget-area">
                <div>
                    <?php dynamic_sidebar($widget_area); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>