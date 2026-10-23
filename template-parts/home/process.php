<?php
/**
 * Homepage process.
 *
 * @package Konzult
 */

$konzult_steps = array(
	array(
		'num'   => '01',
		'title' => __( 'Diagnose', 'konzult' ),
		'desc'  => __( 'Two weeks of interviews, data and honest questions. We tell you what we find — not what you hoped to hear.', 'konzult' ),
		'time'  => __( 'Weeks 1–2', 'konzult' ),
	),
	array(
		'num'   => '02',
		'title' => __( 'Design', 'konzult' ),
		'desc'  => __( 'A short list of real options, sized and stress-tested. Then one plan with owners, milestones and a definition of done.', 'konzult' ),
		'time'  => __( 'Weeks 3–6', 'konzult' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Deliver', 'konzult' ),
		'desc'  => __( 'We stay through execution — in the room, on the ground, accountable alongside your team.', 'konzult' ),
		'time'  => __( 'From week 7', 'konzult' ),
	),
);
?>
<section class="k-section k-process" id="approach">
	<div class="k-container">
		<header class="k-section__head">
			<p class="k-eyebrow">
				<span class="k-eyebrow__index">04</span>
				<span class="k-eyebrow__line" aria-hidden="true"></span>
				<?php esc_html_e( 'How we work', 'konzult' ); ?>
			</p>
			<div class="k-section__intro">
				<h2 class="k-h2"><?php esc_html_e( 'A short, honest process.', 'konzult' ); ?></h2>
				<p class="k-lead"><?php esc_html_e( 'Three phases, no theatre. You will always know what we are doing, why it matters, and what happens next.', 'konzult' ); ?></p>
			</div>
		</header>

		<ol class="k-process__grid">
			<?php foreach ( $konzult_steps as $konzult_step ) : ?>
				<li class="k-step" data-reveal>
					<span class="k-step__num"><?php echo esc_html( $konzult_step['num'] ); ?></span>
					<h3 class="k-step__title"><?php echo esc_html( $konzult_step['title'] ); ?></h3>
					<p class="k-step__desc"><?php echo esc_html( $konzult_step['desc'] ); ?></p>
					<span class="k-step__time"><?php echo esc_html( $konzult_step['time'] ); ?></span>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
