<?php

add_action( 'wp', 'bbloomer_nodistraction_checkout' );
 
function bbloomer_nodistraction_checkout() {
   if ( ! is_checkout() ) return;
   remove_action( 'storefront_header', 'storefront_social_icons', 10 );
   remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
   remove_action( 'storefront_header', 'storefront_product_search', 40 );
   remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
   remove_action( 'storefront_header', 'storefront_header_cart', 60 );
   remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
}