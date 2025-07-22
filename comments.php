<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Query
 * @since 1.6.5
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
			<?php
			$query_comment_count = get_comments_number();
			if ( '1' === $query_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'query' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $query_comment_count, 'comments title', 'query' ) ),
					number_format_i18n( $query_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'query' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	// Comment form with customizations
	$commenter = wp_get_current_commenter();
	$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields = array(
		'author' => sprintf(
			'<div class="comment-form-author form-group"><label for="author">%1$s%2$s</label><input id="author" name="author" type="text" class="form-control" value="%3$s" size="30" maxlength="245" %4$s /></div>',
			esc_html__( 'Name', 'query' ),
			'<span class="required">*</span>',
			esc_attr( $commenter['comment_author'] ),
			( get_option( 'require_name_email' ) ? 'required' : '' )
		),
		'email'  => sprintf(
			'<div class="comment-form-email form-group"><label for="email">%1$s%2$s</label><input id="email" name="email" type="email" class="form-control" value="%3$s" size="30" maxlength="100" aria-describedby="email-notes" %4$s /></div>',
			esc_html__( 'Email', 'query' ),
			'<span class="required">*</span>',
			esc_attr( $commenter['comment_author_email'] ),
			( get_option( 'require_name_email' ) ? 'required' : '' )
		),
		'url'    => sprintf(
			'<div class="comment-form-url form-group"><label for="url">%1$s</label><input id="url" name="url" type="url" class="form-control" value="%2$s" size="30" maxlength="200" /></div>',
			esc_html__( 'Website', 'query' ),
			esc_attr( $commenter['comment_author_url'] )
		),
		'cookies' => sprintf(
			'<div class="comment-form-cookies-consent form-check"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="form-check-input" value="yes"%1$s /><label class="form-check-label" for="wp-comment-cookies-consent">%2$s</label></div>',
			$consent,
			esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'query' )
		),
	);

	$comment_form_args = array(
		'fields'               => $fields,
		'comment_field'        => sprintf(
			'<div class="comment-form-comment form-group"><label for="comment">%1$s%2$s</label><textarea id="comment" name="comment" class="form-control" cols="45" rows="8" maxlength="65525" required="required"></textarea></div>',
			esc_html__( 'Comment', 'query' ),
			'<span class="required">*</span>'
		),
		'class_submit'         => 'btn btn-primary',
		'title_reply'          => esc_html__( 'Leave a Comment', 'query' ),
		'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'query' ),
		'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'query' ),
		'label_submit'         => esc_html__( 'Post Comment', 'query' ),
		'format'               => 'xhtml',
	);

	comment_form( $comment_form_args );
	?>

</div><!-- #comments -->
