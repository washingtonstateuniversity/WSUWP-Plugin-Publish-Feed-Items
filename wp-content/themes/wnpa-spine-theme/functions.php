<?php

add_action( 'admin_menu', 'wnpa_alter_menu' );
/**
 * Remove unused Posts and Comments from the admin menu.
 */
function wnpa_alter_menu() {
	global $menu;
	$menu[5] = $menu[26];
	$menu[6] = $menu[27];
	unset( $menu[27] );
	unset( $menu[26] );
	unset( $menu[25] );
}

add_filter( 'excerpt_more', 'wnpa_excerpt_more' );
function wnpa_excerpt_more() {
	global $post;

	$link_url = get_post_meta( $post->ID, '_feed_item_link_url', true );

	return '<a class="moretag" href="' . esc_url( $link_url ) . '">More</a>';
}
