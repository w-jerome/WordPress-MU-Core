<?php
/**
 * Doc : https://codex.wordpress.org/Function_Reference/register_nav_menus
 *
 * @package Menus
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPMenus
 *
 * @category Class
 */
class WPMUCoreWPMenus {

	/**
	 * __construct
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	/**
	 * Init
	 */
	public function init() {
		register_nav_menus(
			array(
				'menu_header' => 'Menu header',
				'menu_footer' => 'Menu footer',
			)
		);
	}
}
