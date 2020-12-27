<div class="projects_masonry_wrapper <?php echo implode(' ', $portfolio_holder_universal_classes); ?>">
    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/filter', '_portfolio-list', '', $params ); ?>

    <div class="projects_masonry_holder portfolio_main_holder gs<?php esc_attr_e($grid_size);?> <?php echo esc_attr($portfolio_loading_class);?>">
        <div class="qode-portfolio-masonry-gallery-grid-sizer"></div>
        <div class="qode-portfolio-masonry-gallery-grid-gutter"></div>

        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

            $params['item_classes'] = bridge_core_generate_portfolio_list_item_classes();

            echo bridge_core_get_shortcode_template_part( 'templates/portfolio-item', '_portfolio-list', $type, $params );

        endwhile;
        else:
            echo bridge_core_get_shortcode_template_part( 'templates/parts/posts-not-found', '_portfolio-list', '', $params );
        endif;
        wp_reset_postdata();

        ?>

    </div>
</div>