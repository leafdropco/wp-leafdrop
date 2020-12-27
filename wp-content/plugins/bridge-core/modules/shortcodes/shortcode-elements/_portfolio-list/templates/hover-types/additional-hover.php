<?php

if ( $show_icons == 'yes' || $hover_type == 'thin_plus_only' || $hover_type = 'cursor_change_hover') { ?>
    <div class="text_holder">
        <div class="text_holder_outer">
            <div class="text_holder_inner">
            <?php if($hover_type == 'thin_plus_only') { ?>
                <span class="thin_plus_only_icon">+</span>
            <?php } else {

                    if( ! ( $type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space" ) ) {

                        echo bridge_core_get_shortcode_template_part('templates/parts/title', '_portfolio-list', $type, $params);

                        echo bridge_core_get_shortcode_template_part('templates/parts/separator', '_portfolio-list', $type, $params);

                        echo bridge_core_get_shortcode_template_part('templates/parts/categories-with-slashes', '_portfolio-list', $type, $params);

                    }

                        if( $show_icons == 'yes' ){ ?>
                            <div class="icons_holder">

                                <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/lightbox', '_portfolio-list', $type, $params ); ?>

                                <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/view-button', '_portfolio-list', $type, $params ); ?>

                                <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/likes', '_portfolio-list', $type, $params ); ?>

                            </div>
                        <?php }
                    } ?>
            </div>
        </div>
    </div>
<?php }