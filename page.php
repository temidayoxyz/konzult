<?php
/**
 * Single page.
 *
 * @package Konzult
 */

get_header();

while ( have_posts() ) :
	the_post();

	if ( konzult_is_elementor_page() ) :
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-elementor-page' ); ?>>
			<?php the_content(); ?>
		</article>
		<?php
	else :
		get_template_part(
			'template-parts/content/page-hero',
			null,
			array(
				'eyebrow' => get_bloginfo( 'name', 'display' ),
				'title'   => get_the_title(),
			)
		);
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-entry k-container k-container--narrow k-container--start' ); ?>>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="k-entry__media">
					<?php the_post_thumbnail( 'konzult-wide', array( 'class' => 'k-entry__image' ) ); ?>
				</figure>
			<?php endif; ?>

			<div class="k-entry__content">
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
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endif;
endwhile;

get_footer();
