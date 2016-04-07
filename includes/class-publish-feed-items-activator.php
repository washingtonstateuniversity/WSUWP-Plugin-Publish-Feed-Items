<?php
/**
 * Fired during plugin activation.
 *
 * @since      1.0.0
 */
class Publish_Feed_Items_Activator {
	/**
	 * Setup the initial cron job to start checking external sources for new
	 * feed items.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		wp_schedule_event( time(), 'hourly', 'publish_feed_items_consume_sources' );
	}
}
