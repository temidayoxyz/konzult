<?php
/**
 * Theme setup.
 *
 * @package Konzult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports, menus and image sizes.
 */
function konzult_setup() {
	load_theme_textdomain( 'konzult', KONZULT_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'editor-styles' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 96,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_editor_style( 'assets/css/editor.css' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu', 'konzult' ),
			'footer'  => __( 'Footer menu', 'konzult' ),
			'social'  => __( 'Social menu', 'konzult' ),
		)
	);

	add_image_size( 'konzult-card', 800, 560, true );
	add_image_size( 'konzult-wide', 1680, 940, true );
	add_image_size( 'konzult-portrait', 900, 1120, true );

	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'konzult_setup' );

/**
 * Register footer widget areas.
 */
function konzult_widgets_init() {
	for ( $column = 1; $column <= 3; $column++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer column number. */
				'name'          => sprintf( __( 'Footer column %d', 'konzult' ), $column ),
				'id'            => 'footer-' . $column,
				'description'   => __( 'Optional footer column. Leave empty to keep the default layout.', 'konzult' ),
				'before_widget' => '<div id="%1$s" class="k-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="k-widget__title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'konzult_widgets_init' );

/**
 * Body classes that describe the current layout.
 *
 * @param string[] $classes Existing classes.
 * @return string[]
 */
function konzult_body_classes( $classes ) {
	if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) ) {
		$classes[] = 'k-has-default-footer';
	}

	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'k-has-post-thumbnail';
	}

	if ( konzult_is_elementor_page() ) {
		$classes[] = 'k-built-with-elementor';
	}

	return $classes;
}
add_filter( 'body_class', 'konzult_body_classes' );

/**
 * Shorten the excerpt without breaking words.
 *
 * @return string
 */
function konzult_excerpt_more() {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'konzult_excerpt_more' );

/**
 * Give excerpts an editorial length.
 *
 * @param int $length Default length.
 * @return int
 */
function konzult_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'konzult_excerpt_length' );
