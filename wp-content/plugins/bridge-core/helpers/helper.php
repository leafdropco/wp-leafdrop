<?php

if ( ! function_exists('bridge_core_is_installed') ) {
	/**
	 * Function that checks if forward module installed
	 *
	 * @param $name string - module name
	 *
	 * @return bool
	 */
	function bridge_core_is_installed($name ) {
		
		switch ( $name ) {
			case 'theme';
				return defined( 'BRIDGE_QODE' );
				break;
			case 'qode-tours';
				return defined('QODE_TOURS_VERSION');
				break;
			case 'qode-listing';
				return defined('QODE_LISTING_VERSION');
				break;
			case 'qode-lms';
				return defined('QODE_LMS_VERSION');
				break;
            case 'qode-real-estate';
				return defined('QODE_RE_VERSION');
				break;
			case 'woocommerce';
				return function_exists( 'is_woocommerce' );
				break;
			case 'gutenberg-editor';
				return function_exists( 'register_block_type' );
				break;
            case 'contact-form-7';
                return defined('WPCF7_VERSION');
                break;
            case 'visual-composer';
                return class_exists( 'WPBakeryVisualComposerAbstract' );
                break;
			case 'elementor';
				return defined('ELEMENTOR_VERSION');
				break;
			case 'revolution-slider';
                return class_exists('RevSliderFront');
                break;
			case 'layer-slider';
                return defined('LS_PLUGIN_VERSION');
                break;
			default:
				return false;
		}
	}
}

if(!function_exists('bridge_core_get_module_template_part')) {

	function bridge_core_get_module_template_part($template, $module, $slug = '', $params = array()) {
		$template_path = BRIDGE_CORE_MODULES_PATH . '/' .$module;

		return bridge_core_return_template_part($template_path.'/'.$template, $slug, $params);

	}
}
if(!function_exists('bridge_core_get_shortcode_template_part')) {

	function bridge_core_get_shortcode_template_part($template, $module, $slug = '', $params = array()) {
		$template_path = BRIDGE_CORE_SHORTCODES_PATH . '/' .$module;

		return bridge_core_return_template_part($template_path.'/'.$template, $slug, $params);

	}
}
if(!function_exists('bridge_core_return_template_part')) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 * @see bridge_qode_get_template_part()
	 */
	function bridge_core_return_template_part($template, $slug = '', $params = array()) {
		if(is_array($params) && count($params)) {
			extract($params);
		}
		$html          = '';
		$templates = array();

		if($template !== '') {
			if($slug !== '') {
				$templates[] = "{$template}-{$slug}.php";
			}

			$templates[] = $template.'.php';
		}

		$located = bridge_qode_find_template_path($templates, true);

		if($located) {
			ob_start();
			include($located);
			$html = ob_get_clean();
		}

		return $html;
	}
}

