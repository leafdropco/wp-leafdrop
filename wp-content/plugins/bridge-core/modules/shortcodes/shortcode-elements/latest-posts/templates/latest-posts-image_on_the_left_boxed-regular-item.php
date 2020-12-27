<li class="clearfix <?php echo esc_attr($featured_class); ?>">
    <div class="latest_post">
        <div class="latest_post_image clearfix">
            <a itemprop="url" href="<?php echo get_permalink(); ?>">
                <?php $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), $thumb_size); ?>
                <img itemprop="image" src="<?php echo esc_url($featured_image_array[0]); ?>" alt="" />
            </a>
        </div>
        <div class="latest_post_text">
            <div class="latest_post_inner">
                <div class="latest_post_text_inner">
                    <?php if($display_share == '1'){ ?>
                        <?php echo do_shortcode('[social_share]'); ?>
                    <?php } ?>
                    <?php if($display_time == '1'){ ?>
                        <span class="date_hour_holder">
                                <span itemprop="dateCreated" class="date entry_date updated"><?php echo get_the_time('d.m.Y');?> <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(bridge_qode_get_page_id()); ?>"/></span>
                            </span>
                    <?php } ?>
                    <<?php echo esc_attr($title_tag); ?> itemprop="name" class="latest_post_title entry_title"><a itemprop="url" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></<?php echo esc_attr($title_tag); ?>>
                    <?php echo wp_kses_post($this_object->getExcerpt(get_the_ID(), $params['text_length'])); ?>

                    <span class="post_infos">

                        <?php if($display_category == '1'){ ?>
                            <?php foreach ($cat as $categ) { ?>
                                <a itemprop="url" href="<?php echo get_category_link($categ->term_id); ?>"><?php echo esc_attr($categ->cat_name); ?></a>
                            <?php }
                        } ?>

                        <?php if ($blog_hide_comments != "yes" && $display_comments == "1") {
                            $comments_count = get_comments_number();
                            switch ($comments_count) {
                                case 0:
                                    $comments_count_text = esc_html__('No comment', 'bridge-core');
                                    break;
                                case 1:
                                    $comments_count_text = $comments_count . ' ' . esc_html__('Comment', 'bridge-core');
                                    break;
                                default:
                                    $comments_count_text = $comments_count . ' ' . esc_html__('Comments', 'bridge-core');
                                    break;
                            }?>
                            <a itemprop="url" class="post_comments" href="<?php echo get_comments_link(); ?>"><?php echo esc_attr($comments_count_text); ?></a>
                        <?php } ?>

                        <?php if($qode_like == "on" && function_exists('bridge_core_like') && $display_like == '1') { ?>
                            <span class="blog_like"><?php echo bridge_core_like_latest_posts(); ?></span>
                        <?php } ?>


                    </span>
                </div>
            </div>
        </div>
    </div>
</li>
