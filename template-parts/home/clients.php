<?php
/**
 * Homepage client marquee.
 *
 * @package Konzult
 */

$konzult_clients = array(
	'Northwind',
	'Meridian Group',
	'Kestrel',
	'Alba & Co',
	'Vantage',
	'Ossa',
	'Lumen Partners',
	'Halden',
);
?>
<section class="k-clients" aria-label="<?php esc_attr_e( 'Selected clients', 'konzult' ); ?>">
	<div class="k-container">
		<p class="k-clients__label"><?php esc_html_e( 'Trusted by leadership teams at', 'konzult' ); ?></p>
	</div>

	<div class="k-marquee">
		<div class="k-marquee__track">
			<?php for ( $konzult_pass = 0; $konzult_pass < 2; $konzult_pass++ ) : ?>
				<ul class="k-marquee__group"<?php echo 1 === $konzult_pass ? ' aria-hidden="true"' : ''; ?>>
					<?php foreach ( $konzult_clients as $konzult_client ) : ?>
						<li class="k-marquee__item"><?php echo esc_html( $konzult_client ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endfor; ?>
		</div>
	</div>
</section>
