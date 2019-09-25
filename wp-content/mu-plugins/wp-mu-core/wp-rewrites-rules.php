<?php
/**
 * Doc : https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package Rewrites rules
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPRewritesRules
 *
 * @category Class
 */
class WPMUCoreWPRewritesRules {

	/**
	 * __construct
	 */
	public function __construct() {
		add_action(
			'init',
			array(
				$this,
				'init',
			),
			10,
			0
		);
	}

	/**
	 * Init
	 */
	public function init() {
		// add_rewrite_rule( '^partners/([0-9]+)/?', 'index.php?page_id=$matches[1]', 'top' );
	}
}
