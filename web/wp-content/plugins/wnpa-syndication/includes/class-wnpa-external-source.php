<?php
/**
 * Class WNPA_External_Source
 *
 * Track external feeds to parse on a regular basis for news items to be added as
 * feed items to be consumed by others.
 */
class WNPA_External_Source {

	/**
	 * @var string slug to be used for the external source content type.
	 */
	var $source_content_type = 'wnpa_external_source';

	/**
	 * Add hooks as the class is initialized.
	 */
	public function __construct() {
		add_action( 'init',           array( $this, 'register_post_type' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes'     ) );
	}

	/**
	 * Register a post type for external source feeds. This post type is
	 * not accessible on the front end at this time.
	 */
	public function register_post_type() {
		$labels = array(
			'name'               => 'External Sources',
			'singular_name'      => 'External Source',
			'add_new'            => 'Add New',
			'add_new_item'       => 'Add New External Source',
			'edit_item'          => 'Edit External Source',
			'new_item'           => 'New External Source',
			'all_items'          => 'All External Sources',
			'view_item'          => 'View External Source',
			'search_items'       => 'Search External Sources',
			'not_found'          => 'No external sources found',
			'not_found_in_trash' => 'No external sources found in Trash',
			'menu_name'          => 'External Sources'
		);

		$args = array(
			'labels'             => $labels,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'supports'           => array( 'title', 'author', ),
		);

		register_post_type( $this->source_content_type, $args );
	}

	/**
	 * Add meta boxes used to track data about external sources.
	 */
	public function add_meta_boxes() {
		add_meta_box( 'wnpa_external_source_url', 'External Source URL', array( $this, 'display_source_url_meta_box' ), $this->source_content_type, 'normal' );
	}

	public function display_source_url_meta_box() {
		?><input type="text" value="" name="wnpa_source_url" class="widefat" />
		<span class="description">Enter the URL of the RSS feed for the external source to be added to the syndicate item feed.</span><?php
	}
}
global $wnpa_external_source;
$wnpa_external_source = new WNPA_External_Source();
