<?php
/**
 * Doc : https://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * @package Taxonomies
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'H4ck3r ?' );
}

/**
 * WPMUCoreWPTaxonomies
 *
 * @category Class
 */
class WPMUCoreWPTaxonomies {

	/**
	 * __construct
	 */
	public function __construct() {
		// add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Init
	 */
	public function init() {

		// $type_settings = array(
		// 		'labels' => array(
		// 				'name' => 'Types',
		// 				'singular_name' => 'Type',
		// 				'menu_name' => 'Type',
		// 				'all_items' => 'Tous les types',
		// 				'parent_item' => 'Type parent',
		// 				'parent_item_colon' => 'Type parent :',
		// 				'new_item_name' => 'Nouveau type',
		// 				'add_new_item' => 'Ajouter un type',
		// 				'edit_item' => 'Modifier un type',
		// 				'update_item' => 'Mettre à jour un type',
		// 				'view_item' => 'Voir le type',
		// 				'separate_items_with_commas' => 'Separate items with commas',
		// 				'add_or_remove_items' => 'Add or remove items',
		// 				'choose_from_most_used' => 'Choose from the most used',
		// 				'popular_items' => 'Popular Items',
		// 				'search_items' => 'Search Items',
		// 				'not_found' => 'Not Found',
		// 				'no_terms' => 'No items',
		// 				'items_list' => 'Items list',
		// 				'items_list_navigation' => 'Items list navigation',
		// 		),
		// 		'hierarchical' => false,
		// 		'public' => true,
		// );

		// register_taxonomy( 'type', array( 'page' ), $type_settings );

		// register_taxonomy_for_object_type( 'post_tag', 'page' );
	}
}
