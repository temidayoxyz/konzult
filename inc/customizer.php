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

