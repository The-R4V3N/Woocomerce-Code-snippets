<?php
// Set cookie for new users
add_action( 'init', 'set_newuser_cookie'); // Run when WordPress loads
function set_newuser_cookie() {
	
	$cookie_value = $_SERVER["HTTP_REFERER"]; // Get URL the user came to your site for
	
	if ( !is_admin() && !isset($_COOKIE['origin'])) { // If not an admin or if cookie doesn't exist already
		setcookie( 'origin', $cookie_value, time()+3600*24*30, COOKIEPATH, COOKIE_DOMAIN, false); // Set cookie for 30 days
	}
}


// Check cookie when order made and add to order
add_action('woocommerce_checkout_update_order_meta', 'add_referral_meta'); // Run when an order is made in WooCommerce

function add_referral_meta( $order_id, $posted ){
	$ref_url = $_COOKIE['origin']; // Get the cookie
    update_post_meta( $order_id, 'referrer', $ref_url ); // Add to order meta
}
