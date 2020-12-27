
<div class='latest_post_holder <?php echo esc_attr($type).' '.esc_attr($columns_number).' '.esc_attr($rows_number); ?>' >
    <ul>
    <?php while ($q->have_posts()) : $q->the_post();
	    $params['cat'] = get_the_category();

	    if($q->current_post == 0 && $firts_as_featured == 'yes'){
			$params['thumb_size'] = 'full';
			$params['featured_class'] = 'featured';

			echo bridge_core_get_shortcode_template_part('templates/latest-posts', 'latest-posts', $params['type'].'-featured-item', $params);
        }else{
			$params['featured_class'] = '';
			$params['thumb_size'] = 'thumbnail';
			echo bridge_core_get_shortcode_template_part('templates/latest-posts', 'latest-posts', $params['type'].'-regular-item', $params);
        }
        ?>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>

    </ul>
</div>