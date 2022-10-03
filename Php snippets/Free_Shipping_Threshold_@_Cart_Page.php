<?php

add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice' );
  
function bbloomer_free_shipping_cart_notice() {
   $threshold = 80;
   $current = WC()->cart->get_subtotal(); 
   if ( $current < $threshold ) {
      wc_print_notice( 'Get free shipping if you order ' . wc_price( $threshold - $current ) . ' more!', 'notice' );
   }
}