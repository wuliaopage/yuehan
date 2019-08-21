<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freeware
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'freeware' ); ?></a>

	<?php
	$disable_search_form = get_theme_mod('disable_search_form',0);
	$subscribe_text = get_theme_mod('subscribe_text','');
	$subscribe_url = get_theme_mod('subscribe_url','');
	$show_banner = get_theme_mod('show_banner','home-page');
	$top_innerpage_bg_image = get_theme_mod('top-innerpage-bg-image','');  ?>

	<header id="masthead" class="site-header" role="banner">
		<div id="main-header" class="main-header">
			<?php 
				/**
				* Search Form
				*/
				do_action('freeware_frontend_search_form'); ?>
				<div class="navigation-top">
	        		<div class="wrap">
	            	<div id="site-header-menu" class="site-header-menu">
							<nav class="main-navigation" aria-label="<?php esc_html_e('Primary Menu','freeware'); ?>" role="navigation">

							<?php
								/**
								 * Navigation Top
								 */
								do_action('freeware_frontend_navigation_top');  
							?>
							</nav><!-- #site-navigation -->
						</div>
							<?php if($disable_search_form ==0) { ?>
								<button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','freeware'); ?></span></span></button>
						<?php } ?>
					</div><!-- .wrap -->
				</div><!-- .navigation-top -->

			<div class="top-header">
				<?php if ( is_front_page() && is_home() || is_front_page() ) { ?>
					<div class="top-header-bg">

				<?php } else { ?>
					<div class="top-header-bg" <?php if($top_innerpage_bg_image !=''){ ?> style="background-image:url(<?php echo esc_url($top_innerpage_bg_image );?>);" <?php } ?>>
				<?php } ?>
					<div class="wrap">
						<div class="top-header-content">
							<?php 
							/**
							 * Social navigation
							 */
							do_action ('freeware_frontend_social_navigation');

							/**
							 * Site Branding
							 */
							do_action ('freeware_frontend_site_branding'); ?>

							<div class="header-right">
								<?php if($subscribe_text !=''){ ?>
								<div class="header-btn">
									<a class="btn button" href="<?php echo esc_url($subscribe_url); ?>" target="_blank"><?php echo esc_html($subscribe_text); ?></a>
								</div><!-- .header-btn -->
								<?php }
								if($disable_search_form ==0) { ?>
									<button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','freeware'); ?></span></span></button>
								<?php } ?>
							</div><!-- .header-right -->
						</div><!-- .top-header-content -->
					</div><!-- .wrap -->
				</div><!-- .top-header-bg -->

				<?php 
				if ( has_header_image() ) {
					do_action ('freeware_frontend_header_image');
				} ?>
				<div id="nav-sticker">
					<div class="navigation-top">
						<div class="wrap">
							<div id="site-header-menu" class="site-header-menu">
								<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_html_e('Primary Menu','freeware'); ?>" role="navigation">
										<?php
										/**
										 * Navigation Top
										 */
										do_action('freeware_frontend_navigation_top');  ?>
								</nav><!-- #site-navigation -->
							</div>
							<?php if($disable_search_form ==0) { ?>
								<button type="button" class="search-toggle"><span><span class="screen-reader-text"><?php esc_html_e('Search for:','freeware'); ?></span></span></button>
							<?php } ?>
						</div><!-- .wrap -->
					</div><!-- .navigation-top -->
				</div><!-- #nav-sticker -->
			</div><!-- .top-header -->
			<?php
			/**
			* Main Banner
			*/

			if($show_banner=='home-page' ){ 
				if ( is_front_page() && is_home() ) {
				// Default homepage
					do_action('freeware_frontend_main_banner');

				}elseif ( is_front_page()){
				//Static homepage
					do_action('freeware_frontend_main_banner');

				}

			} elseif ($show_banner=='static-homepage') {
				
				if ( is_front_page()){
				//Static homepage
					do_action('freeware_frontend_main_banner');

				}
			} elseif ($show_banner=='blog') {

				if ( is_home()){
				//Blog page
					do_action('freeware_frontend_main_banner');

				}
			} else {
				//everything else
				do_action('freeware_frontend_main_banner');

			} ?>		
		</div><!-- .main-header -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( is_front_page() && is_home() ) {
		// Default homepage
			do_action('freeware_frontend_hightlight_category');

		}elseif ( is_front_page()){
		//Static homepage
			do_action('freeware_frontend_hightlight_category');

		} ?>