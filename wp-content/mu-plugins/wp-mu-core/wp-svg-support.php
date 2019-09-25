<?php
/**
 * Add the support for svg uploads
 *
 * @package Add the support for svg uploads
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPSvgSupports
 *
 * @category Class
 */
class WPMUCoreWPSvgSupports {

	/**
	 * __construct
	 */
	public function __construct() {
		add_filter( 'upload_mimes', array( $this, 'init' ) );
	}

	/**
	 * Init
	 *
	 * @param array $mimes Mimes list.
	 */
	public function init( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
}
