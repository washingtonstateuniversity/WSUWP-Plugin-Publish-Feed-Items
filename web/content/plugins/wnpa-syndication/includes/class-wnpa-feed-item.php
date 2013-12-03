<?php
/**
 * Class WNPA_Feed_Item
 *
 * Manage the feed item content type used by the WNPA Syndication plugin.
 */
class WNPA_Feed_Item {

	public function __construct() {
		add_action( 'init',      array( $this, 'register_post_type'           ), 10 );
		add_action( 'init',      array( $this, 'register_taxonomy_visibility' ), 10 );
		add_action( 'rss2_item', array( $this, 'rss_item_visibility'          ), 10 );
	}

	/**
	 * Register the feed item post type used to track incoming and outgoing
	 * feed items across multiple publishers.
	 */
	public function register_post_type() {
		$labels = array(
			'name'               => 'Feed Items',
			'singular_name'      => 'Feed Item',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New Feed Item',
			'edit_item'          => 'Edit Feed Item',
			'new_item'           => 'New Feed Item',
			'all_items'          => 'All Feed Items',
			'view_item'          => 'View Feed Item',
			'search_items'       => 'Search Feed Items',
			'not_found'          => 'No feed items found',
			'not_found_in_trash' => 'No feed items found in Trash',
			'menu_name'          => 'Feed Items'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'feed-item' ),
			'capability_type'    => 'post',
			'has_archive'        => 'feed-items',
			'hierarchical'       => false,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
		);

		register_post_type( 'wnpa_feed_item', $args );
	}

	/**
	 * Register the taxonomy controlling the visibility of a feed item.
	 */
	public function register_taxonomy_visibility() {
		$labels = array(
			'name'              => 'Visibility',
			'search_items'      => 'Search Visibility',
			'all_items'         => 'All Visibilities',
			'edit_item'         => 'Edit Visibility',
			'update_item'       => 'Update Visibility',
			'add_new_item'      => 'Add New Visibility',
			'new_item_name'     => 'New Visibility Name',
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => false,
			'show_admin_ui'     => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'visibility' ),
		);
		register_taxonomy( 'wnpa_item_visibility', array( 'wnpa_feed_item' ), $args );
	}

	/**
	 * Output a field in the RSS feed indicating the visibility of each
	 * individual item. Uses the accessRights term available through the
	 * Dublin Core namespace.
	 */
	public function rss_item_visibility() {
		?><dc:accessRights>public</dc:accessRights><?php
	}
}
global $wnpa_feed_item;
$wnpa_feed_item = new WNPA_Feed_Item();