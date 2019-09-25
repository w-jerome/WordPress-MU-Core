<?php
/**
 * Doc : https://www.advancedcustomfields.com/resources/local-json/
 *
 * @package ACF JSON config
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreACFJsonConfig
 *
 * @category Class
 */
class WPMUCoreACFJsonConfig {

	/**
	 * Path config
	 *
	 * @var string $path_config
	 */
	private $path_config = '';

	/**
	 * __construct
	 */
	public function __construct() {
		$this->path_config = __DIR__ . DIRECTORY_SEPARATOR . 'acf-json-config' . DIRECTORY_SEPARATOR;

		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	/**
	 * Init
	 */
	public function init() {
		if ( ! class_exists( 'ACF' ) ) {
			return false;
		}

		add_filter( 'acf/settings/save_json', array( $this, 'save' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'load' ) );
	}

	/**
	 * Save
	 *
	 * @param string $path Absolute path.
	 */
	public function save( $path ) {
		$path = $this->path_config;
		return $path;
	}

	/**
	 * Load
	 *
	 * @param array $paths Paths list.
	 */
	public function load( $paths ) {
		unset( $paths[0] );
		$paths[] = $this->path_config;
		return $paths;
	}
}
