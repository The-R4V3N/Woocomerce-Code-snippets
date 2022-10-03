<?php
/**
 * This snippet will stop purchase events to fire on thank you page
 **/
add_action( 'woocommerce_init', function () {

	//get all WooCommerce integrations
	$integrations = WC()->integrations->get_integrations();

	//checking if facebook for woocommerce installed?
	if ( isset( $integrations['facebookcommerce'] ) && $integrations['facebookcommerce'] instanceof WC_Facebookcommerce_Integration ) {

		/**
		 * For version < 1.1.0
		 */
		remove_action( 'woocommerce_thankyou', [
			$integrations['facebookcommerce']->events_tracker,
			'inject_gateway_purchase_event'
		], $integrations['facebookcommerce']->events_tracker::FB_PRIORITY_HIGH );

		/**
		 * For version >= 1.1.0
		 */
		remove_action( 'woocommerce_thankyou', [
			$integrations['facebookcommerce']->events_tracker,
			'inject_purchase_event'
		], 40 );
	}else{
		if ( function_exists('facebook_for_woocommerce') ) {
			$event_track = facebook_for_woocommerce()->get_integration()->events_tracker;


			/**
			 * For version >= 1.1.0
			 */
			remove_action( 'woocommerce_thankyou', [
				$event_track,
				'inject_purchase_event'
			], 40 );


			remove_action( 'woocommerce_checkout_update_order_meta', [
				$event_track,
				'inject_purchase_event'
			], 10 );
		}
	}
}, 999 );