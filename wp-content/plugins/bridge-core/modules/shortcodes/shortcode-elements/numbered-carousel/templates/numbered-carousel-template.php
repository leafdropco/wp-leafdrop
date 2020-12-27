<div class="qode-numbered-carousel <?php echo esc_attr($holder_classes); ?> ">
    <?php if (!empty($items)) : ?>
        <?php $l = 1; ?>
        <div class="qode-nc-bg-items">
            <?php foreach ($items as $item) : ?>
                <?php if ($item['media_type'] == 'image') : ?>
                    <div class="qode-nc-bg-item qode-nc-image"
                        data-index=<?php echo esc_attr($l); ?> 
                        style="background-image:url('<?php echo wp_get_attachment_url($item['image']); ?>');">
                    </div>
                <?php else : ?>
                    <div class="qode-nc-bg-item qode-nc-video"  data-index=<?php echo esc_attr($l); ?> >
                        <video autoplay loop muted>
                            <source src="<?php echo esc_url($item['video_url']); ?>" type="video/mp4">
                        </video>
                    </div>
                <?php endif; ?>
                <?php $l++; ?>
            <?php endforeach; ?>
        </div>
        <div class="qode-nc-grid">
            <?php for ($j = 1; $j <= 5; $j++) : ?>
                <span class="qode-nc-grid-line"></span>
            <?php endfor; ?>
        </div>
        <div class="qode-nc-content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php $i = 1; ?>
                    <?php foreach ($items as $item) : 
                        $content = array (
                                array("subtitle", 'h6', ! empty( $item['subtitle'] ) ? $item['subtitle'] : ''),
                                array("title", 'h1', ! empty( $item['title'] ) ? $item['title'] : ''),
                                array("text", 'p', ! empty( $item['text'] ) ? $item['text'] : ''),
                            );
                        ?>
                        <div class="qode-nc-item swiper-slide" data-index=<?php echo esc_attr($i); ?>>
                            <div class="qode-nc-item-inner">
                                <?php $k = 0; ?>
                                <?php foreach ($content as $contentItem) : ?>
                                    <div class="qode-nc-item-<?php echo esc_attr($content[$k][0]); ?>-wrapper">
                                        <?php if( $content[$k][2] !== '' ){ ?>
                                            <<?php echo esc_attr($content[$k][1]); ?> class="qode-nc-item-<?php echo esc_attr($content[$k][0]); ?>">
                                                <?php echo esc_attr($content[$k][2]); ?>
                                            </<?php echo esc_attr($content[$k][1]); ?>>
                                        <?php } ?>
                                    </div>
                                    <?php $k++; ?>
                                <?php endforeach; ?>
                                <?php if(!empty($item['link']) && !empty($item['link_text'])) : ?>
                                    <div class="qode-nc-item-btn-wrapper">
                                        <?php echo bridge_core_get_button_v2_html(array(
                                            'link' => $item['link'],
                                            'text' => $item['link_text'],
                                            'type' => 'outline',
                                            'size' => 'medium',
                                            'border_color' => '#fff',
                                            'hover_border_color' => '#fff',
                                            'hover_background_color' => '#fff',
                                            'color' => '#fff',
                                            'hover_color' => '#000',
                                            'custom_class' => 'qode-nc-item-btn'
                                        )); ?>
                                    </div>
                                <?php endif; ?>
                            </div>  
                            <div class="qode-nc-item-number-wrapper">
                                <span class="qode-nc-item-number">
                                <?php echo esc_attr($i); ?>
                                </span>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>