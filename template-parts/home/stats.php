<?php
/**
 * Homepage numbers.
 *
 * @package Konzult
 */

$konzult_stats = array(
	array(
		'value'  => '92',
		'suffix' => '%',
		'label'  => __( 'client retention', 'konzult' ),
	),
	array(
		'value'  => '140',
		'suffix' => '+',
		'label'  => __( 'engagements delivered', 'konzult' ),
	),
	array(
		'value'  => '18',
		'suffix' => '',
		'label'  => __( 'years in practice', 'konzult' ),
	),
	array(
		'value'  => '4.9',
		'suffix' => '/5',
		'label'  => __( 'average client rating', 'konzult' ),
	),
);
?>
<section class="k-stats" aria-label="<?php esc_attr_e( 'Practice in numbers', 'konzult' ); ?>">
	<div class="k-container k-stats__grid">
		<?php foreach ( $konzult_stats as $konzult_stat ) : ?>
			<div class="k-stat" data-reveal>
				<span class="k-stat__value">
					<span
						data-count="<?php echo esc_attr( $konzult_stat['value'] ); ?>"
						data-suffix="<?php echo esc_attr( $konzult_stat['suffix'] ); ?>"
					><?php echo esc_html( $konzult_stat['value'] . $konzult_stat['suffix'] ); ?></span>
				</span>
				<span class="k-stat__label"><?php echo esc_html( $konzult_stat['label'] ); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
</section>
