<?php

if (($type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space") && $show_description_box) { ?>
    <div class='portfolio_description <?php echo esc_attr( $portfolio_description_class );?>' <?php echo wp_kses_post( $portfolio_box_style ); ?>>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/title', '_portfolio-list', $type, $params ); ?>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/separator', '_portfolio-list', $type, $params ); ?>

        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/categories', '_portfolio-list', $type, $params ); ?>

    </div>
<?php }