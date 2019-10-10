<?php
/**
 * Doc : https://codex.wordpress.org/Function_Reference/add_role
 *
 * @package Add role
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPRoles
 *
 * @category Class
 */
class WPMUCoreWPRoles {

	/**
	 * __construct
	 */
	public function __construct() {
		// add_action( 'after_setup_theme', array( $this, 'init' ) );
	}

	/**
	 * Init
	 */
	public function init() {
		add_role(
			'custom_role',
			'Custom Subscriber',
			array()
		);
	}
}
