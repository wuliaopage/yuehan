<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');


?>
<div>
	<input id="switch_default" type="checkbox" class="switch_default">
	<label for="switch_default" class="commentToggleBtn"></label>
</div>
<script>
	var mobileBtn = function f() {
		var toggleMenu = document.getElementsByClassName("comments-area")[0];
		if(toggleMenu.classList.contains("comment-hide")){
		toggleMenu.classList.remove("comment-hide")
			mobileMenu.classList.remove("comment-hide")
		}else{
			toggleMenu.classList.add("comment-hide")
			mobileMenu.classList.add("comment-hide")
		}
	}
</script>
<div id="comments" class="comments-area comment-hide">

	<?php // You can start editing here -- including this comment! ?>
	<?php 
		$args = array(
			'fields' => apply_filters('comment_form_default_fields', array(
				'author' =>
					'<p class="comment-form-author">' .
					'<label for="author">' . __( '昵称', 'themetext' ) . '</label> ' .
					'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' /></p>',
				'email' =>
					'<p class="comment-form-email"><label for="email">' . __( '邮箱', 'themetext' ) . '</label> ' .
					'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' /></p>',
				'url' =>'',
			)),
			'label_submit' => '提交评论',
			'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( '留言', 'themetext' ) . '</label><textarea id="comment" name="comment" aria-required="true" cols="45" rows="8"></textarea></p>',
			'comment_form_top' => 'ds',
			'label_submit' => __( '提交评论', 'textdomain' ),
			'title_reply' => __( '留言给YUEHAN', 'textdomain' ),
			// 评论框前后文字， 你的电子邮件不会被公开删除
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			// Redefine your own textarea (the comment body).
			'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" class="comment-input" aria-required="true"></textarea></div>'

		);
		comment_form( $args ); 
	?>
	
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			// if ( 1 === get_comments_number() ) {
			// 	printf(
			// 		/* translators: %s: The post title. */
			// 		__( 'One thought on &ldquo;%s&rdquo;', 'twentytwelve' ),
			// 		'<span>' . get_the_title() . '</span>'
			// 	);
			// } else {
			// 	printf(
			// 		/* translators: %1$s: The number of comments. %2$s: The post title. */
			// 		_n( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentytwelve' ),
			// 		number_format_i18n( get_comments_number() ),
			// 		'<span>' . get_the_title() . '</span>'
			// 	);
			// }
			?>
		</h2>

		<div class="commentlist">
			<?php
			wp_list_comments(
				array(
					'callback' => 'yuehan_comment',
					'style'    => 'div',
				)
			);
			?>
		</div><!-- .commentlist -->

		<?php //if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<!-- <nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav> -->
		<?php //endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) :
			?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'twentytwelve' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	

</div><!-- #comments .comments-area -->


   

