<?php
/*
Template Name: Blog List
*/
?>



<?php get_header(); ?>


<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>

        <div class="post">
            <h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            <?php the_tags('标签：', ', ', ''); ?>
            <?php the_time('Y年n月j日') ?>
            <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
            <?php edit_post_link('编辑', ' &bull; ', ''); ?>
            <?php the_excerpt(); ?>
            <?php the_content('阅读全文...'); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <p class="clearfix">
    <?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?>
     <span class="float right"><?php next_posts_link('查看旧文章 &gt;&gt;', 0); ?></span>
    </p>
<?php else : ?>
<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
        <p>没有找到任何文章！</p>
<?php endif; ?>

<?php get_footer(); ?>