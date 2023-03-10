<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Edubin
 * Version: 1.0.0
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( '1 Comment %s', '', 'edubin' ), '' );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment %2$s',
						'%1$s Comments %2$s',
						$comments_number,
						'',
						'edubin'
					),
					number_format_i18n( $comments_number ),
					''
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => '<i class="fas fa-reply"></i> '. esc_html__( 'Reply', 'edubin' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<i class="flaticon-back" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Previous', 'edubin' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'edubin' ) . '</span><i class="flaticon-next" aria-hidden="true"></i>',
		) );

	endif; 

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'edubin' ); ?></p>
	<?php
	endif;
	comment_form();
	?>

</div><!-- #comments -->

<?php


