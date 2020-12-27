<?php

$masonry_size = "default";
$masonry_size = get_post_meta(get_the_ID(), "qode_portfolio_type_masonry_style", true);
$image_size="";
if($masonry_size == "large_width"){
    $image_size = "portfolio_masonry_wide";
}elseif($masonry_size == "large_height"){
    $image_size = "portfolio_masonry_tall";
}elseif($masonry_size == "large_width_height"){
    $image_size = "portfolio_masonry_large";
} else{
    $image_size = "portfolio_masonry_regular";
}

if($type == "masonry_with_space"){
    $image_size = "portfolio_masonry_with_space";
} ?>

<span class='image'><?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?></span>