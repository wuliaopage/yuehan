<?php
 /**
 * Enqueue scripts and styles.
 *
 * @package freeware
 */

function freeware_scripts() {
	$select_main_banner_category = get_theme_mod('select_main_banner_category','');
	$slider_options = get_theme_mod('slider-options','main-banner');
	$disable_main_banner = get_theme_mod('disable_main_banner',0);
	$enable_sticky_menu = get_theme_mod('enable_sticky_menu',1);
	wp_enqueue_style( 'freeware-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/fontawesome/css/font-awesome.min.css' );

	wp_enqueue_style( 'freeware-google-fonts', freeware_fonts_url(), array(), null );

	wp_enqueue_script('freeware-global', get_template_directory_uri().'/assets/js/global.js', array('jquery'), true, false);

	wp_enqueue_script( 'freeware-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), false, true );

	wp_enqueue_script( 'freeware-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), false, true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/library/sticky-sidebar/ResizeSensor.js', array(), false, true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.js', array(), false, true );

	if($slider_options !='main-banner'){
		// Silence is Golden
	} else {
		if ($disable_main_banner ==1){
			// Silence is Golden
		} elseif ($select_main_banner_category ==''){
			// Silence is Golden
		} else {

			wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js', array(), false, true );

			wp_enqueue_script( 'freeware-slick-settings', get_template_directory_uri() . '/assets/library/slick/slick-settings.js', array(), false, true );
		}

	}

	if($enable_sticky_menu ==1 ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/library/sticky/jquery.sticky.js', array(), false, true );
		wp_enqueue_script( 'freeware-sticky-settings', get_template_directory_uri() . '/assets/library/sticky/sticky-setting.js', array(), false, true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'freeware_scripts' );

function freeware_admin_notice (){

  wp_enqueue_style( 'freeware-admin-css', get_template_directory_uri() . '/css/admin/admin.css' );

}

add_action( 'admin_enqueue_scripts', 'freeware_admin_notice' );

if ( ! function_exists( 'freeware_fonts_url' ) ) :
/**
 * Register Google fonts for Freeware.
 *
 * Create your own freeware_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function freeware_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'freeware' ) ) {
		$fonts[] = 'Lato:300,400,400i,700';
	}

	/* translators: If there are characters in your language that are not supported by Yesteryear, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Yesteryear font: on or off', 'freeware' ) ) {
		$fonts[] = 'Yesteryear';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => esc_attr( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;