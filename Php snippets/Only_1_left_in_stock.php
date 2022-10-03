<?php

add_filter( 'woocommerce_get_availability_text', 'bbloomer_edit_left_stock', 9999, 2 );
 
function bbloomer_edit_left_stock( $text, $product ) {
   $stock = $product->get_stock_quantity();
     if ( $product->is_in_stock() && $product->managing_stock() && $stock <= get_option( 'woocommerce_notify_low_stock_amount' ) ) $text .= '. Get it today to avoid 5+ days restocking delay!';
   return $text;
}