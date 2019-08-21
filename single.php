<?php get_header(); ?>

<div class="container">
    <article class="post-wrap">
        <header class="post-header">
            <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            
                <div class="post-meta">
                    
                        Author: <a itemprop="author" rel="author" href="/">Yuehan Liu</a>
                    

                    
                        <span class="post-time">
                        Date: <a href="#">August 11, 2019&nbsp;&nbsp;13:08:00</a>
                        </span>
                    
                    
                </div>
            
        </header>

        <div class="post-content">
            <?php
            while (have_posts()):the_post();
            
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'freeware' ),
                'after'  => '</div>',
            ) );
            endwhile;
            ?>
        </div>
        
        <section class="post-tags">
            <div>
                <?php if ( get_edit_post_link() ) : ?>
                <?php
                edit_post_link('Edit', '<span>', '</span>'); 
                ?>
                <?php endif; ?>
                <!-- <span>Tag(s):</span> -->
                <span class="tag">
                    
                </span>
            </div>
            <div>
                <a href="javascript:window.history.back();">Back</a>
                <span>· </span>
                <a href="/">Home</a>
            </div>
        </section>
        
            <section class="post-copyright">
                
                    <p class="copyright-item">
                        <span>Author:</span>
                        <span>Yuehan Liu</span>
                    </p>
                
                
                    <p class="copyright-item">
                        <span>Permalink:</span>
                        <span><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>
                    </p>
                
                
                    <p class="copyright-item">
                        <span>License:</span>
                        <span>Copyright (c) 2019 <a href="http://creativecommons.org/licenses/by-nc/4.0/">CC-BY-NC-4.0</a> LICENSE</span>
                    </p>
                
                
                     <p class="copyright-item">
                         <span>Slogan:</span>
                         <span>Do you believe in <strong>YUEHAN<strong>?</strong></strong></span>
                     </p>
                

            </section>
        
        
        <section class="post-nav">
            
        </section>


    </article>
    
</div>

<?php get_footer(); ?>