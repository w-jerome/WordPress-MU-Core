<?php
/**
 * Set Revisions
 *
 * @package Admin Revisions
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPAdminRevisions
 *
 * @category Class
 */
class WPMUCoreWPAdminRevisions {

	/**
	 * __construct
	 */
	public function __construct() {
		define( 'WP_POST_REVISIONS', false );
	}
}
