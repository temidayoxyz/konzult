<?php
/**
 * Empty state.
 *
 * @package Konzult
 */
?>
<div class="k-empty">
	<p class="k-eyebrow"><?php esc_html_e( 'Nothing found', 'konzult' ); ?></p>
	<h2 class="k-h2"><?php esc_html_e( 'That page isn’t here.', 'konzult' ); ?></h2>
	<p class="k-lead"><?php esc_html_e( 'Try a different search, or head back to the homepage.', 'konzult' ); ?></p>
	<?php get_search_form(); ?>
	<a class="k-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php esc_html_e( 'Back to home', 'konzult' ); ?>
		<span class="k-link__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	</a>
</div>
