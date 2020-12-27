<div id="qode-multi-device-showcase" <?php bridge_qode_class_attribute($holder_classes); ?>  <?php echo bridge_qode_get_inline_attrs($global_slider_data); ?>>
	<div class="qode-mds-content-holder">
		<div class="qode-mds-content-holder-inner">
			<?php if (!empty($title)) : ?>
				<div class="qode-mds-title-holder">
					<div class="qode-mds-title-holder-inner">
						<h1 class="qode-mds-title">
							<?php echo esc_attr($title); ?>
						</h1>
					</div>
				</div>
			<?php endif; ?>
			<?php if (!empty($subtitle)) : ?>
				<div class="qode-mds-subtitle-holder">
					<div class="qode-mds-subtitle-holder-inner">
						<p class="qode-mds-subtitle">
							<?php echo esc_attr($subtitle); ?>
						</p>
					</div>
				</div>
			<?php endif; ?>
			<?php if (!empty($button_usage)) : ?>
				<div class="qode-mds-button-holder">
					<div class="qode-mds-button-holder-inner">
						<?php echo bridge_core_get_button_html($button_parameters); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="qode-mds-devices-holder">
		<?php $devices = array('laptop','tablet', 'phone'); ?>
        <?php foreach ($devices as $device) : ?>
			<div class="qode-mds-device-holder qode-mds-<?php echo esc_attr($device); ?>-holder qode-mds-<?php echo esc_attr($device); ?>-slider-holder">
				<div class="qode-mds-device-holder-inner">
					<div id="qode-mds-<?php echo esc_attr($device); ?>-slider">
						<img class="qode-mds-device-frame qode-mds-<?php echo esc_attr($device); ?>-frame" src="<?php echo QODE_ROOT ?>/css/img/mds-<?php echo esc_attr($device); ?>-frame.png" alt="<?php esc_html_e('Device Frame', 'bridge-core') ?>" />
						<div class="qode-mds-slides qode-mds-<?php echo esc_attr($device); ?>-slides">
							<div class="qode-mds-slides-inner">
								<?php if (!empty(${$device.'_slides'})) : ?>
							        <?php foreach (${$device.'_slides'} as $slide) : ?>
							        	<?php 
							        		$slide_link = !empty( $slide['slide_link'] ) ? $slide['slide_link'] : '';
							        		$slide_image = !empty( $slide['slide_image'] ) ? $slide['slide_image'] : '';
							        	?>
										<div class="qode-mds-slide qode-mds-<?php echo esc_attr($device); ?>-slide">
											<?php if(!empty($slide_link)) { ?>
												<a class="qode-mds-slide-link" href="<?php echo esc_url($slide_link) ?>" target="_blank"></a>
											<?php } ?>
											<?php 
												$slide_styles = 'background-image: url('.wp_get_attachment_url($slide_image).')';
											?>
											<div class="qode-mds-slide-image" <?php echo bridge_qode_get_inline_style($slide_styles); ?>></div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<?php if (!empty($additional_laptop_image)) : ?>
			<div class="qode-mds-device-holder qode-mds-additional-element qode-mds-laptop-holder">
				<div class="qode-mds-device-holder-inner">
					<img class="qode-mds-device-frame qode-mds-laptop-frame" src="<?php echo QODE_ROOT ?>/css/img/mds-laptop-frame.png" alt="<?php esc_html_e('Device Frame', 'bridge-core') ?>" />
					<?php 
						$image_styles = 'background-image: url('.wp_get_attachment_url($additional_laptop_image).')';
					?>
					<div class="qode-mds-device-image qode-mds-laptop-image" <?php echo bridge_qode_get_inline_style($image_styles); ?>></div>
				</div>
			</div>
		<?php endif; ?>
		<?php if (!empty($additional_tablet_portrait_images)) : ?>
			<?php $i = 0; ?>
			<?php foreach($additional_tablet_portrait_images as $image) : ?>
			    <?php if (!empty($image['additional_image']) && $i < 3) : ?>
				    <?php $i++; ?>
					<div class="qode-mds-device-holder qode-mds-additional-element qode-mds-tablet-portrait-holder qode-mds-additional-element-<?php echo esc_attr($i); ?>">
						<div class="qode-mds-device-holder-inner">
						    <img class="qode-mds-device-frame qode-mds-tablet-portrait-frame" src="<?php echo QODE_ROOT ?>/css/img/mds-tablet-frame.png" alt="<?php esc_html_e('Device Frame', 'bridge-core') ?>" />
						    <?php 
						    	$image_styles = 'background-image: url('.wp_get_attachment_url($image['additional_image']).')';
						    ?>
						    <div class="qode-mds-device-image qode-mds-tablet-portrait-image" <?php echo bridge_qode_get_inline_style($image_styles); ?>></div>
						</div>
					</div>
			    <?php endif; ?>
		    <?php endforeach; ?>
		<?php endif; ?>
		<?php if (!empty($additional_tablet_landscape_images)) : ?>
			<?php $i = 0; ?>
			<?php foreach($additional_tablet_landscape_images as $image) : ?>
			    <?php if (!empty($image['additional_image']) && $i < 2) : ?>
				    <?php $i++; ?>
					<div class="qode-mds-device-holder qode-mds-additional-element qode-mds-tablet-landscape-holder qode-mds-additional-element-<?php echo esc_attr($i); ?>">
						<div class="qode-mds-device-holder-inner">
						    <img class="qode-mds-device-frame qode-mds-tablet-landscape-frame" src="<?php echo QODE_ROOT ?>/css/img/mds-tablet-landscape-frame.png" alt="<?php esc_html_e('Device Frame', 'bridge-core') ?>" />
						    <?php 
						    	$image_styles = 'background-image: url('.wp_get_attachment_url($image['additional_image']).')';
						    ?>
						    <div class="qode-mds-device-image qode-mds-tablet-landscape-image" <?php echo bridge_qode_get_inline_style($image_styles); ?>></div>
						</div>
					</div>
			    <?php endif; ?>
		    <?php endforeach; ?>
		<?php endif; ?>
		<?php if (!empty($additional_phone_portrait_image)) : ?>
			<div class="qode-mds-device-holder qode-mds-additional-element qode-mds-phone-portrait-holder">
				<div class="qode-mds-device-holder-inner">
					<img class="qode-mds-device-frame qode-mds-phone-portrait-frame" src="<?php echo QODE_ROOT ?>/css/img/mds-phone-frame.png" alt="<?php esc_html_e('Device Frame', 'bridge-core') ?>" />
					<?php 
						$image_styles = 'background-image: url('.wp_get_attachment_url($additional_phone_portrait_image).')';
					?>
					<div class="qode-mds-device-image qode-mds-phone-portrait-image" <?php echo bridge_qode_get_inline_style($image_styles); ?>></div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php if ($animate_on_appear) : ?>
		<div id="qode-mds-spinner">
			<div class="qode-mds-pulse"></div>
		</div>
	<?php endif; ?>
</div>