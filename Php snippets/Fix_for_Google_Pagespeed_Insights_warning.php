<?php
/* This fixes the Google Pagespeed Insights warning for "Properly Size Images" on the Flatsome theme.
 First inspect your gallery thumbnails with chrome developer tools and find the size they are RENDERED at on DESKTOP
 In my case they render at exactly 165 x 110
 This function creates the correct gallery thumbnail size for Woocommerce and does NOT affect any image sizes of Flatsome
 After adding this function (use Code Snippets plugin) You need to Regenerate Thumbnails
 Use the plugin "Renegrate thumbmnails" with the setting "Skip regenerating existing correctly sized thumbnails (faster)."*/


add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 165,
		'height' => 110,
		'crop'   => 0,
	);
} );