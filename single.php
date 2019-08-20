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
            <?php the_content(); ?> 
        </div>

        
            <section class="post-copyright">
                
                    <p class="copyright-item">
                        <span>Author:</span>
                        <span>Yuehan Liu</span>
                    </p>
                
                
                    <p class="copyright-item">
                        <span>Permalink:</span>
                        <span><a href="http://yuehanliu.com/2019/08/11/hello-world/">http://yuehanliu.com/2019/08/11/hello-world/</a></span>
                    </p>
                
                
                    <p class="copyright-item">
                        <span>License:</span>
                        <span>Copyright (c) 2019 <a href="http://creativecommons.org/licenses/by-nc/4.0/">CC-BY-NC-4.0</a> LICENSE</span>
                    </p>
                
                
                     <p class="copyright-item">
                         <span>Slogan:</span>
                         <span>Do you believe in <strong>DESTINY<strong>?</strong></strong></span>
                     </p>
                

            </section>
        
        <section class="post-tags">
            <div>
                <span>Tag(s):</span>
                <span class="tag">
                    
                </span>
            </div>
            <div>
                <a href="javascript:window.history.back();">back</a>
                <span>· </span>
                <a href="/">home</a>
            </div>
        </section>
        <section class="post-nav">
            
            
        </section>


    </article>
</div>

<?php get_footer(); ?>