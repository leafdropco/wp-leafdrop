<div id="qode-portfolio-list-stacked">
    <?php
    if ($query_results->have_posts()) :
        $params['additional_params'] = 0;
        while ($query_results->have_posts()) : $query_results->the_post();
            echo bridge_core_get_shortcode_template_part('templates/portfolio-list-stacked-item', 'portfolio-list-stacked', '', $params);
	        $params['additional_params']++;
        endwhile;
    else : ?>
    <p class="qode-pls-not-found"><?php esc_html_e('Sorry, no posts matched your criteria.', 'bridge-core'); ?></p>
    <?php endif;
wp_reset_postdata();
?>
    <div id="qode-pls-text-items">
        <?php
        if ($query_results->have_posts()) :
	        $params['additional_params'] = 0;
            while ($query_results->have_posts()) : $query_results->the_post();
                echo bridge_core_get_shortcode_template_part('templates/portfolio-list-stacked-text', 'portfolio-list-stacked', '', $params);
	            $params['additional_params']++;
            endwhile;
        else : ?>
        <?php endif;
    wp_reset_postdata();
    ?>
    </div>
    <div class="qode-pls-end-of-scroll">
        <div class="qode-eos-title">
            <span><?php echo bridge_qode_get_module_part( $content ); ?></span>
        </div>
	    <?php if (!empty($widget_area) && is_active_sidebar($widget_area)) : ?>
		    <div class="qode-pls-widget-area">
			    <div>
				    <?php dynamic_sidebar($widget_area); ?>
			    </div>
		    </div>
	    <?php endif; ?>
    </div>
    <div class="qode-pls-scroll-note">
        <div>
            <span class="qode-pls-down"><svg version="1.1" x="0px" y="0px" width="60px" height="80px" viewBox="0 0 60 80" enable-background="new 0 0 60 80" xml:space="preserve">
			<path id="XMLID_44_" fill="#010101" d="M22.216,5.221v40.266l-8.649-11.221c-0.696-0.904-1.994-1.072-2.897-0.375l-8.416,6.487
				c-0.434,0.334-0.717,0.827-0.788,1.37c-0.07,0.544,0.078,1.094,0.413,1.527l26.079,33.834c0.392,0.507,0.996,0.804,1.637,0.804
				c0.641,0,1.245-0.297,1.636-0.804l26.079-33.834c0.281-0.363,0.43-0.807,0.43-1.261c0-0.089-0.005-0.177-0.017-0.267
				c-0.07-0.543-0.354-1.036-0.788-1.37l-8.415-6.487c-0.903-0.697-2.2-0.529-2.898,0.375l-8.647,11.221V5.221
				c0-1.141-0.927-2.066-2.067-2.066H24.282C23.141,3.154,22.216,4.08,22.216,5.221z M32.842,7.286V51.55
				c0,0.884,0.563,1.671,1.399,1.955c0.837,0.285,1.764,0.008,2.304-0.694l11.089-14.387l5.144,3.964L29.595,72.463L6.413,42.388
				l5.143-3.964l11.09,14.387c0.54,0.702,1.465,0.979,2.302,0.694c0.837-0.284,1.4-1.071,1.4-1.955V7.286H32.842z"/>
			</svg></span>
        </div>
    </div>
    <div id="qode-pls-info">
        <div class="qode-pls-title-holder"></div>
        <br />
        <div class="qode-pls-category-holder"></div>
    </div>
</div>