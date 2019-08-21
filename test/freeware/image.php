<?php
/**
 * The template for displaying all attachment page
 *
 *
 * @package freeware
 */

get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
		/**
		 * Filter the default freeware image attachment size.
		 *
		 * @since Twenty Sixteen 1.0
		 *
		 * @param string $image_size Image size. Default 'large'.
		 */
		$image_size = apply_filters( 'freeware_attachment_size', 'full' );

		echo wp_get_attachment_image( get_the_ID(), $image_size );

	?>
	<div class="entry-content">
		<?php 
		the_content();
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'freeware' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'freeware' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
							?>
	</div><!-- .entry-content -->

	<?php 
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();
		if ( $metadata ) {
			printf(
				'<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
				_x( 'Full size', 'Used before full size attachment link.', 'freeware' ),
				esc_url( wp_get_attachment_url() ),
				absint( $metadata['width'] ),
				absint( $metadata['height'] )
			);
		}
	?>

	</article><!-- #post-<?php the_ID(); ?> -->

		<?php

		// Parent post navigation.
		the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->
<?php
get_footer();
