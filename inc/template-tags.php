<?php
/**
 * Template helpers.
 *
 * @package Konzult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default values for theme options.
 *
 * @return array<string,string>
 */
function konzult_defaults() {
	return array(
		'header_cta_label' => __( 'Book a consultation', 'konzult' ),
		'header_cta_url'   => '#contact',
		'header_phone'     => '+44 20 7946 0123',
		'footer_about'     => __( 'An independent strategy practice for leadership teams who would rather make a clear decision than a comfortable one.', 'konzult' ),
		'footer_copyright' => __( 'Konzult. All rights reserved.', 'konzult' ),
		'social_linkedin'  => 'https://www.linkedin.com/',
		'social_x'         => 'https://x.com/',
		'social_instagram' => '',
		'accent_color'     => '#1E4A3A',
	);
}

/**
 * Read a theme option with a sane fallback.
 *
 * @param string $key Option key without the konzult_ prefix.
 * @return string
 */
function konzult_option( $key ) {
	$defaults = konzult_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return (string) get_theme_mod( 'konzult_' . $key, $default );
}

/**
 * Accent colour, validated.
 *
 * @return string
 */
function konzult_get_accent_color() {
	$color = konzult_option( 'accent_color' );

	return sanitize_hex_color( $color ) ? $color : '#1E4A3A';
}

/**
 * Inline SVG icon set.
 *
 * @param string $name Icon name.
 * @param int    $size Pixel size.
 * @return string
 */
function konzult_icon( $name, $size = 16 ) {
	$icons = array(
		'arrow'     => '<path d="M3.5 12.5 12.5 3.5M5.5 3.5h7v7" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="square"/>',
		'arrow-down'=> '<path d="M8 3v10M3.5 8.5 8 13l4.5-4.5" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="square"/>',
		'plus'      => '<path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.5" fill="none"/>',
		'close'     => '<path d="m3.5 3.5 9 9m0-9-9 9" stroke="currentColor" stroke-width="1.5" fill="none"/>',
		'menu'      => '<path d="M2 5h12M2 11h12" stroke="currentColor" stroke-width="1.5" fill="none"/>',
		'phone'     => '<path d="M4.2 2.5h2.1l1 2.6-1.4 1a8.8 8.8 0 0 0 4 4l1-1.4 2.6 1v2.1a1.7 1.7 0 0 1-1.9 1.7A12.6 12.6 0 0 1 2.5 4.4 1.7 1.7 0 0 1 4.2 2.5Z" stroke="currentColor" stroke-width="1.3" fill="none" stroke-linejoin="round"/>',
		'mail'      => '<rect x="2" y="3.5" width="12" height="9" rx="1" stroke="currentColor" stroke-width="1.3" fill="none"/><path d="m2.6 4.4 5.4 4 5.4-4" stroke="currentColor" stroke-width="1.3" fill="none"/>',
		'pin'       => '<path d="M8 14s5-4.2 5-8A5 5 0 0 0 3 6c0 3.8 5 8 5 8Z" stroke="currentColor" stroke-width="1.3" fill="none"/><circle cx="8" cy="6" r="1.8" stroke="currentColor" stroke-width="1.3" fill="none"/>',
		'linkedin'  => '<path d="M4 6.5H1.8V14H4V6.5ZM2.9 5.3a1.3 1.3 0 1 0 0-2.6 1.3 1.3 0 0 0 0 2.6ZM14.2 14h-2.1V9.9c0-1-.4-1.6-1.3-1.6-.8 0-1.3.5-1.3 1.6V14H7.3V6.5h2.1v1c.4-.8 1.2-1.2 2.1-1.2 1.6 0 2.7 1 2.7 3.1V14Z" fill="currentColor"/>',
		'x'         => '<path d="M12.6 2h2.3L10 8.1 15.8 16h-4.5L7.5 11 3.3 16H1l5.3-6.5L1 2h4.6l3.4 4.6L12.6 2Zm-.8 12.6h1.3L4.8 3.3H3.4l8.4 11.3Z" fill="currentColor"/>',
		'instagram' => '<rect x="1.8" y="1.8" width="12.4" height="12.4" rx="3.6" stroke="currentColor" stroke-width="1.3" fill="none"/><circle cx="8" cy="8" r="3" stroke="currentColor" stroke-width="1.3" fill="none"/><circle cx="12" cy="4" r=".9" fill="currentColor"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg class="k-icon k-icon--%1$s" width="%2$d" height="%2$d" viewBox="0 0 16 16" aria-hidden="true" focusable="false">%3$s</svg>',
		esc_attr( $name ),
		(int) $size,
		$icons[ $name ] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static, trusted markup.
	);
}

/**
 * Site branding: custom logo when present, wordmark otherwise.
 */
function konzult_site_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	$name = get_bloginfo( 'name', 'display' );
	?>
	<a class="k-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<span class="k-logo__mark" aria-hidden="true">
			<svg width="26" height="26" viewBox="0 0 26 26" fill="none" focusable="false">
				<rect x="1.25" y="1.25" width="23.5" height="23.5" rx="1.5" stroke="currentColor" stroke-width="1.4"/>
				<path d="M1.5 24.5 24.5 1.5" stroke="currentColor" stroke-width="1.4"/>
				<circle cx="19.2" cy="6.8" r="2.1" fill="currentColor"/>
			</svg>
		</span>
		<span class="k-logo__text"><?php echo esc_html( $name ); ?></span>
	</a>
	<?php
}

