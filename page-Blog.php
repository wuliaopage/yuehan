<?php get_header(); ?>

<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <div class="post">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <div class="entry">
                <?php the_content();?>
                <p class="postmetadata">
                <?php _e('Filed under:');?>
                <?php the_category(',');?>
                <?php _e('by');?>
                <?php the_autnor('');?>
                <br />
                <?php comments_poopup_link('No Comments»','1 Comments»','% Comment»');?>
                <?php edit_post_link('Edit','|','');?>
                </p>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>