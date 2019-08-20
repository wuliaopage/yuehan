<?php
/*
Template Name: Blog List
*/
?>



<?php get_header(); ?>


<div class="post-wrap archive">
     
    <?php $count_posts = wp_count_posts(); $published_posts = $count_posts->publish;
    query_posts( 'posts_per_page=-1' );
    while ( have_posts() ) : the_post();
        echo '<article class="archive-item">';
        echo '<a class="archive-item-link" href="the_permalink();">the_title();</a>';
        echo '<span class="archive-item-date">the_time(get_option( 'date_format' ))</span>';
        $published_posts--;
    endwhile;
    wp_reset_query(); ?>
 </div>

 

<?php get_footer(); ?>


