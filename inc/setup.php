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

