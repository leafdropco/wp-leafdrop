<?php
global $bridge_qode_options;
if(isset($bridge_qode_options['twitter_via']) && !empty($bridge_qode_options['twitter_via'])) {
	$twitter_via = " via " . $bridge_qode_options['twitter_via'] . " ";
} else {
	$twitter_via = 	"";
}
$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
$html = "";
if(isset($bridge_qode_options['enable_social_share']) && $bridge_qode_options['enable_social_share'] == "yes") {
	$post_type = get_post_type();

	if(isset($bridge_qode_options["post_types_names_$post_type"])) {
		if($bridge_qode_options["post_types_names_$post_type"] == $post_type) {
			$html .= '<div class="social_share_list_holder">';
			$html .= "<span>".esc_html__('Share on: ', 'bridge-core')."</span>";
			$html .= '<ul>';

			$is_mobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
				'|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
				'|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT'] );

			if(isset($bridge_qode_options['enable_facebook_share']) &&  $bridge_qode_options['enable_facebook_share'] == "yes") {
				$html .= '<li class="facebook_share">';

				// if mobile, use different link to sharer.php service
				if($is_mobile) {
					$html .= '<a title="'.esc_html__('Share on Facebook', 'bridge-core').'" href="javascript:void(0)" onclick="window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode(get_permalink());
				}
				else {
					$html .= '<a title="'.esc_html__('Share on Facebook', 'bridge-core').'" href="javascript:void(0)" onclick="window.open(\'http://www.facebook.com/sharer.php?u=' . urlencode(get_permalink());
				}

				$html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');">';
				if(!empty($bridge_qode_options['facebook_icon'])) {
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
					$html .= '<a href="#" title="'.esc_html__("Share on Twitter", 'bridge-core').'" onclick="popUp=window.open(\'http://twitter.com/intent/tweet?text=' . urlencode(bridge_qode_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
				}
				else {
					$html .= '<a href="#" title="'.esc_html__("Share on Twitter", 'bridge-core').'" onclick="popUp=window.open(\'http://twitter.com/home?status=' . urlencode(bridge_qode_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;">';
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
				$html .= '<a href="#" title="'.esc_html__('Share on Google+', 'bridge-core').'" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
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
				$html .= '<a href="#" class="'.esc_html__('Share on LinkedIn','bridge-core').'" onclick="popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
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
				$html .= '<a href="#" title="'.esc_html__('Share on Tumblr','bridge-core').'" onclick="popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()). '&amp;name=' . urlencode(get_the_title()) .'&amp;description='.urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
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
				$html .= '<a href="#" title="'.esc_html__('Share on Pinterest', 'bridge-core').'" onclick="popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()). '&amp;description=' . bridge_qode_addslashes(get_the_title()) .'&amp;media='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
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
				$html .= '<a href="#" title="'.esc_html__("Share on VK", 'bridge-core').'" onclick="popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()). '&amp;title=' . urlencode(get_the_title()) .'&amp;description=' . urlencode(get_the_excerpt()) .'&amp;image='.urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
				if(!empty($bridge_qode_options['vk_icon'])) {
					$html .= '<img itemprop="image" src="' . $bridge_qode_options['vk_icon'] . '" alt="" />';
				} else {
					$html .= '<i class="fa fa-vk"></i>';
				}

				$html .= "</a>";
				$html .= "</li>";
			}

			$html .= '</ul>'; //close ul
			$html .= '</div>'; //close div.social_share_list_holder
		}
	}
}
echo bridge_qode_get_module_part( $html );