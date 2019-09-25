<?php
/**
 * Doc : https://codex.wordpress.org/Function_Reference/register_post_type
 *
 * @package Post type
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * SMCoreWPPostsTypes
 *
 * @category Class
 */
class SMCoreWPPostsTypes {

	/**
	 * __construct
	 */
	public function __construct() {
		// add_action( 'after_setup_theme', array( $this, 'register' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_support' ) );
	}

	/**
	 * Register
	 */
	public function register() {

		$partner_settings = array(
			'label'              => 'Partners',
			'labels'             => array(
				'name'               => 'Partners',
				'singular_name'      => 'Partner',
				'all_items'          => 'All partners',
				'add_new_item'       => 'Add partner',
				'edit_item'          => 'Edit partner',
				'new_item'           => 'New partner',
				'view_item'          => 'View partner',
				'search_items'       => 'Search partners',
				'not_found'          => 'No found',
				'not_found_in_trash' => 'Not found in Trash',
			),
			'has_archive'        => false,
			'public'             => false,
			'publicly_queryable' => false,
			'supports'           => array(
				'title',
				'editor',
			),
		);

		register_post_type( 'partner', $partner_settings );
	}

	/**
	 * Theme support
	 */
	public function theme_support() {
		add_theme_support( 'post-thumbnails' );
	}
}
