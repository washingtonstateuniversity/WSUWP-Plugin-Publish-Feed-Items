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