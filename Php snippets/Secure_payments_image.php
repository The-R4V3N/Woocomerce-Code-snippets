<?php

//This snippet insert a secured by Paypal image on your Checkout page.

add_action( 'woocommerce_review_order_after_submit', 'bbloomer_trust_place_order' );
  
function bbloomer_trust_place_order() {
    echo '<img src="https://www.paypalobjects.com/digitalassets/c/website/marketing/na/us/logo-center/9_bdg_secured_by_pp_2line.png" style="margin: 1em auto">';
}