if(!function_exists('bridge_core_send_contact_page_form')) {

	function bridge_core_send_contact_page_form() {
		if(bridge_core_is_installed('theme')) {
			global $wp_filesystem;
            WP_Filesystem();

			check_ajax_referer('bridge_qode_contact_page_nonce', 'contact_page_nonce');
			if (isset($_POST['form_data'])) {

				$data_string = $_POST['form_data'];
				parse_str($data_string, $data_array);

				$send_mail = true;
				$use_recaptcha = bridge_qode_options()->getOptionValue('use_recaptcha');
				$secret_key = bridge_qode_options()->getOptionValue('recaptcha_private_key');


				$email_to = bridge_qode_options()->getOptionValue('receive_mail');
				$email_from = bridge_qode_options()->getOptionValue('email_from');
				$subject = bridge_qode_options()->getOptionValue('email_subject');

				$first_name = bridge_qode_replace_newline(sanitize_text_field($data_array['fname']));
				$last_name  = bridge_qode_replace_newline(sanitize_text_field($data_array['lname']));
				$website    = sanitize_text_field($data_array['website']);
				$message    = sanitize_textarea_field($data_array['message']);

				$text = esc_html__('Name: ', 'bridge-core') . $first_name . " " . $last_name . "\n";
				$text .=  esc_html__('Email: ', 'bridge-core') . sanitize_email($data_array['email']) . "\n";
				$text .=  esc_html__('WebSite: ', 'bridge-core') . $website . "\n";
				$text .=  esc_html__('Message: ', 'bridge-core') . $message;

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/plain; charset=utf-8" . "\r\n";
				$headers .= "From: '" . $first_name . " " . $last_name . "' <" . $email_from . "> " . "\r\n";

				if ($use_recaptcha == 'yes' && $secret_key != '') {
					$captcha = $data_array['g-recaptcha-response'];
					$response = $wp_filesystem->get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $captcha);
					$response_keys = json_decode($response, true);

					if (!$response_keys['success']) {
						$send_mail = false;
						bridge_qode_ajax_status('error', esc_html__('Invalid Captcha', 'bridge-core'));
					}
				}

				if ($send_mail) {
					$result = wp_mail($email_to, $subject, $text, $headers);
					if ($result) {
						bridge_qode_ajax_status('success', '<strong>' . esc_html__('THANK YOU!', 'bridge-core') . ' </strong>' . esc_html__('Your email was successfully sent. We will contact you as soon as possible.', 'bridge-core'));
					} else {
						bridge_qode_ajax_status('error', esc_html__('Email server problem', 'bridge-core'));
					}
				}

			}
			wp_die();
		}

	}

	add_action('wp_ajax_nopriv_bridge_core_send_contact_page_form', 'bridge_core_send_contact_page_form');
	add_action( 'wp_ajax_bridge_core_send_contact_page_form', 'bridge_core_send_contact_page_form' );

}

/* Function for adding custom meta boxes hooked to default action */
if(! function_exists('bridge_core_include_meta_boxes')){
    function bridge_core_include_meta_boxes(){
        if ( class_exists( 'WP_Block_Type' ) && bridge_core_is_installed('theme') ) {
            add_action( 'admin_head', 'bridge_qode_meta_box_add' );
        } else if( bridge_core_is_installed('theme') ) {
            add_action( 'add_meta_boxes', 'bridge_qode_meta_box_add' );
        }
    }

    add_action('after_setup_theme', 'bridge_core_include_meta_boxes');
}


if ( ! function_exists( 'bridge_core_create_meta_box_handler' ) ) {
	function bridge_core_create_meta_box_handler( $box, $key, $screen ) {
		add_meta_box(
			'qodef-meta-box-'.$key,
			$box->title,
			'bridge_qode_render_meta_box',
			$box->scope,
			'advanced',
			'high',
			array( 'box' => $box)
		);
	}
}

if(!function_exists('bridge_core_is_ajax')) {
    /**
     * Function that checks if current request is ajax request
     * @return bool whether it's ajax request or not
     *
     * @version 0.1
     */
    function bridge_core_is_ajax() {
        //return wp_doing_ajax();
        return !empty( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) && strtolower( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ]) == 'xmlhttprequest';
        //return defined( 'DOING_AJAX' ) && DOING_AJAX;
    }
}

if(!function_exists('bridge_core_get_required_plugins_links')) {
    /**
     * Function that returns whether plugin should be activated or installed
     * @return html with plugins and their state
     *
     * @version 0.1
     */
    function bridge_core_get_required_plugins_links($demo){

        //if theme is installed
        if( bridge_core_is_installed('theme') ) {
            $plugins = array();
            $html = '';


            $demos = bridge_core_demos_list();
            $plugins = bridge_qode_plugins_list($demos[$demo]['required-plugins']);

            $tgmpa = $GLOBALS['tgmpa'];
            $tgmpa->config(array('menu' => 'install-required-plugins'));

            if (!empty($plugins)) {
                $required_demo_plugins = array();

                $html .= "<p class='qode-demo-plugins-intall-main-title'>" . esc_html__('Following plugins should be installed and activated before demo import:', 'bridge-core') . "</p>";
                foreach ($plugins as $key => $value) {

                    $tgmpa->register(array('slug' => $key, 'name' => $value));

                    $is_plugin_active = $tgmpa->is_plugin_active($key);
                    $is_plugin_installed = $tgmpa->is_plugin_installed($key);

                    if (!$is_plugin_active) {
                        $status = $is_plugin_installed ? 'activate' : 'install';
                        $link_text = $is_plugin_installed ? esc_html__('Activate', 'bridge-core') : esc_html__('Install', 'bridge-core');

                        $status = "<a class='qode-demo-plugin-install-link' href='" . $tgmpa->get_tgmpa_status_url($status) . "'>" . $link_text . "</a>";
                    } else {
                        $status = "<span class='qode-demo-plugin-intalled'>" . esc_html__('Activated', 'bridge-core') . "</span>";
                    }

                    $html .= "<p>" . $value . " - " . $status . "<span class='spinner'></span></p>";

                    array_push($required_demo_plugins, $key);
                }
                $html .= "<span style='visibility:hidden;' data-required-demo-plugins='" . json_encode($required_demo_plugins) . "' class='qode-required-demo-plugins-list'></span>";
            }

            return $html;
        }
    }

}
if(!function_exists('bridge_core_export_theme_options')) {
	/**
	 * Function that export options from db.
	 */
	function bridge_core_export_theme_options() {
		$options = get_option("qode_options_proya");
		$output = base64_encode(serialize($options));

		return $output;
	}

}

