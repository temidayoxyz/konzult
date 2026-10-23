<?php
/**
 * Homepage services.
 *
 * @package Konzult
 */

$konzult_services = array(
	array(
		'index' => '01',
		'title' => __( 'Growth strategy', 'konzult' ),
		'desc'  => __( 'Where to play, how to win, and what to stop doing. Market mapping, portfolio choices and a plan your team can defend.', 'konzult' ),
		'meta'  => __( '6–12 weeks', 'konzult' ),
	),
	array(
		'index' => '02',
		'title' => __( 'Operating model', 'konzult' ),
		'desc'  => __( 'Structure, decision rights and ways of working that make the strategy survive contact with Monday morning.', 'konzult' ),
		'meta'  => __( '8–16 weeks', 'konzult' ),
	),
	array(
		'index' => '03',
		'title' => __( 'Digital & data', 'konzult' ),
		'desc'  => __( 'Practical transformation — the systems, data foundations and automation that remove friction instead of adding process.', 'konzult' ),
		'meta'  => __( '3–9 months', 'konzult' ),
	),
	array(
		'index' => '04',
		'title' => __( 'Leadership advisory', 'konzult' ),
		'desc'  => __( 'Counsel for founders, boards and executive teams through transitions, succession and the moments that define a company.', 'konzult' ),
		'meta'  => __( 'Ongoing', 'konzult' ),
	),
);
?>
<section class="k-section k-services" id="services">
	<div class="k-container">
		<header class="k-section__head">
			<p class="k-eyebrow">
				<span class="k-eyebrow__index">03</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'What we do', 'konzult' ); ?>
			</p>
			<div class="k-section__intro">
				<h2 class="k-h2"><?php esc_html_e( 'Four ways we help.', 'konzult' ); ?></h2>
				<p class="k-lead"><?php esc_html_e( 'Every engagement is scoped around one decision. We start narrow, stay senior, and leave your team stronger than we found it.', 'konzult' ); ?></p>
			</div>
		</header>

		<ol class="k-services__list">
			<?php foreach ( $konzult_services as $konzult_service ) : ?>
				<li class="k-service">
					<a class="k-service__link" href="#contact" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: service name. */ __( 'Discuss %s', 'konzult' ), $konzult_service['title'] ) ); ?>">
						<span class="k-service__index"><?php echo esc_html( $konzult_service['index'] ); ?></span>
						<span class="k-service__main">
							<span class="k-service__title"><?php echo esc_html( $konzult_service['title'] ); ?></span>
							<span class="k-service__desc"><?php echo esc_html( $konzult_service['desc'] ); ?></span>
						</span>
						<span class="k-service__meta"><?php echo esc_html( $konzult_service['meta'] ); ?></span>
						<span class="k-service__arrow" aria-hidden="true"><?php echo konzult_icon( 'arrow', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
