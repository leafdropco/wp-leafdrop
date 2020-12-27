<div class="qodef-core-dashboard wrap about-wrap">
    <div class="qodef-cd-title-holder">
        <img class="qodef-cd-logo" src="<?php echo BRIDGE_CORE_MODULES_URL_PATH . '/core-dashboard/assets/img/logo.png'; ?>" alt="<?php esc_attr_e( 'Qode', 'bridge-core' ) ?>"/>
        <h1 class="qodef-cd-title"><?php esc_html_e( 'Welcome to ', 'bridge-core' );
			echo wp_get_theme()->Name; ?></h1>
    </div>
    <h4 class="qodef-cd-subtitle"><?php echo sprintf( esc_html__( 'Thank you for choosing %s. Now it\'s time to create something awesome.', 'bridge-core' ), wp_get_theme()->Name ); ?></h4>
    <div class="qodef-core-dashboard-inner">
        <div class="qodef-core-dashboard-column">
            <div class="qodef-core-dashboard-box qodef-core-bottom-space">
                <div class="qodef-cd-box-title-holder">
                    <h2><?php esc_html_e( 'Registration', 'bridge-core' ); ?></h2>
					<?php if ( ! $is_activated ) { ?>
                        <p><?php esc_html_e( 'Please input the purchase code you received with the theme as well as your email address in order to activate your copy of the theme.', 'bridge-core' ); ?></p>
					<?php } else { ?>
                        <p><?php esc_html_e( 'You have successfully registered your copy of the theme! Note that if you used your purchase code on one installation, you are required to Deregister in order to use the purchase code on a different installation.', 'bridge-core' ); ?></p>
					<?php } ?>
                </div>
                <div class="qodef-cd-box-inner">
                    <form method="post" action="" id="qode-register-purchase-form">
						<?php if ( ! $is_activated ) { ?>
                            <div class="qodef-cd-box-section qodef-activation-holder">
                                <h3><?php esc_html_e( 'Register your theme', 'bridge-core' ); ?></h3>
                                <div class="qodef-cd-field-holder" data-empty-field="<?php esc_attr_e( 'Field is empty', 'bridge-core' ); ?>">
                                    <label class="qodef-cd-label"><?php esc_html_e( 'Purchase Code', 'bridge-core' ); ?></label>
                                    <input type="text" name="purchase_code" class="qodef-cd-input qodef-cd-required" required>
                                </div>
                                <div class="qodef-cd-field-holder" data-empty-field="<?php esc_attr_e( 'Field is empty', 'bridge-core' ); ?>" data-invalid-field="<?php esc_attr_e( 'Email is not valid', 'bridge-core' ); ?>">
                                    <label class="qodef-cd-label"><?php esc_html_e( 'Email', 'bridge-core' ); ?></label>
                                    <input type="text" name="email" class="qodef-cd-input qodef-cd-required" required>
                                </div>
                                <div class="qodef-cd-field-holder">
                                    <input type="submit" class="qodef-cd-button" value="<?php esc_attr_e( 'Register Theme', 'bridge-core' ); ?>" name="check" id="qode-register-purchase-key"/>
                                    <span class="qodef-cd-button-wait"><?php esc_attr_e( 'Please Wait...', 'bridge-core' ); ?></span>
                                </div>
                            </div>
						<?php } else { ?>
                            <div class="qodef-cd-box-section qodef-deactivation-holder">
                                <h3><?php esc_html_e( 'Deregister your theme', 'bridge-core' ); ?></h3>
                                <div class="qodef-cd-field-holder">
                                    <label class="qodef-cd-label"><?php esc_html_e( 'Purchase Code', 'bridge-core' ); ?></label>
                                    <input type="text" name="text" class="qodef-cd-input qodef-cd-required" value="<?php echo esc_attr( $info['purchase_code'] ); ?>" disabled>
                                </div>
                                <div class="qodef-cd-field-holder">
                                    <input type="submit" class="qodef-cd-button" value="<?php esc_attr_e( 'Deregister Theme', 'bridge-core' ); ?>" name="check" id="qode-deregister-purchase-key"/>
                                    <span class="qodef-cd-button-wait"><?php esc_attr_e( 'Please Wait...', 'bridge-core' ); ?></span>
                                </div>
                            </div>
						<?php } ?>
                        <div class="message"></div>
                    </form>
                </div>
            </div>
            <div class="qodef-core-dashboard-box">
                <div class="qodef-cd-box-title-holder">
                    <h2><?php esc_html_e( 'System Information', 'bridge-core' ); ?></h2>
                    <p><?php esc_html_e( 'Here is an overview of your current server configuration info.', 'bridge-core' ); ?></p>
                </div>
                <div class="qodef-cd-box-inner">
					<?php foreach ( $system_info as $system_info_key => $system_info_value ):
						$class = ( isset( $system_info_value['pass'] ) && ! $system_info_value['pass'] ) ? 'qodef-cdb-value-false' : '';
						?>
                        <div class="qodef-cd-box-row">
                            <div class="qodef-cdb-label"><?php echo esc_attr( $system_info_value['title'] ); ?></div>
                            <div class="qodef-cdb-value <?php echo esc_attr( $class ); ?>">
                                <span><?php echo wp_kses_post( $system_info_value['value'] ); ?></span>
								<?php if ( isset( $system_info_value['notice'] ) && ( isset( $system_info_value['pass'] ) && ! $system_info_value['pass'] ) ) { ?>
									<?php echo esc_html( $system_info_value['notice'] ); ?>
								<?php } ?>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="qodef-core-dashboard-column qodef-cd-smaller-column">
            <div class="qodef-core-dashboard-box">
                <div class="qodef-cd-box-title-holder">
                    <h2><?php esc_html_e( 'Useful links', 'bridge-core' ); ?></h2>
                </div>

                <div class="qodef-cd-box-inner">
                    <ul class="qodef-cd-box-list">
                        <li>
                            <a href="http://bridge.qodeinteractive.com/" target="_blank"><?php esc_html_e( 'Theme Documentation', 'bridge-core' ); ?></a>
                        </li>
                        <li>
                            <a href="https://helpcenter.qodeinteractive.com" target="_blank"><?php esc_html_e( 'Support center', 'bridge-core' ); ?></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/QodeInteractiveVideos" target="_blank"><?php esc_html_e( 'Video tutorials', 'bridge-core' ); ?></a>
                        </li>
                        <li>
                            <a href="https://qodeinteractive.com" target="_blank"><?php esc_html_e( 'Qode Interactive themes', 'bridge-core' ); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>