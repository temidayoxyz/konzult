<?php
/**
 * Archive loop.
 *
 * @package Konzult
 */
?>
<div class="k-container k-archive">
	<?php if ( have_posts() ) : ?>
		<div class="k-cards">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/card' );
			endwhile;
			?>
		</div>

		<?php konzult_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content/none' ); ?>
	<?php endif; ?>
</div>
