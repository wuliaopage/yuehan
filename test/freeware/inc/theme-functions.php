<?php
/**
 * Theme Functions which enhance the theme by hooking into WordPress
 *
 * @package freeware
 */


// Navigation Top
function freeware_navigation_top(){
$disable_search_form = get_theme_mod('disable_search_form',0); ?>
<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
    <span class="toggle-text"><?php _e('Menu','freeware'); ?></span>
    <span class="toggle-bar"></span>
</button>
<?php
    wp_nav_menu( array(
        'container' =>'',
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
        'items_wrap'      => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
    ) );
}

add_action('freeware_frontend_navigation_top','freeware_navigation_top');

// Search Form 
function freeware_search_form(){
    $search_text = get_theme_mod('search_text',esc_html__('Search','freeware')); ?>
<div class="search-container">
    <form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
       <label class="screen-reader-text"><?php echo esc_html($search_text); ?></label>
            <input class="search-field" placeholder="<?php echo esc_attr($search_text).'&hellip;'; ?>" name="s" type="search">
            <input class="search-submit" value="<?php echo esc_attr($search_text); ?>" type="submit">
    </form>
</div><!-- .search-container -->
    
<?php }
add_action('freeware_frontend_search_form','freeware_search_form');

// Social Navigation
function freeware_social_navigation(){ ?>
    <nav class="social-navigation" aria-label="<?php esc_html_e('Social','freeware');?>" role="navigation">
        <?php
        if(has_nav_menu('menu-2')){
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-2',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul class="social-links-menu">%3$s</ul>',
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
            ) );
        } ?>
    </nav><!-- .social-navigation -->

<?php }

add_action('freeware_frontend_social_navigation','freeware_social_navigation');

// Site Branding
function freeware_site_branding(){ ?>
    <div class="site-branding">
        <?php the_custom_logo();

        if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
        else :
            ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
        endif;
        $freeware_description = get_bloginfo( 'description', 'display' );
        if ( $freeware_description || is_customize_preview() ) :
            ?>
            <p class="site-description"><?php echo $freeware_description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>
    </div><!-- .site-branding -->

<?php }

add_action('freeware_frontend_site_branding','freeware_site_branding');

// Main Banner
function freeware_main_banner(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$remove_banner_link = get_theme_mod('remove_banner_link',0);
$no_of_main_banner = get_theme_mod('no_of_main_banner','3');
$slider_options = get_theme_mod('slider-options','main-banner');
$enable_fullwidth_banner = get_theme_mod('enable-fullwidth-banner',0);
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','freeware'));
$image_banner_bg_image = get_theme_mod ('img-banner-bg-image','');
$banner_title_text = get_theme_mod ('banner_title_text','');
$banner_sub_title_text = get_theme_mod ('banner_sub_title_text','');
$query = new WP_Query(array(
    'posts_per_page' =>  intval($no_of_main_banner),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_main_banner_category),
));
if(!is_paged()){
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
        <div class="main-banner 
        <?php if ($enable_fullwidth_banner !=0){
             echo 'full-width-banner';
        }
         if($image_banner_bg_image !='') { ?> 
            style="background-image:url('<?php echo esc_url($image_banner_bg_image); ?>');"
         <?php } ?>">
            <div class="banner-wrap">
                <?php if($banner_title_text !='' || $banner_sub_title_text !=''){ ?>
                    <div class="banner-header">
                         <?php if($banner_title_text !=''){ ?>
                            <h2 class="banner-title"><span><?php echo esc_html ($banner_title_text); ?></span></h2>
                        <?php }
                        if($banner_sub_title_text !=''){ ?>
                            <div class="banner-title-desc"><p><?php echo esc_html ($banner_sub_title_text); ?></p></div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="banner-list">
                    <?php 
                    if($slider_options == 'metaslider' || $slider_options == 'smartslider' || $slider_options == 'masterslider'){
                        do_action('freeware_frontend_plugins_slider');
                    } else {
                        while ($query->have_posts()):$query->the_post();
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'freeware' ) ); ?>
                            <div class="slide">
                                <div class="slide-content">
                                     <?php if(has_post_thumbnail()){ ?>
                                    <div class="slide-thumb">
                                        <?php if($remove_banner_link ==0){ ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
                                        <?php }
                                                the_post_thumbnail();
                                            if($remove_banner_link ==0){ ?>
                                            </a>
                                        <?php } ?>
                                    </div><!-- .slide-thumb -->
                                    <?php } ?>
                                    <div class="slide-text-wrap">
                                        <div class="slide-text-content">
                                         <?php if ( $tags_list ) { ?>
                                            <div class="entry-tag">
                                                <?php freeware_tag_lists (); ?>
                                            </div>
                                        <?php }

                                        if($remove_banner_link ==0){ ?>
                                            <h2 class="slide-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                        <?php } else { ?>
                                            <h2 class="slide-title"><?php the_title(); ?></h2>
                                         <?php } ?>
                                            <div class="slide-text">
                                                <?php the_content( sprintf(
                                                        wp_kses(
                                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                                            $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                                            array(
                                                                'span' => array(
                                                                    'class' => array(),
                                                                ),
                                                            )
                                                        ),
                                                        get_the_title()
                                                    ) );?>
                                            </div><!-- .slider-text -->
                                       
                                        </div><!-- .slide-text-content -->
                                    </div><!-- .slide-text-wrap -->
                                </div><!-- .slide-content -->
                            </div><!-- .slide -->
                        <?php endwhile;
                        wp_reset_postdata();
                    } ?>
                </div><!-- .banner-list -->
            </div><!-- .banner-wrap -->
        </div><!-- .main-banner -->
        <?php }
    }
} ?>

