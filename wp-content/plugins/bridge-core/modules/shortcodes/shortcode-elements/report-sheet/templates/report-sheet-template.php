<div class="qode-report-sheet qode-rs-<?php echo esc_attr($columns); ?>">
	
	<div class="qode-rs-title-holder">
		<<?php echo esc_attr($title_tag); ?> class='qode-rs-title'> 
			<?php echo wp_kses_post($report_sheet_title); ?>
		</<?php echo esc_attr($title_tag); ?>>
	</div>
	

	<div class="qode-rs-table qode-rs-table-<?php echo esc_attr($columns); ?>">
		<div class="qode-rs-table-header qode-rs-table-<?php echo esc_attr($columns); ?>-header clearfix">
							
				<?php if($column_one_title != '') { ?>
					<div class="qode-rs-column-title-holder qode-rs-table-column">
						<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
							<?php echo esc_attr($column_one_title); ?>
						</<?php echo esc_attr($column_title_tag); ?>>
					</div>
				<?php } ?>

				<?php if($column_two_title != '') { ?>
					<div class="qode-rs-column-title-holder qode-rs-table-column">
						<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
							<?php echo esc_attr($column_two_title); ?>
						</<?php echo esc_attr($column_title_tag); ?>>
					</div>
				<?php } ?>

				<?php if($column_three_title != '') { ?>
					<div class="qode-rs-column-title-holder qode-rs-table-column">
						<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
							<?php echo esc_attr($column_three_title); ?>
						</<?php echo esc_attr($column_title_tag); ?>>
					</div>
				<?php } ?>

				<?php if($column_four_title != '') { ?>
					<div class="qode-rs-column-title-holder qode-rs-table-column">
						<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
							<?php echo esc_attr($column_four_title); ?>
						</<?php echo esc_attr($column_title_tag); ?>>
					</div>
				<?php } ?>

				<?php if($column_five_title != '') { ?>
					<div class="qode-rs-column-title-holder qode-rs-table-column">
						<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
							<?php echo esc_attr($column_five_title); ?>
						</<?php echo esc_attr($column_title_tag); ?>>
					</div>
				<?php } ?>

		</div>

		<div class="qode-rs-table-content qode-rs-table-<?php echo esc_attr($columns); ?>-content">

			<?php foreach($rows as $row): ?>
				<div class="qode-rs-table-row clearfix">
					<?php switch($columns):
						case 'one-column': ?>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title">
									<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_one_text'])){
											echo esc_attr($row['column_one_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

									?>
									
								</div>
								<div class="qode-rs-table-column-subtitle">
									<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_one_sub_text'])) {
											echo esc_attr($row['column_one_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

									?>
								</div>
							</div>
							<?php break;

						case 'two-columns':	?>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_one_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_one_text'])){
											echo esc_attr($row['column_one_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_one_sub_text'])) {
											echo esc_attr($row['column_one_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_two_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										} 

										if(isset($row['column_two_text'])){
											echo esc_attr($row['column_two_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_two_sub_text'])) {
											echo esc_attr($row['column_two_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<?php break;

						case 'three-columns':	?>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_one_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_one_text'])){
											echo esc_attr($row['column_one_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_one_sub_text'])) {
											echo esc_attr($row['column_one_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_two_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_two_text'])){
											echo esc_attr($row['column_two_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_two_sub_text'])) {
											echo esc_attr($row['column_two_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_three_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_three_text'])){
											echo esc_attr($row['column_three_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_three_sub_text'])) {
											echo esc_attr($row['column_three_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<?php break;

						case 'four-columns':	?>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_one_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_one_text'])){
											echo esc_attr($row['column_one_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										} 

										if(isset($row['column_one_sub_text'])) {
											echo esc_attr($row['column_one_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_two_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_two_text'])){
											echo esc_attr($row['column_two_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_two_sub_text'])) {
											echo esc_attr($row['column_two_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_three_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_three_text'])){
											echo esc_attr($row['column_three_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_three_sub_text'])) {
											echo esc_attr($row['column_three_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_four_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										} 

										if(isset($row['column_four_text'])){
											echo esc_attr($row['column_four_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_four_sub_text'])) {
											echo esc_attr($row['column_four_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<?php break;

						default:
							?>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_one_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_one_text'])){
											echo esc_attr($row['column_one_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_one_sub_text'])) {
											echo esc_attr($row['column_one_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_two_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_two_text'])){
											echo esc_attr($row['column_two_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_two_sub_text'])) {
											echo esc_attr($row['column_two_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_three_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_three_text'])){
											echo esc_attr($row['column_three_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_three_sub_text'])) {
											echo esc_attr($row['column_three_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_four_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_four_text'])){
											echo esc_attr($row['column_four_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php 

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row['column_four_sub_text'])) {
											echo esc_attr($row['column_four_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<div class="qode-rs-table-column clearfix">
								<div class="qode-rs-table-column-title-header">
									<<?php echo esc_attr($column_title_tag); ?> class="qode-rs-column-title">
										<?php echo esc_attr($column_five_title); ?>
									</<?php echo esc_attr($column_title_tag); ?>>
								</div>
								<div class="qode-rs-table-column-inner">
									<div class="qode-rs-table-column-title">
										<?php 

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												<<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										if(isset($row['column_five_text'])){
											echo esc_attr($row['column_five_text']);
										}

										if(isset($row_title_tag) && $row_title_tag != ''){
											?>
												</<?php echo esc_attr($row_title_tag); ?>>
											<?php
										}

										?>
										
									</div>
									<div class="qode-rs-table-column-subtitle">
										<?php

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										} 

										if(isset($row['column_five_sub_text'])) {
											echo esc_attr($row['column_five_sub_text']); 
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												<<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}

										if(isset($row_subtitle_tag) && $row_subtitle_tag != ''){
											?>
												</<?php echo esc_attr($row_subtitle_tag); ?>>
											<?php
										}
										
										?>
									</div>
								</div>
							</div>
							<?php break;
					endswitch; ?>				
				</div>

			<?php endforeach; ?>
		</div>	

	</div>

	<?php
		if($enable_button=='yes'){ ?>
			<div class="qode-rs-button-holder">
				<?php
		            echo bridge_core_get_button_html( array(
						'text'  => $button_text,
						'size'	=> 'big_large',
						'link' 	=> $button_link
					)   );
		        ?>
			</div>
		<?php }

	?>


</div>