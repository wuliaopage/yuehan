<?php get_header(); ?>




<div class="container">
    <article class="post-wrap">
        <?php while (have_posts()):the_post(); ?>
        <header class="post-header">
            <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            
                <div class="post-meta">
                    
                        Author: <a itemprop="author" rel="author" href="/"><?php the_author(); ?></a>
                    

                    
                        <span class="post-time">
                        Date: <a href="#"><?php the_time('Y年n月j日 ag:i'); ?></a>
                        </span>
                    
                    
                </div>
            
        </header>

        <div class="post-content">
            <?php
            
            
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'freeware' ),
                'after'  => '</div>',
            ) );
            
            ?>
        </div>

        <section class="post-nav">
        <?php previous_post_link('%link'); ?><?php next_post_link('%link'); ?>
        </section>
            <section class="post-copyright">
                
                    <p class="copyright-item">
                        <span>Author:</span>
                        <span><?php the_author(); ?></span>
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
        
        <section class="post-tags">
            <div>
                <?php if ( get_edit_post_link() ) : ?>
                <?php
                    edit_post_link('Edit', '<span>', '</span>'); 
                ?>
                <span class="commentBtnArea">
                    <input id="comment_default" type="checkbox" class="comment_default">
                    <label for="comment_default" class="commentToggleBtn"></label>
                </span>
                <?php else:?>
                <span class="commentBtnArea">
                    <span>留言给 YUEHAN</span>	
                    <input id="comment_default" type="checkbox" class="comment_default">
                    <label for="comment_default" class="commentToggleBtn"></label>
                </span>
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
        
        <?php comments_template(); ?> 
        <?php endwhile;?>
    </article>
    
</div>


<!-- Unstable Bug -->
<!-- <script>
document.getElementsByClassName('commentToggleBtn')[0].addEventListener('click', () => {
                var toggleMenu = document.getElementsByClassName("comments-area")[0];
                if(toggleMenu.classList.contains("comment-hide")){
                    toggleMenu.classList.remove("comment-hide");                   
                }else{
                    toggleMenu.classList.add("comment-hide");   
                }
            })
</script> -->

<?php get_footer(); ?>