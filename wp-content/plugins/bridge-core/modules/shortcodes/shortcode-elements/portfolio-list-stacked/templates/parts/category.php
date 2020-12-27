<?php $terms = wp_get_post_terms(get_the_ID(), 'portfolio_category'); ?>
<div class="qode-pli-category-holder">
    <?php foreach ($terms as $term) : ?>
	    <a class="qode-pli-category" href="<?php echo esc_url(get_term_link($term->term_id)); ?>"><?php echo esc_attr( $term->name ); ?></a>
    <?php endforeach; ?>
</div>