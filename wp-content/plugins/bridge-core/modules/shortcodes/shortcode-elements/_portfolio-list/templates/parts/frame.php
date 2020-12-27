<?php

if(in_array($type, array('hover_text'))){
    switch ($frame_around_item){
        case 'monitor_frame': ?>
            <img itemprop="image" class="monitor_frame" alt="<?php echo esc_html__('frame', 'bridge-core');?>" src="<?php echo QODE_ROOT . '/css/img/monitor_frame.png'; ?>" />
    <?php }
}