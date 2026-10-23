<?php
/**
 * Blog index.
 *
 * @package Konzult
 */

get_header();

$konzult_blog_id = (int) get_option( 'page_for_posts' );
$konzult_title   = $konzult_blog_id ? get_the_title( $konzult_blog_id ) : __( 'Insights', 'konzult' );

get_template_part(
	'template-parts/content/page-hero',
	null,
	array(
		'eyebrow' => __( 'Journal', 'konzult' ),
		'title'   => $konzult_title,
		'lead'    => __( 'Short essays on strategy, operating models and the unglamorous work of making decisions stick.', 'konzult' ),
	)
);

get_template_part( 'template-parts/content/loop' );

get_footer();
