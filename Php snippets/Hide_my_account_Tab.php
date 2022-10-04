<?php
 
/**
* @snippet       Hide Edit Address Tab @ My Account
* @how-to        Get CustomizeWoo.com FREE
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 5.0
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 9999 );
 
function bbloomer_remove_address_my_account( $items ) {
   unset( $items['edit-address'] );
   return $items;
}
 
/**
* @snippet       Rename Edit Address Tab @ My Account
* @how-to        Get CustomizeWoo.com FREE
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 5.0
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_address_my_account', 9999 );
 
function bbloomer_rename_address_my_account( $items ) {
   $items['edit-address'] = 'Delivery Address';
   return $items;
}

//If you need the full list of default account menu item keys, here they are:

$items = array(
   'dashboard'       => __( 'Dashboard', 'woocommerce' ),
   'orders'          => __( 'Orders', 'woocommerce' ),
   'downloads'       => __( 'Downloads', 'woocommerce' ),
   'edit-address'    => _n( 'Addresses', 'Address', (int) wc_shipping_enabled(), 'woocommerce' ),
   'payment-methods' => __( 'Payment methods', 'woocommerce' ),
   'edit-account'    => __( 'Account details', 'woocommerce' ),
   'customer-logout' => __( 'Logout', 'woocommerce' ),
);