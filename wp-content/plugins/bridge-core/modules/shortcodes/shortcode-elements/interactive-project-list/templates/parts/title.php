<?php
$project_id = get_the_ID();

$project_link_meta = get_post_meta( $project_id, 'qode_portfolio-external-link', true );
$project_link      = ! empty( $project_link_meta ) ? $project_link_meta : get_permalink( $project_id );

$project_link_target_meta   = get_post_meta( $project_id, 'qode_portfolio-external-link-target', true );
$project_link_target = ! empty( $project_link_target_meta ) ? $project_link_target_meta : '_blank';

$title_additional_class = '';

if( ! empty( $responsive_title ) && $responsive_title ){
    $title_additional_class .= ' qode-ipl-responsive-title';
}
?>

<<?php echo esc_attr($title_tag); ?> class="qode-ipl-title <?php echo esc_attr( $title_additional_class ); ?>" <?php echo bridge_qode_get_inline_style($title_styles); ?>><?php echo wp_kses(get_the_title(), array('br' => true, 'span' => array('class' => true))); ?><a itemprop="url" class="qode-ipl-link" href="<?php echo esc_url( $project_link  ); ?>" target="<?php echo esc_attr( $project_link_target ); ?>"></a></<?php echo esc_attr($title_tag); ?>>