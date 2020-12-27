<div class="wrap about-wrap qodef-core-dashboard">
	<h1 class="qodef-cd-title"><?php esc_html_e('Import', 'bridge-core'); ?></h1>
	<h4 class="qodef-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'bridge-core'); ?></h4>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-cd-demos-list qodef-cd-demos-masonry qodef-cd-demos-four-columns qodef-cd-medium-space">
			<?php echo bridge_core_get_module_template_part('sub-pages/import/templates/filter', 'core-dashboard', '', $params); ?>
			<div class="qodef-cd-demos-list-inner">
				<div class="qodef-cd-grid-sizer"></div>
				<div class="qodef-cd-grid-gutter"></div>
				<?php foreach($demos_list as $demo_key => $demo) {
					$item_category = array();
					if(isset($demo['categories'])){
						foreach ($demo['categories'] as $cat_key => $cat){
							$item_category[] = 'demo-category-' . $cat_key;
						}
					}
					?>
					<article class="qodef-cd-demo-item <?php echo implode(' ', $item_category); ?>">
						<div class="qodef-cd-demo-item-inner">
							<div class="qodef-cd-di-image">
								<img src="http://export.qodethemes.com/bridge-admin/images/demos/<?php echo esc_attr($demo_key); ?>.jpg" />
							</div>
							<div class="qodef-cd-di-text">
								<h3 class="qodef-cd-di-title"><?php echo esc_attr($demo['title']); ?></h3>
								<?php if(!empty($demo['categories'])) { ?>
									<div class="qodef-cd-di-categories">
									<?php foreach ($demo['categories'] as $cat_key => $cat) { ?>
										<span><?php echo esc_html($cat); ?></span>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
                            <a href="#" class="qodef-cd-demo-item-link" data-demo-id="<?php echo esc_attr( $demo_key ); ?>"></a>
						</div>
					</article>
				<?php } ?>
			</div>
		</div>
	</div>
</div>