<div class='projects_holder_outer justified_gallery <?php echo implode(' ', $portfolio_holder_universal_classes); ?>'>
    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/filter', '_portfolio-list', '', $params ); ?>

    <div class='projects_holder portfolio_main_holder clearfix portfolio_full_image <?php echo esc_attr( $portfolio_loading_class ); ?>' <?php echo ($spacing != '' ? "data-spacing='$spacing'" : "");?> <?php echo ($row_height != '' ? "data-row-height='$row_height'" : "")?> <?php echo($justify_last_row != "" ? "data-last-row='$justify_last_row'" : "");?> <?php echo ($justify_threshold != '' ? "data-justify-threshold='$justify_threshold'" : ""); ?>>
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

            $params['item_classes'] = bridge_core_generate_portfolio_list_item_classes();

            echo bridge_core_get_shortcode_template_part( 'templates/portfolio-item', '_portfolio-list', $type, $params );

        endwhile;
        else:
            echo bridge_core_get_shortcode_template_part( 'templates/parts/posts-not-found', '_portfolio-list', '', $params );
        endif;

        ?>

    </div>

    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/pagination', '_portfolio-list', '', $params ); ?>

    <?php wp_reset_postdata(); ?>
</div>