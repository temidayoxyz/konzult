<?php
/**
 * Konzult functions and definitions.
 *
 * @package Konzult
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KONZULT_VERSION', '1.0.0' );
define( 'KONZULT_DIR', get_template_directory() );
define( 'KONZULT_URI', get_template_directory_uri() );

require_once KONZULT_DIR . '/inc/setup.php';
require_once KONZULT_DIR . '/inc/enqueue.php';
require_once KONZULT_DIR . '/inc/template-tags.php';
require_once KONZULT_DIR . '/inc/customizer.php';
require_once KONZULT_DIR . '/inc/elementor.php';
