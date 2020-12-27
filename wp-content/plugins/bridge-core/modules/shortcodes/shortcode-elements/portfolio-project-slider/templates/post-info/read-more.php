<?php if ( ! post_password_required() ) { ?>
	<div class="qode-read-more">
		<?php
		
		echo bridge_core_get_button_v2_html(
			array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text' => esc_html__( 'Know More', 'bridge-core' )
			)
		);
		
		?>
	</div>
<?php } ?>