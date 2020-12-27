<div data-q_id="#<?php echo esc_html( $anchor_id ); ?>" data-q_header_style="<?php echo esc_html( $header_style ); ?>" class="qode-expendable-section-holder">
    <div class="more_facts_holder" style="background-color: <?php echo esc_html( $background_color ); ?>">
        <div class="more_facts_button_holder <?php echo esc_html( $label_position );?>">
            <span class="more_facts_button" data-color="<?php echo esc_attr( $label_color ); ?>" data-hovercolor="<?php echo esc_attr( $label_hover_color ); ?>" data-morefacts="<?php echo esc_html( $more_label ); ?>" data-lessfacts="<?php echo esc_html( $less_label ); ?>" style="color: <?php echo esc_attr( $label_color ); ?>">
                <span class="more_facts_button_text"><?php echo esc_html( $more_label ); ?></span>
                <span class="more_facts_button_arrow">
                    <i class="fa fa-angle-down"></i>
                </span>
            </span>
        </div>
        <div class="more_facts_outer">
            <div class="more_facts_inner_holder">
                <div class="more_facts_inner" data-expandable_content_top_padding="<?php echo bridge_qode_filter_px( $top_padding ); ?>" style="padding-top: <?php echo bridge_qode_filter_px( $top_padding ); ?>px">
                    <?php echo bridge_qode_get_module_part( $content ); ?>
                </div>
            </div>
        </div>
    </div>
</div>