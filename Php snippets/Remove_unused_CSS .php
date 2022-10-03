<?php
// This snippet Removes unused CSS in the Flatsome Theme.

add_action('wp_head', 'inject_flatsome', 5);
function inject_flatsome() {
ob_start();
include 'wp-content/themes/flatsome/assets/css/flatsome.css';
$atf_css = ob_get_clean();
if ($atf_css != "" ) {
$theme = wp_get_theme( get_template() );
$version = $theme->get( 'Version' );
$fonts_url = get_template_directory_uri() . '/assets/css/icons';
$atf_css .= '@font-face {
font-family: "fl-icons";
font-display: block;
src: url(' . $fonts_url . '/fl-icons.eot?v=' . $version . ');
src:
url(' . $fonts_url . '/fl-icons.eot#iefix?v=' . $version . ') format("embedded-opentype"),
url(' . $fonts_url . '/fl-icons.woff2?v=' . $version . ') format("woff2"),
url(' . $fonts_url . '/fl-icons.ttf?v=' . $version . ') format("truetype"),
url(' . $fonts_url . '/fl-icons.woff?v=' . $version . ') format("woff"),
url(' . $fonts_url . '/fl-icons.svg?v=' . $version . '#fl-icons) format("svg");
}';

echo '<style id="inline-css" type="text/css">'. $atf_css . '</style>';
}
}

add_action('wp_enqueue_scripts', 'remove_flatsome', 101);
function remove_flatsome() {
wp_dequeue_style( 'flatsome-main' );
wp_deregister_style( 'flatsome-main' );
}