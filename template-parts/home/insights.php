<?php
/**
 * Homepage insights.
 *
 * @package Konzult
 */

$konzult_posts = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);

if ( ! $konzult_posts->have_posts() ) {
	wp_reset_postdata();
	return;
}
?>
<section class="k-section k-insights" id="insights">
	<div class="k-container">
		<header class="k-section__head">
			<p class="k-eyebrow">
				<span class="k-eyebrow__index">05</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'Insights', 'konzult' ); ?>
			</p>
			<div class="k-section__intro">
				<h2 class="k-h2"><?php esc_html_e( 'Notes on the work.', 'konzult' ); ?></h2>
				<p class="k-lead"><?php esc_html_e( 'Short essays on strategy, operating models and the unglamorous work of making decisions stick.', 'konzult' ); ?></p>
				<a class="k-link" href="<?php echo esc_url( (string) get_post_type_archive_link( 'post' ) ); ?>">
					<?php esc_html_e( 'All insights', 'konzult' ); ?>
					<span class="k-link__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
			</div>
		</header>

		<div class="k-cards">
			<?php
			while ( $konzult_posts->have_posts() ) :
				$konzult_posts->the_post();
				get_template_part( 'template-parts/content/card' );
			endwhile;
			?>
		</div>
	</div>
</section>
<?php
wp_reset_postdata();
