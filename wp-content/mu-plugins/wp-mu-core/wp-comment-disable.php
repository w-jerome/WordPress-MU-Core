<?php
/**
 * Disable WordPress comments
 *
 * @package Comment disable
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPCommentDisable
 *
 * @category Class
 */
class WPMUCoreWPCommentDisable {

	/**
	 * __construct
	 */
	public function __construct() {
		// Remove widget recent comments.
		add_action( 'widgets_init', array( $this, 'remove_recent_css' ) );
		// Remove the X-Pingback HTTP header.
		add_filter( 'wp_headers', array( $this, 'remove_xpingback' ) );
		// Issue a 403 for all comment feed requests.
		add_action( 'template_redirect', array( $this, 'template_feed_request' ), 9 );
		// Remove comment links from the admin bar.
		add_action( 'template_redirect', array( $this, 'remove_links_from_adminbar' ) );
		add_action( 'admin_init', array( $this, 'remove_links_from_adminbar' ) );
		// Disable comments post types support.
		add_action( 'admin_init', array( $this, 'disable_comments_post_types_support' ) );
		// Remove media comment.
		add_filter( 'comments_open', array( $this, 'remove_media_comment' ), 20, 2 );
		add_filter( 'pings_open', array( $this, 'remove_media_comment' ), 20, 2 );
		// Remove comment page in back-office.
		add_action( 'admin_menu', array( $this, 'remove_back_office' ) );
		// Comments admin menu redirect.
		add_action( 'admin_init', array( $this, 'comments_admin_menu_redirect' ) );
		// Hide existing comments.
		add_filter( 'comments_array', array( $this, 'disable_comments_hide_existing_comments' ), 10, 2 );
		// Disable comments dashboard.
		add_action( 'admin_init', array( $this, 'disable_comments_dashboard' ) );
	}

	/**
	 * Remove recent css
	 */
	public function remove_recent_css() {
		unregister_widget( 'WP_Widget_Recent_Comments' );
		add_filter( 'show_recent_comments_widget_style', '__return_false' );
	}

	/**
	 * Template feed request
	 */
	public function template_feed_request() {
		if ( is_comment_feed() ) {
			wp_die(
				esc_html(
					__( 'Comments are closed.' )
				),
				'',
				array( 'response' => 403 )
			);
		}
	}

	/**
	 * Remove XPingback
	 *
	 * @param array $headers Header array.
	 */
	public function remove_xpingback( $headers ) {
		unset( $headers['X-Pingback'] );
		return $headers;
	}

	/**
	 * Remove links from adminbar
	 */
	public function remove_links_from_adminbar() {
		if ( is_admin_bar_showing() ) {
			remove_action(
				'admin_bar_menu',
				'wp_admin_bar_comments_menu',
				60
			);
		}
	}

	/**
	 * Disable comments post types support
	 */
	public function disable_comments_post_types_support() {
		$post_types = get_post_types();

		foreach ( $post_types as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}

	/**
	 * Remove media comment
	 *
	 * @param boolean $open Is open.
	 * @param integer $post_id Post ID.
	 */
	public function remove_media_comment( $open, $post_id ) {
		return false;
	}

	/**
	 * Remove back office
	 */
	public function remove_back_office() {
		remove_menu_page( 'edit-comments.php' );
	}

	/**
	 * Comments admin menu redirect
	 */
	public function comments_admin_menu_redirect() {
		global $pagenow;

		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}
	}

	/**
	 * Disable comments hide existing comments
	 *
	 * @param array $comments Comments list.
	 */
	public function disable_comments_hide_existing_comments( $comments ) {
		return array();
	}

	/**
	 * Disable comments dashboard
	 */
	public function disable_comments_dashboard() {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	}
}
