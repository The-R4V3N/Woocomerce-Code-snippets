<?php

/**
 * Remove Ancient Custom Fields metabox from post editor
 * because it uses a very slow query meta_key sort query
 * so on sites with large postmeta tables it is super slow
 * and is rarely useful anymore on any site
 */
 
function s9_remove_post_custom_fields_metabox() {
     foreach ( get_post_types( '', 'names' ) as $post_type ) {
         remove_meta_box( 'postcustom' , $post_type , 'normal' );   
     }
}
add_action( 'admin_menu' , 's9_remove_post_custom_fields_metabox' );