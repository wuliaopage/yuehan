<?php get_header(); ?>
    <div class="container">
        <div class="intro">
            <div class="avatar">
                <a href="http://www.yuehanliu.com/blog/"><?php the_custom_header_markup();?></a>
            </div>
            <div class="nickname"><?php bloginfo('name'); ?></div>
            <div class="description"><p><?php bloginfo('description'); ?></p></div>
        
            <div class="links">
                <a class="link-item" title="Blog" href="http://www.yuehanliu.com/blog/">
                    <i class="iconfont icon-blog"></i>
                </a>
            
                <a class="link-item" title="ZhiHu" href>
                    <i class="iconfont icon-zhihu"></i>
                </a>
            
                <a class="link-item" title="Instagram" href>
                    <i class="iconfont icon-instagram"></i>
                </a>
            </div>
        </div>
    </div>  

<?php get_footer(); ?>