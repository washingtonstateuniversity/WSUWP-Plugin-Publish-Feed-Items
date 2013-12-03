<?php
/**
 * Class WNPA_Access_Key
 *
 * Provides functionality for creating and verifying the access keys
 * used for basic authentication with the WNPA system.
 */
class WNPA_Access_Key {

	public function __construct() {
		add_action( 'show_user_profile', array( $this, 'user_profile_show_key' ), 10 );
	}

	public function user_profile_show_key() {
		if ( ! IS_PROFILE_PAGE ) {
			return;
		}
		?>
		<h3>WNPA Access Information:</h3>
		<table class="form-table">
			<tr>
				<th><label for="access-key">Access Key</label></th>
				<td>
					<input readonly type=""text" class="regular-text" size="24" value="abcdefghijklmnopqrstuvwxyz1234567890" \><span class="button button-large">Generate</span>
					<br />
					<span class="description">This access key can be used to access both public and private items in the feeds offered through the WNPA site. Use the generate button to create a new key.</span>
				</td>
			</tr>
			<tr>
				<th><label for="access-url">Feed URL</label></th>
				<td>
					<a href="">http://wnpa.wsu.edu/feed-items/feed/?access_key=abcdefghijklmnopqrstuvwxyz1234567890</a>
				</td>
			</tr>
		</table><?php
	}
}
global $wnpa_access_key;
$wnpa_access_key = new WNPA_Access_Key();