<?php
/**
 * Page hero.
 *
 * @package Konzult
 */

$konzult_title   = isset( $args['title'] ) ? $args['title'] : get_the_title();
$konzult_eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : get_bloginfo( 'name', 'display' );
$konzult_lead    = isset( $args['lead'] ) ? $args['lead'] : '';
$konzult_meta    = isset( $args['meta'] ) ? $args['meta'] : '';
?>
<header class="k-page-hero">
	<div class="k-container">
		<p class="k-eyebrow">
			<span class="k-eyebrow__line" aria-hidden="true"></span>
			<?php echo esc_html( $konzult_eyebrow ); ?>
		</p>

		<h1 class="k-page-hero__title"><?php echo esc_html( $konzult_title ); ?></h1>

		<?php if ( $konzult_lead ) : ?>
			<p class="k-page-hero__lead"><?php echo esc_html( $konzult_lead ); ?></p>
		<?php endif; ?>

		<?php if ( $konzult_meta ) : ?>
			<div class="k-page-hero__meta"><?php echo wp_kses_post( $konzult_meta ); ?></div>
		<?php endif; ?>
	</div>
</header>
