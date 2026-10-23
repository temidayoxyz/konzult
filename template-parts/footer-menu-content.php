<?php
/**
 * Default footer menu.
 *
 * @package Konzult
 */
?>
<ul class="k-footer__list">
	<?php
	$konzult_home  = home_url( '/' );
	$konzult_items = array(
		__( 'Services', 'konzult' ) => $konzult_home . '#services',
		__( 'Approach', 'konzult' ) => $konzult_home . '#approach',
		__( 'About', 'konzult' )    => $konzult_home . '#about',
		__( 'Insights', 'konzult' ) => $konzult_home . '#insights',
		__( 'Contact', 'konzult' )  => $konzult_home . '#contact',
	);

	foreach ( $konzult_items as $konzult_label => $konzult_url ) :
		?>
		<li><a href="<?php echo esc_url( $konzult_url ); ?>"><?php echo esc_html( $konzult_label ); ?></a></li>
	<?php endforeach; ?>
</ul>
