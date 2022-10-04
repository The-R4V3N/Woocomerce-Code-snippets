<?php

/**
 * @snippet       “Secure payments” image @ Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_review_order_after_submit', 'bbloomer_trust_place_order' );
 
function bbloomer_trust_place_order() {
   echo '<img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/na/us/logo-center/9_bdg_secured_by_pp_2line.png" style="margin: 1em auto">';
}