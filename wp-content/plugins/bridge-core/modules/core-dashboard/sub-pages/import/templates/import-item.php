<?php
$required_plugins_html = bridge_core_get_required_plugins_links($demo_id);
?>
<div class="qodef-core-dashboard">
    <a href="#" class="qodef-import-popup-close">
        <span class="dashicons dashicons-no-alt"></span>
    </a>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-core-dashboard-column">
			<div class="qodef-core-dashboard-box qodef-cd-import-box">
				<?php
				if(!empty(BridgeCoreDashboard::get_instance()->get_purchased_code())) {?>
				<div class="qodef-cd-box-title-holder">
					<h3><?php esc_html_e('Import demo content', 'bridge-core'); ?></h3>
                </div>
				<div class="qodef-cd-box-inner">
					<form method="post" class="qodef-cd-import-form" data-confirm-message="<?php esc_attr_e('Are you sure, you want to import Demo Data now?', 'bridge-core'); ?>">
						<div class="qodef-cd-box-form-section">
							<?php echo bridge_core_get_module_template_part('sub-pages/import/templates/notice', 'core-dashboard', ''); ?>
                            <div class="qodef-import-popup-top-info">
                                <div class="qodef-import-popup-image-holder">
                                    <img src="http://export.qodethemes.com/bridge-admin/images/demos/<?php echo esc_attr($demo_id); ?>.jpg" />
                                </div>
                                <div class="qodef-popup-required-plugins-holder">
                                    <?php echo wp_kses_post( $required_plugins_html ); ?>
                                </div>
                            </div>
						</div>
                        <input type="hidden" class="qodef-import-demo" value="<?php echo esc_attr( $demo_id );?>"/>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-columns">
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Import Type', 'bridge-core'); ?></label>
								<select name="import_option" class="qodef-cd-import-option" data-option-name="import_option" data-option-type="selectbox">
									<option value="none"><?php esc_html_e('Please Select', 'bridge-core'); ?></option>
									<option value="complete"><?php esc_html_e('All', 'bridge-core'); ?></option>
									<option value="content"><?php esc_html_e('Content', 'bridge-core'); ?></option>
									<option value="widgets"><?php esc_html_e('Widgets', 'bridge-core'); ?></option>
									<option value="options"><?php esc_html_e('Options', 'bridge-core'); ?></option>
<!--									<option value="single-page">--><?php //esc_html_e('Single Page', 'bridge-core'); ?><!--</option>-->
								</select>
							</div>
							<div class="qodef-cd-box-form-section-column">
								<label class="qodef-cd-label"><?php esc_html_e('Import Attachments', 'bridge-core'); ?></label>
								<div class="qode-cd-switch">
									<label class="qode-cd-cb-enable selected"><span><?php esc_html_e('Yes', 'bridge-core'); ?></span></label>
									<label class="qode-cd-cb-disable"><span><?php esc_html_e('No', 'bridge-core'); ?></span></label>
									<input type="checkbox" class="qodef-cd-import-attachments checkbox" name="import_attachments" value="1" checked="checked">
								</div>
							</div>
						</div>
                        <div class="qodef-cd-box-form-section qodef-cd-box-form-last-section">
                            <span class="qodef-cd-import-is-completed"><?php esc_html_e('Import is completed', 'bridge-core') ?></span>
	                        <span class="qodef-cd-import-went-wrong"><?php esc_html_e('Something went wrong.', 'bridge-core') ?> <a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e('Please contact support.', 'bridge-core') ?></a></span>
	                        <input type="submit" class="qodef-cd-button" value="<?php esc_attr_e('Import', 'bridge-core'); ?>" name="import" id="qodef-import-demo-data" />
                        </div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-dependency"></div>
						<div class="qodef-cd-box-form-section qodef-cd-box-form-section-progress">
							<span><?php esc_html_e('The import process may take some time. Please be patient.', 'bridge-core') ?></span>
							<progress id="qodef-progress-bar" value="0" max="100"></progress>
							<span class="qodef-cd-progress-percent"><?php esc_attr_e('0%', 'bridge-core'); ?></span>
						</div>
						<?php wp_nonce_field("qodef_cd_import_nonce","qodef_cd_import_nonce") ?>
					</form>
				</div>
				<?php } else { ?>
					<div class="qodef-cd-box-title-holder">
						<h3><?php esc_html_e('Import demo content', 'bridge-core'); ?></h3>
						<p><?php esc_html_e('Please activate your copy of the theme by registering the theme so you could proceed with the demo import process. ', 'bridge-core'); ?></p>
					</div>
					<div class="qodef-cd-box-inner">
						<div class="qodef-cd-box-section">
							<div class="qodef-cd-field-holder">
								<a href="<?php echo admin_url('admin.php?page=bridge_core_dashboard'); ?>" class="qodef-cd-button"><?php esc_attr_e('Activate your theme copy', 'bridge-core'); ?></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>