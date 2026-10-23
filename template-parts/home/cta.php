<?php
/**
 * Homepage call to action.
 *
 * @package Konzult
 */

$konzult_email  = apply_filters( 'konzult_contact_email', 'hello@konzult.studio' );
$konzult_phone  = konzult_option( 'header_phone' );
$konzult_mailto = 'mailto:' . $konzult_email . '?subject=' . rawurlencode( __( 'Consultation request', 'konzult' ) );
?>
<section class="k-cta" id="contact">
	<div class="k-container k-cta__inner">
		<div class="k-cta__content">
			<p class="k-eyebrow k-eyebrow--light">
				<span class="k-eyebrow__index">06</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'Next step', 'konzult' ); ?>
			</p>

			<h2 class="k-cta__title" data-reveal>
				<?php
				echo wp_kses(
					__( 'Let’s find the <em>next right move</em>.', 'konzult' ),
					array( 'em' => array() )
				);
				?>
			</h2>

			<p class="k-cta__lead" data-reveal style="--i:1">
				<?php esc_html_e( 'A thirty-minute conversation, no deck required. We’ll tell you honestly whether we can help — and what we would do first.', 'konzult' ); ?>
			</p>

			<div class="k-cta__actions" data-reveal style="--i:2">
				<a class="k-btn k-btn--light" href="<?php echo esc_url( $konzult_mailto ); ?>">
					<span class="k-btn__label"><?php esc_html_e( 'Book a consultation', 'konzult' ); ?></span>
					<span class="k-btn__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
				<a class="k-link k-link--light" href="<?php echo esc_url( 'mailto:' . $konzult_email ); ?>">
					<?php echo esc_html( $konzult_email ); ?>
				</a>
			</div>

			<?php if ( $konzult_phone ) : ?>
				<p class="k-cta__phone">
					<?php esc_html_e( 'Or call', 'konzult' ); ?>
					<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $konzult_phone ) ); ?>"><?php echo esc_html( $konzult_phone ); ?></a>
				</p>
			<?php endif; ?>
		</div>

		<div class="k-cta__glyph" aria-hidden="true">
			<svg viewBox="0 0 320 320" fill="none" focusable="false">
				<rect x="1" y="1" width="318" height="318" rx="2" stroke="currentColor" stroke-width="1"/>
				<path d="M2 318 318 2" stroke="currentColor" stroke-width="1"/>
				<circle cx="248" cy="72" r="34" stroke="currentColor" stroke-width="1"/>
			</svg>
		</div>
	</div>
</section>
