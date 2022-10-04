<?php

//This snippet adds a upsell section to your Thank you Page.
/**
 * @snippet       Display Product Shortcode @ WC Thank You
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_thankyou', 'bbloomer_upsells_thankyou' );
 
function bbloomer_upsells_thankyou() {
   echo '<h2>Buy Some More?</h2>';
   echo do_shortcode( '[[products ids="186177,186179,186181"]]' );
}