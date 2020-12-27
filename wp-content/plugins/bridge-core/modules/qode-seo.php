<?php

if(!function_exists('bridge_core_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */

    function bridge_core_header_meta() {
        global $bridge_qode_options;

        if(isset($bridge_qode_options['disable_qode_seo']) && $bridge_qode_options['disable_qode_seo'] == 'no') {

            $seo_description = get_post_meta(bridge_qode_get_page_id(), "qode_seo_description", true);
            $seo_keywords = get_post_meta(bridge_qode_get_page_id(), "qode_seo_keywords", true);
            ?>

            <?php if($seo_description) { ?>
                <meta name="description" content="<?php echo esc_attr( $seo_description ); ?>">
            <?php } else if($bridge_qode_options['meta_description']){ ?>
                <meta name="description" content="<?php echo esc_attr( $bridge_qode_options['meta_description'] ); ?>">
            <?php } ?>

            <?php if($seo_keywords) { ?>
                <meta name="keywords" content="<?php echo esc_attr( $seo_keywords ); ?>">
            <?php } else if($bridge_qode_options['meta_keywords']){ ?>
                <meta name="keywords" content="<?php echo esc_attr( $bridge_qode_options['meta_keywords'] ); ?>">
            <?php }
        }


		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( $bridge_qode_options['favicon_image'] ); ?>">
            <link rel="apple-touch-icon" href="<?php echo esc_url( $bridge_qode_options['favicon_image'] ); ?>"/>
        <?php }

    }

    add_action('bridge_qode_action_header_meta', 'bridge_core_header_meta');
}

if(!function_exists('bridge_core_ajax_meta')) {
    /**
     * Function that echoes meta data for ajax
     *
     * @since 5.0
     * @version 0.2
     */
    function bridge_core_ajax_meta() {
        global $bridge_qode_options;

        ?>

        <div class="seo_title"><?php wp_title(''); ?></div>

        <?php

        if(isset($bridge_qode_options['disable_qode_seo']) && $bridge_qode_options['disable_qode_seo'] == 'no') {
            $seo_description = get_post_meta(bridge_qode_get_page_id(), "qode_seo_description", true);
            $seo_keywords = get_post_meta(bridge_qode_get_page_id(), "qode_seo_keywords", true);
            ?>



            <?php if ($seo_description !== '') { ?>
                <div class="seo_description"><?php echo esc_attr( $seo_description ); ?></div>
            <?php } else if ($bridge_qode_options['meta_description']) { ?>
                <div class="seo_description"><?php echo esc_attr( $bridge_qode_options['meta_description'] ); ?></div>
            <?php } ?>
            <?php if ($seo_keywords !== '') { ?>
                <div class="seo_keywords"><?php echo esc_attr( $seo_keywords ); ?></div>
            <?php } else if ($bridge_qode_options['meta_keywords']) { ?>
                <div class="seo_keywords"><?php echo esc_attr( $bridge_qode_options['meta_keywords'] ); ?></div>
            <?php }
        }
    }

    add_action('bridge_qode_action_ajax_meta', 'bridge_core_ajax_meta');
}