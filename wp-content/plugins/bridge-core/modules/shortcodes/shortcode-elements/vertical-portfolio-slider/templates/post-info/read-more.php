<?php if ( ! post_password_required() ) { ?>
	<div class="qode-read-more">

        <a href="<?php echo get_the_permalink(); ?>"><span class="qode-read-more-icon"></span><?php echo esc_html__( 'About this project', 'bridge-core' ); ?></a>
	</div>
<?php } ?>