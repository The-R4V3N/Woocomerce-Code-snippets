<?php

//This snippet add Order by 6pm and get delivery tomorrow notice to your Single Product Page.

add_action( 'woocommerce_single_product_summary', 'bbloomer_display_pressure_badge', 6 );
   
function bbloomer_display_pressure_badge() {
    echo '<div class="woocommerce-message">Order by 6pm and get it delivered tomorrow!</div>';
}