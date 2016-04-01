<?php
/**
 * Plugin Name: Publish Feed Items
 * Plugin URI: https://github.com/washingtonstateuniversity/wnpa-syndication
 * Description: Manage and republish content from multiple external RSS feeds.
 * Author: washingtonstateuniversity, jeremyfelt
 * Version 0.3.2
 * Author URI: https://web.wsu.edu/
 * Text Domain: wsuwp-publish-feed-items
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// The core plugin class.
require dirname( __FILE__ ) . '/includes/class-wsuwp-publish-feed-items.php';

add_action( 'after_setup_theme', 'WSUWP_Publish_Feed_Items' );
/**
 * Start things up.
 *
 * @return \WSUWP_Publish_Feed_Items
 */
function WSUWP_Publish_Feed_Items() {
	return WSUWP_Publish_Feed_Items::get_instance();
}
