<span class='text_holder'>
    <span class='text_outer'>
        <span class='text_inner'>
            <div class="hover_feature_holder_title">
                <div class="hover_feature_holder_title_inner">
                    <?php if( ! ( $type == "standard" || $type == "standard_no_space" || $type == "masonry_with_space" ) ) { ?>

                        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/title', '_portfolio-list', $type, $params ); ?>

                        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/separator', '_portfolio-list', $type, $params ); ?>

                        <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/categories', '_portfolio-list', $type, $params ); ?>

                    <?php } ?>
                </div>
            </div>

            <?php if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){ ?>

            <span class='feature_holder'>
                <span class="feature_holder_icons">

                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/lightbox', '_portfolio-list', $type, $params ); ?>

                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/view-button', '_portfolio-list', $type, $params ); ?>

                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/likes', '_portfolio-list', $type, $params ); ?>
                </span>
            </span>

            <?php } ?>

        </span>
    </span>
</span>
