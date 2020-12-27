<?php
/*
Plugin Name: Upload Media By URL
Plugin URI: http://wordpress.org/extend/plugins/upload-media-by-url/
Text Domain: UploadMediaByUrl
Description: Upload files to your Media Library via URL. 
Author: NoteToServices
Author URI: https://notetoservices.com
License: GPLv2 or later
Version: 1.0.2
*/

if ( ! defined( 'ABSPATH' ) ) { die(); }


// Set some global paths
// Set some global paths
define('UMBU_SITE_URL', get_home_url());
define('UMBU_PLUGIN_DIR', dirname(__FILE__));
define('UMBU_PLUGIN_URLDIR', plugin_dir_url(__DIR__));
define('UMBU_PLUGIN_NAME', plugin_basename(UMBU_PLUGIN_DIR));

add_action( 'admin_footer_text', 'umbu_media' );
add_action('wp_enqueue_scripts', 'umbu_callback_css');
add_action( 'admin_init','umbu_callback_css');
function umbu_callback_css() {
    wp_register_style( 'popup', UMBU_PLUGIN_URLDIR.UMBU_PLUGIN_NAME.'/assets/css/popup.css' );
    wp_enqueue_style( 'popup' );
}

// Load all files
spl_autoload_register('umbu_ClassAPILoad');
function umbu_ClassAPILoad($class) 
{
	require_once(UMBU_PLUGIN_DIR.'/inc/umbumedia.php');
}

	/**
	 * umbu_download
	 *
	 * download file from url and add it to the media gallery
	 * @since 1.0.0
	 * @param
	 */

function umbu_download($imgurl) { 

$url = $imgurl;
$timeout_seconds = 5;

// Download file to temp dir
$temp_file = download_url( $url, $timeout_seconds );

if ( !is_wp_error( $temp_file ) ) {

        $wp_file_type = wp_check_filetype($temp_file);

        $filemime = $wp_file_type['type'];

	// Array based on $_FILE as seen in PHP file uploads
	$file = array(
		'name'     => basename($url), // ex: wp-header-logo.png
		'type'     => $filemime,
		'tmp_name' => $temp_file,
		'error'    => 0,
		'size'     => filesize($temp_file),
	);

	$overrides = array(
		// Tells WordPress to not look for the POST form
		// fields that would normally be present as
		// we downloaded the file from a remote server, so there
		// will be no form fields
		// Default is true
		'test_form' => false,

		// Setting this to false lets WordPress allow empty files, not recommended
		// Default is true
		'test_size' => true,
	);

	// Move the temporary file into the uploads directory
	$results = media_handle_sideload( $file, $overrides );
  }
}



	/**
	 * umbu_media
	 *
	 * shows the dialog for the upload media by url button
         * also does all the transfer via wp code upload
	 * @since 1.0.0
	 * @param
	 */

function umbu_media() {
	global $pagenow;
    if ( ! current_user_can( 'upload_files' ) ) return;
    if ( $pagenow == 'upload.php' ) 
  
  //check for multiurl
 if(isset($_REQUEST["multiurl"])) { $multiurl = explode(PHP_EOL, $_REQUEST["multiurl"]); }
 
    if(!empty($multiurl)) { 
          // navigate through any urls
          foreach($multiurl as $mu) {                    
              //download and insert as media attachment
              umbu_download(esc_url_raw($mu)); 
          }
    }
  

    echo __( '<div id="openUMBU" class="modalDialog"><div><a href="" title="Close" class="close">X</a><h2>Upload Media By URL</h2><p><form action="" method="post"><textarea style="width:100%;height:300px;" name="multiurl" required/></textarea><br><small>Separate each URL by a new line</small><p><input type="submit" class="button"> <a href="" class="button">Cancel</a></p></form></p></div></div>');
}










?>
