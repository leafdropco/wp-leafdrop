<?php

if(get_post_meta(get_the_ID(), 'qode_show_badge', true) == "yes"){ ?>
    <span class="qode-portfolio-new-badge">
        <?php if(get_post_meta(get_the_ID(), 'qode_badge_text', true) != ""){
            echo bridge_qode_get_module_part( get_post_meta(get_the_ID(), 'qode_badge_text', true) );
        } ?>
    </span>
<?php } ?>