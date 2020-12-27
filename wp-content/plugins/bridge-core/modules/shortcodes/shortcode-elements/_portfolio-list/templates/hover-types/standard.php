<span class='text_holder'>
    <span class='text_outer'>
        <span class='text_inner'>
            <span class='feature_holder'>
            <?php if($lightbox == "yes" || $portfolio_qode_like == "on" || $view_button !== "no"){ ?>
                <span class="feature_holder_icons">';
                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/lightbox', '_portfolio-list', $type, $params ); ?>

                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/view-button', '_portfolio-list', $type, $params ); ?>

                    <?php echo bridge_core_get_shortcode_template_part( 'templates/parts/like', '_portfolio-list', $type, $params ); ?>
            <?php } ?>
            </span>
        </span>
    </span>
</span>