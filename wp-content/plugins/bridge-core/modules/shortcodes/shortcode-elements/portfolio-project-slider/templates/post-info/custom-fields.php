<?php
	$bridge_qode_portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
	if ($bridge_qode_portfolios){
		usort($bridge_qode_portfolios, "bridge_qode_compare_portfolio_options");
		foreach($bridge_qode_portfolios as $bridge_qode_portfolio){
			?>
			<div class="qode-pps-custom-field">
				<?php if($bridge_qode_portfolio['optionLabel'] != ""): ?>
					<span><?php echo stripslashes($bridge_qode_portfolio['optionLabel']); ?></span>
				<?php endif; ?>
				<p>
					<?php if($bridge_qode_portfolio['optionUrl'] != ""): ?>
						<a itemprop="url" href="<?php echo esc_url( $bridge_qode_portfolio['optionUrl'] ); ?>" target="_blank">
							<?php echo do_shortcode(stripslashes($bridge_qode_portfolio['optionValue'])); ?>
						</a>
					<?php else:?>
						<?php echo do_shortcode(stripslashes($bridge_qode_portfolio['optionValue'])); ?>
					<?php endif; ?>
				</p>
			</div>
			<?php
		}
	}
?>