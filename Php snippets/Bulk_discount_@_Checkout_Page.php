<?php

add_action( 'woocommerce_before_cart', 'bbloomer_apply_bulk_coupon' );
  
function bbloomer_apply_bulk_coupon() {
    $coupon_code = 'bulk';
   if ( WC()->cart->get_cart_contents_count() > 5 ) {
       if ( ! WC()->cart->has_discount( $coupon_code ) ) WC()->cart->add_discount( $coupon_code );
   } else {
      if ( WC()->cart->has_discount( $coupon_code ) ) WC()->cart->remove_coupon( $coupon_code );
   }
}