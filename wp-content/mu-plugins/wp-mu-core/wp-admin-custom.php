<?php
/**
 * Admin
 *
 * @package Admin
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPAdminCustom
 *
 * @category Class
 */
class WPMUCoreWPAdminCustom {

	/**
	 * __construct
	 */
	public function __construct() {
		add_filter( 'admin_footer_text', array( $this, 'back_office_footer_text' ) );
		add_action( 'login_head', array( $this, 'login_page_styles' ) );
	}

	/**
	 * Set footer text
	 */
	public function back_office_footer_text() {
		echo 'Made with ❤️';
	}

	/**
	 * Login page styles
	 */
	public function login_page_styles() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/styles-login-page.css">';
	}
}
