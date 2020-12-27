<?php

$html = "";

if( ! empty( $skin ) && $skin == 'dark' ){
    $img_src = get_template_directory_uri() . '/img/bridge-browser-top-dark.png';
} else{
    $img_src = get_template_directory_uri() . '/img/bridge-browser-top.png';
}

$html .=
    '<li>'.
        '<div class="qode-presl-main-item">'.
            '<div class="qode-presl-main-item-inner">'.
                '<img itemprop="image" src="' . $img_src . '" alt="' . esc_html__('bridge-browser-top', 'bridge-core') . '">'.
                '<a itemprop="url" class="qode-presl-link main" href="'.esc_attr($link).'" target="'.esc_attr($target).'">'.
                    wp_get_attachment_image($big_image,'full').
                '</a>'.
                '<a itemprop="url" class="qode-presl-link small" href="'.esc_attr($link).'" target="'.esc_attr($target).'">'.
                    wp_get_attachment_image($small_image,'full').
                '</a>'.
            '</div>'.
        '</div>'.
    '</li>'.
'';

echo bridge_qode_get_module_part( $html );

