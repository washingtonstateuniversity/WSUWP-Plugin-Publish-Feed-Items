<?php
/**
 * Fired during plugin deactivation.
 *
 * @since      1.0.0
 */
class Publish_Feed_Items_Deactivator {
	/**
	 * Remove the cron hook used to check external sources for new feed items.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		wp_clear_scheduled_hook( 'publish_feed_items_consume_sources' );
	}
}
