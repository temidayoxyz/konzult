<?php
/**
 * Post card.
 *
 * @package Konzult
 */

$konzult_cats = get_the_category();
$konzult_cat  = $konzult_cats ? $konzult_cats[0]->name : '';
$konzult_initial = '';

if ( preg_match( '/^./u', get_the_title(), $konzult_match ) ) {
	$konzult_initial = $konzult_match[0];
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'k-card' ); ?>>
	<a class="k-card__link" href="<?php the_permalink(); ?>">
		<span class="k-card__media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
				the_post_thumbnail(
					'konzult-card',
					array(
						'class'   => 'k-card__image',
						'loading' => 'lazy',
					)
				);
				?>
			<?php else : ?>
				<span class="k-card__placeholder" aria-hidden="true">
					<span class="k-card__initial"><?php echo esc_html( $konzult_initial ); ?></span>
				</span>
			<?php endif; ?>
			<span class="k-card__arrow" aria-hidden="true"><?php echo konzult_icon( 'arrow', 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		</span>

		<span class="k-card__body">
			<?php if ( $konzult_cat ) : ?>
				<span class="k-card__cat"><?php echo esc_html( $konzult_cat ); ?></span>
			<?php endif; ?>

			<h3 class="k-card__title"><?php the_title(); ?></h3>

			<span class="k-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20, '…' ) ); ?></span>

			<span class="k-card__meta">
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<span aria-hidden="true">·</span>
				<span><?php echo esc_html( konzult_reading_time() ); ?></span>
			</span>
		</span>
	</a>
</article>
