<?php
/**
 * Homepage hero.
 *
 * @package Konzult
 */

$konzult_cta_url = konzult_option( 'header_cta_url' );
?>
<section class="k-hero" id="top">
	<div class="k-container k-hero__grid">
		<div class="k-hero__content">
			<p class="k-eyebrow" data-reveal>
				<span class="k-eyebrow__index">01</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'Independent strategy consultancy', 'konzult' ); ?>
			</p>

			<h1 class="k-hero__title" data-reveal style="--i:1">
				<?php
				echo wp_kses(
					__( 'Clarity for the decisions that <em>matter</em>.', 'konzult' ),
					array( 'em' => array() )
				);
				?>
			</h1>

			<p class="k-hero__lead" data-reveal style="--i:2">
				<?php esc_html_e( 'We help leadership teams find the signal in the noise, choose a direction, and build the operating discipline to act on it. Senior counsel — no layers, no theatre.', 'konzult' ); ?>
			</p>

			<div class="k-hero__actions" data-reveal style="--i:3">
				<a class="k-btn" href="<?php echo esc_url( $konzult_cta_url ); ?>">
					<span class="k-btn__label"><?php echo esc_html( konzult_option( 'header_cta_label' ) ); ?></span>
					<span class="k-btn__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
				<a class="k-link" href="#services">
					<?php esc_html_e( 'Explore the practice', 'konzult' ); ?>
					<span class="k-link__icon" aria-hidden="true"><?php echo konzult_icon( 'arrow-down', 14 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				</a>
			</div>

			<ul class="k-hero__facts" data-reveal style="--i:4">
				<li><?php esc_html_e( 'Est. 2007', 'konzult' ); ?></li>
				<li><?php esc_html_e( 'London · Berlin · New York', 'konzult' ); ?></li>
				<li><?php esc_html_e( 'Senior-only teams', 'konzult' ); ?></li>
			</ul>
		</div>

		<div class="k-hero__visual" data-reveal style="--i:2">
			<figure class="k-hero__figure" data-k-parallax>
				<img
					src="<?php echo esc_url( KONZULT_URI . '/assets/img/hero-arches.svg' ); ?>"
					width="800"
					height="1000"
					alt=""
					fetchpriority="high"
					decoding="async"
				>
				<figcaption class="k-hero__caption">
					<span><?php esc_html_e( 'Fig. 01', 'konzult' ); ?></span>
					<span><?php esc_html_e( 'Clarity is a structure, not a slogan.', 'konzult' ); ?></span>
				</figcaption>
			</figure>

			<div class="k-float-stat">
				<span class="k-float-stat__value">92<span>%</span></span>
				<span class="k-float-stat__label"><?php esc_html_e( 'client retention across 140+ engagements', 'konzult' ); ?></span>
			</div>
		</div>
	</div>
</section>
