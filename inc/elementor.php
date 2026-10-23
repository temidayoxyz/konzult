<?php
/**
 * Elementor integration.
 *
 * The theme works with free Elementor out of the box: pages built with
 * Elementor render inside the theme header and footer, and Elementor's own
 * Canvas / Full Width page templates are available for landing pages.
 *
 * Theme Builder locations (header, footer, single, archive) are a Pro feature.
 * When Pro is active we register the core locations so buyers can take over
 * the chrome without touching PHP.
 *
 * @package Konzult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether a post was built with Elementor.
 *
 * @param int $post_id Optional post ID.
 * @return bool
 */
function konzult_is_elementor_page( $post_id = 0 ) {
	if ( ! did_action( 'elementor/loaded' ) || ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}

	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();

	if ( ! $post_id ) {
		return false;
	}

	$document = \Elementor\Plugin::$instance->documents->get( $post_id );

	if ( ! $document || ! $document->is_built_with_elementor() ) {
		return false;
	}

	// An Elementor page that was switched on but never saved has no data.
	return (bool) get_post_meta( $post_id, '_elementor_data', true );
}

/**
 * Register Elementor Theme Builder locations when Pro is available.
 *
 * @param object $manager Elementor locations manager.
 */
function konzult_register_elementor_locations( $manager ) {
	if ( is_object( $manager ) && method_exists( $manager, 'register_all_core_location' ) ) {
		$manager->register_all_core_location();
	}
}
add_action( 'elementor/theme/register_locations', 'konzult_register_elementor_locations' );

/**
 * Keep Elementor's editor preview at the same measure as the theme.
 */
function konzult_elementor_content_width() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	add_filter(
		'elementor/frontend/print_google_fonts',
		'__return_false'
	);
}
add_action( 'template_redirect', 'konzult_elementor_content_width' );
