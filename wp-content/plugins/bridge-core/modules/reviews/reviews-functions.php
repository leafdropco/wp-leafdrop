<?php

define( 'QODE_REVIEWS_MAX_RATING', 5 );
define( 'QODE_REVIEWS_POINTS_SCALE', 2 );

/*
* Function for defining post types that can be reviewed
*/
if ( ! function_exists('bridge_core_rating_posts_types') ) {
	function bridge_core_rating_posts_types() {
		$post_types = apply_filters( 'bridge_core_filter_rating_post_types', array() );
		return $post_types;
	}
}

/*
* Function for defining post types that can be reviewed
*/
if ( ! function_exists('bridge_core_rating_criteria') ) {

    function bridge_core_rating_criteria($post_type = '') {
        $rating_criteria = array();
        $global_rating   = array(
            'key'   => 'qode_rating',
            'label' => esc_html__( 'Rating', 'bridge-core' ),
            'show'  => true
   		);

    $rating_criteria[] = $global_rating;

    $rating_criteria = apply_filters( 'bridge_core_rating_criteria', $rating_criteria, $post_type );

    return $rating_criteria;
    }
}

/*
 * Function for adding comment meta boxes and its callback in admin
 */
if ( ! function_exists('bridge_core_extend_comment_meta_box') ) {
    function bridge_core_extend_comment_meta_box() {
        add_meta_box(
            'title',
            esc_html__( 'Comment - Reviews', 'bridge-core' ),
            'bridge_core_extend_comment_meta_box_callback',
            'comment',
            'normal',
            'high'
        );
    }

    add_action( 'add_meta_boxes_comment', 'bridge_core_extend_comment_meta_box' );
}


if ( ! function_exists('bridge_core_extend_comment_meta_box_callback') ) {
    function bridge_core_extend_comment_meta_box_callback($comment ) {
        $post_types = bridge_core_rating_posts_types();
        if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
            foreach ( $post_types as $post_type ) {
                if ( $comment->post_type == $post_type ) {
                    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
                    $title                 = get_comment_meta( $comment->comment_ID, 'qode_comment_title', true );
                    $title_params          = array();
                    $title_params['title'] = $title;

                    echo  bridge_core_get_module_template_part( 'templates/admin/title-field', 'reviews', '', $title_params );
                    $rating_criteria = bridge_core_rating_criteria($post_type);

                    foreach ( $rating_criteria as $criteria ) {
                        $star_params           = array();
                        $star_params['label']  = $criteria['label'];
                        $star_params['key']    = $criteria['key'];
                        $star_params['rating'] = get_comment_meta( $comment->comment_ID, $criteria['key'], true );

                        echo  bridge_core_get_module_template_part( 'templates/admin/stars-field', 'reviews', '', $star_params );
                    }
                }
            }
        }
    }
}

if ( ! function_exists('bridge_core_extend_comment_edit_metafields') ) {
    function bridge_core_extend_comment_edit_metafields($comment_id ) {
        if ( ( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) ) {
            return;
        }

        if ( ( isset( $_POST['qode_comment_title'] ) ) && ( $_POST['qode_comment_title'] != '' ) ):
            $title = wp_filter_nohtml_kses( $_POST['qode_comment_title'] );
            update_comment_meta( $comment_id, 'qode_comment_title', $title );
        else :
            delete_comment_meta( $comment_id, 'qode_comment_title' );
        endif;

        $comment = get_comment( $comment_id );

        $rating_criteria = bridge_core_rating_criteria(get_post_type($comment->comment_post_ID));
        foreach ( $rating_criteria as $criteria ) {
            if ( ( isset( $_POST[ $criteria['key'] ] ) ) && ( $_POST[ $criteria['key'] ] != '' ) ):
                $rating = wp_filter_nohtml_kses( $_POST[ $criteria['key'] ] );
                update_comment_meta( $comment_id, $criteria['key'], $rating );
            else :
                delete_comment_meta( $comment_id, $criteria['key'] );
            endif;
        }
    }

    add_action( 'edit_comment', 'bridge_core_extend_comment_edit_metafields' );
}
/*
 * Function that is triggered when comment is saved
 */
if ( ! function_exists('bridge_core_extend_comment_save_metafields') ) {
    function bridge_core_extend_comment_save_metafields($comment_id ) {
        if ( ( isset( $_POST['qode_comment_title'] ) ) && ( $_POST['qode_comment_title'] != '' ) ) {
            $title = wp_filter_nohtml_kses( $_POST['qode_comment_title'] );
            add_comment_meta( $comment_id, 'qode_comment_title', $title );
        }

        $comment = get_comment( $comment_id );

        $rating_criteria = bridge_core_rating_criteria(get_post_type($comment->comment_post_ID));
        foreach ( $rating_criteria as $criteria ) {
            if ( ( isset( $_POST[ $criteria['key'] ] ) ) && ( $_POST[ $criteria['key'] ] != '' ) ) {
                $rating = wp_filter_nohtml_kses( $_POST[ $criteria['key'] ] );
                add_comment_meta( $comment_id, $criteria['key'], $rating );
            }
        }
    }

    add_action( 'comment_post', 'bridge_core_extend_comment_save_metafields' );
}
/*
 * Function that is triggered before comment is saved
 */
if ( ! function_exists('bridge_core_extend_comment_preprocess_metafields') ) {
    function bridge_core_extend_comment_preprocess_metafields($commentdata ) {
        $post_types = bridge_core_rating_posts_types();

        if ( is_array( $post_types ) && count( $post_types ) > 0 ) {
            foreach ( $post_types as $post_type ) {
                if ( is_singular( $post_type ) ) {
                    $comment = get_comment( $comment_id );

                    $rating_criteria = bridge_core_rating_criteria(get_post_type($comment->comment_post_ID));
                    foreach ( $rating_criteria as $criteria ) {
                        if ( ! isset( $_POST[ $criteria['key'] ] ) ) {
                            wp_die( esc_html__( 'Error: You did not add a rating. Hit the Back button on your Web browser and resubmit your comment with a rating.', 'bridge-core' ) );
                            break;
                        }
                    }
                }
            }
        }

        return $commentdata;
    }

    add_filter( 'preprocess_comment', 'bridge_core_extend_comment_preprocess_metafields' );
}