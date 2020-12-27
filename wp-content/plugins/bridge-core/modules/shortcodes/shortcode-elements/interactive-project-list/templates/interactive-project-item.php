<article class="qode-ipl-item">
	<div class="qode-ipl-item-inner">
		
		<div class="qode-ipl-item-text">

            <?php if( !empty($layout) && $layout === 'layout-1' ) : ?>
                <div class="qode-ipl-item-number-holder"><span class="qode-ipl-item-number"><?php echo esc_html($number); ?></span></div>
            <?php endif; ?>

            <?php if( !empty($layout) && $layout !== 'layout-1' ) : ?>
                <?php echo bridge_core_get_shortcode_template_part('templates/parts/category', 'interactive-project-list', '', $params); ?>
            <?php endif; ?>

			<?php echo bridge_core_get_shortcode_template_part('templates/parts/title', 'interactive-project-list', '', $params); ?>

            <?php if( !empty($layout) && $layout === 'layout-1' ) : ?>
                <?php echo bridge_core_get_shortcode_template_part('templates/parts/category', 'interactive-project-list', '', $params); ?>
            <?php endif; ?>
		</div>

	</div>
</article>