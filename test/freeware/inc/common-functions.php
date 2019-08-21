<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package freeware
 */

//Excerpt More
function freeware_excerpt_more( $link ) {

   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','freeware'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<div class="read-more"><a href="%1$s" class="more-link">%2$s</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );

    return ' &hellip; ' . $link;
}

add_filter( 'excerpt_more', 'freeware_excerpt_more' );

//Excerpt length
function freeware_excerpt_length($length) {

    $excerpt_length = get_theme_mod('excerpt_length','40');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;

    return absint($length);
}
add_filter('excerpt_length', 'freeware_excerpt_length');