<?php
/**
 * Display Inline
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_add_inline_style
 *
 * wp_add_inline_style
 * @package freeware
 */

function freeware_styles_method() {
	$header_image_padding = get_theme_mod('header_image_padding','100');
	$disable_banner_text = get_theme_mod ('disable_banner_text',0);
	$custom_css='';

		if ( $header_image_padding !='100' ) { 
			$custom_css .= '
				.has-header-image .custom-header {
				height: '.absint($header_image_padding).'vh;
				}';
		}

		if ($disable_banner_text !=0) {
			$custom_css .= '
				.slide-text-content {
				display: none;
				}';
		}

		if ( !class_exists( 'Freeware_Pro' ) ) {

			for ( $i=1; $i <= 12; $i++ ) {

				$cat_highlighted_color_post = get_theme_mod ('cat-highlighted-color-post-'.$i,'');

					if($cat_highlighted_color_post !=''){
						$custom_css .= '
							.category-highlight .ch-row .ch-column:nth-of-type(4n+'.$i.') .ch-post-summary,
							.category-highlight .ch-row .ch-column:nth-of-type(4n+'.$i.') .ch-post-thumbnail:before {
								background-color: ' .$cat_highlighted_color_post.';
							}';
					}
			}
		}

	wp_add_inline_style( 'freeware-style', wp_strip_all_tags($custom_css) );
}
add_action( 'wp_enqueue_scripts', 'freeware_styles_method', 10 );

//Color Schemes
function freeware_color_schemes(){
	$color_schemes = get_theme_mod ('color-schemes','#c52228');

	if($color_schemes =='#c52228'){
		return;
	}

	$custom_css ='
	/* link and Button ________________________ */
	a,
	.main-navigation ul li:hover > a,
	.main-navigation ul li.current-menu-item > a, 
	.main-navigation ul li.current_page_item > a, 
	.main-navigation ul li.current-menu-ancestor > a,
	.posts-navigation .nav-links .nav-previous,
	.posts-navigation .nav-links .nav-previous a,
	.posts-navigation .nav-links .nav-next,
	.posts-navigation .nav-links .nav-next a,
	.post-navigation .nav-links .nav-previous,
	.post-navigation .nav-links .nav-previous a,
	.post-navigation .nav-links .nav-next,
	.post-navigation .nav-links .nav-next a,
	.pagination .nav-links .page-numbers.current,
	.pagination .nav-links .page-numbers:hover,
	a.more-link,
	blockquote:before,
	.has-header-image .main-navigation ul li:hover > a,
	.has-header-image .main-navigation ul li.current-menu-item > a, 
	.has-header-image .main-navigation ul li.current_page_item > a, 
	.has-header-image .main-navigation ul li.current-menu-ancestor > a {
		color: %1$s;
	}


	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul.sub-menu,
	.main-navigation ul.children,
	.search-container .search-submit,
	.menu-social-links-container ul > li a:before,
	.top-header .social-links-menu li a:hover,
	.entry-footer .entry-meta span:before,
	.no-border-bg #secondary.widget-design .widget_text,
	#secondary.widget-design .widget_text,
	#secondary.sidebar-custom-design.widget-design .widget_text,
	#secondary.sidebar-custom-design .widget-title,
	#secondary .widget-title:after,
	#colophon .widget-title:after,
	.posts-holder .post.sticky:before,
	.sticky-name,
	.entry-footer .entry-meta span:before,
	.slide-text-content .tag-links a,
	.back-to-top,
	#bbpress-forums #bbp-search-form #bbp_search_submit {
		background-color: %1$s;
	}

	@media only screen and (max-width: 767px) {
	    .main-navigation ul>li:hover > .dropdown-toggle,
	    .main-navigation ul>li.current-menu-item .dropdown-toggle,
	    .main-navigation ul>li.current-menu-ancestor .dropdown-toggle {
	        background-color: %1$s;
	    }

	    .main-navigation ul li:hover>a,
		.main-navigation ul li.current-menu-item>a,
		.main-navigation ul li.current_page_item>a,
		.main-navigation ul li.current-menu-ancestor>a,
		.has-top-bg-image .main-navigation ul li:hover > a, 
		.has-top-bg-image .main-navigation ul li.current-menu-item > a, 
		.has-top-bg-image .main-navigation ul li.current_page_item > a, 
		.has-top-bg-image .main-navigation ul li.current-menu-ancestor > a  {
			color: %1$s;
		}
	}

	.widget_search .search-submit,
	.post-page-search .search-submit {
		background-color: %1$s;
		border-color: %1$s;
	}

	/* Banner ________________________ */
	.banner-title span {
		border-color: %1$s;
	} 
	.slide-text-content .tag-links a {
		background-color: %1$s;
	}

	/* Woocommerce ________________________ */
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt, 
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,
	.woocommerce span.onsale {
		background-color: %1$s;
	}

	.woocommerce div.product p.price, 
	.woocommerce div.product span.price,
	.woocommerce ul.products li.product .price {
		color: %1$s;
	}';

wp_add_inline_style( 'freeware-style', sprintf( $custom_css, $color_schemes ) );

}
add_action( 'wp_enqueue_scripts', 'freeware_color_schemes', 20 );