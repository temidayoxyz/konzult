<?php
/**
 * Archive.
 *
 * @package Konzult
 */

get_header();

$konzult_title = get_the_archive_title();
$konzult_title = preg_replace( '/^[^:]+:\s*/u', '', $konzult_title );

get_template_part(
	'template-parts/content/page-hero',
	null,
	array(
		'eyebrow' => __( 'Archive', 'konzult' ),
		'title'   => $konzult_title,
		'lead'    => wp_strip_all_tags( get_the_archive_description() ),
	)
);

get_template_part( 'template-parts/content/loop' );

get_footer();
