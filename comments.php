<?php
/**
 * Comments.
 *
 * @package Konzult
 */

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="k-comments k-container k-container--narrow k-container--start">
	<?php if ( have_comments() ) : ?>
		<h2 class="k-comments__title">
			<?php
			$konzult_count = get_comments_number();
			printf(
				/* translators: %s: comment count. */
				esc_html( _n( '%s comment', '%s comments', $konzult_count, 'konzult' ) ),
				esc_html( number_format_i18n( $konzult_count ) )
			);
			?>
		</h2>

		<ol class="k-comments__list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => esc_html__( 'Older comments', 'konzult' ),
				'next_text' => esc_html__( 'Newer comments', 'konzult' ),
			)
		);
		?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="k-comments__closed"><?php esc_html_e( 'Comments are closed.', 'konzult' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'        => __( 'Join the conversation', 'konzult' ),
			'title_reply_before' => '<h2 id="reply-title" class="k-comments__title">',
			'title_reply_after'  => '</h2>',
			'class_submit'       => 'k-btn',
			'label_submit'       => __( 'Post comment', 'konzult' ),
		)
	);
	?>
</section>
