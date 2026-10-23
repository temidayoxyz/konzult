<?php
/**
 * Assets.
 *
 * @package Konzult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Resolve an asset version from its modification time.
 *
 * @param string $relative Path relative to the theme root.
 * @return string
 */
function konzult_asset_version( $relative ) {
	$path = KONZULT_DIR . '/' . ltrim( $relative, '/' );

	return file_exists( $path ) ? (string) filemtime( $path ) : KONZULT_VERSION;
}

/**
 * Enqueue the design system and motion layer.
 */
function konzult_scripts() {
	wp_enqueue_style(
		'konzult-style',
		KONZULT_URI . '/assets/css/main.css',
		array(),
		konzult_asset_version( 'assets/css/main.css' )
	);

	wp_enqueue_script(
		'konzult-main',
		KONZULT_URI . '/assets/js/main.js',
		array(),
		konzult_asset_version( 'assets/js/main.js' ),
		true
	);
	wp_script_add_data( 'konzult-main', 'strategy', 'defer' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'konzult_scripts' );

/**
 * Print the accent colour as a custom property so buyers can rebrand in one place.
 */
function konzult_accent_css() {
	$accent = konzult_get_accent_color();
	if ( ! $accent ) {
		return;
	}

	printf(
		'<style id="konzult-accent">:root{--k-accent:%1$s;--k-accent-ink:%2$s;}</style>' . "\n",
		esc_attr( $accent ),
		esc_attr( konzult_darken_hex( $accent, 22 ) )
	);
}
add_action( 'wp_head', 'konzult_accent_css', 5 );

/**
 * Preload the two typefaces that paint above the fold.
 */
function konzult_preload_fonts() {
	$fonts = array(
		'assets/fonts/instrument-serif.woff2',
		'assets/fonts/inter-var.woff2',
	);

	foreach ( $fonts as $font ) {
		printf(
			'<link rel="preload" href="%1$s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( KONZULT_URI . '/' . $font )
		);
	}
}
add_action( 'wp_head', 'konzult_preload_fonts', 2 );

/**
 * Add a tiny class to <html> before paint so reveal animations never flash.
 */
function konzult_js_flag() {
	echo '<script>document.documentElement.classList.add("k-js");</script>' . "\n";
}
add_action( 'wp_head', 'konzult_js_flag', 1 );

/**
 * Darken a hex colour by a percentage. Used for hover states.
 *
 * @param string $hex     Hex colour.
 * @param int    $percent Amount to darken.
 * @return string
 */
function konzult_darken_hex( $hex, $percent = 20 ) {
	$hex = ltrim( (string) $hex, '#' );

	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}

	if ( 6 !== strlen( $hex ) || ! ctype_xdigit( $hex ) ) {
		return '#143328';
	}

	$steps = array( 0, 2, 4 );
	$out   = '#';

	foreach ( $steps as $step ) {
		$channel = hexdec( substr( $hex, $step, 2 ) );
		$channel = max( 0, min( 255, (int) round( $channel * ( 1 - ( $percent / 100 ) ) ) ) );
		$out    .= str_pad( dechex( $channel ), 2, '0', STR_PAD_LEFT );
	}

	return $out;
}
