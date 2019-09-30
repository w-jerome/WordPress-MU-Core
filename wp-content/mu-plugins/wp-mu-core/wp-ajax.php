<?php
/**
 * Ajax
 *
 * @package Ajax
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPAjax
 *
 * @category Class
 */
class WPMUCoreWPAjax {

	/**
	 * __construct
	 */
	public function __construct() {
		// add_action( 'wp_ajax_my_action', array( $this, 'my_action' ) );
	}

	/**
	 * My action
	 */
	public function my_action() {
		$my_data = array(
			'data'   => true,
			'status' => 'success',
		);

		echo wp_json_encode( $my_data );

		wp_die();
	}
}
