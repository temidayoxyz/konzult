<?php
/**
 * Single post.
 *
 * @package Konzult
 */

get_header();

while ( have_posts() ) :
	the_post();

	$konzult_cats = get_the_category();
	$konzult_cat  = $konzult_cats ? $konzult_cats[0]->name : __( 'Insight', 'konzult' );

	get_template_part(
		'template-parts/content/page-hero',
		null,
		array(
			'eyebrow' => $konzult_cat,
			'title'   => get_the_title(),
			'meta'    => sprintf(
				'<div class="k-meta"><time datetime="%1$s">%2$s</time><span class="k-meta__sep" aria-hidden="true"></span><span>%3$s</span></div>',
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() ),
				esc_html( konzult_reading_time() )
			),
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

