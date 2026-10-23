<?php
/**
 * Search results.
 *
 * @package Konzult
 */

get_header();

get_template_part(
	'template-parts/content/page-hero',
	null,
	array(
		'eyebrow' => __( 'Search', 'konzult' ),
		/* translators: %s: search query. */
		'title'   => sprintf( __( 'Results for “%s”', 'konzult' ), get_search_query() ),
	)
);
?>

<div class="k-container k-search-wrap">
	<?php get_search_form(); ?>
</div>

<?php
get_template_part( 'template-parts/content/loop' );

get_footer();