<?php }

add_action('freeware_frontend_main_banner','freeware_main_banner');

function freeware_hightlight_category(){
$disable_category_highlight = get_theme_mod('disable_category_highlight',0);
$select_category_highlight = get_theme_mod('select_category_highlight','');
$remove_category_highlight_link = get_theme_mod('remove_category_highlight_link',0);
$no_of_category_highlight = get_theme_mod('no_of_category_highlight','4');
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','freeware'));
$disable_crop_image = get_theme_mod ('disable-crop-image',0);

$query = new WP_Query(array(
    'posts_per_page' =>  intval($no_of_category_highlight),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_category_highlight),
));

if(!is_paged()){
    if($disable_category_highlight==0){
        if($select_category_highlight!='' ){ ?>
        <div class="category-highlight">
            <div class="wrap">
                <div class="ch-row">
                    <?php  
                    while ($query->have_posts()):$query->the_post();
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'freeware' ) );
                        global $post;
                        $highlight_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $highlight_bg_image_url = $highlight_bg_image[0]; ?>
                        <div class="ch-column">
                            <div class="ch-column-inner">
                                 <div class="ch-post-wrap">
                                    <?php if(has_post_thumbnail()) { ?>
                                        <div class="ch-post-thumbnail">
                                            <?php if($remove_category_highlight_link ==0){ ?>
                                                <a class="ch-thumbnail" href="<?php the_permalink(); ?>">
                                            <?php } ?>
                                                <?php the_post_thumbnail();
                                                if($remove_category_highlight_link ==0){ ?>
                                                </a>
                                            <?php } ?>
                                        </div><!-- .ch-post-thumbnail -->
                                    <?php } ?>
                                    <div class="ch-post-summary">
                                        <header class="entry-header">
                                            <?php
                                            if($remove_category_highlight_link !=0){ ?>
                                                <h2 class="entry-title"><?php the_title(); ?></h2>
                                            <?php } else { ?>
                                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <?php } ?>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                         <?php
                                            the_content(esc_attr($excerpt_text));
                                        ?>
                                        </div><!-- .entry-content -->
                                    </div><!-- .ch-post-summary -->
                                </div><!-- .ch-post-wrap -->
                            </div><!-- .ch-column-inner -->
                        </div><!-- .ch-column -->
                        <?php
                    endwhile;
                    wp_reset_postdata(); ?>
                </div><!-- .ch-row -->
            </div><!-- .wrap -->
        </div><!-- .category-highlight -->

   <?php } 
    }
}

}

add_action('freeware_frontend_hightlight_category','freeware_hightlight_category');

function freeware_header_image(){
   if ( is_front_page() && is_home() || is_front_page() ) { ?>
        <div class="custom-header">
                <div class="custom-header-media">
                    <?php the_custom_header_markup(); ?>
                </div><!-- .custom-header-media -->
                <div class="scroll-down">
                    <a href="#" class="scroll-down-icon" address="true"></a>
                </div><!-- .scroll-down -->
        </div><!-- .custom-header -->
     <?php } else {

        // Silence is Golden
     }

}

add_action('freeware_frontend_header_image','freeware_header_image');