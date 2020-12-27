<div <?php bridge_qode_class_attribute($holder_classes); ?>>
	<img src="<?php echo wp_get_attachment_image_url($section_image,'full') ?>" alt="<?php esc_html_e('call to action image', 'bridge-core'); ?>"/>
	<div class="qode-cta-section-text-wrapper">
		<div class="qode-cta-section-text-wrapper-inner" <?php bridge_qode_inline_style($background_color); ?>>
			<?php if($title != '') { ?>
				<div class="qode-cta-section-title-holder">
					<h2 class="qode-cta-section-title">
						<?php echo esc_attr($title) ?>
					</h2>
				</div>
			<?php } ?>

            <div class="separator  small center  qode-type1-gradient-left-to-right " style="margin-top: <?php echo esc_attr( $separator_parameters['up'] ) ?>px;margin-bottom: <?php echo esc_attr( $separator_parameters['down'] ) ?>px;height: <?php echo esc_attr( $separator_parameters['thickness'] ) ?>px;width: <?php echo esc_attr( $separator_parameters['width'] ) ?>px;"></div>

			<?php if($description != '') { ?>
				<div class="qode-cta-section-description-holder">
					<p class="qode-cta-section-description">
						<?php echo esc_attr($description) ?>
					</p>
				</div>
			<?php } ?>
			<?php 
				echo bridge_qode_execute_shortcode('qode_button_v2', $button_parameters);
		 	?>
		</div>
	</div>
</div>