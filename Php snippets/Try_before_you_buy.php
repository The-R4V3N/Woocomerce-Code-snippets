<?php

//This snippet add free sample text to your Single Product Page. 

add_action( 'woocommerce_single_product_summary', 'bbloomer_add_free_sample_add_cart', 35 );
  
function bbloomer_add_free_sample_add_cart() {
   echo '<p><a href="/?add-to-cart=953" class="button">Add Sample to Cart</a></p>';
}