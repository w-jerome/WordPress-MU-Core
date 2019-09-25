<?php
/**
 * Doc : https://www.advancedcustomfields.com/resources/options-page/
 *
 * @package ACF page options
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreACFPageOptions
 *
 * @category Class
 */
class WPMUCoreACFPageOptions {

	/**
	 * __construct
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Init
	 */
	public function init() {
		if ( ! class_exists( 'ACF' ) || ! function_exists( 'acf_add_options_page' ) ) {
			return false;
		}

		// acf_add_options_page(
		// 	array(
		// 		'page_title' => 'Settings',
		// 		'menu_title' => 'Settings',
		// 		'menu_slug'  => 'site-settings',
		// 		'capability' => 'edit_posts',
		// 		'position'   => 26,
		// 		'redirect'   => false,
		// 	)
		// );
	}
}
