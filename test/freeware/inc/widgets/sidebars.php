<?php
 /**
 * Register Sidebar area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package freeware
 */
function freeware_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'freeware' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'freeware' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_widget( 'Freeware_posts' );

}

add_action( 'widgets_init', 'freeware_widgets_init' );