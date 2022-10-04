<?php
//1. PHP Snippet: Remove header, sidebar and footer @ WooCommerce Checkout Page.
/**
 * @snippet       Storefront Theme Remove Header Footer @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'wp', 'bbloomer_unhook_storefront_functions' );
 
function bbloomer_unhook_storefront_functions() {
   if ( is_checkout() ) {
      remove_all_actions( 'storefront_header' );
      remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
      remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
      remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
   }
}

//Css snippet to the first php snippet

@media (min-width: 768px) {
   .woocommerce-checkout.right-sidebar .content-area {
      width: 100%;
      float: none;
      margin-right: 0;
   }
}

//2. CSS Snippet: Move Order Review To Top Right @ WooCommerce Checkout Page

/*
The Storefront theme already does that out of the box! So, it seems they studied ecommerce trends as well and decided that was the right choice.

Of course, most themes do not do that by default. For inspiration, you can try copying Storefront’s CSS (you may need to change some selectors):*/ 

@media (min-width: 768px) {
 
   /* Billing & Shipping @ Left */
 
   .col2-set {
      width: 52.9411764706%;
      float: left;
      margin-right: 5.8823529412%;
   }
 
   /* Order Review @ Right */
 
   #order_review_heading, #order_review {
      width: 41.1764705882%;
      float: right;
      margin-right: 0;
      clear: right;
   }
 
   //3. PHP Snippet: Move coupon form to the bottom @ WooCommerce Checkout Page

   //We can use the Visual hook guide for the checkout for this. First, we remove it, then we readd it at the very bottom.

   /**
 * @snippet       Move Coupon @ Checkout Bottom
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
 
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

//4. PHP Snippet: Keep the shipping form always “open” @ WooCommerce Checkout Page

//Thankfully if you look at form-shipping.php template file, WooCommerce gives us a filter here:

   apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 )

   //Which means I can now code a simple PHP snippet to override that behavior:

   /**
 * @snippet       Shipping Always Open @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter( 'woocommerce_ship_to_different_address_checked', 'bbloomer_open_shipping_checkout' );
 
function bbloomer_open_shipping_checkout() {
   return 1;
}

//5. CSS Snippet: Move the billing form below shipping form @ WooCommerce Checkout Page

//First of all, Billing and Shipping forms must be made full-width. Storefront theme already does that, so in case you’re using another theme, try with this css snippet:

   .col2-set .col-1, .col2-set .col-2 {
   float:none;
   width: 100%
   margin: 0;
}

//Once you have Billing and Shipping one above the other, we want now to feature the Shipping form first (top) and Billing form after (bottom). Doing this with PHP is possible, but there is a much neater way to accomplish it: CSS flex.

.col2-set {
    display: flex;
    flex-direction: column;
}
 
.col2-set > .col-1 {
   order: 2; 
}
 
.col2-set > .col-2 {
   order: 1; 
}

//In a nutshell, I’m declaring that the customer details (Billing & Shipping forms wrapper) displays as “flex”. In this way, I can use the “order” property and switch the vertical order of the Billing and Shipping divs.

//6. PHP Snippet: Split the long layout made of billing, shipping, order review into visual steps @ WooCommerce Checkout Page

//Here we use once again the visual hook guide, and print 3 new divs in specific positions (above shipping, above billing, above order review).

/**
 * @snippet       Add Visual Steps @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_checkout_shipping', 'bbloomer_checkout_step1' );
 
function bbloomer_checkout_step1() {
   echo '<p class="steps">STEP1</p>';
}
 
add_action( 'woocommerce_checkout_billing', 'bbloomer_checkout_step2' );
 
function bbloomer_checkout_step2() {
   echo '<p class="steps">STEP2</p>';
}
 
add_action( 'woocommerce_checkout_before_order_review_heading', 'bbloomer_checkout_step3' );
 
function bbloomer_checkout_step3() {
   echo '<p class="steps">STEP3</p>';
}

//Of course we also need some CSS:

.steps {
   background: black;
   color: white;
   display: inline-block;
   padding: 0.5em 2em;
}

//7. PHP Snippet: Remove unnecessary billing/shipping fields @ WooCommerce Checkout Page

/**
 * @snippet       Remove Ship/Bill Fields @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
    
     unset( 
       $fields['order']['order_comments'], 
       $fields['shipping']['shipping_company'],
       $fields['shipping']['shipping_address_2'],
       $fields['billing']['billing_company'],
       $fields['billing']['billing_address_2'],
       $fields['billing']['billing_postcode'],
       $fields['billing']['billing_phone']
     );
 
     return $fields;
}

//8.PHP Snippet: Add an “edit cart” link @ WooCommerce Checkout Page

/*Because we removed all links from the Checkout page, it’s fair to give the user a chance to get back to the Cart page in case they want to change quantities or remove products.

You can pick any WooCommerce Checkout hook, but in this case I selected the “woocommerce_checkout_before_order_review” one, which is positioned right below the “Your Order” heading. */

/**
 * @snippet       Add edit cart link @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_checkout_before_order_review', 'bbloomer_edit_cart_checkout' );
 
function bbloomer_edit_cart_checkout() {
   echo '<a href="' . wc_get_cart_url() . '">Edit Cart</a>';
}

//With a bit of CSS, you can also position this on the same line as “Your Order” and save some space.

//8.PHP Snippet: Add phone number @ WooCommerce Checkout Page

/*You can add whatever content you wish to the Checkout page, mostly if it helps potential customers trust your business.

Usually you would add secure payment badges, FAQ or contact links, as well as an immediate way to get in touch with you (live chat and phone number).

So, this is how to add a phone number right below the “PLACE ORDER” button on the checkout page. */

/**
 * @snippet       Phone Number @ Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 4.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_action( 'woocommerce_review_order_after_submit', 'bloomer_phone_checkout_page' );
 
function bloomer_phone_checkout_page() {
   ?>
   <p>Need help? Give us a call at <a href="tel:1123456789">+1 123456789</a></p>
   <?php
}