<?php

$filter_style = "";
if($params['filter_color'] != ""){
    $filter_style = " style='";
    $filter_style .= "color:" . $params['filter_color'];
    $filter_style .= "'";
}

$filter_number_html = '';
if($filter_number_of_items == 'yes'){
    $filter_number_html = '<span class="filter_number_of_items" '.$filter_style.'></span>';
    $filter_classes[] = 'portfolio_filter_with_number';
}

if ($filter == "yes") { ?>

    <div class='filter_outer'>
        <div class='filter_holder'>
            <ul>
                <?php if($type == 'masonry_with_space' || $type == 'masonry_with_space_without_description' || $type == 'justified_gallery' || $type == 'masonry' || $type == 'masonry_gallery_with_space') { ?>
                    <li class='filter' data-filter='*'><?php echo bridge_qode_get_module_part($filter_number_html); ?>
                        <span <?php echo wp_kses_post($filter_style); ?>><?php echo esc_html__('All', 'bridge-core'); ?></span>
                    </li>
                <?php } else { ?>
                    <li class='filter' data-filter='all'><?php echo bridge_qode_get_module_part($filter_number_html); ?>
                        <span <?php echo wp_kses_post($filter_style); ?>><?php echo esc_html__('All', 'bridge-core'); ?></span>
                    </li>
                <?php }?>

            <?php

            if ($category == "") {
                $args = array(
                    'parent' => 0,
                    'orderby' => $filter_order_by
                );
                $portfolio_categories = get_terms('portfolio_category', $args);
            } else {
                $top_category = get_term_by('slug', $category, 'portfolio_category');
                $term_id = '';
                if (isset($top_category->term_id))
                    $term_id = $top_category->term_id;
                $args = array(
                    'parent' => $term_id,
                    'orderby' => $filter_order_by
                );
                $portfolio_categories = get_terms('portfolio_category', $args);
            }

            foreach ($portfolio_categories as $portfolio_category) { ?>
                <?php if($type == 'masonry_with_space' || $type == 'masonry_with_space_without_description' || $type == 'justified_gallery' || $type == 'masonry' || $type == 'masonry_gallery_with_space') { ?>
                    <li class='filter' data-filter='.portfolio_category_<?php echo esc_attr($portfolio_category->term_id); ?>'>
                <?php } else { ?>
                    <li class='filter' data-filter='portfolio_category_<?php echo esc_attr($portfolio_category->term_id); ?>'>
                <?php } ?>
                    <?php echo bridge_qode_get_module_part($filter_number_html); ?>
                    <span <?php echo wp_kses_post($filter_style); ?>><?php echo esc_attr( $portfolio_category->name ); ?></span>
                    <?php $args = array(
                        'child_of' => $portfolio_category->term_id
                    );?>
                </li>
            <?php } ?>

            </ul>
        </div>
    </div>

<?php } ?>