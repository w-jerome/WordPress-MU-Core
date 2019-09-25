<?php
/**
 * Doc : https://codex.wordpress.org/TinyMCE_Custom_Styles
 *
 * @package Admin TinyMCE
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPAdminTinymce
 *
 * @category Class
 */
class WPMUCoreWPAdminTinymce {

	/**
	 * __construct
	 */
	public function __construct() {
		add_filter( 'mce_buttons_2', array( $this, 'add_toolbar_secondary_line_button' ) );
		add_filter( 'tiny_mce_before_init', array( $this, 'set_toolbar_config' ) );
	}

	/**
	 * Add toolbar secondary line button
	 *
	 * @param array $buttons Buttons list.
	 */
	public function add_toolbar_secondary_line_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}

	/**
	 * Set toolbar config
	 *
	 * @param array $init_array Toolbar array.
	 */
	public function set_toolbar_config( $init_array ) {
		// Add style formats.
		$style_formats = array(
			array(
				'title'    => 'Blockquote beautifier',
				'selector' => 'blockquote',
				'classes'  => 'blockquote-beautifier',
			),
		);

		// Custom color picker.
		$textcolor_map = array(
			'028eff',
			'blue',
		);

		$init_array['style_formats'] = wp_json_encode( $style_formats );
		$init_array['textcolor_map'] = wp_json_encode($textcolor_map);

		return $init_array;
	}
}
