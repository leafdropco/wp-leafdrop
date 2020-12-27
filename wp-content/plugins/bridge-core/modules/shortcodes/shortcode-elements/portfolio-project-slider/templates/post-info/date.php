<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
	<?php $date = get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?>
	<div class="qode-pps-date">
		<span><?php echo substr($date, -4); ?></span>
	</div>
<?php endif; ?>
