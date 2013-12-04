(function( window, $ ) {
	/**
	 * Make an Ajax request to generate an access key for use in
	 * the initiating user's profile.
	 *
	 * @param e The event associated with the 'Generate' click.
	 */
	function generate_access_key( e ) {
		e.preventDefault();

		var data = {
			action: 'wnpa_generate_access_key'
		};

		$.post( ajaxurl, data, handle_response );
	}

	/**
	 * Handle the response received from WordPress
	 *
	 * @param response
	 */
	function handle_response( response ) {
		$( '#wnpa-access-key' ).val( response );
	}

	$( '#wnpa-generate-key' ).on( 'click', generate_access_key );
})( window, jQuery );