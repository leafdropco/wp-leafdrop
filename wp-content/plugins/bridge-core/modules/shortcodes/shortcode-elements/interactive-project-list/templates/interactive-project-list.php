<div class="qode-interactive-project-list <?php if(!empty($holder_classes)) echo esc_attr($holder_classes); ?>">
	<div class="qode-ipl-inner">
		<div class="qode-ipl-left" <?php echo bridge_qode_get_inline_style($left_section_styles); ?>>
			<?php
			if($query_results->have_posts()):
				$i = 0;
				while ( $query_results->have_posts() ) : $query_results->the_post();
					$i++;
					$params['number'] = $i;
					echo bridge_core_get_shortcode_template_part('templates/interactive-project-item', 'interactive-project-list', '', $params);
				endwhile;
			else:
				echo bridge_core_get_shortcode_template_part('templates/parts/posts-not-found', 'interactive-project-list', '', $params);
			endif;
			
			wp_reset_postdata();
			?>
			<?php if( ! empty($left_section_widget )) : ?>
			<div class="qode-ipl-left-widget-area">
				<?php dynamic_sidebar( $left_section_widget ); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="qode-ipl-right" <?php echo bridge_qode_get_inline_style($right_section_styles); ?>>
			<?php
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					?>
					<div class="qode-ipl-image">
						<div class='qode-ipl-image-outer'>
							<div class='qode-ipl-image-inner'>
                                <?php $params['responsive_title'] = true; ?>
                                <?php echo bridge_core_get_shortcode_template_part('templates/parts/title', 'interactive-project-list', '', $params); ?>
                                <?php echo get_the_post_thumbnail(get_the_ID()); ?>
                            </div>
						</div>
					</div>
					<?php
				endwhile;
			endif;
			
			wp_reset_postdata();
			?>
			<?php if( ! empty($right_section_widget )) : ?>
				<div class="qode-ipl-right-widget-area">
					<?php dynamic_sidebar( $right_section_widget ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>