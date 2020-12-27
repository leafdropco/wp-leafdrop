<?php

//get proper image size
switch($image_size) {
    case 'landscape':
        $thumb_size = 'portfolio-landscape';
        break;
    case 'portrait':
        $thumb_size = 'portfolio-portrait';
        break;
    case 'square':
        $thumb_size = 'portfolio-square';
        break;
    default:
        $thumb_size = 'full';
        break;
}

if($type == "masonry_with_space" || $type == "masonry_with_space_without_description"){
    $thumb_size = 'portfolio_masonry_with_space';
}
?>

<span class='image'><?php echo get_the_post_thumbnail(get_the_ID(), $thumb_size); ?></span>