<article class='mix <?php echo implode(' ', $item_classes);?>' <?php echo wp_kses_post($article_style); ?>>
    <?php
    $title = get_the_title();
    $portfolio_link = bridge_core_generate_portfolio_link();
    ?>

    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/frame', '_portfolio-list', $type, $params ); ?>

    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/badge', '_portfolio-list', $type, $params ); ?>

    <?php

    if( $type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space" ){
        if($hover_type == 'default') { ?>
            <div class='image_holder'>
                <a itemprop='url' class='portfolio_link_for_touch' href='<?php echo esc_url( $portfolio_link ); ?>' target='<?php esc_attr_e( $target ); ?>'>
                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', '', $params ); ?>
                </a>

                <?php echo bridge_core_get_shortcode_template_part( 'templates/hover-types/standard', '_portfolio-list', $type, $params ); ?>
            </div>
            <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/description', '_portfolio-list', $type, $params ); ?>
        <?php } else { ?>

            <div class="item_holder <?php esc_attr_e( $hover_type ); ?>">

                <?php echo bridge_core_get_shortcode_template_part( 'templates/hover-types/' . $additional_hover_type, '_portfolio-list', $type, $params ); ?>

                <?php if($disable_link == 'no') { ?>
                    <a itemprop="url" class="portfolio_link_class" title="<?php esc_attr_e( $title );?>" href="<?php echo esc_url($portfolio_link ); ?>"></a>
                <?php } ?>

                <div <?php echo bridge_qode_get_inline_style($overlay_styles); ?> class="portfolio_shader"></div>
                <div class="image_holder">
                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', '', $params ); ?>
                </div>
            </div>

            <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/description', '_portfolio-list', $type, $params ); ?>

        <?php }

    } else {

        if($hover_type == 'default') { ?>
            <div class='image_holder'>
                <a itemprop='url' class='portfolio_link_for_touch' href='<?php echo esc_url( $portfolio_link ); ?>' target='<?php esc_attr_e( $target ); ?>'>
                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', '', $params ); ?>
                </a>

                <?php
                    if( $type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space" ){
                        echo bridge_core_get_shortcode_template_part( 'templates/hover-types/standard', '_portfolio-list', $type, $params );
                    } else if ($type == "hover_text" || $type == "hover_text_no_space" || $type = 'masonry_with_space_without_description'){
                        echo bridge_core_get_shortcode_template_part( 'templates/hover-types/' . $hover_type, '_portfolio-list', $type, $params );
                    }
                ?>
            </div>
            <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/description', '_portfolio-list', $type, $params ); ?>
        <?php } else { ?>

            <div class="item_holder <?php esc_attr_e( $hover_type ); ?>">

                <?php echo bridge_core_get_shortcode_template_part( 'templates/hover-types/' . $additional_hover_type, '_portfolio-list', $type, $params ); ?>

                <?php if($disable_link == 'no') { ?>
                    <a itemprop="url" class="portfolio_link_class" title="<?php esc_attr_e( $title );?>" href="<?php echo esc_url($portfolio_link ); ?>"></a>
                <?php } ?>

                <div <?php echo bridge_qode_get_inline_style($overlay_styles); ?> class="portfolio_shader"></div>
                <div class="image_holder">
                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', '', $params ); ?>
                </div>
            </div>

        <?php }?>

    <?php }?>

</article>
