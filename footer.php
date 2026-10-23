<?php
/**
 * Footer.
 *
 * @package Konzult
 */

$konzult_about  = konzult_option( 'footer_about' );
$konzult_phone  = konzult_option( 'header_phone' );
$konzult_email  = apply_filters( 'konzult_contact_email', 'hello@konzult.studio' );
$konzult_social = konzult_social_profiles();
?>
</main>

<footer class="k-footer">
	<div class="k-container">
		<div class="k-footer__grid">
			<div class="k-footer__brand">
				<?php konzult_site_logo(); ?>
				<p class="k-footer__about"><?php echo wp_kses_post( $konzult_about ); ?></p>

				<?php if ( $konzult_social ) : ?>
					<ul class="k-social">
						<?php foreach ( $konzult_social as $profile ) : ?>
							<li>
								<a href="<?php echo esc_url( $profile['url'] ); ?>" target="_blank" rel="noopener noreferrer">
									<?php echo konzult_icon( $profile['icon'], 18 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									<span class="screen-reader-text"><?php echo esc_html( $profile['label'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<?php if ( konzult_has_footer_widgets() ) : ?>
				<div class="k-footer__widgets">
					<?php for ( $column = 1; $column <= 3; $column++ ) : ?>
						<?php if ( is_active_sidebar( 'footer-' . $column ) ) : ?>
							<div class="k-footer__column">
								<?php dynamic_sidebar( 'footer-' . $column ); ?>
							</div>
						<?php endif; ?>
					<?php endfor; ?>
				</div>
			<?php else : ?>
				<div class="k-footer__columns">
					<div class="k-footer__column">
						<h2 class="k-footer__title"><?php esc_html_e( 'Practice', 'konzult' ); ?></h2>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => false,
								'menu_class'     => 'k-footer__list',
								'depth'          => 1,
								'fallback_cb'    => 'konzult_footer_menu_fallback',
							)
						);
						?>
					</div>

					<div class="k-footer__column">
						<h2 class="k-footer__title"><?php esc_html_e( 'Contact', 'konzult' ); ?></h2>
						<ul class="k-footer__list">
							<li><a href="<?php echo esc_url( 'mailto:' . $konzult_email ); ?>"><?php echo esc_html( $konzult_email ); ?></a></li>
							<?php if ( $konzult_phone ) : ?>
								<li><a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $konzult_phone ) ); ?>"><?php echo esc_html( $konzult_phone ); ?></a></li>
							<?php endif; ?>
							<li><?php esc_html_e( '18 Bedford Row, London WC1R', 'konzult' ); ?></li>
						</ul>
					</div>

					<div class="k-footer__column">
						<h2 class="k-footer__title"><?php esc_html_e( 'Studio', 'konzult' ); ?></h2>
						<ul class="k-footer__list">
							<li><?php esc_html_e( 'London · Berlin · New York', 'konzult' ); ?></li>
							<li><?php esc_html_e( 'Mon–Fri, 09:00–18:00', 'konzult' ); ?></li>
							<li><?php esc_html_e( 'New engagements: Q3', 'konzult' ); ?></li>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</div>

		