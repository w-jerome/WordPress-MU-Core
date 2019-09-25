<?php
/**
 * Plugin Name: WP MU Core
 * Description: A WordPress boilerplate to dissociate the site's own functionalities from the theme
 * Author: Jérôme Wohlschlegel <jerome.wohlschlegel@gmail.com>
 * Version: 1.0.0
 * Author URI: https://www.w-jerome.fr/
 * License: MIT
 *
 * @package WordPress MU Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

define( 'WPMUCORE_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'wp-mu-core' );

// @acf
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'acf-json-config.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'acf-page-options.php';

// @wordpress
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-admin-custom.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-admin-revisions.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-admin-tinymce.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-comment-disable.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-media.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-menus.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-post-types.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-rewrites-rules.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-roles.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-svg-support.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-taxonomies.php';
require WPMUCORE_DIR . DIRECTORY_SEPARATOR . 'wp-theme-clean.php';

/**
 * WPMUCore
 *
 * @category Class
 */
class WPMUCore {

	/**
	 * Singleton instance
	 *
	 * @var $instance
	 */
	private static $instance = null;

	/**
	 * __construct
	 */
	private function __construct() {
		// @acf
		new WPMUCoreACFJsonConfig();
		new WPMUCoreACFPageOptions();

		// @wordpress
		new WPMUCoreWPAdminCustom();
		new WPMUCoreWPAdminRevisions();
		new WPMUCoreWPAdminTinymce();
		new WPMUCoreWPCommentDisable();
		new WPMUCoreWPMedia();
		new WPMUCoreWPMenus();
		new WPMUCoreWPPostsTypes();
		new WPMUCoreWPRewritesRules();
		new WPMUCoreWPRoles();
		new WPMUCoreWPSvgSupports();
		new WPMUCoreWPTaxonomies();
		new WPMUCoreWPThemeClean();

		return $this;
	}

	/**
	 * WPMUCore::get_instance
	 *
	 * @return $instance
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new WPMUCore();
		}

		return self::$instance;
	}
}

WPMUCore::get_instance();
