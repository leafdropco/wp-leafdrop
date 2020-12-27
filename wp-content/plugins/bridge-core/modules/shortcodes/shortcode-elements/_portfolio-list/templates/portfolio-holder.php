<div class='projects_holder_outer v<?php echo esc_attr( $columns );?> <?php echo implode(" ", $portfolio_holder_classes) ?>'>
    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/filter', '_portfolio-list', '', $params ); ?>
    <div class='projects_holder portfolio_main_holder clearfix v<?php echo esc_attr($columns); ?> <?php echo implode(' ', $_type_class ); ?> <?php echo bridge_core_generate_portfolio_list_thumbs_size_class( $params );?> <?php echo esc_attr( $portfolio_loading_class ); ?>'>
        <?php if($type == 'masonry_with_space' || $type == 'masonry_with_space_without_description') { ?>
            <div class="qode-portfolio-masonry-gallery-grid-sizer"></div>
            <div class="qode-portfolio-masonry-gallery-grid-gutter"></div>
        <?php } ?>

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

            $params['item_classes'] = bridge_core_generate_portfolio_list_item_classes();

            echo bridge_core_get_shortcode_template_part( 'templates/portfolio-item', '_portfolio-list', $type, $params );

        endwhile;

            echo bridge_core_get_shortcode_template_part( 'templates/parts/filler', '_portfolio-list', $type, $params );

        else:
            echo bridge_core_get_shortcode_template_part( 'templates/parts/posts-not-found', '_portfolio-list', '', $params );
        endif;

        ?>
    </div>

    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/pagination', '_portfolio-list', '', $params ); ?>

    <?php wp_reset_postdata(); ?>
</div>