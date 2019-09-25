<?php
/**
 * Theme clean
 *
 * @package Theme clean
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPThemeClean
 *
 * @category Class
 */
class WPMUCoreWPThemeClean {

	/**
	 * __construct
	 */
	public function __construct() {
		// Clean head.
		$this->clean_head();

		// Remove WP version from RSS.
		add_filter( 'the_generator', array( $this, 'remove_version' ) );

		// Remove WP version from js and css.
		add_filter( 'script_loader_src', array( $this, 'remove_version_assets' ), 15, 1 );
		add_filter( 'style_loader_src', array( $this, 'remove_version_assets' ), 15, 1 );

		// Remove login error message.
		add_filter( 'login_errors', array( $this, 'login_errors_formater' ) );

		// Remove Emojicons.
		$this->remove_emojicons();

		// Remove styles (jQuery, Embed, Gutenberg Block, etc…).
		add_action( 'wp_enqueue_scripts', array( $this, 'remove_css' ), 100 );
		// Remove scripts (jQuery, Embed, Gutenberg Block, etc…).
		add_action( 'wp_enqueue_scripts', array( $this, 'remove_js' ), 1, 1 );
	}

	/**
	 * Clean head
	 */
	public function clean_head() {
		// EditURI link.
		remove_action( 'wp_head', 'rsd_link' );
		// Category feed links.
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		// Post and comment feed links.
		remove_action( 'wp_head', 'feed_links', 2 );
		// Windows Live Writer.
		remove_action( 'wp_head', 'wlwmanifest_link' );
		// Index link.
		remove_action( 'wp_head', 'index_rel_link' );
		// Previous link.
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		// Start link.
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		// Canonical.
		remove_action( 'wp_head', 'rel_canonical', 10, 0 );
		// Shortlink.
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
		// Links for adjacent posts.
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		// Outputs the REST API link tag.
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		// Link header for the REST API.
		remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
		// oEmbed discovery links.
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
		// WP version.
		remove_action( 'wp_head', 'wp_generator' );
	}

	/**
	 * Remove version
	 */
	public function remove_version() {
		return '';
	}

	/**
	 * Remove version assets
	 *
	 * @param string $src Asset url.
	 */
	public function remove_version_assets( $src ) {
		if ( is_int( strpos( $src, 'ver=' ) ) ) {
			$src = remove_query_arg( 'ver', $src );
		}
		return $src;
	}

	/**
	 * Login errors formater
	 */
	public function login_errors_formater() {
		return 'Something is wrong!';
	}

	/**
	 * Remove emojicons
	 */
	public function remove_emojicons() {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}

	/**
	 * Remove css
	 */
	public function remove_css() {
		if ( is_admin() ) {
			return;
		}
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'storefront-gutenberg-blocks' );
	}

	/**
	 * Remove js
	 */
	public function remove_js() {
		if ( is_admin() ) {
			return;
		}
		// jQuery.
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );
		// Embed.
		wp_deregister_script( 'wp-embed' );
		// Gutenberg Block.
		wp_deregister_style( 'wp-block-library' );
	}
}
