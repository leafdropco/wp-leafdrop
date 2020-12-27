<div class="qode-horizontal-timeline <?php echo esc_attr($holder_classes); ?>">
	<div class="qode-events-content">
        <ol>
            <?php if( isset( $is_elementor ) && $is_elementor ){
                foreach ($timeline_items as $timeline_item) {
                    $timeline_item['holder_classes'] = $thisObject->getItemHolderClasses( $timeline_item );
                    $timeline_item['content_image'] = $timeline_item['content_image']['id'];
                    $timeline_item['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($timeline_item['template_id']);
                    echo bridge_core_get_shortcode_template_part('templates/horizontal-timeline-item', 'horizontal-timeline', '', $timeline_item);
                }
            } else{
                echo do_shortcode($content);
            } ?>
        </ol>
	</div>
	<div class="qode-timeline">
	    <div class="qode-events-wrapper">
	        <div class="qode-events">
	            <ol>
	                <?php foreach($timeline_params as $key=>$value) { ?>
	                    <li><a href="javascript:void(0)" data-date="<?php echo esc_attr($key) ?>"><span class="qode-event-text"><?php echo esc_html($value); ?></span><span class="circle-outer"></span></a></li>
	                <?php } ?>
	            </ol>
	            <span class="qode-filling-line" aria-hidden="true"></span>
	            <div class="qode-dots"></div>
	        </div>
	    </div>
	    <ul class="qode-timeline-navigation">
	        <li><a href="#0" class="qode-prev inactive"></a></li>
	        <li><a href="#0" class="qode-next"></a></li>
	    </ul>
	</div>
</div>