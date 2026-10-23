<?php
/**
 * Header.
 *
 * @package Konzult
 */

$konzult_cta_url   = konzult_option( 'header_cta_url' );
$konzult_cta_label = konzult_option( 'header_cta_label' );
$konzult_phone     = konzult_option( 'header_phone' );
$konzult_phone_uri = preg_replace( '/[^0-9+]/', '', $konzult_phone );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="k-skip" href="#content"><?php esc_html_e( 'Skip to content', 'konzult' ); ?></a>

<header class="k-header" data-k-header>
	<div class="k-header__inner k-container">
		<div class="k-header__brand">
			<?php konzult_site_logo(); ?>
		</div>

		<nav class="k-nav" aria-label="<?php esc_attr_e( 'Primary', 'konzult' ); ?>">
			<?php konzult_primary_menu(); ?>
		</nav>

		<div class="k-header__actions">
			<?php if ( $konzult_phone ) : ?>
				<a class="k-header__phone" href="<?php echo esc_url( 'tel:' . $konzult_phone_uri ); ?>">
					<?php echo konzult_icon( 'phone', 15 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<span><?php echo esc_html( $konzult_phone ); ?></span>
				</a>
			<?php endif; ?>

			<a class="k-btn k-header__cta" href="<?php echo esc_url( $konzult_cta_url ); ?>">
				<span class="k-btn__label"><?php echo esc_html( $konzult_cta_label ); ?></span>
				<span class="k-btn__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			</a>

			<button class="k-nav-toggle" type="button" aria-expanded="false" aria-controls="k-drawer" data-k-nav-toggle>
				<span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'konzult' ); ?></span>
				<span class="k-nav-toggle__box" aria-hidden="true">
					<span></span><span></span>
				</span>
			</button>
		</div>
	</div>
</header>

<dialog class="k-drawer" id="k-drawer" aria-label="<?php esc_attr_e( 'Menu', 'konzult' ); ?>">
	<div class="k-drawer__head k-container">
		<?php konzult_site_logo(); ?>
		<button class="k-drawer__close" type="button" data-k-drawer-close>
			<span class="screen-reader-text"><?php esc_html_e( 'Close menu', 'konzult' ); ?></span>
			<?php echo konzult_icon( 'close', 20 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</button>
	</div>

	<nav class="k-drawer__nav" aria-label="<?php esc_attr_e( 'Mobile', 'konzult' ); ?>">
		<?php konzult_primary_menu(); ?>
	</nav>

	<div class="k-drawer__foot k-container">
		<a class="k-btn" href="<?php echo esc_url( $konzult_cta_url ); ?>">
			<span class="k-btn__label"><?php echo esc_html( $konzult_cta_label ); ?></span>
			<span class="k-btn__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		</a>
		<?php if ( $konzult_phone ) : ?>
			<a class="k-drawer__phone" href="<?php echo esc_url( 'tel:' . $konzult_phone_uri ); ?>"><?php echo esc_html( $konzult_phone ); ?></a>
		<?php endif; ?>
	</div>
</dialog>

<main id="content" class="k-main">
