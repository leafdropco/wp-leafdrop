<div class="qode-advanced-tabs <?php echo esc_attr($tab_class); ?> clearfix">
	<ul class="qode-advanced-tabs-nav">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<<?php echo esc_attr($title_tag) ?>>
					<a href="#tab-<?php echo sanitize_title($tab_title)?>">
						<?php if($icons_in_title) { ?>
							<span class="qode-advanced-icon-frame"></span>
						<?php } ?>

						<?php if($tab_title !== '' && strpos($tab_class,'qode-advanced-tab-only-icon') == false) { ?>
							<span class="qode-advanced-tab-text-after-icon">
								<?php echo esc_attr($tab_title)?>
							</span>
						<?php } ?>
					</a>
				</<?php echo esc_attr($title_tag) ?>>
			</li>
		<?php } ?>
	</ul>
	<?php if( isset( $is_elementor ) && $is_elementor ){
        foreach ($tab_items as $tab_item) {
            $rand_number = rand(0, 1000);
            $tab_item['tab_title'] = $tab_item['tab_title'].'-'.$rand_number;
            if( empty( $tab_item['content'] ) ){
                $tab_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $tab_item['template_id'] );
            };
            $tab_item['icon'] = bridge_qode_icon_collections()->getElementorIconFromIconPack( $tab_item );
            echo bridge_core_get_shortcode_template_part('templates/advanced-tab-template', 'advanced-tabs', '', $tab_item);
	    }
    } else {
	    echo do_shortcode($content);
    } ?>
</div>