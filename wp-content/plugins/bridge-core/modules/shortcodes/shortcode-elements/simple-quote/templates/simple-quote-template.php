<div class="qode-simple-quote-holder <?php if($shadow == 'yes'){ echo 'qode-simple-quote-enabled-shadow';} ?>">
	<div class="qode-simple-quote-triangle-shadow">
		
	</div>
	<div class="qode-simple-quote-triangle" <?php bridge_qode_inline_style($triangle_style); ?>>
		
	</div>
	<div class="qode-simple-quote-holder-inner" <?php bridge_qode_inline_style($holder_style); ?>>
		<div class="qode-simple-quote-icon-holder" <?php if(!empty($quote_symbol_color)){?> style="fill: <?php echo esc_attr($quote_symbol_color); }?>">
			<svg x="0px" y="0px" width="118px" height="97px" viewBox="0 0 118 97" enable-background="new 0 0 118 97" xml:space="preserve">
				<g>
					<path d="M31.1,73.998c5.688-7.111,8.535-14.316,8.535-21.617c0-3.09-0.371-5.751-1.113-7.978c-4.332,3.34-9.031,5.009-14.102,5.009
						c-6.929,0-12.71-2.194-17.349-6.586c-4.639-4.389-6.958-10.298-6.958-17.72c0-6.926,2.348-12.71,7.051-17.349
						c4.7-4.639,10.452-6.958,17.256-6.958c9.77,0,17.256,4.021,22.451,12.061c4.329,6.68,6.494,15.029,6.494,25.049
						c0,12.742-3.247,24.154-9.741,34.234C37.13,82.227,27.325,90.357,14.215,96.541l-3.525-6.865
						C18.604,86.336,25.409,81.113,31.1,73.998z M95.67,73.998c5.688-7.111,8.535-14.316,8.535-21.617c0-3.09-0.371-5.751-1.113-7.978
						c-4.206,3.34-8.906,5.009-14.102,5.009c-6.804,0-12.556-2.194-17.256-6.586c-4.702-4.389-7.051-10.298-7.051-17.72
						c0-4.575,1.113-8.721,3.34-12.432s5.195-6.616,8.906-8.721c3.711-2.102,7.729-3.154,12.061-3.154
						c9.771,0,17.256,4.021,22.451,12.061c4.329,6.68,6.494,15.029,6.494,25.049c0,12.742-3.247,24.154-9.741,34.234
						C101.7,82.227,91.896,90.357,78.785,96.541l-3.525-6.865C83.175,86.336,89.979,81.113,95.67,73.998z"/>
				</g>
			</svg>
		</div>
		<div class="qode-simple-quote-content-holder">
			<div class="qode-simple-quote-content-holder-inner">
				<div class="qode-simple-quote-text-holder" <?php if(!empty($simple_quote_spacing)){?> style="margin-bottom: <?php echo intval($simple_quote_spacing);?>px"<?php }?>>
					<<?php echo esc_attr($text_title_tag);?> class="qode-simple-quote-text-title"> <?php echo esc_attr($simple_quote_text) ?>  </<?php echo esc_attr($text_title_tag);?>>
				</div>
				<div class="qode-simple-quote-author-holder">
					<<?php echo esc_attr($author_title_tag);?> class="qode-simple-quote-author-title"> <?php echo esc_attr($simple_quote_author) ?>  </<?php echo esc_attr($author_title_tag);?>>
				</div>
			</div>
		</div>
	</div>
</div>