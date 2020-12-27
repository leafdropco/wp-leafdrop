<?php
$bridge_qode_options = bridge_qode_return_global_options();

if(isset($bridge_qode_options['twitter_via']) && !empty($bridge_qode_options['twitter_via'])) {
    $twitter_via = " via " . $bridge_qode_options['twitter_via'] . " ";
} else {
    $twitter_via = 	"";
}
if(isset($_SERVER["https"])) {
    $count_char = 23;
} else{
    $count_char = 22;
}
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$html = "";
if(isset($bridge_qode_options['enable_social_share']) && $bridge_qode_options['enable_social_share'] == "yes") {
    $post_type = get_post_type();
    if(isset($bridge_qode_options["post_types_names_$post_type"])) {
        if($bridge_qode_options["post_types_names_$post_type"] == $post_type) {
            if ($post_type == "portfolio_page") {
                $html .= '<div class="portfolio_share qode_share">';
            } elseif ($post_type == "post") {
                $html .= '<div class="blog_share qode_share">';
            } elseif ($post_type == "page") {
                $html .= '<div class="page_share qode_share">';
            }
            $html .= '<div class="social_share_holder">';
            $html .= '<a href="javascript:void(0)" target="_self">';
            if($show_share_icon == 'yes'){
                $html .= '<i class="'.bridge_qode_icon_collections()->getSocialShareIcon($social_share_icon_pack).' social_share_icon"></i>';
            }
            if($show_share_text == '' || $show_share_text == 'yes') {
                $html .= '<span class="social_share_title">' . esc_html__('Share', 'bridge-core') . '</span>';
            }
            $html .= '</a>';
            $html .= '<div class="social_share_dropdown"><div class="inner_arrow"></div><ul>';

            $is_mobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );

            if(isset($bridge_qode_options['enable_facebook_share']) &&  $bridge_qode_options['enable_facebook_share'] == "yes") {
                $html .= '<li class="facebook_share">';

                // if mobile, use different link to sharer.php service
                if($is_mobile) {
                    $html .= '<a href="javascript:void(0)" onclick="window.open(\'https://m.facebook.com/sharer.php?u=' . urlencode(get_permalink());
                }
                else {
                    $html .= '<a href="javascript:void(0)" onclick="window.open(\'https://www.facebook.com/sharer.php?u=' . urlencode(get_permalink());
                }


                $html .= '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
                if (!empty($bridge_qode_options['facebook_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options["facebook_icon"] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-facebook"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }

            if($bridge_qode_options['enable_twitter_share'] == "yes") {
                $html .= '<li class="twitter_share">';

                // if mobile use different link to update status service
                if($is_mobile) {
                    $html .= '<a href="#" onclick="popUp=window.open(\'https://twitter.com/share?text=' . urlencode(bridge_qode_excerpt_max_charlength($count_char) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                }
                else {
                    $html .= '<a href="#" onclick="popUp=window.open(\'https://twitter.com/share?status=' . urlencode(bridge_qode_excerpt_max_charlength($count_char) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
                }

                if(!empty($bridge_qode_options['twitter_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options["twitter_icon"] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-twitter"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            if($bridge_qode_options['enable_google_plus'] == "yes") {
                $html .= '<li  class="google_share">';
                $html .= '<a href="#" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                if(!empty($bridge_qode_options['google_plus_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options['google_plus_icon'] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-google-plus"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            if(isset($bridge_qode_options['enable_linkedin']) && $bridge_qode_options['enable_linkedin'] == "yes") {
                $html .= '<li  class="linkedin_share">';
                $html .= '<a href="#" onclick="popUp=window.open(\'https://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                if(!empty($bridge_qode_options['linkedin_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options['linkedin_icon'] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-linkedin"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            if(isset($bridge_qode_options['enable_tumblr']) && $bridge_qode_options['enable_tumblr'] == "yes") {
                $html .= '<li  class="tumblr_share">';
                $html .= '<a href="#" onclick="popUp=window.open(\'https://www.tumblr.com/share/link?url=' . urlencode(get_permalink()). '&amp;name=' . urlencode(get_the_title()) .'&amp;description='.urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                if(!empty($bridge_qode_options['tumblr_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options['tumblr_icon'] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-tumblr"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            if(isset($bridge_qode_options['enable_pinterest']) && $bridge_qode_options['enable_pinterest'] == "yes") {
                $html .= '<li  class="pinterest_share">';
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $html .= '<a href="#" onclick="popUp=window.open(\'https://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()). '&amp;description=' . bridge_qode_addslashes(get_the_title()) .'&amp;media='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                if(!empty($bridge_qode_options['pinterest_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options['pinterest_icon'] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-pinterest"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            if(isset($bridge_qode_options['enable_vk']) && $bridge_qode_options['enable_vk'] == "yes") {
                $html .= '<li  class="vk_share">';
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                $html .= '<a href="#" onclick="popUp=window.open(\'https://vkontakte.ru/share.php?url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) .'&amp;description=' . urlencode(get_the_excerpt()) .'&amp;image='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
                if(!empty($bridge_qode_options['vk_icon'])) {
                    $html .= '<img itemprop="image" src="' . $bridge_qode_options['vk_icon'] . '" alt="" />';
                } else {
                    $html .= '<i class="fa fa-vk"></i>';
                }

                $html .= "</a>";
                $html .= "</li>";
            }
            $html .= "</ul></div>";
            $html .= "</div>";

            if($post_type == "portfolio_page" || $post_type == "post" || $post_type == "page") {
                $html .= '</div>';
            }
        }
    }
}

echo bridge_qode_get_module_part( $html );