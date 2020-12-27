<div class="qodef-cd-demos-filter-holder">
	<div class="qodef-cd-dlf-inner">
		<div class="qodef-cd-dlf-search">
			<span class="dashicons dashicons-search qodef-cd-dlf-search-icon"></span>
			<input type="text" id="quicksearch" class="quicksearch" placeholder="<?php esc_attr_e('Search demos by keyword', 'bridge-core') ?>" />
		</div>
		<div class="qodef-cd-dlf-filter">
			<?php
			if(is_array($filter_categories) && count($filter_categories)){

				?>
				<ul class="qodef-cd-dfl-filter-list">
					<li class="qodef-cd-dlf-item qodef-cd-demos-filter qodef-cd-demos-current" data-filter="">
						<span class="qode-dlf-item-name"><?php esc_html_e('All', 'bridge-core'); ?></span>
					</li>
					<?php foreach($filter_categories as $category_key => $category) { ?>
						<li class="qodef-cd-dlf-item qodef-cd-demos-filter" data-filter-title="<?php echo esc_html($category); ?>" data-filter=".demo-category-<?php echo esc_attr($category_key); ?>">
							<span class="qode-dlf-item-name"><?php echo esc_html($category); ?></span>
						</li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
</div>
