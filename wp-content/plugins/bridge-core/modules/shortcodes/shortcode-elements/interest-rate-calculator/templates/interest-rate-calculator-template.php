<div class="qode-irc-holder" <?php echo bridge_qode_get_inline_attrs($irc_data); ?> <?php bridge_qode_inline_style($irt_background_color); ?>>
	<div class="qode-irc-holder-inner">
		<div class="qode-irc-title-holder">
			<<?php echo esc_attr($irt_title_tag); ?>> <?php echo esc_attr($irt_title) ?> </<?php echo esc_attr($irt_title_tag); ?>>
		</div>
		<div class="qode-irc-sliders-holder">
			<div class="qode-irc-range-slider-loan-holder">
				<div class="qode-irc-range-slider-loan-holder-inner clearfix" <?php bridge_qode_inline_style($irc_values_style); ?>>
					<div class="qode-irc-slider-loan-value irc-min" > <span class="irc-currency"><?php echo esc_attr($irt_currency);?></span><span class="qode-irc-value"></span><?php echo esc_attr($irt_loan_min_value); ?> </div>
					<div class="qode-irc-slider-loan-value irc-current" <?php bridge_qode_inline_style($irc_active_color); ?>> <span class="irc-currency"><?php echo esc_attr($irt_currency);?></span><span class="irc-current-value"></span></div>
					<div class="qode-irc-slider-loan-value irc-max"> <span class="irc-currency"><?php echo esc_attr($irt_currency); ?></span><?php echo esc_attr($irt_loan_max_value); ?> </div>
				</div>
				<input class="irc-range-slider irc-range-slider-loan" type="range" min="<?php echo esc_attr($irt_loan_min_value); ?>" max="<?php echo esc_attr($irt_loan_max_value); ?>" step="<?php echo esc_attr($irt_loan_step); ?>" value="<?php echo ($irt_loan_max_value + $irt_loan_min_value)/2;?>" data-orientation="horizontal" data-rangeslider>
			</div>
			<div class="qode-irc-range-slider-period-holder">
				<div class="qode-irc-range-slider-period-holder-inner clearfix" <?php bridge_qode_inline_style($irc_values_style); ?>>
					<div class="qode-irc-slider-period-value irc-min"><?php echo esc_attr($irt_loan_min_period); ?> <span class="irc-period-label"><?php echo esc_attr($irt_period_label);?></span></div>
					<div class="qode-irc-slider-period-value irc-current" <?php bridge_qode_inline_style($irc_active_color); ?>><span class="irc-current-value"></span> <span class="irc-period-label"><?php echo esc_attr($irt_period_label);?></span></div>
					<div class="qode-irc-slider-period-value irc-max"><?php echo esc_attr($irt_loan_max_period); ?> <span class="irc-period-label"><?php echo esc_attr($irt_period_label); ?></span></div>
				</div>
				<input class="irc-range-slider irc-range-slider-period" type="range" min="<?php echo esc_attr($irt_loan_min_period); ?>" max="<?php echo esc_attr($irt_loan_max_period); ?>" step="<?php echo esc_attr($irt_period_step); ?>" value="<?php echo esc_attr($irt_loan_max_period + $irt_loan_min_period)/2;?>" data-orientation="horizontal" data-rangeslider>
			</div>
		</div>
		<div class="qode-irc-content-holder">
			<div class="qode-irc-content-row qode-irc-borrow-row clearfix" <?php bridge_qode_inline_style($irc_labels_border_style); ?>>
				<div class="qode-irc-label" <?php bridge_qode_inline_style($irc_labels_style); ?>> <?php echo esc_html__('Borrowing:', 'bridge-core'); ?> </div>
				<div class="qode-irc-value-holder" <?php bridge_qode_inline_style($irc_results_style); ?>> <span class="irc-currency"><?php echo esc_attr($irt_currency);?></span><span class="qode-irc-value"></span> </div>
			</div>
			<div class="qode-irc-content-row qode-irc-interest-row clearfix" <?php bridge_qode_inline_style($irc_labels_border_style); ?>>
				<div class="qode-irc-label" <?php bridge_qode_inline_style($irc_labels_style); ?>> <?php echo esc_html__('Interest to pay:', 'bridge-core'); ?> </div>
				<div class="qode-irc-value-holder" <?php bridge_qode_inline_style($irc_results_style); ?>> <span class="irc-currency"><?php echo esc_attr($irt_currency);?></span><span class="qode-irc-value"></span> </div>
			</div>
			<div class="qode-irc-content-row qode-irc-total-row clearfix" <?php bridge_qode_inline_style($irc_labels_border_style); ?>>
				<div class="qode-irc-label" <?php bridge_qode_inline_style($irc_labels_style); ?>> <?php echo esc_html__('Total you will pay:', 'bridge-core'); ?> </div>
				<div class="qode-irc-value-holder" <?php bridge_qode_inline_style($irc_results_style); ?>> <span class="irc-currency" <?php bridge_qode_inline_style($irc_active_color);?>><?php echo esc_attr($irt_currency);;?></span><span class="qode-irc-value" <?php bridge_qode_inline_style($irc_active_color);?>></span> </div>
			</div>
		</div>
		<?php if($irt_button == 'yes'){ ?>
		<div class="qode-irc-button-holder">
			<?php 
			
			$params = array();
			$params['size'] = 'big_large_full_width';
			$params['text'] = $irt_button_text;
			$params['link'] = $irt_button_link;
			$params['target'] = $irt_button_target;

			echo bridge_core_get_button_html($params);

			?>
		</div>
		<?php } ?>
	</div>
</div>