<?php

$terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');

$category_styles = array();
if($category_color !== '') {
    $category_styles[] = 'color: '.$category_color;
}

if($show_categories !== 'no') { ?>
    <span class="project_category" <?php echo bridge_qode_get_inline_style($category_styles);?> >
    <?php
    $k = 1;
    foreach ($terms as $term) {
        echo esc_attr( $term->name );
        if (count($terms) != $k) {
            echo ', ';
        }
        $k++;
    } ?>
    </span>
<?php }