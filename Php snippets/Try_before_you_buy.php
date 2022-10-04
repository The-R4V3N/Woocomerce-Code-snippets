<?php

//This snippet add free sample text to your Single Product Page. 
/**
 * @snippet       Buy a sample @ Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_single_product_summary', 'bbloomer_add_free_sample_add_cart', 35 );
 
function bbloomer_add_free_sample_add_cart() {
   echo '<p><a href="/?add-to-cart=953" class="button">Add Sample to Cart</a><p>';
}