<?php
/**
 * Media
 *
 * @package Media
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPMedia
 *
 * @category Class
 */
class WPMUCoreWPMedia {

	/**
	 * __construct
	 */
	public function __construct() {
		add_filter( 'sanitize_file_name', array( $this, 'remove_accents' ) );
	}

	/**
	 * Remove accents
	 *
	 * @param string $filename File name.
	 */
	public function remove_accents( $filename ) {
		$filename          = mb_convert_encoding( $filename, 'UTF-8' );
		$char_not_clean    = array( '/À/', '/Á/', '/Â/', '/Ã/', '/Ä/', '/Å/', '/Ç/', '/È/', '/É/', '/Ê/', '/Ë/', '/Ì/', '/Í/', '/Î/', '/Ï/', '/Ò/', '/Ó/', '/Ô/', '/Õ/', '/Ö/', '/Ù/', '/Ú/', '/Û/', '/Ü/', '/Ý/', '/à/', '/á/', '/â/', '/ã/', '/ä/', '/å/', '/ç/', '/è/', '/é/', '/ê/', '/ë/', '/ì/', '/í/', '/î/', '/ï/', '/ð/', '/ò/', '/ó/', '/ô/', '/õ/', '/ö/', '/ù/', '/ú/', '/û/', '/ü/', '/ý/', '/ÿ/', '/©/' );
		$clean             = array( 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'copy' );
		$friendly_filename = preg_replace( $char_not_clean, $clean, $filename );
		$friendly_filename = utf8_decode( $friendly_filename );
		$friendly_filename = preg_replace( '/\?/', '', $friendly_filename );
		$friendly_filename = strtolower( $friendly_filename );
		$friendly_filename = str_replace( ' ', '-', $friendly_filename );
		$friendly_filename = str_replace( '--', '-', $friendly_filename );
		return $friendly_filename;
	}
}
