<?php

add_filter( 'woocommerce_add_to_cart_validation', 'bbloomer_bogo', 10, 3 );
  
function bbloomer_bogo( $passed, $product_id, $quantity ) {
   $sku_with_gift = 'sku0001';
   $sku_free_gift = 'sku0002'; 
   $product = wc_get_product( $product_id );
   $sku_this = $product->get_sku();
    if ( $sku_this == $skuswithgift ) {
       WC()->cart->add_to_cart( wc_get_product_id_by_sku( $sku_free_gift ) );
   }
   return $passed;
}