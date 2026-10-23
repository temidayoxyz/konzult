<?php
/**
 * Template Name: Full width
 * Description: A full-width canvas for block editor layouts. Elementor's own Full Width template is also available.
 *
 * @package Konzult
 */

get_header();

while ( have_posts() ) :
	the_post();

	if ( ! konzult_is_elementor_page() ) {
		get_template_part(
			'template-parts/content/page-hero',
			null,
			array(
				'eyebrow' => get_bloginfo( 'name', 'display' ),
				'title'   => get_the_title(),
			)
		);
	}
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-entry k-entry--full' ); ?>>
		<div class="k-container k-container--wide k-entry__content">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<nav class="k-page-links">',
					'after'  => '</nav>',
				)
			);
			?>
		</div>
	</article>
	<?php
endwhile;

get_footer();
