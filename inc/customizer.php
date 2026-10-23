<?php
/**
 * Customizer options.
 *
 * @package Konzult
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme options.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function konzult_customize_register( $wp_customize ) {
	$defaults = konzult_defaults();

	$wp_customize->add_panel(
		'konzult_options',
		array(
			'title'       => __( 'Konzult options', 'konzult' ),
			'description' => __( 'Brand, header and footer details for this theme.', 'konzult' ),
			'priority'    => 25,
		)
	);

	// Header.
	$wp_customize->add_section(
		'konzult_header',
		array(
			'title' => __( 'Header', 'konzult' ),
			'panel' => 'konzult_options',
		)
	);

	$wp_customize->add_setting(
		'konzult_header_cta_label',
		array(
			'default'           => $defaults['header_cta_label'],
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'konzult_header_cta_label',
		array(
			'label'   => __( 'Button label', 'konzult' ),
			'section' => 'konzult_header',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'konzult_header_cta_url',
		array(
			'default'           => $defaults['header_cta_url'],
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'konzult_header_cta_url',
		array(
			'label'       => __( 'Button link', 'konzult' ),
			'description' => __( 'Use #contact to scroll to the closing call to action, or paste a full URL.', 'konzult' ),
			'section'     => 'konzult_header',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'konzult_header_phone',
		array(
			'default'           => $defaults['header_phone'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'konzult_header_phone',
		array(
			'label'       => __( 'Phone number', 'konzult' ),
			'description' => __( 'Shown beside the button on large screens. Leave empty to hide.', 'konzult' ),
			'section'     => 'konzult_header',
			'type'        => 'text',
		)
	);

	// Footer.
	$wp_customize->add_section(
		'konzult_footer',
		array(
			'title' => __( 'Footer', 'konzult' ),
			'panel' => 'konzult_options',
		)
	);

	$wp_customize->add_setting(
		'konzult_footer_about',
		array(
			'default'           => $defaults['footer_about'],
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'konzult_footer_about',
		array(
			'label'   => __( 'Short description', 'konzult' ),
			'section' => 'konzult_footer',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'konzult_footer_copyright',
		array(
			'default'           => $defaults['footer_copyright'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'konzult_footer_copyright',
		array(
			'label'   => __( 'Copyright text', 'konzult' ),
			'section' => 'konzult_footer',
			'type'    => 'text',
		)
	);

	foreach ( array( 'linkedin', 'x', 'instagram' ) as $network ) {
		$wp_customize->add_setting(
			'konzult_social_' . $network,
			array(
				'default'           => $defaults[ 'social_' . $network ],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			'konzult_social_' . $network,
			array(
				/* translators: %s: social network name. */
				'label'   => sprintf( __( '%s URL', 'konzult' ), ucfirst( $network ) ),
				'section' => 'konzult_footer',
				'type'    => 'url',
			)
		);
	}

	// Brand.
	$wp_customize->add_section(
		'konzult_brand',
		array(
			'title'       => __( 'Brand colour', 'konzult' ),
			'description' => __( 'Used for links, italics and small accents. The rest of the palette stays neutral on purpose.', 'konzult' ),
			'panel'       => 'konzult_options',
		)
	);

	$wp_customize->add_setting(
		'konzult_accent_color',
		array(
			'default'           => $defaults['accent_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'konzult_accent_color',
			array(
				'label'   => __( 'Accent colour', 'konzult' ),
				'section' => 'konzult_brand',
			)
		)
	);

	// Selective refresh for the button label.
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'konzult_header_cta_label',
			array(
				'selector'        => '.k-header__cta .k-btn__label',
				'render_callback' => function () {
					return esc_html( konzult_option( 'header_cta_label' ) );
				},
			)
		);
	}
}
add_action( 'customize_register', 'konzult_customize_register' );
