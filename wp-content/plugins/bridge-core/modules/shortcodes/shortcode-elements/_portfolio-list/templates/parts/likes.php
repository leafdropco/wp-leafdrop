<?php
if ($portfolio_qode_like == "on") {
    if ($additional_hover_type == 'additional-hover' || $additional_hover_type == 'slow-hover') {
        echo bridge_core_like_portfolio_list('icon');
    } else { ?>
        <span class='portfolio_like qbutton small white'>
        <?php

        $portfolio_project_id = get_the_ID();

        if (function_exists('bridge_core_like_portfolio_list')) {
            echo bridge_core_like_portfolio_list();
        } ?>
        </span>
    <?php }
}