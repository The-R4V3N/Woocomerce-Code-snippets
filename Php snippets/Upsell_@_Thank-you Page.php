<?php

//This snippet adds a upsell section to your Thank you Page.

add_action( 'woocommerce_thankyou', 'bbloomer_thankyou_upsell', 5 );
  
function bbloomer_thankyou_upsell() {
echo '<h2>Customers also bought...</h2>';
echo do_shortcode( '[products limit="3" columns="3" orderby="popularity" on_sale="true" ]' );
}