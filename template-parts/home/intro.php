<?php
/**
 * Homepage point of view.
 *
 * @package Konzult
 */
?>
<section class="k-section k-intro" id="about">
	<div class="k-container k-intro__grid">
		<div class="k-intro__aside">
			<p class="k-eyebrow">
				<span class="k-eyebrow__index">02</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'Point of view', 'konzult' ); ?>
			</p>
			<p class="k-intro__signature"><?php esc_html_e( 'Konzult — a practice, not a platform.', 'konzult' ); ?></p>
		</div>

		<div class="k-intro__body">
			<h2 class="k-intro__statement" data-reveal>
				<?php
				echo wp_kses(
					__( 'Most strategies don’t fail in the boardroom. They fail in the hallway — in the thousand small decisions that follow.', 'konzult' ),
					array( 'em' => array() )
				);
				?>
			</h2>

			<div class="k-intro__columns" data-reveal style="--i:1">
				<p><?php esc_html_e( 'So we do two things unusually well. We make the choice clear enough to defend, and we stay close enough to make sure it survives contact with Monday morning.', 'konzult' ); ?></p>
				<p><?php esc_html_e( 'No associate pyramid. No seventy-slide reveal. A small senior team, a short list of real options, and a plan your people can actually run without us in the room.', 'konzult' ); ?></p>
			</div>

			<ul class="k-principles" data-reveal style="--i:2">
				<li>
					<span class="k-principles__num">01</span>
					<span class="k-principles__text"><?php esc_html_e( 'Senior people only. The person you meet is the person who does the work.', 'konzult' ); ?></span>
				</li>
				<li>
					<span class="k-principles__num">02</span>
					<span class="k-principles__text"><?php esc_html_e( 'Plain language. If it needs a glossary, it isn’t a strategy.', 'konzult' ); ?></span>
				</li>
				<li>
					<span class="k-principles__num">03</span>
					<span class="k-principles__text"><?php esc_html_e( 'Skin in the game. We stay accountable for outcomes, not slide counts.', 'konzult' ); ?></span>
				</li>
			</ul>
		</div>
	</div>
</section>
