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
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10 );
		add_action( 'wp_ajax_wnpa_generate_access_key', array( $this, 'generate_access_key' ), 10 );
	}

	public function admin_enqueue_scripts() {
		if ( 'profile' !== get_current_screen()->base ) {
			return;
		}

		wp_enqueue_script( 'wnpa-admin', plugins_url( '/wnpa-syndication/js/wnpa-admin.js' ), array( 'jquery' ), false, true );
		wp_localize_script( 'wnpa-admin', 'wnpa_admin', array( 'nonce' => wp_create_nonce( 'generate-access-key' ) ) );
	}

	/**
	 * Generate an MD5 hash to be used as a unique access key for the
	 * requesting user.
	 */
	public function generate_access_key() {
		check_ajax_referer( 'generate-access-key' );

		echo md5( 'wnpa' . time() . get_current_user_id() );
		exit;
	}

	public function user_profile_show_key() {
		if ( ! IS_PROFILE_PAGE ) {
			return;
		}

		$access_key = get_user_meta( get_current_user_id(), '_wnpa_access_key', true );
		$feed_url = 'http://wnpa.wsu.edu/feed-items/feed/';

		if ( empty( $access_key ) ) {
			$access_key = '';
		} else {
			$access_key = sanitize_key( $access_key );
			$feed_url .= '?acess_key=' . esc_html( $access_key );
		}

		?>
		<h3>WNPA Access Information:</h3>
		<table class="form-table">
			<tr>
				<th><label for="access-key">Access Key</label></th>
				<td>
					<input readonly type=""text" id="wnpa-access-key" class="regular-text" size="24" value="<?php echo esc_attr( $access_key ); ?>" \><span id="wnpa-generate-key" class="button button-large">Generate</span>
					<br />
					<span class="description">This key can be used to access both public and private items in the RSS feeds offered through the WNPA site.<br />
						Use the generate button to create a new key and click <em>Update Profile</em> below to begin using it.</span>
				</td>
			</tr>
			<tr>
				<th><label for="access-url">Feed URL</label></th>
				<td>
					<a href="<?php echo esc_url( $feed_url ); ?>"><?php echo esc_url( $feed_url ); ?></a>
				</td>
			</tr>
		</table><?php
	}
}
global $wnpa_access_key;
$wnpa_access_key = new WNPA_Access_Key();