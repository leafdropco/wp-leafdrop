<?php

class umbu_CustomMediaUI {


	/**
	 * umbu_getLabel
	 *
	 * change the custom media library button label
	 * @since 1.0.0
	 * @param
	 */

  public static function umbu_getLabel() {
    return 'Upload By URL';
  }

	/**
	 * umbu_getUrl
	 *
	 * change here the url of your custom upload button
	 * @since 1.0.0
	 * @param
	 */

  public static function umbu_getUrl() {
    return '#openUMBU';
  }



	/**
	 * __construct
	 *
	 * constructs the Upload Media By URL library
	 * @since 1.0.0
	 * @param
	 */

  function __construct() {
    add_action('load-upload.php', array($this, 'umbu_indexButton'));
    add_action('post-plupload-upload-ui', array($this, 'umbu_mediaButton'));
  }


	/**
	 * umbu_indexButton
	 *
	 * sets the mediaButton click for Upload Media By URL as index
	 * @since 1.0.0
	 * @param
	 */


  function umbu_indexButton() {
    if ( ! current_user_can( 'upload_files' ) ) return;
    add_filter( 'esc_html', array(__CLASS__, 'umbu_h2Button'), 999, 2 );
  }


	/**
	 * umbu_h2Button
	 *
	 * sets the text for Upload Media By URL
	 * @since 1.0.0
	 * @param
	 */

  static function umbu_h2Button( $safe_text, $text ) {
    if ( ! current_user_can( 'upload_files' ) ) return $safe_text;
    if ( $text === __('Media Library') && did_action( 'all_admin_notices' ) ) {
      remove_filter( 'esc_html', array(__CLASS__, 'umbu_h2Button'), 999, 2 );
      $format = ' <a href="%s" class="add-new-h2">%s</a>';
      $mybutton = sprintf($format, esc_url('#openUMBU'), esc_html(self::umbu_getLabel()) );
      $safe_text .= $mybutton;
    }
    return $safe_text;
  }




	/**
	 * umbu_mediaButton
	 *
	 * adds a mediaButton for the BunnyCDN Media
	 * @since 1.0.0
	 * @param
	 */

 static function umbu_mediaButton() {
    if(preg_match('/media|post|upload/i', basename(get_permalink())))  
    if ( current_user_can( 'upload_files' ) ) {
          echo '<div><p align="center">';
          echo '<input id="custom-upload-button" type="button" value="' . umbu_CustomMediaUI::umbu_getLabel() . '" class="button" />';
          echo '</p></div>';
          $this->umbu_mediaButtonScript();
    }
  }

	/**
	 * umbu_mediaButtonScript
	 *
	 * enables the mediaButton click for Media
	 * @since 1.0.0
	 * @param
	 */

  static function umbu_mediaButtonScript() {
    if ( ! current_user_can( 'upload_files' ) ) return;
  ?>
    <script>
    jQuery(document).on('click', '#custom-upload-button', function(e) {
      e.preventDefault();
      window.location = '<?php echo UMBU_SITE_URL.'/wp-admin/upload.php#openUMBU'; ?>';
    });
    </script>

<?php 
}

}


$ui = new umbu_CustomMediaUI;
