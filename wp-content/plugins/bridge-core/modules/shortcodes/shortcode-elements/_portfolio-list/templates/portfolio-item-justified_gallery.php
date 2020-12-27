<article class='<?php echo implode(' ', $item_classes);?>' <?php echo wp_kses_post( $article_style );?>>
    <?php
    $title = get_the_title();
    $portfolio_link = bridge_core_generate_portfolio_link();
    $params['portfolio_link'] = $portfolio_link;
    ?>

    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/badge', '_portfolio-list', $type, $params ); ?>

    <?php if($hover_type == 'default') { ?>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', 'justified_gallery', $params ); ?>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/hover-types/' . $hover_type, '_portfolio-list', $type, $params ); ?>

    <?php } else { ?>

        <div class="item_holder <?php esc_attr_e( $hover_type ); ?>">

            <?php echo bridge_core_get_shortcode_template_part( 'templates/hover-types/' . $additional_hover_type, '_portfolio-list', $type, $params ); ?>

            <?php if($disable_link == 'no') { ?>
                <a itemprop="url" class="portfolio_link_class" title="<?php esc_attr_e( $title );?>" href="<?php echo esc_url($portfolio_link ); ?>"></a>
            <?php } ?>

            <div <?php echo bridge_qode_get_inline_style($overlay_styles); ?> class="portfolio_shader"></div>
        </div>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/image', '_portfolio-list', 'justified_gallery', $params ); ?>

    <?php } ?>
</article>