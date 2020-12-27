<?php
$offsets = $this_object->getArticleOffsets();
$image_src = $this_object->getStackedImage();

if (empty($image_src) && has_post_thumbnail()) {
    $image_src = get_the_post_thumbnail_url(get_the_ID());
}
?>

<div class="qode-pls-item" data-index="<?php echo esc_attr($additional_params); ?>" data-x="<?php echo esc_attr($offsets['x']); ?>" data-y="<?php echo esc_attr($offsets['y']); ?>">
    <div class="qode-pls-item-inner">
        <div>
            <a itemprop=" url" href="<?php echo esc_url($this_object->getItemLink()); ?>" target="<?php echo esc_attr($this_object->getItemLinkTarget()); ?>">
                <img src="<?php echo esc_html($image_src); ?>" alt="<?php get_the_title($image_src); ?>">
            </a>
        </div>
    </div>
</div> 