if(!function_exists('bridge_core_import_theme_options')) {
	/**
	 * Function that import theme options to db.
	 * It hooks to ajax wp_ajax_qode_import_theme_options action.
	 */
	function bridge_core_import_theme_options() {

		if(current_user_can('administrator')) {
			if (empty($_POST) || !isset($_POST)) {
				bridge_qode_ajax_status('error', esc_html__('Import field is empty', 'bridge-core'));
			} else {
				$data = $_POST;
				if (wp_verify_nonce($data['nonce'], 'qodef_import_theme_options_secret_value')) {
					$content = $data['content'];
					$unserialized_content = unserialize(base64_decode($content));
					update_option( 'qode_options_proya', $unserialized_content);
					bridge_core_ajax_status('success', esc_html__('Options are imported successfully', 'bridge-core'));
				} else {
					bridge_core_ajax_status('error', esc_html__('Non valid authorization', 'bridge-core'));
				}

			}
		} else {
			bridge_qode_ajax_status('error', esc_html__('You don\'t have privileges for this operation', 'bridge-core'));
		}
	}

	add_action('wp_ajax_qode_import_theme_options', 'bridge_core_import_theme_options');
}

if( ! function_exists( 'bridge_core_ajax_status' ) ) {

	/**
	 * Function that return status from ajax functions
	 */

	function bridge_core_ajax_status($status, $message, $data = NULL) {

		$response = array (
			'status' => $status,
			'message' => $message,
			'data' => $data
		);
		$output = json_encode($response);
		exit($output);
	}
	
}
if ( ! function_exists( 'bridge_core_add_google_analytic' ) ) {
	function bridge_core_add_google_analytic() {
		global $bridge_qode_options; ?>

		<!-- Google Analytics start -->
		<?php if (bridge_qode_options()->getOptionValue('google_analytics_code') != ""){?>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', '<?php echo esc_attr( $bridge_qode_options['google_analytics_code'] ); ?>']);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php } ?>
		<!-- Google Analytics end -->

		<?php

	}

	add_action( 'bridge_qode_action_after_wrapper_inner', 'bridge_core_add_google_analytic' );
}

if(!function_exists('bridge_core_maintenance_mode')) {
    /**
     * Function that redirects user to desired landing page if maintenance mode is turned on in options
     */
    function bridge_core_maintenance_mode() {
        global $bridge_qode_options;

        $protocol = is_ssl() ? "https://" : "http://";

        $host = get_site_url();
        $current_request = add_query_arg( NULL, NULL );

        if(isset($bridge_qode_options['qode_maintenance_mode']) && $bridge_qode_options['qode_maintenance_mode'] == 'yes' && isset($bridge_qode_options['qode_maintenance_page']) && $bridge_qode_options['qode_maintenance_page'] != ""
            && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))
            && !is_admin()
            && !is_user_logged_in()
            && $host.$current_request != get_permalink($bridge_qode_options['qode_maintenance_page'])
        ) {
            //check if request is CF7 so message can be sent
            if( ! strpos($current_request, 'wp-json/contact-form-7') ) {
                wp_redirect(get_permalink($bridge_qode_options['qode_maintenance_page']));
                exit;
            }
        }
    }

    add_action('init', 'bridge_core_maintenance_mode', 1);
}