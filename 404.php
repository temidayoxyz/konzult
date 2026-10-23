<?php
/**
 * 404.
 *
 * @package Konzult
 */

get_header();
?>
<section class="k-404">
	<div class="k-container k-404__inner">
		<p class="k-eyebrow">
			<span class="k-eyebrow__line" aria-hidden="true"></span>
			<?php esc_html_e( 'Error 404', 'konzult' ); ?>
		</p>

		<h1 class="k-404__title"><?php esc_html_e( 'This page took a different turn.', 'konzult' ); ?></h1>
		<p class="k-404__lead"><?php esc_html_e( 'The link may be old, or the page may have moved. Start with a search — or go back to the beginning.', 'konzult' ); ?></p>

		<div class="k-404__search"><?php get_search_form(); ?></div>

		<a class="k-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to home', 'konzult' ); ?>
			<span class="k-link__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		</a>
	</div>
</section>
<?php
get_footer();
