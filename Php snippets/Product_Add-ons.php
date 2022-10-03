<?php

//This code snippet creates Product Add-ons on the Single Product page.

add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_gift_wrap', 35 );
   
function bbloomer_gift_wrap() {    
   ?>
   <label><input type="checkbox" name="gift-wrap" value="Yes">$2 Gift Wrap?</label>
    <?php
}
   
add_filter( 'woocommerce_add_cart_item_data', 'bbloomer_store_gift', 10, 2 );
   
function bbloomer_store_gift( $cart_item, $product_id ) {
   if( isset( $_POST['gift-wrap'] ) ) $cart_item['gift-wrap'] = $_POST['gift-wrap'];
   return $cart_item; 
}
 
add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_add_checkout_fee' );
  
function bbloomer_add_checkout_fee() {
   foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        if ( isset( $cart_item['gift-wrap'] ) ) {
            $itsagift = true;
            break;
        }
    }
    if ( $itsagift == true ) WC()->cart->add_fee( 'Gift Wrap', 2 );
}