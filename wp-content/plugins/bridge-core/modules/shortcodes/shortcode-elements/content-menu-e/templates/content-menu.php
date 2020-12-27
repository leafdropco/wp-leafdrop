<?php if( is_array( $content_menu_items ) && count( $content_menu_items ) > 1 ) { ?>
    <nav class="content_menu" style="<?php if( ! empty( $background_color ) ){ ?> background-color: <?php echo esc_attr( $background_color ); } ?>">
        <div class="nav_select_menu clearfix">
            <div class="nav_select_button">
                <i class="fa fa-bars"></i>
            </div>
        </div>
        <ul class="menu">
            <?php foreach( $content_menu_items as $content_menu_item ) { ?>
                <li class="">
                    <a href="#<?php echo esc_attr( $content_menu_item['anchor_id'] ); ?>"><?php echo bridge_qode_icon_collections()->renderIconHTML($content_menu_item['icon'], $content_menu_item['icon_pack'], array() ); ?><?php echo esc_html( $content_menu_item['title'] ); ?></a>
                    <div class="arrow"></div>
                </li>
            <?php } ?>
        </ul>
    </nav>

    <?php foreach( $content_menu_items as $content_menu_item ) { ?>
        <div data-q_id="#<?php echo esc_attr( $content_menu_item['anchor_id'] ); ?>" data-q_title="<?php echo esc_html( $content_menu_item['title'] ); ?>" class="qode-elementor-content-menu-item in_content_menu">
            <?php echo bridge_qode_get_module_part( $content_menu_item['content'] ); ?>
        </div>
    <?php } ?>
<?php } ?>