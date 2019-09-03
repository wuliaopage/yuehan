<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71315338-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-71315338-2');
</script>

<!-- Title for SEO -->
<title>
<?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?>
</title>
<!-- Stylesheets -->
    <link rel="icon" href="<?php bloginfo('template_url');?>/favicon.ico">
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/tocbot.min.js"></script>
<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header header-logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
                <div class="menu navbar-right">
                        <a class="menu-item" title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">Home</a>
                        <?php 
                            $pages = get_pages('sort_column=menu_order'); 
                            foreach ( $pages as $page ) {
                                $option = '<a class="menu-item" href="' . get_page_link( $page->ID ) . '">';
                                $option .= $page->post_title;
                                $option .= '</a>';
                                echo $option;
                            }
                        ?>
                        <a class="menu-item" href="<?php echo get_option('home'); ?>/wp-admin/">Log in</a>
                        
                    <input id="switch_default" type="checkbox" class="switch_default">
                    <label for="switch_default" class="toggleBtn"></label>
                </div>

            </div>
        </nav>

        
        <nav class="navbar-mobile" id="nav-mobile">
            <div class="container">
                <div class="navbar-header">
                    <div>
                        <a href="/">Yuehan Liu</a><a id="mobile-toggle-theme">·&nbsp;Light</a>
                    </div>
                    <div class="menu-toggle" onclick="mobileBtn()">&#9776; Menu</div>
                </div>
                <div class="menu" id="mobile-menu">
                        <a class="menu-item" title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">Home</a>
                        <?php 
                            $pages = get_pages('sort_column=menu_order'); 
                            foreach ( $pages as $page ) {
                                $option = '<a class="menu-item" href="' . get_page_link( $page->ID ) . '">';
                                $option .= $page->post_title;
                                $option .= '</a>';
                                echo $option;
                            }
                        ?>
                        <a class="menu-item" href="<?php echo get_option('home'); ?>/wp-admin/">Log in</a>
                </div>
            </div>
        </nav>
    </header>
    <script>
        var mobileBtn = function f() {
            var toggleMenu = document.getElementsByClassName("menu-toggle")[0];
            var mobileMenu = document.getElementById("mobile-menu");
            if(toggleMenu.classList.contains("active")){
            toggleMenu.classList.remove("active")
                mobileMenu.classList.remove("active")
            }else{
                toggleMenu.classList.add("active")
                mobileMenu.classList.add("active")
            }
        }
    </script>
    <div class="main">
        