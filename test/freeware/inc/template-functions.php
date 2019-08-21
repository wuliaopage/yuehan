<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package freeware
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function freeware_body_classes( $classes ) {
    $select_layout = get_theme_mod('select-layout','full-width');
    $top_innerpage_bg_image = get_theme_mod('top-innerpage-bg-image','');

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    //has header image
    if (is_front_page() && is_home() || is_front_page() ) {
        if(has_header_image()){
            $classes[] = 'has-header-image';
        }
    }

    //left sidebar
    if($select_layout=='left'){
        $classes[] = 'left-sidebar';

    } elseif($select_layout == 'full-width') {
        $classes[] = 'full-width';

    }

    //Top inner  page background image
    if (! (is_front_page() && is_home()) || !(is_front_page() )) {
        if($top_innerpage_bg_image !=''){
            $classes[] = 'has-top-bg-image';
        }

    }

	return $classes;
}
add_filter( 'body_class', 'freeware_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 */
function freeware_post_classes( $classes, $class, $post_id ) {
    $classes[] = 'entry';

    return $classes;
}
add_filter( 'post_class', 'freeware_post_classes', 10, 3 );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function freeware_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'freeware_pingback_header' );

// Default Category Lists

if( !function_exists( 'freeware_cat_list' ) ):
    function freeware_cat_list() {
        $freeware_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $freeware_cat_lists = get_categories( $freeware_args );
        $freeware_cat_list = array('' => esc_html__('--Select--','freeware'));
        foreach( $freeware_cat_lists as $category ) {
            $freeware_cat_list[esc_attr( $category->slug )] = esc_html( $category->name );
        }
        return $freeware_cat_list;
    }
endif;

//front page category list
if( !function_exists( 'freeware_frontpage_cat_list' ) ):
    function freeware_frontpage_cat_list() {
        $freeware_args = array(
            'type'       => 'post',
            'taxonomy'   => 'category',
        );
        $freeware_frontpage_cat_lists = get_categories( $freeware_args );
        foreach( $freeware_frontpage_cat_lists as $category ) {
            $freeware_frontpage_cat_list[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $freeware_frontpage_cat_list;
    }
endif;

//Exclude posts from home page

function freeware_exclude_homepage($query) {
    $front_page_categories = get_theme_mod('front_page_categories','');
    if ( is_array( $front_page_categories ) && !in_array( 0, $front_page_categories ) ) {
        if ( $query->is_home() && $query->is_main_query() ) {
            $query->query_vars['category__in'] = $front_page_categories;
        }
    }
}
add_action('pre_get_posts', 'freeware_exclude_homepage');

