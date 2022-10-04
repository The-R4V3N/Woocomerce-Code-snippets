<?php

/**
 * @snippet       Move Email Field To Top @ Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    Woo 4.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_filter( 'woocommerce_billing_fields', 'bbloomer_move_checkout_email_field' );
 
function bbloomer_move_checkout_email_field( $address_fields ) {
    $address_fields['billing_email']['priority'] = 1;
    return $address_fields;
}